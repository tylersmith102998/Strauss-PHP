<?php 

return [
    'Strauss' => [
        'Core' => [


            'logging' => true,
            'Logger' => [
                'type' => 'file', // file or db
                'DB' => [
                    'host' => 'hostname',
                    'username' => 'username',
                    'password' => 'password',
                    'db_name' => 'dbname'
                ],
                'File' => [
                    'name' => 'debug.log'
                ]
            ]


        ]
    ]
];