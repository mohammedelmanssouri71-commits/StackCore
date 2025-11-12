pipeline {
    agent any
    environment {
        SONARQUBE = 'SonarQube'
    }
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        stage('SonarQube Analysis') {
            steps {
                withSonarQubeEnv(SONARQUBE) {
                    bat "sonar-scanner -Dsonar.projectKey=StackCore -Dsonar.sources=."
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
            echo 'Build et analyse OK'
        }
        failure {
            echo 'Échec du build ou du Quality Gate'
        }
    }
}
