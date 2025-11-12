pipeline {
    agent any
    environment {
        SONARQUBE = 'SonarQube'
    }
    stages {
        stage('Checkout') { steps { checkout scm } }
        stage('Build & SonarQube') {
            steps {
                withSonarQubeEnv('SonarQube') {
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
            githubNotify context: 'CI Pipeline', status: 'SUCCESS', description: 'Build OK'
        }
        failure {
            githubNotify context: 'CI Pipeline', status: 'FAILURE', description: 'Build failed'
        }
    }
}

