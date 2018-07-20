<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractRestfulController
{

    protected $albumTable;

    public function getAlbumTable()
    {
        if ( !$this -> albumTable )
        {
            $sm                 = $this -> getServiceLocator();
            $this -> albumTable = $sm -> get( 'Album\Model\AlbumTable' );
        }
        return $this -> albumTable;
    }

    /**
     * @param string $name
     * @return WepoMongoLiteGateway
     */
    public function table( $name )
    {
        $sm = $this -> getServiceLocator();
        $tm = $sm -> get( 'Wepo\Lib\GatewayService' );
        return $tm -> getGateway( $name );
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function searchAction()
    {
        $data = [
            [ 'name'=>'q1', 'title'=>'lergerg2'],
            [ 'name'=>'wq2', 'lname'=>'lergeg2'],
            [ 'name'=>'qxcsac1', 'lname'=>'lgerger2'],
            [ 'name'=>'qsdppds1', 'lname'=>'lhgdhe2'],
            [ 'name'=>'q1sdcasdcsa', 'lname'=>'sdfl2'],

        ];
//        $results = $this -> table( 'Lead' ) -> fetchAll();
//        prn( $results );
//        $data    = array();
//        foreach ( $results as $result )
//        {
//            $data[] = $result;
//        }

        return new JsonModel( array( 'data' => $data ) );
    }

    public function testAction()
    {
        return new ViewModel();
    }

    public function getList()
    {
        $data = [
            [ 'id'=>'1', 'title'=>'lergerg2', 'model'=>'lead'],
            [ 'id'=>'2', 'title'=>'lergeg2', 'model'=>'lead'],
            [ 'id'=>'3', 'title'=>'lgerger2', 'model'=>'lead'],
            [ 'id'=>'4', 'title'=>'lhgdhe2', 'model'=>'lead'],
            [ 'id'=>'5', 'title'=>'sdfl2', 'model'=>'lead']
            
        ];
//        $results = $this -> table( 'Lead' ) -> fetchAll();
//        prn( $results );
//        $data    = array();
//        foreach ( $results as $result )
//        {
//            $data[] = $result;
//        }

        return new JsonModel( array( 'data' => $data ) );
    }

    public function get( $id )
    {
        # code...
    }

    public function create( $data )
    {
        # code...
    }

    public function update( $id, $data )
    {
        # code...
    }

    public function delete( $id )
    {
        # code...
    }

}
