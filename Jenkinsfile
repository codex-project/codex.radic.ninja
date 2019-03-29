#!groovy


node('Docker Compose') {
    checkout scm
    stage('Build') {
        step([
            $class                    : 'DockerComposeBuilder',
            dockerComposeFile         : 'laradock/docker-compose.yml',
            option                    : [$class: 'StartService', scale: 1, service: 'apache2'],
            useCustomDockerComposeFile: true
        ])
    }
}
