<?php



return [
    'display_name' => 'General Documentation',

    'description' => 'General documentation for personal reference covering a wide array of subjects',

    'processors' => [
        'enabled'    => [
            'attributes' => true,
            'parser'     => true,
            'toc'        => true,
            'header'     => true,
            'macros'     => true,
            'links'      => true,
            'phpdoc'     => true,
            ]
    ],

];
