<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechPro B2B - Équipements Professionnels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }


        /* Header */

        header {
            background-color: white;
            color: black;
            padding: 1rem 0;
            /* border-bottom: 1px solid grey; */
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo img {
            height: 50px;
        }

        .search-container {
            display: flex;
            gap: 10px;
            flex: 1;
            max-width: 500px;
            margin: 0 20px;
        }

        .search-box {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            background-color: #E7EFC7;
        }

        .search-btn {
            background: #AEC8A4;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-btn:hover {
            background: #3B3B1A;
        }

        .user-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .action-btn {
            background: transparent;
            color: #2c3e50;
            border: 2px solid #AEC8A4;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }

        .action-btn i {
            font-size: 16px;
        }

        /* .action-btn:hover {
            background: white;
            color: #2c3e50;
        } */

        .cart-count,
        .fav-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #AEC8A4;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Connexion */
        .connexion {
            background-color: #AEC8A4;
            color: white;
            padding: 7px 20px;
            border-radius: 25px;
        }

        /* Filters */

        .filters-section {
            margin: 10px;
            background: white;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .filters-container {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .filter-group label {
            font-weight: bold;
            color: #2c3e50;
        }

        .filter-group select,
        .filter-group input {
            padding: 8px 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .price-range {
            display: flex;
            gap: 10px;
            align-items: center;
        }


        /* Product Sections */

        .product-section {
            margin: 40px 0;
        }

        .section-title {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 20px;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #f1f2f6, #ddd);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #999;
        }

        .promotion-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #e74c3c;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }

        .product-info {
            padding: 20px;
        }

        .product-name {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .product-price {
            font-size: 1.3rem;
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 1rem;
            margin-left: 10px;
        }

        .product-stock {
            color: #999;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .product-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
            flex: 1;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .btn-favorite {
            background: transparent;
            color: #e74c3c;
            border: 2px solid #e74c3c;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-favorite:hover,
        .btn-favorite.active {
            background: #e74c3c;
            color: white;
        }


        /* Loading */

        .loading {
            text-align: center;
            padding: 40px;
            font-size: 1.2rem;
            color: #666;
        }

        .spinner {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        /* Footer */

        footer {
            background: #2c3e50;
            color: white;
            padding: 40px 0 20px;
            margin-top: 60px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .footer-section h3 {
            margin-bottom: 15px;
            color: #3498db;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section ul li a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #34495e;
            color: #bdc3c7;
        }


        /* Responsive */

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
            }

            .search-container {
                width: 100%;
                max-width: none;
                margin: 0;
            }

            .filters-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                width: 100%;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <img src="images/logo.png" alt="logo">
                </div>

                <div class="search-container">
                    <input type="text" class="search-box" id="searchInput" placeholder="Rechercher des produits...">
                    <button class="search-btn" onclick="searchProducts()">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                <div class="user-actions">
                    <button class="action-btn" onclick="toggleFavorites()">
                        <i class="fas fa-heart"></i>
                        <span class="fav-count" id="favCount">0</span>
                    </button>
                    <button class="action-btn" onclick="toggleCart()">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count" id="cartCount">0</span>
                    </button>
                </div>
                <div class="connexion">
                    <span>Connexion</span>
                </div>
            </div>
        </div>
    </header>

    <section class="filters-section">
        <div class="container">
            <div class="filters-container">
                <div class="filter-group">
                    <label>Catégorie</label>
                    <select id="categoryFilter">
                        <option value="">Toutes les catégories</option>
                        <option value="ordinateurs">Ordinateurs et Unités Centrales</option>
                        <option value="ecrans">Écrans et Affichage</option>
                        <option value="audio-video">Audio et Vidéo</option>
                        <option value="peripheriques">Périphériques</option>
                        <option value="reseau">Réseau et Connectivité</option>
                        <option value="ecriture">Instruments d'Écriture</option>
                        <option value="papeterie">Papeterie</option>
                        <option value="classement">Classement et Archivage</option>
                        <option value="agrafage">Agrafage et Fixation</option>
                        <option value="presentation">Présentations et Affichage</option>
                        <option value="courrier">Courrier et Expédition</option>
                        <option value="accessoires">Accessoires de Bureau</option>
                        <option value="mobilier">Mobilier et Ergonomie</option>
                        <option value="nettoyage">Nettoyage et Entretien</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Prix</label>
                    <div class="price-range">
                        <input type="number" id="minPrice" placeholder="Min €" min="0">
                        <span>-</span>
                        <input type="number" id="maxPrice" placeholder="Max €" min="0">
                    </div>
                </div>

                <div class="filter-group">
                    <label>Trier par</label>
                    <select id="sortBy">
                        <option value="recent">Plus récents</option>
                        <option value="price_asc">Prix croissant</option>
                        <option value="price_desc">Prix décroissant</option>
                        <option value="popular">Popularité</option>
                        <option value="name">Nom A-Z</option>
                    </select>
                </div>

                <button class="btn btn-primary" onclick="applyFilters()">
                    <i class="fas fa-filter"></i> Appliquer
                </button>
            </div>
        </div>
    </section>

    <main class="container">
        <!-- Produits en promotion -->
        <section class="product-section">
            <h2 class="section-title">
                <i class="fas fa-fire"></i> Promotions en cours
            </h2>
            <div class="products-grid" id="promotionProducts">
                <div class="loading">
                    <div class="spinner"></div>
                    Chargement des promotions...
                </div>
            </div>
        </section>

        <!-- Produits populaires -->
        <section class="product-section">
            <h2 class="section-title">
                <i class="fas fa-star"></i> Produits populaires
            </h2>
            <div class="products-grid" id="popularProducts">
                <div class="loading">
                    <div class="spinner"></div>
                    Chargement des produits populaires...
                </div>
            </div>
        </section>

        <!-- Produits récents -->
        <section class="product-section">
            <h2 class="section-title">
                <i class="fas fa-clock"></i> Nouveautés
            </h2>
            <div class="products-grid" id="recentProducts">
                <div class="loading">
                    <div class="spinner"></div>
                    Chargement des nouveautés...
                </div>
            </div>
        </section>

        <!-- Tous les produits -->
        <section class="product-section">
            <h2 class="section-title">
                <i class="fas fa-th-large"></i> Tous nos produits
            </h2>
            <div class="products-grid" id="allProducts">
                <div class="loading">
                    <div class="spinner"></div>
                    Chargement de tous les produits...
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>StackCore</h3>
                    <p>Votre partenaire de confiance pour l'équipement professionnel et les fournitures de bureau.</p>
                    <p><i class="fas fa-phone"></i> +212567980023</p>
                    <p><i class="fas fa-envelope"></i> contact@stackcore.ma</p>
                </div>

                <div class="footer-section">
                    <h3>Catégories</h3>
                    <ul>
                        <li><a href="#">Ordinateurs & IT</a></li>
                        <li><a href="#">Écrans & Affichage</a></li>
                        <li><a href="#">Audio & Vidéo</a></li>
                        <li><a href="#">Périphériques</a></li>
                        <li><a href="#">Réseau</a></li>
                        <li><a href="#">Fournitures Bureau</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Livraison rapide</a></li>
                        <li><a href="#">Support technique</a></li>
                        <li><a href="#">Garantie étendue</a></li>
                        <li><a href="#">Devis personnalisé</a></li>
                        <li><a href="#">Formation</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Compte</h3>
                    <ul>
                        <li><a href="#">Mon compte</a></li>
                        <li><a href="#">Mes commandes</a></li>
                        <li><a href="#">Mes favoris</a></li>
                        <li><a href="#">Support client</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 StackCore. Tous droits réservés. | <a href="#">Mentions légales</a> | <a href="#">CGV</a>
                    | <a href="#">Politique de confidentialité</a></p>
            </div>
        </div>
    </footer>

    <script>
        // Variables globales
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        let cart = JSON.parse(localStorage.getItem('cart') || '[]');
        let allProductsData = [];

        // Initialisation
        document.addEventListener('DOMContentLoaded', function () {
            updateCounters();
            loadPromotionProducts();
            loadPopularProducts();
            loadRecentProducts();
            loadAllProducts();
            setupEventListeners();
        });

        function setupEventListeners() {
            // Recherche en temps réel
            document.getElementById('searchInput').addEventListener('input', debounce(searchProducts, 300));

            // Filtres
            document.getElementById('categoryFilter').addEventListener('change', applyFilters);
            document.getElementById('sortBy').addEventListener('change', applyFilters);
            document.getElementById('minPrice').addEventListener('input', debounce(applyFilters, 500));
            document.getElementById('maxPrice').addEventListener('input', debounce(applyFilters, 500));
        }

        // Debounce function pour optimiser les performances
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Chargement des produits via AJAX
        async function loadProducts(type, containerId) {
            try {
                const response = await fetch(`api_products.php?type=${type}`);
                const data = await response.json();

                if (data.success) {
                    displayProducts(data.products, containerId);
                    if (type === 'all') {
                        allProductsData = data.products;
                    }
                } else {
                    document.getElementById(containerId).innerHTML = '<p>Erreur lors du chargement des produits.</p>';
                }
            } catch (error) {
                console.error('Erreur:', error);
                document.getElementById(containerId).innerHTML = '<p>Erreur de connexion.</p>';
            }
        }

        function loadPromotionProducts() {
            loadProducts('promotion', 'promotionProducts');
        }

        function loadPopularProducts() {
            loadProducts('popular', 'popularProducts');
        }

        function loadRecentProducts() {
            loadProducts('recent', 'recentProducts');
        }

        function loadAllProducts() {
            loadProducts('all', 'allProducts');
        }

        // Affichage des produits
        function displayProducts(products, containerId) {
            const container = document.getElementById(containerId);

            if (products.length === 0) {
                container.innerHTML = '<p class="loading">Aucun produit trouvé.</p>';
                return;
            }

            const productsHtml = products.map(product => {
                const isFavorite = favorites.includes(product.id);
                const inCart = cart.some(item => item.id === product.id);

                return `
                    <div class="product-card" data-product-id="${product.id}">
                        ${product.is_on_promotion ? '<div class="promotion-badge">PROMO</div>' : ''}
                        
                        <div class="product-image">
                            <i class="fas fa-box"></i>
                        </div>
                        
                        <div class="product-info">
                            <h3 class="product-name">${product.name}</h3>
                            <div class="product-price">
                                ${product.is_on_promotion ?
                        `${product.promotion_price}€ <span class="original-price">${product.price}€</span>` :
                        `${product.price}€`
                    }
                            </div>
                            <div class="product-stock">
                                Stock: ${product.stock} unités
                                ${product.min_order_quantity > 1 ? ` | Min: ${product.min_order_quantity}` : ''}
                            </div>
                            
                            <div class="product-actions">
                                <button class="btn btn-primary" onclick="addToCart(${product.id}, '${product.name}', ${product.is_on_promotion ? product.promotion_price : product.price})">
                                    <i class="fas fa-cart-plus"></i> ${inCart ? 'Ajouté' : 'Panier'}
                                </button>
                                <button class="btn-favorite ${isFavorite ? 'active' : ''}" onclick="toggleFavorite(${product.id})">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            container.innerHTML = productsHtml;
        }

        // Recherche de produits
        async function searchProducts() {
            const query = document.getElementById('searchInput').value.trim();

            if (query.length === 0) {
                loadAllProducts();
                return;
            }

            try {
                const response = await fetch(`api_products.php?type=search&query=${encodeURIComponent(query)}`);
                const data = await response.json();

                if (data.success) {
                    displayProducts(data.products, 'allProducts');
                }
            } catch (error) {
                console.error('Erreur de recherche:', error);
            }
        }

        // Application des filtres
        async function applyFilters() {
            const category = document.getElementById('categoryFilter').value;
            const minPrice = document.getElementById('minPrice').value;
            const maxPrice = document.getElementById('maxPrice').value;
            const sortBy = document.getElementById('sortBy').value;

            const params = new URLSearchParams({
                type: 'filter',
                category: category,
                min_price: minPrice,
                max_price: maxPrice,
                sort_by: sortBy
            });

            try {
                const response = await fetch(`api_products.php?${params}`);
                const data = await response.json();

                if (data.success) {
                    displayProducts(data.products, 'allProducts');
                }
            } catch (error) {
                console.error('Erreur de filtrage:', error);
            }
        }

        // Gestion des favoris
        function toggleFavorite(productId) {
            const index = favorites.indexOf(productId);

            if (index === -1) {
                favorites.push(productId);
            } else {
                favorites.splice(index, 1);
            }

            localStorage.setItem('favorites', JSON.stringify(favorites));
            updateCounters();

            // Mise à jour visuelle
            const button = document.querySelector(`[data-product-id="${productId}"] .btn-favorite`);
            if (button) {
                button.classList.toggle('active');
            }
        }

        // Gestion du panier
        function addToCart(productId, productName, price) {
            const existingItem = cart.find(item => item.id === productId);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    price: price,
                    quantity: 1
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCounters();

            // Feedback visuel
            const button = document.querySelector(`[data-product-id="${productId}"] .btn-primary`);
            if (button) {
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i> Ajouté !';
                button.style.background = '#27ae60';

                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                }, 2000);
            }
        }

        // Mise à jour des compteurs
        function updateCounters() {
            document.getElementById('favCount').textContent = favorites.length;
            document.getElementById('cartCount').textContent = cart.reduce((total, item) => total + item.quantity, 0);
        }

        // Navigation vers favoris/panier
        function toggleFavorites() {
            // Redirection vers page favoris
            window.location.href = 'favorites.php';
        }

        function toggleCart() {
            // Redirection vers page panier
            window.location.href = 'cart.php';
        }
    </script>
</body>

</html>