pipeline {
    agent any

    tools {
        sonarQubeScanner 'sonar-scanner'
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('SonarQube Analysis') {
            steps {
                script {
                    withSonarQubeEnv('sonarqube') { 
                        sh """
                        sonar-scanner \
                        -Dsonar.projectKey=amdd \
                        -Dsonar.sources=. \
                        -Dsonar.host.url=$SONAR_HOST_URL \
                        -Dsonar.login=$SONAR_AUTH_TOKEN
                        """
                    }
                }
            }
        }
    }
}
