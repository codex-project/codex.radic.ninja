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

    'phpdoc' => [
        'enabled'       => true,
        'default_class' => 'Codex\\Codex',
    ],

];
