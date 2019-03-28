<?php


return [
    'display_name' => 'Auth Test',
    'description'  => 'Auth addon test project',
    'default_revision' => \Codex\Git\BranchType::PRODUCTION,

    'processors' => [
        'enabled'    => [
            'attributes' => true,
            'parser'     => true,
            'toc'        => true,
            'header'     => true,
            'macros'     => true,
            'links'      => true,
            'cache'     => true,
            ]
    ],


    'auth' => [
        'enabled' => true,
        'with' => [
            [
                'service'  => 'github',
                // any or all of these can be used
                'groups'    => [],
                'emails'    => [],
                'usernames' => ['RobinRadic'],
            ],
        ]
    ]

];
