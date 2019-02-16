<?php

return [
    'connections'            => [
        'bitbucket_oauth'    => [
            'driver' => 'bitbucket',
            'method' => 'oauth',
            'key'    => env('CODEX_GIT_BITBUCKET_KEY', 'your-key'),
            'secret' => env('CODEX_GIT_BITBUCKET_SECRET', 'your-secret'),
        ],
        'bitbucket_password' => [
            'driver'   => 'bitbucket',
            'method'   => 'password',
            'username' => env('CODEX_GIT_BITBUCKET_USERNAME', 'your-username'),
            'password' => env('CODEX_GIT_BITBUCKET_PASSWORD', 'your-password'),
        ],
        'github_token'       => [
            'driver' => 'github',
            'method' => 'token',
            'token'  => env('CODEX_GIT_GITHUB_TOKEN', 'your-token'),
        ],
        'github_password'    => [
            'driver'   => 'github',
            'method'   => 'password',
            'username' => env('CODEX_GIT_GITHUB_USERNAME', 'your-username'),
            'password' => env('CODEX_GIT_GITHUB_PASSWORD', 'your-password'),
        ],
        'github_app'         => [
            'driver'       => 'github',
            'clientId'     => 'your-client-id',
            'clientSecret' => 'your-client-secret',
            'method'       => 'application',
        ],
        'github_jwt'         => [
            'driver' => 'github',
            'token'  => 'your-jwt-token',
            'method' => 'jwt',
        ],
    ],
    'default_project_config' => [
        'branching' => [
            'production'  => 'master',
            'development' => 'develop',
        ],
        'git'       => [
            'enabled'    => false,
            // The owner (organisation or username)
            'owner'      => '',
            // The repository name
            'repository' => '',
            // The connection key to use (as defined at the top of this file)
            'connection' => '',
            // Branches to sync
            'branches'   => [], //[ 'master']
            // Version (tags) constraints makes one able to define ranges and whatnot
            // * || 1.x || >=2.5.0 || 5.0.0 - 7.2.3'
            'versions'   => false,

            'skip'  => [
                'patch_versions' => false,
                'minor_versions' => false,
            ],

            // paths
            'paths' => [
                // relative path to the root folder where the docs are
                'docs'  => 'docs',
                // relative path to the index.md file. You can use the README.md or docs/index.md for example
                'index' => 'docs/index.md' // 'index' => 'README.md',
            ],

            'webhook' => [
                // Enable webhook support. Configure it in Github/Bitbucket.
                // This will automaticly sync your project every time a 'push' event occurs
                // This also requires you to configure queues properly (by using for example, redis with supervisord)
                'enabled' => false,

                // Github webhooks allow a 'secret' that has to match. Put it in here
                'secret'  => env('CODEX_GIT_GITHUB_WEBHOOK_SECRET', ''),
            ],
        ],
    ],
];
