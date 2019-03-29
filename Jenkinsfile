#!groovy


node {
    stage('fetch') {
        stage('checkout') {
            checkout scm
        }
        stage('update submodule') {
            sh "git submodule update --init --remote --recursive laradock"
        }
    }
    stage('init') {
        stage('set .env') {
            sh "mv .env.jenkins .env"
            sh "mv laradock/.env.jenkins laradock/.env"
        }
        stage('docker-compose apache2') {
            step([
                $class                    : 'DockerComposeBuilder',
                dockerComposeFile         : 'laradock/docker-compose.yml',
                option                    : [$class: 'StartService', scale: 1, service: 'apache2'],
                useCustomDockerComposeFile: true
            ])
        }
    }
}
