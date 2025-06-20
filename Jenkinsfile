pipeline {
    agent any

    stages {
        stage('Clonar Repositorio') {
            steps {
                echo 'Usando repositorio local /var/lib/jenkins/app'
            }
        }

        stage('SAST - Semgrep') {
            steps {
                sh 'semgrep scan --config=auto /var/lib/jenkins/app > /var/lib/jenkins/reporte/semgrep-report.txt || true'
            }
        }

        stage('SBOM - Syft') {
            steps {
                sh 'syft dir:/var/lib/jenkins/app -o json > /var/lib/jenkins/reporte/syft-sbom.json || true'
            }
        }

        stage('SCA - Grype') {
            steps {
                sh 'grype dir:/var/lib/jenkins/app -o table > /var/lib/jenkins/reporte/grype-report.txt || true'
            }
        }
    }

    post {
        always {
            archiveArtifacts artifacts: 'reporte/*.txt, reporte/*.json', allowEmptyArchive: true
        }
    }
}
