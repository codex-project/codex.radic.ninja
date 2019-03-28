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

//    'layout' => [
//        'header' => [
//            'menu' => [
//                [
//                    'label' => 'Projects',
//                    'projects' => true,
//                    'type' => 'side-menu',
//                    'side' => 'right'
//                ],
//                [
//                    'label' => 'Revisions',
//                    'revisions' => true,
//                    'type' => 'side-menu',
//                    'side' => 'right'
//                ]
//            ]
//        ]
//    ],
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

    'git'       => [
        'enabled'    => true,
        'connection' => 'bitbucket_password',
        'owner'      => 'codex-project',
        'repository' => 'graph',
        'branches'   => [], //[ 'master']
        'paths'      => [
            'docs' => 'develop/resources/docs/codex',
        ],
    ],
    'git_links' => [
        'enabled' => true,
        'map'     => [
            'edit_page' => 'layout.toolbar.right', // push attribute to array (default)
        ],
        'links'   => [
            'edit_page' => [
                'component'  => 'c-button',
                'borderless' => true,
                'type'       => 'toolbar',
                'icon'       => function ($model) {
                    /** @var \Codex\Contracts\Projects\Project|\Codex\Contracts\Revisions\Revision|\Codex\Contracts\Documents\Document $model */
                    $git        = $model->git();
                    $connection = data_get($git->getManager()->getConnectionConfig($git->getConnection()), 'driver');
                    if ($connection === 'bitbucket' || $connection === 'github') {
                        return $connection;
                    }
                    return 'git';
                },
                'children'   => 'Edit Page',
                'title'      => 'Edit this page',
                'target'     => '_black',
                'href'       => function ($model) {
                    /** @var \Codex\Contracts\Projects\Project|\Codex\Contracts\Revisions\Revision|\Codex\Contracts\Documents\Document $model */
                    $git = $model->git();
                    if ($model instanceof \Codex\Contracts\Documents\Document === false) {
                        return $git->getUrl();
                    }
                    return $git->getDocumentUrl($model->getPath()) . '?mode=edit&spa=0&at=develop&fileviewer=file-view-default';
                },
            ],
        ],
    ],
];
