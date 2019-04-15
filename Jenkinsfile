#!/usr/bin/env groovy


def backendSetEnv() {
    stage('set env') {
        sh '''
cp -f .env.jenkins .env
php artisan key:generate
php artisan dotenv:set-key APP_URL codex.radic.ninja
php artisan dotenv:set-key BACKEND_HOST $IPADDR
php artisan dotenv:set-key BACKEND_PORT $BACKEND_PORT
php artisan dotenv:set-key BACKEND_URL "http://$IPADDR:$BACKEND_PORT"
php artisan dotenv:set-key CODEX_GIT_GITHUB_TOKEN $GITHUB_TOKEN
php artisan dotenv:set-key CODEX_GIT_GITHUB_SECRET $GITHUB_TOKEN_SECRET
php artisan dotenv:set-key CODEX_GIT_BITBUCKET_KEY $BITBUCKET_KEY
php artisan dotenv:set-key CODEX_GIT_BITBUCKET_SECRET $BITBUCKET_KEY_SECRET

php artisan dotenv:set-key CODEX_AUTH_GITHUB_ID $GITHUB_AUTH_ID
php artisan dotenv:set-key CODEX_AUTH_GITHUB_SECRET $GITHUB_AUTH_SECRET
php artisan dotenv:set-key CODEX_AUTH_BITBUCKET_ID $BITBUCKET_AUTH_ID
php artisan dotenv:set-key CODEX_AUTH_BITBUCKET_SECRET $BITBUCKET_AUTH_SECRET
'''
    }
}

//noinspection GroovyAssignabilityCheck
node {
    try {
        //noinspection GroovyAssignabilityCheck
        withCredentials([
            usernamePassword(credentialsId: 'github-secret-token', passwordVariable: 'githubTokenSecret', usernameVariable: 'githubToken'),
            usernamePassword(credentialsId: 'bitbucket-key-secret', passwordVariable: 'bitbucketKeySecret', usernameVariable: 'bitbucketKey'),
            usernamePassword(credentialsId: 'auth-github-id-secret', passwordVariable: 'githubAuthSecret', usernameVariable: 'githubAuthId'),
            usernamePassword(credentialsId: 'auth-bitbucket-id-secret', passwordVariable: 'bitbucketAuthSecret', usernameVariable: 'bitbucketAuthId')
        ]) {
            //noinspection GroovyAssignabilityCheck
            withEnv([
                "BACKEND_PORT=39967",
                "IS_JENKINS=1",
                "GITHUB_TOKEN=${githubToken}",
                "GITHUB_TOKEN_SECRET=${githubTokenSecret}",
                "BITBUCKET_KEY=${bitbucketKey}",
                "BITBUCKET_KEY_SECRET=${bitbucketKeySecret}",

                "GITHUB_AUTH_ID=${githubAuthId}",
                "GITHUB_AUTH_SECRET=${githubAuthSecret}",
                "BITBUCKET_AUTH_ID=${bitbucketAuthId}",
                "BITBUCKET_AUTH_SECRET=${bitbucketAuthSecret}",
            ]) {
                stage('checkout') {
                    checkout([$class: 'GitSCM', branches: scm.branches, extensions: scm.extensions + [[$class: 'WipeWorkspace']], userRemoteConfigs: scm.userRemoteConfigs,]) //                    checkout scm
                }
            }
        }
    } catch (e) {
        throw e
    } finally {
        echo "done"
    }
}
