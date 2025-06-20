pipeline {
    agent any

    stages {
        stage('Preparar entorno') {
            steps {
                sh 'cp -r /var/lib/jenkins/app/* ./ || true'
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

        stage('Copiar reportes') {
            steps {
                sh 'cp -r reporte/* /var/lib/jenkins/app/reporte/'
            }
        }
    }

    post {
        always {
            archiveArtifacts artifacts: 'reporte/*.txt, reporte/*.json', allowEmptyArchive: true
        }
    }
}
