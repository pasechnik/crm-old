<?php

namespace Wepo;

use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\ArrayUtils;
use Zend\View\Helper\Navigation\AbstractHelper;

class Module implements ConsoleBannerProviderInterface
{

    public function onBootstrap(MvcEvent $e)
    {
        $this->bootstrapSession($e);
        $this->initAcl($e);

        //  $e->attach(MvcEvent::EVENT_RENDER, array($this, 'initDbSession'), 100); // ������
//        $auth = $e->getApplication()->getServiceManager()->get('ModelFramework\AuthService');
//        $e->getApplication()->getEventManager()->attach('route', array( $auth, 'checkAuth' ));
//        $e->getApplication()->getEventManager()->attach( 'route', array( $this, 'checkAcl' ) );
//        $e->getApplication()->getEventManager()->attach( 'dashboard', array( $auth, 'getRole' ), 100 );
    }

    public function getConfig()
    {
        $config = [];
        $configFiles = [
            include __DIR__ . '/config/module.config.php',
            include __DIR__ . '/config/module.model.config.php',
            include __DIR__ . '/config/module.logic.config.php',
            include __DIR__ . '/config/module.view.config.php',
            include __DIR__ . '/config/module.viewbox.config.php',
            include __DIR__ . '/config/module.widgets.config.php',
            include __DIR__ . '/config/module.field.type.php',
            include __DIR__ . '/config/module.data.mapping.php',
            include __DIR__ . '/config/module.query.config.php',
            include __DIR__ . '/config/module.acl.config.php',
            include __DIR__ . '/config/module.static.data.php',
            include __DIR__ . '/config/module.model.list.php',
        ];
        foreach ($configFiles as $file) {
            $config = ArrayUtils::merge($config, $file);
        }

        return $config;
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/autoload_classmap.php',
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }

    public function initAcl(MvcEvent $e)
    {
        /* @var $auth AuthService */
        $auth = $e->getApplication()->getServiceManager()
            ->get('ModelFramework\AuthService');
        $rules = include_once 'config/module.acl.roles.php';
        $auth->initAcl($rules);

        AbstractHelper::setDefaultAcl($auth->getAcl());
        AbstractHelper::setDefaultRole($auth->getRole());
    }

    public function checkAcl(MvcEvent $e)
    {
        $route = $e->getRouteMatch()->getMatchedRouteName();
        $action = $e->getRouteMatch()->getParam('action');

        $auth = $e->getApplication()->getServiceManager()
            ->get('ModelFramework\AuthService');

        if (!$auth->isGranted($route, $action)) {
            $back_url = null;
            $back_url_title = null;
            if (isset($_SERVER['HTTP_REFERER'])) {
                $back_url = $_SERVER['HTTP_REFERER'];
                $back_url_title = explode('/',
                    str_replace('http://' . $_SERVER['HTTP_HOST'] . '/',
                        '', $back_url))[0];
            }
            $twig = $e->getApplication()->getServiceManager()
                ->get('ZfcTwigRenderer');
            echo $twig->render('wepo/partial/error.twig',
                [
                    'message'    => 'You don\'t have permission to access this page',
                    'tourl'      => $back_url,
                    'tourl_name' => $back_url_title,
                    'seconds'    => 5,
                ]);
            exit();
        }
    }

