<?php

return [
    'controllers'        => [
        'invokables' => [
            'Common'    => 'Wepo\Controller\CommonController',
            'Help'      => 'Wepo\Controller\HelpController',
            'Setup'     => 'Wepo\Controller\SetupController',
            'Error'     => 'Wepo\Controller\ErrorController',
            'Api'       => 'Wepo\Controller\ApiController',
            'ApiModel'  => 'Wepo\Controller\Api\ModelController',
            'ApiField'  => 'Wepo\Controller\Api\FieldController',
            'ApiSearch' => 'Wepo\Controller\Api\SearchController',
            'ApiData'   => 'Wepo\Controller\Api\DataController',
            'ApiQuery'  => 'Wepo\Controller\Api\QueryController',
            'ApiTrigger'  => 'Wepo\Controller\Api\TriggerController',
            'ApiListData'  => 'Wepo\Controller\Api\ListDataController',
            'Test'      => 'Wepo\Controller\TestController',
            'Search'    => 'Wepo\Controller\SearchController',
            'Console'   => 'Wepo\Controller\ConsoleController',
            'Link'      => 'Wepo\Controller\LinkController',
            'Model'     => 'Wepo\Controller\ModelController',
            'Robot'     => 'Wepo\Controller\RoboController',
            'Import'    => 'Wepo\Controller\ImportController',
        ],
    ],
    'view_manager'       => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => [
//            'layout/layout' => __DIR__ . '/../themes/view/layout/layout.phtml',
//            'error/404'     => __DIR__ . '/../themes/view/error/404.phtml',
//            'error/index'   => __DIR__ . '/../themes/view/error/index.phtml',
        ],
        'template_path_stack'      => [
            'wepo'    => __DIR__ . '/../themes/view',
            'partial' => __DIR__ . '/../themes/view/wepo',
            'pdf'     => __DIR__ . '/../templates',
            'email'   => __DIR__ . '/../templates',

            //            'css'     => __DIR__ . '/../../../public',
        ],
        'strategies'               => [
            'ViewJsonStrategy',
        ],
        //        'DefaultRenderingStrategy'=>'ViewPdfStrategyFactory'
        //        'strategies'=>['ViewPdfStrategyFactory'],
    ],
    // The following section is new and should be added to your file
    'router'             => [
        'routes' => [
            'home'        => [
                'type'    => 'literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => 'Common',
                        'action'     => 'index',
                        'data'       => 'home',
                    ],
                ],
            ],
            'common'      => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/common[/:action][/:data][/:view][/:id][/p/:page][/sort/:sort][/s/:desc][/q/:q][/to/:to][/re/:re][/type/:type][/index.html]',
                    'constraints' => [
                        'action' => 'index|setup|field',
                        //                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'data'   => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'view'   => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9a-fA-F]*',
                        'page'   => '[0-9]*',
                        'sort'   => '[0-9a-zA-Z_]*',
                        'desc'   => '1|0',
                        'q'      => '[@.a-zA-Z0-9_\-+%]*',
                        //'type'   => 'order|order1|recipe',
                    ],
                    'defaults'    => [
                        'controller' => 'Common',
                        'action'     => 'index',
                        'page'       => 1,
                    ],
                ],
            ],
            'pdf'         => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/pdf[/:data][/:view][/:id][/p/:page][/sort/:sort][/s/:desc][/q/:q][/to/:to][/re/:re][/index.html]',
                    'constraints' => [
                        'action' => 'index',
                        //                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'data'   => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'view'   => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9a-fA-F]*',
                        'page'   => '[0-9]*',
                        'sort'   => '[0-9a-zA-Z_]*',
                        'desc'   => '1|0',
                        'q'      => '[@.a-zA-Z0-9_\-+%]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Common',
                        'action'     => 'pdf',
                        'page'       => 1,
                    ],
                ],
            ],
            'model'       => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/model[/db/:db][/:action][/from/:from][/to/:to][/:id][/index.html]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9a-fA-F]*',
                        'db'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Model',
                        'action'     => 'index',
                        'db'         => null,
                    ],
                ],
            ],
            'import'      => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/import[/:action][/index.html]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Import',
                        'action'     => 'index',
                    ],
                ],
            ],
            'help'        => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/help[/:action][/]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Help',
                        'action'     => 'index',
                    ],
                ],
            ],
            'error'       => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/error[/:action][/]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Error',
                        'action'     => 'index',
                    ],
                ],
            ],
            'setup'       => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/setup[/:action][/:package][/:table][/p/:page][/]',
                    'constraints' => [
                        'action'  => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'package' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'      => '[0-9a-fA-F]*',
                        'table'   => '[a-zA-Z0-9]*',
                        'page'    => '[0-9]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Setup',
                        'action'     => 'index',
                        'page'       => 1,
                    ],
                ],
            ],
            'mailchain'   => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/mailchain[/:action][/:id][/contact_id/:contact_id][/p/:page][/sort/:sort][/s/:desc][/box/:box][/q/:q][/index.html]',
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'         => '[0-9a-fA-F]*',
                        'contact_id' => '[0-9a-fA-F]*',
                        'page'       => '[0-9]*',
                        'sort'       => '[0-9a-zA-Z_]*',
                        'desc'       => '1|0',
                        'box'        => 'in|out',
                        'q'          => '[@.a-zA-Z0-9_\-+%]*',
                    ],
                    'defaults'    => [
                        'controller' => 'MailChain',
                        'action'     => 'index',
                        'page'       => 1,
                    ],
                ],
            ],
            'mailsetting' => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/mailsetting[/:action][/:id][/p/:page][/sort/:sort][/s/:desc][/box/:box][/index.html]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9a-fA-F]*',
                        'page'   => '[0-9]*',
                        'sort'   => '[0-9a-zA-Z_]*',
                        'desc'   => '1|0',
                        'box'    => 'in|out',
                    ],
                    'defaults'    => [
                        'controller' => 'MailSetting',
                        'action'     => 'index',
                        'page'       => 1,
                    ],
                ],
            ],
            'mailscript'  => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/mailscript[/:action][/:id][/p/:page][/sort/:sort][/s/:desc][/index.html]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9a-fA-F]*',
                        'page'   => '[0-9]*',
                        'sort'   => '[0-9a-zA-Z_]*',
                        'desc'   => '1|0',
                    ],
                    'defaults'    => [
                        'controller' => 'MailScript',
                        'action'     => 'index',
                        'page'       => 1,
                    ],
                ],
            ],
            'test'        => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/test[/:action]',
                    'constraints' => [
                        'scope'  => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        //                        'id'     => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'Test',
                        'action'     => 'index',
                        'scope'      => 'lead',
                    ],
                ],
            ],
            'api'         => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/api/v1/search[/:scope]',
                    'constraints' => [
                        'scope' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        //                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        //                        'id'     => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'Api',
                        'action'     => 'index',
                        'scope'      => 'all',
                    ],
                ],
            ],
            'apimodel'    => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/api/v2/model/[:id]',
                    'constraints' => [
                        'id' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ],
                    'defaults'    => [
                        'controller' => 'ApiModel',
                        'scope'      => null,
                    ],
                ],
            ],
            'apifield'    => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/api/v2/field[/:scope][/:id]',
                    'constraints' => [
                        'scope' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id'    => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ],
                    'defaults'    => [
                        'controller' => 'ApiField',
                        'scope'      => null,
                    ],
                ],
            ],
            'apisearch'   => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/api/v2/search[/:scope]',
                    'constraints' => [
                        'scope' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        //                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        //                        'id'     => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'ApiSearch',
                        'action'     => 'index',
                        'scope'      => 'all',
                    ],
                ],
            ],
            'apidata'     => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/api/v2/data/[:scope][/:id]',
                    'constraints' => [
                        'scope' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id'    => '[0-9a-fA-F]+',
                    ],
                    'defaults'    => [
                        'controller' => 'ApiData',
                        'scope'      => null,
                    ],
                ],
            ],
            'apiquery'    => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/api/v2/query/[:scope][/:id]',
                    'constraints' => [
                        'scope' => '[a-zA-Z][a-zA-Z0-9_-]*.[a-zA-Z0-9_-]*',
                        'id'    => '[0-9a-fA-F]+',
                    ],
                    'defaults'    => [
                        'controller' => 'ApiQuery',
                        'scope'      => 'all',
                    ],
                ],
            ],
            'apitrigger'    => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/api/v2/trigger/[:scope][/:id]',
                    'constraints' => [
                        'scope' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id'    => '[0-9a-fA-F]+',
                    ],
                    'defaults'    => [
                        'controller' => 'ApiTrigger',
                        'scope'      => null,
                    ],
                ],
            ],
            'apilistdata'     => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/api/v2/listdata/[:scope]',
                    'constraints' => [
                        'scope' => '[a-zA-Z][a-zA-Z0-9_-]+',
//                        'id'    => '[0-9a-fA-F]+',
                    ],
                    'defaults'    => [
                        'controller' => 'ApiListData',
                        'scope'      => null,
                    ],
                ],
            ],
            'search'      => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/search[/:action][/q/:q][/index.html]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'model'  => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'q'      => '[@.a-zA-Z0-9_\-+%]*',
                        'page'   => '[0-9]*',
                        'sort'   => '[0-9a-zA-Z_]*',
                        'desc'   => '1|0',
                    ],
                    'defaults'    => [
                        'controller' => 'Search',
                        'action'     => 'index',
                        'model'      => 'all',
                        'page'       => 1,
                        'q'          => '',
                    ],
                ],
            ],
            'link'        => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/link/:type/:company/:file',
                    'constraints' => [
                        'company' => '[0-9a-zA-Z]*',
                        'file'    => '[0-9a-zA-Z\/\.\(\)\-%_]*',
                        'type'    => '[a-zA-Z]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Link',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'console'            => [
        'router' => [
            'routes' => [
                'importdb'   => [
                    //                    'type' => 'simple',
                    'options' => [
                        'route'    => 'importdb <db> <login> <model> <purpose> [<logic_type>]',
                        'defaults' => [
                            'controller' => 'Model',
                            'action'     => 'convert',
                        ]
                    ]
                ],
                'importhack' => [
                    'options' => [
                        'route'    => 'importhack <db> <login> <model> <hackaction>',
                        'defaults' => [
                            'controller' => 'Model',
                            'action'     => 'hacks',
                        ]
                    ]
                ],
                'authomatic' => [
                    'options' => [
                        'route'    => 'robo <login> <model> <purpose> [<logic_type>]',
                        'defaults' => [
                            'controller' => 'Robot',
                            'action'     => 'console',
                        ],
                    ],
                ],
            ],
        ],
    ],
    // All navigation-related configuration is collected in the 'navigation' key
    'navigation'         => [
        // The DefaultNavigationFactory we configured in (1) uses 'default' as the sitemap key
        'default' => [
            // And finally, here is where we define our page hierarchy
            'logout'     => [
                'id'       => 'logout',
                'label'    => 'Sign Out',
                'route'    => 'common',
                'action'   => 'index',
                'params'   => ['data' => 'signout'],
                'resource' => 'signout',
                'class'    => 'exit',
            ],
            'create'     => [
                //'id' => 'home',
                'value'    => '+',
                'id'       => 'create',
                'label'    => 'Create',
                'route'    => 'home',
                'class'    => 'create_submenu create',
                'resource' => 'dashboard',
                'pages'    => [
                    [
                        'label'  => 'New Email',
                        'route'  => 'common',
                        'params' => ['data' => 'mail', 'view' => 'send'],
                        'class'  => 'mail',
                    ],
                    [
                        'label'    => 'New Lead',
                        'route'    => 'common',
                        'params'   => ['data' => 'lead', 'view' => 'insert'],
                        'class'    => 'lead',
                        'resource' => 'lead',
                    ],
                    [
                        'label'    => 'New Patient',
                        'route'    => 'common',
                        'params'   => ['data' => 'patient', 'view' => 'insert'],
                        'class'    => 'patient',
                        'resource' => 'patient',
                    ],
                    [
                        'label'    => 'New Account',
                        'route'    => 'common',
                        'params'   => ['data' => 'account', 'view' => 'insert'],
                        'class'    => 'account',
                        'resource' => 'account',
                    ],
                    // [
                    //     'label'  => 'New Doctor',
                    //     'route'  => 'common',
                    //     'params' => ['data' => 'doctor', 'view' => 'insert'],
                    //     'class'  => 'doctor'
                    // ],
                    [
                        'label'  => 'New Document',
                        'route'  => 'common',
                        'params' => ['data' => 'document', 'view' => 'insert'],
                        'class'  => 'document'
                    ],
                    //                    [
                    //                        'label'  => 'New Product',
                    //                        'route'  => 'common',
                    //                        'params' => ['data' => 'product', 'view' => 'insert'],
                    //                        'class'  => 'product',
                    //                        'resource'  => 'product',
                    //                    ],
                    //                    [
                    //                        'label'  => 'New Pricebook',
                    //                        'route'  => 'common',
                    //                        'params' => ['data' => 'pricebook', 'view' => 'insert'],
                    //                        'class'  => 'pricebook'
                    //                    ],
                    //                    [
                    //                        'label'  => 'New Event to lead',
                    //                        'route'  => 'common',
                    //                        'params' => ['data' => 'eventlead', 'view' => 'insert'],
                    //                        'class'  => 'event'
                    //                    ],
                    //                    [
                    //                        'label'  => 'New Call to lead',
                    //                        'route'  => 'common',
                    //                        'params' => ['data' => 'calllead', 'view' => 'insert'],
                    //                        'class'  => 'call'
                    //                    ],
                    //                    [
                    //                        'label'  => 'New Task to lead',
                    //                        'route'  => 'common',
                    //                        'params' => ['data' => 'tasklead', 'view' => 'insert'],
                    //                        'class'  => 'task'
                    //                    ],
                    //                    [
                    //                        'label'  => 'New Event to patient',
                    //                        'route'  => 'common',
                    //                        'params' => [
                    //                            'data' => 'eventpatient',
                    //                            'view' => 'insert',
                    //                        ],
                    //                        'class'  => 'event'
                    //                    ],
                    //                    [
                    //                        'label'  => 'New Call to patient',
                    //                        'route'  => 'common',
                    //                        'params' => [
                    //                            'data' => 'callpatient',
                    //                            'view' => 'insert',
                    //                        ],
                    //                        'class'  => 'call'
                    //                    ],
                    //                    [
                    //                        'label'  => 'New Task to patient',
                    //                        'route'  => 'common',
                    //                        'params' => [
                    //                            'data' => 'taskpatient',
                    //                            'view' => 'insert',
                    //                        ],
                    //                        'class'  => 'task'
                    //                    ],
                    [
                        'label'    => 'New Quote',
                        'route'    => 'common',
                        'params'   => ['data' => 'quote', 'view' => 'insert'],
                        'class'    => 'quote',
                        'resource' => 'quote',
                    ],
                    [
                        'label'    => 'New Sales Order',
                        'route'    => 'common',
                        'params'   => ['data' => 'order', 'view' => 'insert'],
                        'class'    => 'order',
                        'resource' => 'order',
                    ],
                    //                    [
                    //                        'label'  => 'New Payment',
                    //                        'route'  => 'common',
                    //                        'params' => ['data' => 'payment', 'view' => 'insert'],
                    //                        'class'  => 'payment'
                    //                    ],
                ],
            ],
            'home'       => [
                'value'    => 'home',
                'id'       => 'home',
                'label'    => 'Dashboard',
                'route'    => 'common',
                'params'   => ['data' => 'dashboard'],
                'resource' => 'dashboard',
                'class'    => 'dashboard',
            ],
            'mail'       => [
                'id'       => 'mail',
                'label'    => 'Emails',
                'route'    => 'common',
                'params'   => ['data' => 'mail'],
                'resource' => 'mail',
                'class'    => 'mail',
            ],
            'leads'      => [
                'id'       => 'leads',
                'label'    => 'Leads',
                'route'    => 'common',
                'params'   => ['data' => 'lead'],
                'resource' => 'lead',
                'class'    => 'lead',
            ],
            'patients'   => [
                'id'       => 'patients',
                'route'    => 'common',
                'params'   => ['data' => 'patient'],
                'label'    => 'Patients',
                'resource' => 'patient',
                'class'    => 'patient',
            ],
            'accounts'   => [
                'id'       => 'account',
                'label'    => 'Accounts',
                'route'    => 'common',
                'params'   => ['data' => 'account'],
                'resource' => 'account',
                'class'    => 'account',
            ],
            //            'doctor'     => [
            //                'id'       => 'doctor',
            //                'label'    => 'Doctors',
            //                'route'    => 'common',
            //                'params'   => ['data' => 'doctor'],
            //                'resource' => 'doctor',
            //                'class'    => 'doctor',
            //            ],
            'documents'  => [
                'label'    => 'Documents',
                'route'    => 'common',
                'params'   => ['data' => 'document'],
                'resource' => 'document',
                'class'    => 'document',
            ],
            'products'   => [
                'id'       => 'products',
                'label'    => 'Products',
                'route'    => 'common',
                'params'   => ['data' => 'product'],
                'resource' => 'product',
                'class'    => 'product',
            ],
            'pricebooks' => [
                'label'    => 'Pricebooks',
                'id'       => 'pricebook',
                'route'    => 'common',
                'params'   => ['data' => 'pricebook'],
                'resource' => 'pricebook',
                'class'    => 'pricebook',
                'pages'    => [
                    [
                        'label'  => 'Detail',
                        'route'  => 'common',
                        'params' => ['data' => 'pricebookdetail'],
                    ],
                ],
            ],
            'activities' => [
                'id'       => 'activities',
                'label'    => 'Activities',
                'route'    => 'common',
                'params'   => ['data' => 'activity'],
                'resource' => 'activity',
                'class'    => 'activity create_submenu',
                'pages'    => [
                    [
                        'label'    => 'All Activities',
                        'route'    => 'common',
                        'params'   => ['data' => 'activity'],
                        'class'    => 'activity',
                        'resource' => 'activity',
                    ],
                    [
                        'label'    => 'Calls to lead',
                        'route'    => 'common',
                        'params'   => ['data' => 'calllead'],
                        'class'    => 'call',
                        'resource' => 'activity',
                    ],
                    [
                        'label'    => 'Calls to patient',
                        'route'    => 'common',
                        'params'   => ['data' => 'callpatient'],
                        'class'    => 'call',
                        'resource' => 'activity',
                    ],
                    [
                        'label'    => 'Tasks to lead',
                        'route'    => 'common',
                        'params'   => ['data' => 'tasklead'],
                        'class'    => 'task',
                        'resource' => 'activity',
                    ],
                    [
                        'label'    => 'Tasks to patient',
                        'route'    => 'common',
                        'params'   => ['data' => 'taskpatient'],
                        'class'    => 'task',
                        'resource' => 'activity',
                    ],
                    [
                        'label'    => 'Events to lead',
                        'route'    => 'common',
                        'params'   => ['data' => 'eventlead'],
                        'class'    => 'event',
                        'resource' => 'activity',
                    ],
                    [
                        'label'    => 'Events to patient',
                        'route'    => 'common',
                        'params'   => ['data' => 'eventpatient'],
                        'class'    => 'event',
                        'resource' => 'activity',
                    ],
                ],
            ],
            'quotes'     => [
                'id'       => 'quotes',
                'label'    => 'Quotes',
                'route'    => 'common',
                'params'   => ['data' => 'quote'],
                'resource' => 'quote',
                'class'    => 'quote',
                'pages'    => [
                    [
                        'label'  => 'Detail',
                        'route'  => 'common',
                        'params' => ['data' => 'quotedetail'],
                    ],
                ],
            ],
            'orders'     => [
                'id'       => 'orders',
                'label'    => 'Sales Orders',
                'route'    => 'common',
                'params'   => ['data' => 'order'],
                'resource' => 'order',
                'class'    => 'order',
                'pages'    => [
                    [
                        'label'  => 'Detail',
                        'route'  => 'common',
                        'params' => ['data' => 'orderdetail'],
                    ],
                ],
            ],
            'invoices'   => [
                'id'       => 'invoices',
                'label'    => 'Invoices',
                'route'    => 'common',
                'params'   => ['data' => 'invoice'],
                'resource' => 'invoice',
                'class'    => 'invoice',
            ],
            //            'payment'    => [
            //                'id'       => 'payment',
            //                'label'    => 'Payments',
            //                'route'    => 'common',
            //                'params'   => ['data' => 'payment'],
            //                'resource' => 'payment',
            //                'class'    => 'payment',
            //            ],
            'signin'     => [
                'id'       => 'signin',
                'label'    => 'Sign In',
                'route'    => 'common',
                'action'   => 'index',
                'params'   => ['data' => 'signin'],
                'resource' => 'signin',
                'class'    => 'signin',
            ],
            'signup'     => [
                'id'       => 'signup',
                'label'    => 'Sign Up',
                'route'    => 'common',
                'action'   => 'index',
                'params'   => ['data' => 'signup'],
                'resource' => 'signup',
                'class'    => 'signup',
            ],

        ],
    ],
    'navigation_helpers' => [
        'invokables' => [
            'mymenu' => '\Wepo\View\Helper\Menu',
        ],
    ],
    'view_helpers'       => [
        // 'WepoLink' => '\Wepo\View\Helper\WepoLink',
        // 'invokables' => [ 's3Link' => '\Aws\View\Helper\s3Link' ],
        'factories' => [
            'WepoLink' => function ($serviceManager) {
                return new \Wepo\View\Helper\WepoLink($serviceManager->getServiceLocator()
                    ->get('ModelFramework\FilesystemService'));
            },
        ],

    ],
    'zfctwig'            => [
        'extensions'          => [
            'zfc_arrayHelper' => 'TwigExt\Twig\Extension\ArrayHelperExtension',
            'Twig_Extension_Debug',
            //            'zfctwig'         => 'ZfcTwigExtension',
        ],
        'environment_options' => ['debug' => true],
    ],
];
