<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Display Name
    |--------------------------------------------------------------------------
    |
    | This will be used for the <title> and for the header
    |
    */
    'display_name'    => env('CODEX_DISPLAY_NAME', config('app.name', 'Codex')),

    /*
    |--------------------------------------------------------------------------
    | Description
    |--------------------------------------------------------------------------
    |
    | Describes the application
    |
    */
    'description'     => 'Codex is a file-based documentation platform built on top of Laravel. It\'s completely customizable and dead simple to use to create beautiful documentation.',

    /*
    |--------------------------------------------------------------------------
    | Default Project
    |--------------------------------------------------------------------------
    |
    | Will be used when, for example, you do not specify the project name in the URL
    |
    */
    'default_project' => env('CODEX_DEFAULT_PROJECT', 'codex'),

    'paths' => [
        'docs' => resource_path('docs'),
        'log'  => storage_path('logs/codex.log'),
    ],

    'cache' => [
        'enabled'  => env('CODEX_CACHE_ENABLED', config('app.debug') !== true),
        'key'     => env('CODEX_CACHE_KEY', 'codex'),
        'minutes' => (int)env('CODEX_CACHE_MINUTES', 60),
    ],

    'http' => [
        // run codex under a specific uri. For example, setting this to 'foobar' will result in urls like
        // http://host.com/foobar/documentation/$PROJECT/$REVISION/$DOCUMENT
        // http://host.com/foobar/graphql
        // you can leave this to null to not have a base_route
        'prefix'               => env('CODEX_ROUTING_PREFIX', null),
        'api_prefix'           => 'api',
        'documentation_prefix' => 'documentation',
//        'documentation_view'   => 'codex::index',
        'documentation_view'   => 'codex::react.index',
        'backend_data_url' => 'backend_data.js'
    ],

    'routeMap' => [
        'root' => 'codex',
        'api' => 'codex.api',
        'documentation' => 'codex.documentation',
    ],

    'processors' => [
        'enabled'  => [],
        'disabled' => [],
    ],

    'projects' => [
        'meta' => [
            'icon'        => 'fa-book',
            'color'       => 'deep-orange',
            'authors'     => [], //['name' => 'Robin Radic', 'email' => 'rradic@hotmail.com']
            'license'     => 'MIT',
            'links'       => [
                'Git'     => 'https://github.com/codex-project',
                'Issues'  => 'https://github.com/codex-project/codex/issues',
                'Package' => 'https://packagist.com/codex-project/codex',
            ],
            'stylesheets' => [],
            'javascripts' => [],
            'styles'      => [],
            'scripts'     => [],
        ],

        'disk'         => null,
        'display_name' => null,
        'description'  => null,
        'processors'   => [ 'enabled' => [], 'disabled' => [], ],

        'view'                          => 'codex::partials.document',
        'default_revision'              => 'master',
        'allow_revision_php_config'     => false,
        'allowed_revision_config_files' => [ 'revision.yml', 'revision.yaml', 'config.yml', 'config.yaml' ],

        'default_document'    => 'index',
        'document_extensions' => [ 'md', 'markdown' ],
    ],

    'revisions' => [],

    'documents' => [
        'title'       => null,
        'subtitle'    => null,
        'description' => null,
    ],
];
