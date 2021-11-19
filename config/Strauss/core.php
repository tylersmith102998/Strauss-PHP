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
    ]
];