<?php

return [

    'route_prefix' => 'auth',

    'enable_https' => false,

    'providers' => [
        'github'    => \Laravel\Socialite\Two\GithubProvider::class,
        'bitbucket' => \Laravel\Socialite\Two\BitbucketProvider::class,
        'gitlab'    => \Laravel\Socialite\Two\GitlabProvider::class,
        'google'    => \Laravel\Socialite\Two\GoogleProvider::class,
    ],

    'services' => [
        'github'    => [
            'provider'      => 'github',
            'client_id'     => env('CODEX_AUTH_GITHUB_ID', ''),
            'client_secret' => env('CODEX_AUTH_GITHUB_SECRET', ''),
            'scopes'        => [ 'user', 'user:email', 'read:org' ],
            'with'          => [],
        ],
        'bitbucket' => [
            'provider'      => 'bitbucket',
            'client_id'     => env('CODEX_AUTH_BITBUCKET_ID', ''),
            'client_secret' => env('CODEX_AUTH_BITBUCKET_SECRET', ''),
            'scopes'        => [ 'account' ],
            'with'          => [],
        ],
        'gitlab'    => [
            'provider'      => 'gitlab',
            'client_id'     => env('CODEX_AUTH_GITLAB_ID', ''),
            'client_secret' => env('CODEX_AUTH_GITLAB_SECRET', ''),
            'scopes'        => [],
            'with'          => [],
        ],
        'google'    => [
            'provider'      => 'google',
            'client_id'     => env('CODEX_AUTH_GOOGLE_ID', ''),
            'client_secret' => env('CODEX_AUTH_GOOGLE_SECRET', ''),
            'scopes'        => ['email','profile','openid'],
            'with'          => [],
        ],
    ],

    'default_project_config' => [
        'auth' => [
            'enabled' => false,
//            'driver'  => null,
//            'allow'   => [
//                'groups'    => [],
//                'emails'    => [],
//                'usernames' => [],
//            ],
            'with'    => [
//                [
//                    'service'  => 'github',
//                    // any or all of these can be used
//                    'groups'    => [],
//                    'emails'    => [],
//                    'usernames' => [],
//                ],
            ],
        ],

    ],
];
