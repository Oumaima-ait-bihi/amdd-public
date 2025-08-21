pipeline {
    agent any

    tools {
        jdk 'Java17'                   // Assure-toi que ce JDK est configuré dans Jenkins
        sonarQubeScanner 'sonar-scanner' // Nom exact du SonarQube Scanner dans Jenkins
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
                    // Récupération du chemin du SonarQube Scanner configuré dans Jenkins
                    def scannerHome = tool 'sonar-scanner'
                    
                    // Exécution de l'analyse SonarQube en utilisant le serveur nommé 'sonarqube'
                    withSonarQubeEnv('sonarqube') {
                        sh "${scannerHome}/bin/sonar-scanner"
                    }
                }
            }
        }
    }
}
