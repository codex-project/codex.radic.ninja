<?php


return [
    'display_name' => 'Blade Extensions',
    'description'  => 'Directives and extra functionality for Laravel\'s Blade engine',
    'meta'         => [
        'icon'     => 'fa-book',
        'color'    => 'deep-orange',
        'author'   => 'Robin Radic',
        'license'  => 'MIT',
        'websites' => [
            'vcs'     => 'https://github.com/codex-project',
            'issues'  => 'https://github.com/codex-project/codex/issues',
            'package' => 'https://packagist.com/codex-project/codex',
        ],
    ],

    'processors' => [
        'enabled'    => [ 'attributes', 'parser', 'toc', 'header', 'macros', 'buttons', 'links', 'phpdoc' ],
        'attributes' => [
            'tags' => [
                [ 'open' => '<!--*', 'close' => '--*>' ], // html, markdown
                [ 'open' => '---', 'close' => '---' ], // markdown (frontmatter)
                [ 'open' => '\/\*', 'close' => '\*\/' ], // codex v1 style
            ],
        ],
        'toc'        => [
            'header_link_show' => true,
        ],
    ],

    'git' => [
        'enabled'    => true, /// local symlink
        'owner'      => 'robinradic',
        'repository' => 'blade-extensions',
        'connection' => 'github_password',
        'branches'   => [
            'develop',
        ],
        'versions'   => '>=2.0.0',
        'skip'       => [
            'patch_versions' => false,
            'minor_versions' => false,
        ],
        'paths'      => [
            'docs'  => 'docs',
            'index' => 'docs/index.md',
        ],
        'webhook'    => [
            'enabled' => false,
            'secret'  => env('CODEX_GIT_GITHUB_WEBHOOK_SECRET', ''),
        ],
    ],


    'phpdoc' => [
        'enabled'       => true,
        'default_class' => 'Codex\\Codex',
    ],


];
