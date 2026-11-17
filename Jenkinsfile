pipeline {
    agent any

    stages {
        stage('Start') {
            steps {
                echo 'Codomax Laravel CI Pipeline Started'
            }
        }

        stage('Checkout') {
            steps {
                echo 'GitHub source code checkout successful'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist'
            }
        }

        stage('Laravel Setup') {
            steps {
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }

        stage('Run Tests') {
            steps {
                sh 'php artisan test'
            }
        }

        stage('Complete') {
            steps {
                echo 'Codomax Laravel CI Pipeline Completed Successfully'
            }
        }
    }
}
