pipeline {
    agent any

    stages {
        stage('Copiar código fuente') {
            steps {
                sh 'cp -r /var/lib/jenkins/app/* ./'
                sh 'mkdir -p reporte'
            }
        }

        stage('SAST - Semgrep') {
            steps {
                sh 'semgrep scan --config=auto . > reporte/semgrep-report.txt || true'
            }
        }

        stage('SBOM - Syft') {
            steps {
                sh 'syft dir:. -o json > reporte/syft-sbom.json || true'
            }
        }

        stage('SCA - Grype') {
            steps {
                sh 'grype dir:. -o table > reporte/grype-report.txt || true'
            }
        }
    }

    post {
        always {
            archiveArtifacts artifacts: 'reporte/*.txt, reporte/*.json', allowEmptyArchive: true
        }
    }
}
