#!/usr/bin/env groovy

//def extWorkspace = exwsAllocate(diskPoolId: 'diskpool1')

//noinspection GroovyAssignabilityCheck
node {

//    exws(extWorkspace){}
    /*
     * @var asdf
     */
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

                stage('Checkout') {
                    checkout([$class: 'GitSCM', branches: scm.branches, extensions: scm.extensions + [[$class: 'WipeWorkspace']], userRemoteConfigs: scm.userRemoteConfigs,]) //                    checkout scm
                }

                stage('Install Dependencies') {
                    sh 'rm -rf ./vendor ./codex-addons'
                    sh 'composer install --no-scripts'
                    sh 'composer dump-autoload'
                }

                stage('Set .env') {
                    sh '''
cp -f .env.jenkins .env
php artisan key:generate
php artisan dotenv:set-key --force APP_URL codex.radic.ninja
php artisan dotenv:set-key --force BACKEND_HOST $IPADDR
php artisan dotenv:set-key --force BACKEND_PORT $BACKEND_PORT
php artisan dotenv:set-key --force BACKEND_URL "http://$IPADDR:$BACKEND_PORT"
php artisan dotenv:set-key --force CODEX_GIT_GITHUB_TOKEN $GITHUB_TOKEN
php artisan dotenv:set-key --force CODEX_GIT_GITHUB_SECRET $GITHUB_TOKEN_SECRET
php artisan dotenv:set-key --force CODEX_GIT_BITBUCKET_KEY $BITBUCKET_KEY
php artisan dotenv:set-key --force CODEX_GIT_BITBUCKET_SECRET $BITBUCKET_KEY_SECRET

php artisan dotenv:set-key --force CODEX_AUTH_GITHUB_ID $GITHUB_AUTH_ID
php artisan dotenv:set-key --force CODEX_AUTH_GITHUB_SECRET $GITHUB_AUTH_SECRET
php artisan dotenv:set-key --force CODEX_AUTH_BITBUCKET_ID $BITBUCKET_AUTH_ID
php artisan dotenv:set-key --force CODEX_AUTH_BITBUCKET_SECRET $BITBUCKET_AUTH_SECRET
php artisan storage:link
'''
                }
                stage('Enable Codex Addons') {
                    sh '''
# php artisan codex:addon:enable codex/algolia-search
php artisan codex:addon:enable codex/auth
# php artisan codex:addon:enable codex/blog
php artisan codex:addon:enable codex/comments
php artisan codex:addon:enable codex/filesystems
php artisan codex:addon:enable codex/git
php artisan codex:addon:enable codex/packagist
php artisan codex:addon:enable codex/phpdoc
php artisan codex:addon:enable codex/sitemap
'''
                }

                parallel 'Publish Assets': {
                    sh 'rm -rf public/vendor'
                    sh 'php artisan vendor:publish --tag=public -vvv'
                }, 'Create PHPDoc Manifests': {
                    sh 'php artisan codex:phpdoc:generate --all -vvv'
                }, 'Optimize': {
                    sh 'composer optimize'
                }

                stage('Run Checks') {
                    sh 'composer checks'
                }

                stage('Archive Artifact') {
                    sh 'rm -f build.tar.gz'
                    sh '''
tar --exclude-vcs --exclude-vcs-ignores -czvf build.tar.gz \
    app bootstrap config database routes artisan server.php \
    codex-addons vendor storage resources public \
    composer.json composer.lock .env codex.supervisor.conf
'''
                    archiveArtifacts([artifacts: 'build.tar.gz', onlyIfSuccessful: true])
                }


            }
        }
    } catch (e) {
        throw e
    } finally {
        echo "done"
    }
}
