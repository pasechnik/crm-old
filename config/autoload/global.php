<?php

return [
    'mongozend_db'    => [
        'adapters' => [
            'wepo_company' => [
                'driver'         => 'Mongo',
                'gateway'        => 'MongoLite',
                'dsn'            => 'mongodb://127.0.0.1:27017',
                'dbname'         => 'wepo_company',
                'driver_options' => ['connect' => true],
            ],
            'wepo_zoho'    => [
                'driver'         => 'Mongo',
                'gateway'        => 'MongoLite',
                'dsn'            => 'mongodb://127.0.0.1:27017',
                'dbname'         => 'zoho_csv',
                'driver_options' => ['connect' => true],
            ],
            'wepo_main'    => [
                'driver'         => 'Mongo',
                'gateway'        => 'MongoLite',
                'dsn'            => 'mongodb://127.0.0.1:27017',
                'dbname'         => 'wepo_main',
                'driver_options' => ['connect' => true],
            ],
            //            'wepo_company'       => [
            //                'driver'         => 'Pdo',
            //                'dsn'            => 'mysql:dbname=111wepo;host=localhost',
            //                'driver_options' => [
            //                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
            //                ]
            //            ],
            //            'wepo_company'       => [
            //                'driver'         => 'Mongo',
            //                'gateway'        => 'MongoLite',
            //                'dsn'            => 'mongodb://localhost:27017',
            //                'dbname'         => 'wepo_company_1',
            //                'driver_options' => [
            //                    'connect' => true
            //                ]
            //            ],
            //            'wepo_company_mongo' => [
            //                'driver'         => 'Mongo',
            //                'gateway'        => 'MongoLite',
            //                'dsn'            => 'mongodb://localhost:27017',
            //                'dbname'         => 'wepo_company_1',
            //                'driver_options' => [
            //                    'connect' => true
            //                ]
            //            ],
            //            'wepo_main'          => [
            //                'driver'         => 'Pdo',
            //                'dsn'            => 'mysql:dbname=wepo_main;host=localhost',
            //                'driver_options' => [
            //                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
            //                ]
            //            ]
        ]
    ],
    'service_manager' => [
        'abstract_factories' => [],
        'factories'          => [
            'Navigation'                 => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'BsbFlysystemAdapterManager' => 'ModelFramework\FilesystemService\Factory\AdapterManagerFactory',
        ]
    ],
    'session'         => [
        'config'       => [
            'class'   => 'Zend\Session\Config\SessionConfig',
            'options' => [
                'name'                => 'wepo',
                'remember_me_seconds' => 2419200,
                'use_cookies'         => true,
                'cookie_httponly'     => true,
                'cookie_lifetime'     => 2419200,
            ],
        ],
        'storage'      => 'Zend\Session\Storage\SessionArrayStorage',
        'save_handler' => 'ModelFramework\Session\SaveHandler\MongoGateway',
    ],
    'bsb_flysystem'   => [
        'adapter_manager' => [
            'config' => [
                'factories' => [
                    'wepo'  => 'ModelFramework\FilesystemService\Adapter\Factory\WepoAdapterFactory',
                    'pydio' => 'ModelFramework\FilesystemService\Adapter\Factory\PydioAdapterFactory',
                ],
            ],
        ],
//        'adapters'        => [
//            'local_files' => [
//                'type'    => 'local',
//                'options' => [
//                    'root' => './fs_local'
//                ],
//            ],
//
//            'pydio'       => [
//                'type'    => 'pydio',
//                'options' => [
//                    'login'     => 'crmlogin',
//                    'pass'      => 'N47Sq6',
//                    'api_url'   => 'https://fs.wepo.linux/api/',
//                    'workspace' => 'wepo',
//                ],
//            ],
//        ],
//        'filesystems'     => [
//            'default' => [
//                'adapter' => 'pydio',
////                'adapter' => 'local_files',
//            ],
//        ],
    ],


];
