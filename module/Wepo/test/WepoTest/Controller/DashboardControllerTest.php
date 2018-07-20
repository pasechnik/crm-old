<?php

namespace WepoTest\Controller;

use Wepo\Controller\DashboardController;
use WepoTest\Bootstrap;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use PHPUnit_Framework_TestCase;

class DashboardControllerTest extends PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    protected function setUp()
    {
        $serviceManager   = Bootstrap::getServiceManager();
        $this->controller = new DashboardController();
        $this->request    = new Request();
        $this->routeMatch = new RouteMatch(array( 'controller' => 'index' ));
        $this->event      = new MvcEvent();
        $config           = $serviceManager->get('Config');
        $routerConfig     = isset($config[ 'router' ]) ? $config[ 'router' ] : array();
        $router           = HttpRouter::factory($routerConfig);
        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($serviceManager);

        $this->setTestUser();
    }

    /**
     * @return $this
     * @throws \Exception
     */
    protected function setTestUser()
    {
        if (!isset($this->controller)) {
            throw new \Exception('Controller is not set. Set controller before setting the User.');
        }
        $mainUser = $this->controller->Model('MainUser');
        $mainUser->exchangeArray(
            [
                "_id"         => new \MongoId("53a047288bc6c91f37603cdc"),
                "company_id"  => "533ec57a83971eba5c19bbb8",
                "role_id"     => new \MongoId("5295fdf7c5b9f222acd3c406"),
                "status"      => "normal",
                "status_id"   => new \MongoId("5295fdf7c5b9f222acd3c74c"),
                "created_dtm" => "2014-06-17 09:33:21",
                "login"       => "stas@acl.com",
                "password"    => "10a7cdd970fe135cf4f7bb55c0e3b59f",
                "fname"       => "Stanis",
                "lname"       => "Aclis",
            ]
        );
        $this->controller->mainUser($mainUser);

        return $this;
    }

//    public function testAddActionCanBeAccessed()
//    {
//        $this -> routeMatch -> setParam( 'action', 'add' );
//
//        $result   = $this -> controller -> dispatch( $this -> request );
//        $response = $this -> controller -> getResponse();
//
//        $this -> assertEquals( 200, $response -> getStatusCode() );
//    }

//    public function testDeleteActionCanBeAccessed()
//    {
//        $this -> routeMatch -> setParam( 'action', 'delete' );
//
//        $result   = $this -> controller -> dispatch( $this -> request );
//        $response = $this -> controller -> getResponse();
//
//        $this -> assertEquals( 200, $response -> getStatusCode() );
//    }

//    public function testEditActionCanBeAccessed()
//    {
//        $this -> routeMatch -> setParam( 'action', 'edit' );
//
//        $result   = $this -> controller -> dispatch( $this -> request );
//        $response = $this -> controller -> getResponse();
//
//        $this -> assertEquals( 200, $response -> getStatusCode() );
//    }

    public function testIndexActionCanBeAccessed()
    {
        $this->routeMatch->setParam('action', 'index');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

//    public function testIndex1ActionCanBeAccessed()
//    {
//        /**
//         *
//         *
//
//          $albumTableMock = $this -> getMockBuilder( 'Album\Model\AlbumTable' )
//          -> disableOriginalConstructor()
//          -> getMock();
//
//          $albumTableMock -> expects( $this -> once() )
//          -> method( 'fetchAll' )
//          -> will( $this -> returnValue( array( ) ) );
//
//          $serviceManager = $this -> getApplicationServiceLocator();
//          $serviceManager -> setAllowOverride( true );
//          $serviceManager -> setService( 'Album\Model\AlbumTable', $albumTableMock );
//
//          $this -> dispatch( '/album' );
//          $this -> assertResponseStatusCode( 200 );
//
//          $this -> assertModuleName( 'Album' );
//          $this -> assertControllerName( 'Album\Controller\Album' );
//          $this -> assertControllerClass( 'AlbumController' );
//          $this -> assertMatchedRouteName( 'album' );
//
//         *
//         */
//    }
}
