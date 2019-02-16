<?php
/**
 * Copyright (c) 2018. Codex Project
 *
 * The license can be found in the package and online at https://codex-project.mit-license.org.
 *
 * @copyright 2018 Codex Project
 * @author    Robin Radic
 * @license   https://codex-project.mit-license.org MIT License
 */
return [
    'display_name' => 'Blade Extensions Github',
    'description'  => 'Usefull Laravel 5 Blade Directives',
    'meta'         => [
        'icon'     => 'fa-cubes',
        'color'    => 'cyan-10',
        'author'   => 'Robin Radic',
        'license'  => 'MIT',
        'websites' => [
            'vcs'     => 'https://github.com/robinradic/blade-extensions',
            'issues'  => 'https://github.com/robinradic/blade-extensions/issues',
            'package' => 'https://packagist.com/radic/blade-extensions',
        ],
    ],

    'processors' => [
        'enabled' => [ 'attributes', 'parser', 'toc', 'header', 'macros',  'buttons', 'links' ],
        'toc'     => [
            'header_link_show' => true,
        ],
    ],

    'phpdoc' => [
        'enabled'       => true,
        'default_class' => 'Radic\\\BladeExtensions\\\BladeExtensionsServiceProvider',
    ],


    'git' => [
        'enabled'    => true, // disabled for testing with other files,
        'owner'      => 'robinradic',
        'repository' => 'blade-extensions',
        'connection' => 'github_token',
        'branches'   => [ 'master', 'develop' ],
        'versions'   => '>= 4.0.0',
        'skip'       => [
            'patch_versions' => true,
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
];
