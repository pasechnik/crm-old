<?php

return array(
    'controllers'  => array(
        'invokables' => array(
            'Api\Controller\Api' => 'Api\Controller\IndexController',
        ),
    ),
    // The following section is new and should be added to your file
    'router'       => array(
        'routes' => array(
            'api' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/api/v1[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults'    => array(
                        'controller' => 'Api\Controller\Api',
//                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'api' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
