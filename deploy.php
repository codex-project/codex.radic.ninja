<?php

namespace Deployer;

$startTime = microtime();
require 'recipe/laravel.php';


set('application', 'codex.radic.ninja'); // Project name
set('repository', 'github.com:codex-project/codex.radic.ninja'); // Project repository
set('git_tty', true);   // [Optional] Allocate tty for git clone. Default value is false.
//add('shared_files', []); // Shared files/dirs between deploys
//add('shared_dirs', []);  // Shared files/dirs between deploys
//add('writable_dirs', []); // Writable dirs by web server
set('writable_dirs', array_merge(get('writable_dirs', []), [
    'codex',
    'codex/phpdoc',
    'codex/git',
]));
set('allow_anonymous_stats', false);
set('branch', 'master');
set('default_stage', 'staging');
set('keep_releases', 30);
set('http_user', 'radic-ninja');
set('writable_mode', 'chmod');
set('bin/composer', '~/composer.phar');
//set('releases_list', function () {//    return explode("\n", run('ls -dt {{deploy_path}}/releases/*'));//});


host('codex-staging.radic.ninja')
    ->port(60000)
    ->user('radic-ninja')
    ->identityFile('~/.ssh/id_rsa')
    ->stage('staging')
    ->set('deploy_path', '~/codex-staging.radic.ninja')//    ->set('branch', 'develop')
;
host('codex.radic.ninja')
    ->port(60000)
    ->user('radic-ninja')
    ->identityFile('~/.ssh/id_rsa')
    ->stage('production')
    ->set('deploy_path', '~/codex.radic.ninja');


task('confirm', function () {
    if ( ! askConfirmation('Are you sure you want to deploy to production?')) {
        write('Ok, quitting.');
        die;
    }
})->onStage('production');
task('test', function () {
    writeln('Hello world');
    writeln("release_path: {{release_path}}");
});
task('dump', function () {
    $result = run('pwd');
    writeln("Current dir: $result");
    writeln("writable_mode: {{writable_mode}}");
});

task('artisan:vendor:publish:public', function () {
    run('{{bin/php}} {{release_path}}/artisan vendor:publish --tag public --force');
});
task('artisan:codex:git:sync', function () {
    run('{{bin/php}} {{release_path}}/artisan codex:git:sync --all --force');
});
task('artisan:codex:phpdoc:clear', function () {
    run('{{bin/php}} {{release_path}}/artisan codex:phpdoc:clear --all');
});
task('artisan:codex:phpdoc:generate', function () {
    run('{{bin/php}} {{release_path}}/artisan codex:phpdoc:generate --all --force');
});

task('artisan:codex', [
    'artisan:vendor:publish:public',
    'artisan:codex:git:sync',
    'artisan:codex:phpdoc:clear',
    'artisan:codex:phpdoc:generate',
]);


after('artisan:view:clear', 'artisan:codex');


// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
// Migrate database before symlink new release.
//before('deploy:symlink', 'artisan:migrate');


task('laravel:logs', function () {
//    $result = run('cat {{deploy_path}}/shared/storage/logs/laravel-2019-06-25.log');
    $result = run('cat {{deploy_path}}/current/.env');
    write($result);
});


$tasks = [
    'log-new-deploy'         => function () {
        run('echo "[' . date('Y-m-d H:i:s') . '] Deploying a new version of the app." >> {{deploy_path}}/deploy.log');
    },
    'create:release'         => function () {
        $i = 0;
        do {
            $releasePath = '{{deploy_path}}/releases/' . date('m_d_H_i_') . $i++;
        }
        while (run("if [ -d $releasePath ]; then echo exists; fi;") == 'exists');
        run("mkdir $releasePath");
        set('release_path', $releasePath);
        writeln("Release path: $releasePath");
    },
    'update:code'            => function () {
        run("git clone -b {{branch}} -q --depth 1 {{repository}} {{release_path}}");
    },
    'create:symlinks'        => function () {
        // Link .env.
        run("ln -nfs {{deploy_path}}/static/.env {{release_path}}");
        // Link storage.
        run("ln -nfs {{deploy_path}}/static/storage {{release_path}}");
        // Link vendor.
        run("ln -nfs {{deploy_path}}/static/vendor {{release_path}}");
    },
    'update:vendors'         => function () {
        cd('{{release_path}}');
        writeln('<info>  Updating npm</info>');
        run('npm-cache install npm --no-dev');
        writeln('<info>  Updating composer</info>');
        run('composer install --no-dev');
    },
    'update:permissions'     => function () {
        run('chmod -R a+w {{release_path}}/bootstrap/cache');
        run('chown -R {{user}}:{{user}} {{release_path}} -h');
    },
    'compile:assets'         => function () {
        cd('{{release_path}}');
        run('npm run prod');
        run('rm -rf {{release_path}}/node_modules');
    },
    'optimize'               => function () {
        run('php {{release_path}}/artisan cache:clear');
        run('php {{release_path}}/artisan view:clear');
        run('php {{release_path}}/artisan config:clear');
        run('php {{release_path}}/artisan config:cache');
    },
    'site:down'              => function () {
        writeln(sprintf('<info>%s</info>', run('php {{release_path}}/artisan down')));
    },
    'migrate:db'             => function () {
        writeln(sprintf('  <info>%s</info>', run('php {{release_path}}/artisan migrate --force --no-interaction')));
    },
    'update:release_symlink' => function () {
        run('cd {{deploy_path}} && if [ -e live ]; then rm live; fi');
        run('cd {{deploy_path}} && if [ -h live ]; then rm live; fi');
        run('ln -nfs {{release_path}} {{deploy_path}}/live');
    },
    'site:up'                => function () {
        writeln(sprintf('  <info>%s</info>', run('php {{deploy_path}}/live/artisan up')));
    },
    'clear:opcache'          => function () {
        run('cachetool opcache:reset --fcgi=/var/run/php/php7.2-fpm.sock');
    },
    'cleanup'                => function () {
        $releases = get('releases_list');
        $keep     = get('keep_releases');
        while ($keep-- > 0) {
            array_shift($releases);
        }
        foreach ($releases as $release) {
            run("rm -rf $release");
        }
    },
    'notify:done'            => function () use ($startTime) {
        $seconds = intval(microtime(true) - $startTime);
        $minutes = substr('0' . intval($seconds / 60), -2);
        $seconds %= 60;
        $seconds = substr('0' . $seconds, -2);
        shell_exec("osascript -e 'display notification \"It took: $minutes:$seconds\" with title \"Deploy Finished\"'");
        shell_exec('say deployment finished');
    },
    'rollback'               => function () {
        $releases = get('releases_list');
        if (isset($releases[ 1 ])) {
            writeln(sprintf('<error>%s</error>', run('php {{deploy_path}}/live/artisan down')));
            $releaseDir = $releases[ 1 ];
            run("ln -nfs $releaseDir {{deploy_path}}/live");
            run("rm -rf {$releases[0]}");
            writeln("Rollback to `{$releases[1]}` release was successful.");
            writeln(sprintf('  <error>%s</error>', run("php {{deploy_path}}/live/artisan up")));
        } else {
            writeln('  <comment>No more releases you can revert to.</comment>');
        }
    },
    'deploy'                 => [
        'confirm',
        'create:release',
        'update:code',
        'create:symlinks',
        'update:vendors',
        'update:permissions',
        'compile:assets',
        'optimize',
        'site:down',
        'migrate:db',
        'update:release_symlink',
        'site:up',
        'clear:opcache',
        'cleanup',
        'notify:done',
    ],
];
//foreach ($tasks as $name => $task) {
//    task($name, $task);
//}

