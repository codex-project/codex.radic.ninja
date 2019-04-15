#!/usr/bin/env groovy


//noinspection GroovyAssignabilityCheck
node {
    stage('checkout') {
        checkout scm
    }
    stage('update submodule') {
        sh "git submodule update --init --remote --recursive --force"
    }
    stage('set .env') {
        sh "mv .env.jenkins .env"
        sh "mv laradock/.env.jenkins laradock/.env"
    }
    stage('docker-compose apache2') {
        sh "cd laradock"
        sh "docker-compose up -d apache"
    }
}
