pipeline {
    agent any
    environment {
        SONARQUBE = 'SonarQube' // Nom du serveur SonarQube dans Jenkins
    }
    stages {
        stage('Checkout') {
            steps { checkout scm }
        }
        stage('SonarQube Analysis') {
            steps {
                withSonarQubeEnv(SONARQUBE) {
                    bat 'sonar-scanner'
                }
            }
        }
        stage('Quality Gate') {
            steps {
                timeout(time: 2, unit: 'MINUTES') {
                    waitForQualityGate abortPipeline: true
                }
            }
        }
    }
    post {
        success {
            emailext (
                to: 'mohammedelmanssouri71@gmail.com',
                subject: "✅ Build Success: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                body: """<p>Le build s’est terminé avec succès !</p>
                         <p><b>Projet :</b> ${env.JOB_NAME}</p>
                         <p><b>Build :</b> #${env.BUILD_NUMBER}</p>
                         <p><b>Voir le détail :</b> <a href="${env.BUILD_URL}">${env.BUILD_URL}</a></p>""",
                mimeType: 'text/html'
            )
            githubNotify context: 'CI Pipeline', status: 'SUCCESS', description: 'Build OK'
        }
        failure {
            emailext (
                to: 'mohammedelmanssouri71@gmail.com',
                subject: "❌ Build Failed: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                body: """<p>Le build a échoué.</p>
                         <p>Vérifie les logs Jenkins ici :</p>
                         <a href="${env.BUILD_URL}">${env.BUILD_URL}</a>""",
                mimeType: 'text/html'
            )
            githubNotify context: 'CI Pipeline', status: 'FAILURE', description: 'Build failed'
        }
    }
}
