pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('SonarQube Analysis') {
            steps {
                script {
                    // Récupération du chemin du SonarQube Scanner configuré dans Jenkins
                    def scannerHome = tool 'sonar-scanner'  // Nom exact du scanner dans Jenkins
                    withSonarQubeEnv('sonarqube') {        // Nom du serveur SonarQube
                        sh "${scannerHome}/bin/sonar-scanner"
                    }
                }
            }
        }
    }
}
