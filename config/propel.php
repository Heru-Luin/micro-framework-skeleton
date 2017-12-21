<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'micro_framework' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=micro_framework',
                    'user'       => 'root',
                    'password'   => 'root',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'micro_framework',
            'connections' => ['micro_framework']
        ],
        'generator' => [
            'defaultConnection' => 'micro_framework',
            'connections' => ['micro_framework']
        ]
    ]
];
