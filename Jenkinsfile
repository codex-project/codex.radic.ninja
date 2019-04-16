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
                    def scmVars = checkout([
                        $class: 'GitSCM',
                        branches: scm.branches,
                        extensions: scm.extensions + [[$class: 'WipeWorkspace']],
                        userRemoteConfigs: scm.userRemoteConfigs,
                    ])
                    currentBuild.displayName = "build(${env.BUILD_NUMBER}) branch(${scmVars.GIT_BRANCH}) ref(${scmVars.GIT_COMMIT})"
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

                parallel 'Create PHPDoc Manifests': {
                    sh 'php artisan codex:phpdoc:generate --all -vvv'
                }, 'Optimize': {
                    sh 'composer optimize'
                }

                stage('Run Checks') {
                    sh 'composer checks'
                }

                stage('Archive Artifact') {
                    sh '''
tar --exclude-vcs --exclude-vcs-ignores -cvf build.tar \
    app bootstrap config database routes artisan server.php \
    codex-addons vendor storage resources public \
    composer.json composer.lock .env codex.supervisor.conf
'''
                    archiveArtifacts([artifacts: 'build.tar', onlyIfSuccessful: true])
                }


                stage('Deploy') {
                    currentBuild.result = 'SUCCESS'
                    try {
                        //timeout(time: 10, unit: 'MINUTES')
                        //noinspection GroovyAssignabilityCheck
                        def INPUT_PARAMS = input([
                            id        : 'DeployInput',
                            message   : 'Deploy to target "codex.radic.ninja"?',
                            ok        : 'Ok',
                            parameters: [
                                booleanParam(defaultValue: false, description: 'Enable to deploy to target', name: 'INPUT_DEPLOY'),
                                choice(choices: ['production', 'staging', 'development'], description: '''Select deployment target<br><br>
<strong>production</strong>  - codex.radic.ninja<br>
<strong>staging</strong>     - staging.radic.ninja<br>
<strong>development</strong> - jenkins.radic.ninja:9951<br>''', name: 'INPUT_DEPLOY_TARGET'),
                            ]
                        ])
                        echo "INPUT_DEPLOY: ${INPUT_PARAMS.INPUT_DEPLOY}"
                        echo "INPUT_DEPLOY_TARGET: ${INPUT_PARAMS.INPUT_DEPLOY_TARGET}"

                        if (INPUT_PARAMS.INPUT_DEPLOY == true) {
                            //noinspection GroovyAssignabilityCheck
                            def buildOb = build([
                                job        : 'codex/deploy/codex.radic.ninja',
                                parameters : [
                                    run(description: '', name: 'DEPLOY_SOURCE', runId: "codex/codex.radic.ninja#${env.BUILD_NUMBER}")
                                ],
                                propagate  : false,
                                quietPeriod: 10,
                                wait       : false
                            ])
                            echo buildOb.toString()
                        }

                    } catch (e) {
                        echo e.getMessage()
                    } finally {
                        currentBuild.result = 'SUCCESS'
                    }
                }

            }
        }
    } catch (e) {
        throw e
    } finally {
        echo "done"
    }
}