    public function getViewHelperConfig()
    {
        return [
            'invokables' => [],
            'factories'  => [],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'Mail\MailService'                                => function (
                    $serviceManager
                ) {
                    $service = new \Mail\MailService();
                    $service->setGatewayService($serviceManager->get('ModelFramework\GatewayService'));
                    $service->setModelService($serviceManager->get('ModelFramework\ModelService'));

                    return $service;
                },
                /** ModelFrameWork stuff - start */
                /** choose right version - start */
                'ModelFramework\ModelService'                     => function (
                    $serviceManager
                ) {
                    return $serviceManager->get('ModelFramework\ModelServiceSource');

                    return $serviceManager->get('ModelFramework\ModelServiceProxyCached');
                },
                'ModelFramework\FormService'                      => function (
                    $serviceManager
                ) {
                    return $serviceManager->get('ModelFramework\FormServiceSource');
                },
                'ModelFramework\FormConfigParserService'          => function (
                    $serviceManager
                ) {
                    return $serviceManager->get('ModelFramework\FormConfigParserServiceSource');
                },
                'ModelFramework\QueryService'                     => function (
                    $serviceManager
                ) {
                    return $serviceManager->get('ModelFramework\QueryServiceProxyCached');
                },
                'ModelFramework\ViewBoxService'                   => function (
                    $serviceManager
                ) {
                    return $serviceManager->get('ModelFramework\ViewBoxServiceProxyCached');
                },
                'ModelFramework\ViewService'                      => function (
                    $serviceManager
                ) {
                    return $serviceManager->get('ModelFramework\ViewServiceProxyCached');
                },
                'ModelFramework\GatewayService'                   => function (
                    $serviceManager
                ) {
                    return $serviceManager->get('ModelFramework\GatewayServiceProxyCached');
                },
                /** choose right version - end **/
                /** service definitions - start **/
                /*** Model Service - start ***/
                'ModelFramework\ModelServiceSource'               => function (
                    $serviceManager
                ) {
                    $modelService
                        = new \ModelFramework\ModelService\ModelService();
                    $modelService->setFieldTypesService($serviceManager->get('ModelFramework\FieldTypesService'));
                    $modelService->setConfigService($serviceManager->get('ModelFramework\ConfigService'));

                    return $modelService;
                },
                'ModelFramework\ModelServiceProxyCached'          => function (
                    $serviceManager
                ) {
                    $modelService
                        = $serviceManager->get('ModelFramework\ModelServiceSource');

                    $modelServiceProxyCached
                        = new \ModelFramework\ModelService\ModelServiceProxyCached();
                    $modelServiceProxyCached->setModelService($modelService);

                    $cacheService
                        = $serviceManager->get('ModelFramework\CacheService');
                    $modelServiceProxyCached->setCacheService($cacheService);

                    return $modelServiceProxyCached;
                },
                /*** Model Service - end ***/
                /*** Form Service - start ***/
                'ModelFramework\FormServiceSource'                => function (
                    $serviceManager
                ) {
                    $formService
                        = new \ModelFramework\FormService\FormService();

                    $formService->setAclService($serviceManager->get('ModelFramework\AclService'));
                    $formService->setConfigService(
                        $serviceManager->get('ModelFramework\ConfigService')
                    );
                    $formService->setFieldTypesService(
                        $serviceManager->get('ModelFramework\FieldTypesService')
                    );
                    $formService->setModelService(
                        $serviceManager->get('ModelFramework\ModelService')
                    );
                    $formService->setQueryService(
                        $serviceManager->get('ModelFramework\QueryService')
                    );
                    $formService->setGatewayService($serviceManager->get('ModelFramework\GatewayService'));

                    return $formService;
                },
                'ModelFramework\FormServiceProxyCached'           => function (
                    $serviceManager
                ) {
                    $formService
                        = $serviceManager->get('ModelFramework\FormServiceSource');

                    $formServiceProxyCached
                        = new \ModelFramework\FormService\FormServiceProxyCached();
                    $formServiceProxyCached->setFormService($formService);

                    $cacheService
                        = $serviceManager->get('ModelFramework\CacheService');
                    $formServiceProxyCached->setCacheService($cacheService);

                    return $formServiceProxyCached;
                },
                /*** Form Service - end ***/

                'ModelFramework\ListParamsService'                => function (
                    $serviceManager
                ) {
                    $service = new \ModelFramework\ListParamsService\ListParamsService();
                    $service->setGatewayService($serviceManager->get('ModelFramework\GatewayService'));
                    $service->setConfigService($serviceManager->get('ModelFramework\ConfigService'));

                    return $service;
                },

                /*** View Service - start ***/
                'ModelFramework\ViewServiceSource'                => function (
                    $serviceManager
                ) {
                    $service = new \ModelFramework\ViewService\ViewService();
                    $service->setConfigService($serviceManager->get('ModelFramework\ConfigService'));
                    $service->setModelService($serviceManager->get('ModelFramework\ModelService'));
                    $service->setFormService($serviceManager->get('ModelFramework\FormService'));
                    $service->setGatewayService($serviceManager->get('ModelFramework\GatewayService'));
                    $service->setAclService($serviceManager->get('ModelFramework\AclService'));
                    $service->setAuthService($serviceManager->get('ModelFramework\AuthService'));
                    $service->setLogicService($serviceManager->get('ModelFramework\LogicService'));
                    $service->setQueryService($serviceManager->get('ModelFramework\QueryService'));
                    $service->setFileService($serviceManager->get('ModelFramework\FileService'));
                    $service->setFilesystemService($serviceManager->get('ModelFramework\FilesystemService'));
                    $service->setPDFService($serviceManager->get('ModelFramework\PDFService'));
                    $service->setTwigService($serviceManager->get('ModelFramework\TwigService'));
                    $service->setListParamsService($serviceManager->get('ModelFramework\ListParamsService'));

//                    $twigRenderer = clone $serviceManager->get('zfctwigviewtwigrenderer');
//
////                    $ev = $serviceManager->get('twigenvironment')->getLoader()->addLoader(new \Twig_Loader_String());
////
//                    $loader = clone $serviceManager->get('twigenvironment');
//                    $loader->setLoader(clone $loader->getLoader());
//                    $loader->getLoader()->addLoader(new \Twig_Loader_String());
// //                   $loader->addLoader(new \Twig_Loader_String());
////                    $twigRenderer->setLoader($loader);
//      //              $service->setTwigRenderer($twigRenderer);

                    return $service;
                },
                'ModelFramework\ViewServiceProxyCached'           => function (
                    $serviceManager
                ) {
                    $modelViewService
                        = $serviceManager->get('ModelFramework\ViewServiceSource');

                    $modelViewServiceProxyCached
                        = new \ModelFramework\ViewService\ViewServiceProxyCached();
                    $modelViewServiceProxyCached->setViewService($modelViewService);

                    $cacheService
                        = $serviceManager->get('ModelFramework\CacheService');
                    $modelViewServiceProxyCached->setCacheService($cacheService);

                    return $modelViewServiceProxyCached;
                },
                /*** View Service - end */
                /*** Model ViewBox Service - start ***/
                /*** Query Service - start ***/
                'ModelFramework\QueryServiceSource'               => function (
                    $serviceManager
                ) {
                    $service = new \ModelFramework\QueryService\QueryService();
                    $service->setConfigService($serviceManager->get('ModelFramework\ConfigService'));
                    $service->setAuthService($serviceManager->get('ModelFramework\AuthService'));

                    return $service;
                },
                'ModelFramework\QueryServiceProxyCached'          => function (
                    $serviceManager
                ) {
                    $service
                        = $serviceManager->get('ModelFramework\QueryServiceSource');
                    $serviceProxyCached
                        = new \ModelFramework\QueryService\QueryServiceProxyCached();
                    $serviceProxyCached->setQueryService($service);
                    $cacheService
                        = $serviceManager->get('ModelFramework\CacheService');
                    $serviceProxyCached->setCacheService($cacheService);

                    return $serviceProxyCached;
                },
                /*** Query Service - end */
                'ModelFramework\ViewBoxServiceSource'             => function (
                    $serviceManager
                ) {
                    $modelService
                        = new \ModelFramework\ViewBoxService\ViewBoxService();
                    $modelService->setConfigService($serviceManager->get('ModelFramework\ConfigService'));
                    $modelService->setAuthService($serviceManager->get('ModelFramework\AuthService'));
                    $modelService->setViewService($serviceManager->get('ModelFramework\ViewService'));
                    $modelService->setPDFService($serviceManager->get('ModelFramework\PDFService'));
                    $modelService->setTwigService($serviceManager->get('ModelFramework\TwigService'));

                    return $modelService;
                },
                'ModelFramework\ViewBoxServiceProxyCached'        => function (
                    $serviceManager
                ) {
                    $modelViewBoxService
                        = $serviceManager->get('ModelFramework\ViewBoxServiceSource');

                    $modelViewBoxServiceProxyCached
                        = new \ModelFramework\ViewBoxService\ViewBoxServiceProxyCached();
                    $modelViewBoxServiceProxyCached->setViewBoxService($modelViewBoxService);

                    $cacheService
                        = $serviceManager->get('ModelFramework\CacheService');
                    $modelViewBoxServiceProxyCached->setCacheService($cacheService);

                    return $modelViewBoxServiceProxyCached;
                },
                /*** Model ViewBox Service - end */
                'ModelFramework\GatewayServiceRaw'                => function (
                    $serviceManager
                ) {
                    $gatewayService
                        = new \ModelFramework\GatewayService\GatewayServiceRaw();
                    $gatewayService->setServiceLocator($serviceManager);

                    return $gatewayService;
                },
                'ModelFramework\GatewayServiceSource'             => function (
                    $serviceManager
                ) {
                    $gatewayService
                        = new \ModelFramework\GatewayService\GatewayService();
                    $gatewayService->setServiceLocator($serviceManager);
                    $modelService
                        = $serviceManager->get('ModelFramework\ModelService');
                    $gatewayService->setModelService($modelService);

                    return $gatewayService;
                },
                'ModelFramework\GatewayServiceProxyCached'        => function (
                    $serviceManager
                ) {
                    $gatewayService
                        = $serviceManager->get('ModelFramework\GatewayServiceSource');
                    $gatewayServiceProxyCached
                        = new \ModelFramework\GatewayService\GatewayServiceProxyCached();
                    $gatewayServiceProxyCached->setGatewayService($gatewayService);

                    $cacheService
                        = $serviceManager->get('ModelFramework\CacheService');
                    $gatewayServiceProxyCached->setCacheService($cacheService);

                    return $gatewayServiceProxyCached;
                },
                /** service definitions - end */
                /** service definitions - start */
                /** service definitions - end */
                'ModelFramework\CacheService'                     => function (
                    $serviceManager
                ) {
                    $cacheService
                        = new \ModelFramework\CacheService\CacheService();
                    $cacheService->setServiceLocator($serviceManager);

                    $cache = new \ModelFramework\CacheService\InstanceCache();
                    $cacheService->setCache($cache);

                    return $cacheService;
                },
                'ModelFramework\ConfigService'                    => function (
                    $serviceManager
                ) {
                    $service
                        = new \ModelFramework\ConfigService\ConfigService();

                    $service->setGatewayService($serviceManager->get('ModelFramework\GatewayServiceRaw'));

                    $config = $serviceManager->get('config');
                    $service->setRootConfig($config);

                    return $service;
                },
                'ModelFramework\FieldTypesService'                => function (
                    $serviceManager
                ) {
                    $filedTypesService
                        = new \ModelFramework\FieldTypesService\FiledTypesService();

                    $config = $serviceManager->get('config');
                    $filedTypesService->setRootConfig($config);

                    return $filedTypesService;
                },
                'ModelFramework\AuthService'                      => function (
                    $serviceManager
                ) {
                    $authService
                        = new \ModelFramework\AuthService\AuthService();
                    $authService->setServiceLocator($serviceManager);

                    $authService->setModelService($serviceManager->get('ModelFramework\ModelService'));
                    $authService->setGatewayService($serviceManager->get('ModelFramework\GatewayService'));

                    $authService->init();
                    $cacheService
                        = $serviceManager->get('ModelFramework\CacheService');
                    $cacheService->setUser($authService->getMainUser()->_id);

                    return $authService;
                },
                'ModelFramework\LogicServiceSource'               => function (
                    $serviceManager
                ) {
                    $logicService
                        = new \ModelFramework\LogicService\LogicService();
                    $logicService->setConfigService($serviceManager->get('ModelFramework\ConfigService'));
                    $logicService->setGatewayService($serviceManager->get('ModelFramework\GatewayService'));
                    $logicService->setAuthService($serviceManager->get('ModelFramework\AuthService'));
                    $logicService->setModelService($serviceManager->get('ModelFramework\ModelService'));
                    $logicService->setMailService($serviceManager->get('Mail\MailService'));
                    $logicService->setQueryService($serviceManager->get('ModelFramework\QueryService'));
                    $logicService->setFileService($serviceManager->get('ModelFramework\FileService'));
                    $logicService->setFilesystemService($serviceManager->get('ModelFramework\FilesystemService'));

                    return $logicService;
                },
                'ModelFramework\LogicService'                     => function (
                    $serviceManager
                ) {
                    $logicServiceProxyCached
                        = new \ModelFramework\LogicService\LogicServiceProxyCached();

                    $logicService
                        = $serviceManager->get('ModelFramework\LogicServiceSource');
                    $logicServiceProxyCached->setLogicService($logicService);

                    $cacheService
                        = $serviceManager->get('ModelFramework\CacheService');
                    $logicServiceProxyCached->setCacheService($cacheService);

                    return $logicServiceProxyCached;
                },
                'ModelFramework\AclServiceSource'                 => function (
                    $serviceManager
                ) {
                    $aclService = new \ModelFramework\AclService\AclService();

                    $aclService->setGatewayService($serviceManager->get('ModelFramework\GatewayService'));
                    $aclService->setAuthService($serviceManager->get('ModelFramework\AuthService'));
                    $aclService->setModelService($serviceManager->get('ModelFramework\ModelService'));
                    $aclService->setConfigService($serviceManager->get('ModelFramework\ConfigService'));

                    return $aclService;
                },
                'ModelFramework\AclService'                       => function (
                    $serviceManager
                ) {
                    $aclServiceProxyCached
                        = new \ModelFramework\AclService\AclServiceProxyCached();

                    $aclService
                        = $serviceManager->get('ModelFramework\AclServiceSource');
                    $aclServiceProxyCached->setAclService($aclService);

                    $cacheService
                        = $serviceManager->get('ModelFramework\CacheService');
                    $aclServiceProxyCached->setCacheService($cacheService);

                    return $aclServiceProxyCached;
                },
                /** /ModelFrameWork stuff - end  */
                'Wepo\Lib\GatewayService'                         => function (
                    $serviceManager
                ) {
                    return new \Wepo\Lib\GatewayService($serviceManager);
                },
                'Wepo\Lib\ModelService'                           => function (
                    $serviceManager
                ) {
                    return new \Wepo\Lib\ModelService();
                },
                'Wepo\Lib\SearchService'                          => function (
                    $serviceManager
                ) {
                    return new \Wepo\Lib\SearchService($serviceManager);
                },

                'ModelFramework\FileService'                      => function (
                    $serviceManager
                ) {
                    return new \ModelFramework\FileService\FileService($serviceManager);
                },

                'ModelFramework\FilesystemService'                            => function (
                    $serviceManager
                ) {

                    $config = $serviceManager->get('config');
                    $default=isset($config['bsb_flysystem']['filesystems']['default']['adapter'])?
                        $config['bsb_flysystem']['filesystems']['default']['adapter']:'local_files';

                    $adapter    = $serviceManager->get('BsbFlysystemAdapterManager')->get($default);


//                    $cacheMemory = new \League\Flysystem\Cached\Storage\Memory();

                    $local = new \League\Flysystem\Adapter\Local('./fs_cache');
                    $cacheFS = new \League\Flysystem\Cached\Storage\Adapter($local, 'file', 3000);

                    $adapter = new \League\Flysystem\Cached\CachedAdapter($adapter, $cacheFS);



                    //return  $serviceManager->get('BsbFlysystemManager')->get('default');

                    return new \ModelFramework\FilesystemService\FilesystemService ($serviceManager, $adapter,$default);
                },

                'ModelFramework\PDFService'                       => function (
                    $serviceManager
                ) {
                    return new \ModelFramework\PDFService\PDFService($serviceManager);
                },
                'ModelFramework\TwigService'                      => function (
                    $serviceManager
                ) {
                    return new \ModelFramework\TwigService\TwigService($serviceManager);
                },
                'Zend\Session\SessionManager'                     => function (
                    $sm
                ) {

                    $config = $sm->get('config');
                    if (isset($config['session'])) {
                        $session = $config['session'];

                        $sessionConfig = null;
                        if (isset($session['config'])) {
                            $class = isset($session['config']['class'])
                                ? $session['config']['class']
                                : 'Zend\Session\Config\SessionConfig';
                            $options
                                = isset($session['config']['options'])
                                ? $session['config']['options'] : [];
                            $sessionConfig = new $class();
                            $sessionConfig->setOptions($options);
                        }

                        $sessionStorage = null;
                        if (isset($session['storage'])) {
                            $class = $session['storage'];
                            $sessionStorage = new $class();
                        }

                        $sessionSaveHandler = null;
                        if (isset($session['save_handler'])) {
                            // class should be fetched from service manager since it will require constructor arguments
                            $sessionSaveHandler
                                = $sm->get($session['save_handler']);
                            if (method_exists($sessionSaveHandler,
                                'setLifetime')) {
                                $sessionSaveHandler->setLifetime(
                                    $sessionConfig->getRememberMeSeconds()
                                );
                            }
                        }

                        $sessionManager = new \Zend\Session\SessionManager(
                            $sessionConfig,
                            $sessionStorage,
                            $sessionSaveHandler
                        );
                    } else {
                        $sessionManager = new \Zend\Session\SessionManager();
                    }
                    \Zend\Session\Container::setDefaultManager($sessionManager);

                    return $sessionManager;
                },
                'ModelFramework\Session\SaveHandler\MongoGateway' => function (
                    $sm
                ) {

                    $gateway
                        = new \ModelFramework\Session\SaveHandler\MongoGateway();
                    $gateway->setGateway(
                        $sm->get('ModelFramework\GatewayService')
                            ->get('Sessions')
                    );

                    return $gateway;
                }

            ],
        ];
    }

    public function getConsoleBanner(Console $console)
    {
        return '';
    }

    public function getConsoleUsage(Console $console)
    {
        return [
            "        Welcome to WepoCRM Console-enabled app\n",
            "robo --all" => "Run automated update for all services",
            "robo -a"    => "Alias for 'index.php robo --all'",
            "help:",
            "  robo:",
            [
                "--mail | -m",
                "starts robo for mail service",
                "starts syncing email via pop3 and imap protocol for each user"
            ],
            [
                "--all | -a",
                "starts robo for all services",
                "starts respective update for each service"
            ],
            "\n",
            "Version 0.0.1\n",
        ];
    }


    function bootstrapSession(MvcEvent $e)
    {
        $session = $e->getApplication()
            ->getServiceManager()
            ->get('Zend\Session\SessionManager');
        $session->start();

    }

}
