<?php

return [
    'header' => [
        'color'           => 'blue-grey-9',
        'show'            => true,
        'static'          => true,
        'class'           => [ 'c-header' => true ],
        'style'           => [],
        'menu'            => [
            [
                'label'    => 'Documentation',
                'sublabel' => 'Go back',
                'icon'     => 'left-circle',
                'type'     => 'router-link',
                'to'       => [
                    'name'   => 'documentation.document',
                    'params' => [
                        'project'  => '<%= store.project.key %>',
                        'revision' => '<%= store.revision.key %>',
                        'document' => '<%= store.revision.default_document %>',
                    ],
                ],
            ],
        ],
        'title'           => config('codex.display_name', config('app.name')),
        'revealOnScroll'  => true,
        'showTitle'       => true,
        'showLeftToggle'  => false,
        'showRightToggle' => false,
    ],
    'left'   => [
        'show'         => false,
        'static'       => false,
        'belowHeader' => true,
        'aboveFooter'  => true,
        'class'        => [ 'c-left' => true ],
        'style'        => [],
        'menu'         => [],
    ],
    'right'  => [
        'belowHeader' => true,
        'aboveFooter' => true,
        'class'       => [ 'c-right' => true ], //
        'show'        => false, //
        'static'      => true, //
        'style'       => [], //
        'menu'        => [], //
    ],
    'page'   => [
        'class' => [ 'c-page' => true ],
        'style' => [],
    ],
    'footer' => [
        'color'  => 'blue-grey-9',
        'class'  => [ 'c-footer' => true ],
        'show'   => true,
        'static' => false,
        'style'  => [],
        'menu'   => [],
    ],

];
