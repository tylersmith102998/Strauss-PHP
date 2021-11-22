<?php 

return [
    'Strauss' => [
        'Core' => [


            'Logger' => [
                'type' => 'file', // file or db
                'level' => 'debug',
                'DB' => [
                    'host' => 'hostname',
                    'username' => 'username',
                    'password' => 'password',
                    'db_name' => 'dbname'
                ],
                'File' => [
                    'name' => ROOT . 'debug.log'
                ]
            ]


        ]
    ],

    'DB' => [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'tylerboo22',
        'db' => 'Strauss',
        'charset' => 'utf8mb4'
    ]
];