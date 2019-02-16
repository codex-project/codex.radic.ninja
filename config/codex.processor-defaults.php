<?php
/**
 * Part of the Codex Project packages.
 *
 * License and copyright information bundled with this package in the LICENSE file.
 *
 * @author    Robin Radic
 * @copyright Copyright 2017 (c) Codex Project
 * @license   http://codex-project.ninja/license The MIT License
 */

return [
    'attributes' => [
        'tags' => [
            [ 'open' => '<!--*', 'close' => '--*>' ], // html, markdown
            [ 'open' => '---', 'close' => '---' ], // markdown (frontmatter)
        ],
    ],
    'links'      => [
        'prefix'      => 'codex',// the prefix for actions, ex:  [Click me](#codex:project[my-awesome-project])
        'replace_tag' => false,  // a string like 'div' will replace <a> to <div>. set to false to not replace
        'actions'     => [
            'project'  => \Codex\Documents\Processors\Links\CodexLinks::class . '@project',
            'revision' => \Codex\Documents\Processors\Links\CodexLinks::class . '@revision',
            'document' => \Codex\Documents\Processors\Links\CodexLinks::class . '@document',
        ],
    ],
    'macros'     => [
        'table:responsive' => 'Codex\Documents\Processors\Macros\Table@responsive',
        'layout:row'       => 'Codex\Documents\Processors\Macros\Layout@row',
        'layout:column'    => 'Codex\Documents\Processors\Macros\Layout@column',
        'general:hide'     => 'Codex\Documents\Processors\Macros\General@hide',
        'attribute:print'  => 'Codex\Documents\Processors\Macros\Attribute@printValue',
//        'phpdoc:method:signature' => 'Codex\Addon\Phpdoc\PhpdocMacros@methodSignature',
//        'phpdoc:method'           => 'Codex\Addon\Phpdoc\PhpdocMacros@method',
//        'phpdoc:entity'           => 'Codex\Addon\Phpdoc\PhpdocMacros@entity',
//        'phpdoc:list:method'      => 'Codex\Addon\Phpdoc\PhpdocMacros@listMethod',
//        'phpdoc:list:property'    => 'Codex\Addon\Phpdoc\PhpdocMacros@listProperty',
    ],
    'parser'     => [
        'markdown' => [ // refers to parser name
            'parser'     => 'Codex\Documents\Processors\Parser\MarkdownParser',
            'file_types' => [ 'md', 'markdown' ],
            'options'    => [
                'html5' => true,
                'table' => [
                    'class' => 'table hover',
                ],
                'code'  => [
                    'line_numbers' => true,
                    'command_line' => true,
                    'loader'       => false,
                ],
            ],
        ],
        'rst'      => [], // refers to parser name

    ],
    'toc'        => [
        'disable'          => [ 1 ],
        'regex'            => '/<h(\d)>([\w\W]*?)<\/h\d>/',
        'header_link_show' => false,
        'header_link_text' => '#',
        'minimum_nodes'    => 2,
        'view'             => 'codex::react.processors.toc',//'codex::processors.toc',
        'header_view'      => 'codex::react.processors.toc-header',//'codex::processors.toc-header',
    ],
    'buttons'    => [
        'buttons'                   => [
//            'button-id' => [
//                'text'   => 'Haai',
//                'icon'   => 'fa fa-github',
//                'href'   => 'http://goto.com/this',
//                'target' => '_blank',
//            ],
        ],
        'default_button_attributes' => [
            'color'  => 'secondary',
            'href'   => 'javascript:;',
            'class'  => [],
            'target' => '_blank',
        ],
        'view'                      => 'codex::processors.buttons',

    ],
    'header'     => [
        'view'                 => 'codex::processors.header',
        'remove_from_document' => true,
        'remove_regex'         => '/<h1>(.*?)<\/h1>/',
    ],
];


