<?php


return [
    'display_name' => 'Codex',
    'description'  => 'Codex is a file-based documentation system build with Laravel 5.5',
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

    'processors'   => [
        'enabled'    => [
            'attributes' => true,
            'parser'     => true,
            'toc'        => true,
            'header'     => true,
            'macros'     => true,
            'links'      => true,
            'phpdoc'     => true,
            'cache'      => true,
            'buttons'    => true,
            'comments'   => false,
        ],
        'comments'   => [
            'connection' => 'disqus',
        ],
        'attributes' => [
            'tags' => [
                [ 'open' => '<!--*', 'close' => '--*>' ], // html, markdown
                [ 'open' => '<!---', 'close' => '-->' ], // html, markdown
                [ 'open' => '---', 'close' => '---' ], // markdown (frontmatter)
                [ 'open' => '\*', 'close' => '*/' ], // codex v1 style
            ],
        ],
        'toc'        => [
            'header_link_show' => true,
        ],
        'buttons'    => [
            'buttons' => [
                [
                    'label'  => 'Test',
                    'icon'   => 'github',
                    'target' => '_blank',
                    'href'   => 'https://github.com',
                ],
            ],
        ],
    ],

    'default_revision' => \Codex\Git\BranchType::PRODUCTION,

    'layout' => [
        'toolbar' => [
            'right' => [
                [
                    'component'  => 'c-button',
                    'borderless' => true,
                    'type'       => 'toolbar',
                    'icon'       => 'star',
                    'children'   => 'Packagist',
                    'target'     => '_black',
                    'title'      => 'Go to packagist package page',
                    'href'       => 'https://packagist.org/packages/codex/codex',
                ],
            ],
        ],
    ],

    'phpdoc' => [
        'enabled'       => true,
        'default_class' => 'Codex\\Codex',
    ],

    'git' => [
        'enabled' => true,

        'remotes' => [
            'core' => [
                // The connection key to use (as defined at the top of this file)
                'connection' => 'github_token',
                // The owner (organisation or username)
                'owner'      => 'codex-project',
                // The repository name
                'repository' => 'core',
                // repository url
                'url'        => 'https://github.com/%s/%s',

                'document_url' => 'https://github.com/%s/%s/tree/%s',

                'webhook' => [
                    // Enable webhook support. Configure it in Github/Bitbucket.
                    // This will automaticly sync your project every time a 'push' event occurs
                    // This also requires you to configure queues properly (by using for example, redis with supervisord)
                    'enabled' => true,

                    // Github webhooks allow a 'secret' that has to match. Put it in here
                    'secret'  => null,
                ],
            ],
        ],
        'syncs'   => [
            [
                'remote'   => 'core',
                // Branches to sync
                'branches' => [ 'master' ],
                // Version (tags) constraints makes one able to define ranges and whatnot
                // * || 1.x || >=2.5.0 || 5.0.0 - 7.2.3'
                'versions' => null,

                'skip' => [
                    'patch_versions' => false,
                    'minor_versions' => false,
                ],

                'clean' => true,

                'copy' => [
                    'resources/docs',
                    'resources/docs/revision.yml' => 'revision.yml',
                    'resources/docs/index.md'     => 'index.md',
                ],
            ],
        ],
        'links'   => [
            'enabled' => true,
            'remote'  => '%revision.key%',
        ],
    ],
];
