#!/usr/bin/env groovy
import nl.radic.Radic

//noinspection GroovyAssignabilityCheck
node {
    try {
        def radic = new Radic(this)
        def codex = radic.codex()
        def backend = codex.backend

        codex.useEnv {
            stage('checkout') {
                radic.git.checkout()
            }

            stage('Install Dependencies') {
                backend
                    .disableComposerCache()
                    .install()
                    .setDotEnv('https://codex.radic.ninja')
                    .enableAddons()
            }

            parallel 'Create PHPDoc Manifests': {
                sh 'php artisan codex:phpdoc:generate --all -vvv'
            }, 'Optimize': {
                sh 'composer optimize'
            }

            stage('Run Checks') {
                sh 'rm -rf vendor/public vendor/storage'
                sh 'php artisan vendor:publish --force --tag=public -vvv'
                sh 'php artisan storage:link -vvv'
                sh 'composer checks'
                sh 'rm -rf vendor/public vendor/storage'
            }

            stage('Archive Artifact') {
                sh '''
tar --exclude-vcs --exclude-vcs-ignores -cvf build.tar \
    app bootstrap config database routes \
    codex-addons vendor vendor/myclabs/php-enum/* \
    storage \
    resources public \
    artisan server.php \
    composer.json composer.lock .env codex.supervisor.conf
'''
                archiveArtifacts([artifacts: 'build.tar', onlyIfSuccessful: true])
            }
        }
    } catch (e) {
        throw e
    } finally {
        echo 'done'
    }
}

