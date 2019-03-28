<?php
/**
 * Part of the Codex Project packages.
 *
 * License and copyright information bundled with this package in the LICENSE file.
 *
 * @author Robin Radic
 * @copyright Copyright 2017 (c) Codex Project
 * @license http://codex-project.ninja/license The MIT License
 */
return [
    'display_name' => 'Test Project',

    'disk' => 'test-zip-project',

    'description' => 'This is a testing project',

    'processors' => [
        'enabled'    => [

            'attributes' => true,
            'parser'     => true,
            'toc'        => true,
            'header'     => true,
            'macros'     => true,
            'links'      => true,
            'phpdoc'     => true,
            ],
        'attributes' => [
            'tags' => [
                [ 'open' => '<!--*', 'close' => '--*>' ], // html, markdown
                [ 'open' => '---', 'close' => '---' ], // markdown (frontmatter)
                [ 'open' => '\/\*', 'close' => '\*\/' ], // codex v1 style
            ],
        ],
        'toc'        => [
            'header_link_show' => true,
        ]
    ]
];
