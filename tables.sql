-- Mises à jour de la base de données pour la gestion des connexions

-- Ajouter une colonne last_login à la table users
ALTER TABLE users ADD COLUMN last_login DATETIME NULL AFTER created_at;

-- Créer une table pour les sessions utilisateur (optionnel, pour "se souvenir de moi")
CREATE TABLE user_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    session_token VARCHAR(64) UNIQUE NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45),
    user_agent TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_session_token (session_token),
    INDEX idx_user_sessions (user_id),
    INDEX idx_expires_at (expires_at)
);

-- Créer une table pour enregistrer les tentatives de connexion échouées
CREATE TABLE failed_login_attempts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    ip_address VARCHAR(45),
    attempted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_agent TEXT,
    INDEX idx_email_time (email, attempted_at),
    INDEX idx_ip_time (ip_address, attempted_at)
);

-- Optimiser la table user_logins existante
ALTER TABLE user_logins ADD COLUMN user_agent TEXT AFTER ip_address;
ALTER TABLE user_logins ADD INDEX idx_user_login_time (user_id, login_time);
ALTER TABLE user_logins ADD INDEX idx_ip_login_time (ip_address, login_time);

-- Créer une vue pour obtenir les statistiques de connexion
CREATE VIEW user_login_stats AS
SELECT 
    u.id,
    u.company_name,
    u.email,
    u.created_at,
    u.last_login,
    COUNT(ul.id) as total_logins,
    MAX(ul.login_time) as latest_login,
    MIN(ul.login_time) as first_login,
    COUNT(DISTINCT ul.ip_address) as unique_ips
FROM users u
LEFT JOIN user_logins ul ON u.id = ul.user_id
GROUP BY u.id, u.company_name, u.email, u.created_at, u.last_login;

-- Procédure stockée pour nettoyer les anciennes données de connexion
DELIMITER $$
CREATE PROCEDURE CleanOldLoginData()
BEGIN
    -- Supprimer les tentatives de connexion échouées de plus de 30 jours
    DELETE FROM failed_login_attempts 
    WHERE attempted_at < DATE_SUB(NOW(), INTERVAL 30 DAY);
    
    -- Supprimer les sessions expirées
    DELETE FROM user_sessions 
    WHERE expires_at < NOW();
    
    -- Optionnel: Garder seulement les 100 dernières connexions par utilisateur
    DELETE ul1 FROM user_logins ul1
    JOIN (
        SELECT user_id, login_time, 
               ROW_NUMBER() OVER (PARTITION BY user_id ORDER BY login_time DESC) as rn
        FROM user_logins
    ) ul2 ON ul1.user_id = ul2.user_id AND ul1.login_time = ul2.login_time
    WHERE ul2.rn > 100;
END$$
DELIMITER ;

-- Créer un événement pour nettoyer automatiquement les données (optionnel)
-- Activer d'abord le scheduler d'événements: SET GLOBAL event_scheduler = ON;
/*
CREATE EVENT CleanLoginDataEvent
ON SCHEDULE EVERY 1 DAY
STARTS CURRENT_TIMESTAMP
DO
  CALL CleanOldLoginData();
*/

-- Index pour optimiser les performances
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_users_last_login ON users(last_login);

-- Requêtes utiles pour les statistiques

-- 1. Obtenir les connexions récentes d'un utilisateur
/*
SELECT ul.login_time, ul.ip_address 
FROM user_logins ul 
WHERE ul.user_id = ? 
ORDER BY ul.login_time DESC 
LIMIT 10;
*/

-- 2. Obtenir les utilisateurs les plus actifs
/*
SELECT u.company_name, u.email, COUNT(ul.id) as login_count
FROM users u
LEFT JOIN user_logins ul ON u.id = ul.user_id
WHERE ul.login_time >= DATE_SUB(NOW(), INTERVAL 30 DAY)
GROUP BY u.id, u.company_name, u.email
ORDER BY login_count DESC
LIMIT 10;
*/

-- 3. Détecter les connexions suspectes (plusieurs IPs différentes)
/*
SELECT u.email, u.company_name, COUNT(DISTINCT ul.ip_address) as ip_count
FROM users u
JOIN user_logins ul ON u.id = ul.user_id
WHERE ul.login_time >= DATE_SUB(NOW(), INTERVAL 7 DAY)
GROUP BY u.id, u.email, u.company_name
HAVING ip_count > 3
ORDER BY ip_count DESC;
*/

-- 4. Rapport des tentatives de connexion échouées
/*
SELECT email, COUNT(*) as failed_attempts, 
       MIN(attempted_at) as first_attempt,
       MAX(attempted_at) as last_attempt
FROM failed_login_attempts
WHERE attempted_at >= DATE_SUB(NOW(), INTERVAL 1 DAY)
GROUP BY email
ORDER BY failed_attempts DESC;
*/