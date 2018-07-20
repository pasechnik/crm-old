<?php

namespace Wepo\Lib;

use ModelFramework\AclService\AclServiceAwareInterface;
use ModelFramework\AclService\AclServiceAwareTrait;
use ModelFramework\AuthService\AuthService;
use ModelFramework\GatewayService\GatewayServiceAwareInterface;
use ModelFramework\GatewayService\GatewayServiceAwareTrait;
use ModelFramework\ModelService\DataModel;
use ModelFramework\ModelService\ModelServiceAwareInterface;
use ModelFramework\ModelService\ModelServiceAwareTrait;
use ModelFramework\ViewService\ViewServiceAwareInterface;
use ModelFramework\ViewService\ViewServiceAwareTrait;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;
use Wepo\Model\SaUrl;
use Wepo\Model\MailSetting;
use Wepo\Model\Field;
use Wepo\Model\Status;
use Wepo\Model\Table;
use ModelFramework\AuthService\AuthService as Auth;
use Wepo\Lib\Acl;
use Wepo\Model\MailChain;

class WepoController extends AbstractActionController
    implements GatewayServiceAwareInterface, ModelServiceAwareInterface, ViewServiceAwareInterface, AclServiceAwareInterface
{
    use GatewayServiceAwareTrait, ModelServiceAwareTrait, ViewServiceAwareTrait, AclServiceAwareTrait;

    protected $_results = [ ];

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        parent::setServiceLocator($serviceLocator);
        if (!$serviceLocator instanceof \Zend\Mvc\Controller\ControllerManager) {
            $this->setModelService($serviceLocator->get('ModelFramework\ModelService'));
            $this->setGatewayService($serviceLocator->get('ModelFramework\GatewayService'));
            $this->setViewService($serviceLocator->get('ModelFramework\ViewService'));
            $this->setAclService($serviceLocator->get('ModelFramework\AclService'));
        }
    }

    protected function _cat($name, $value = null)
    {
        if (func_num_args() > 1) {
            $this->$name = $value;

            return $this;
        }

        return $this->$name;
    }

    public function results($results = null)
    {
        if (func_num_args() > 1) {
            return $this->_cat('_results', $results);
        }

        return $this->_cat('_results');
    }

    public function setEventManager(EventManagerInterface $eventManager)
    {
        $dm = $this->getServiceLocator()->get('ModelFramework\LogicService');
        $eventManager->attach('presave', array( $dm, 'dispatch' ), 100);
        $eventManager->attach('update', array( $dm, 'dispatch' ), 100);
        $eventManager->attach('presend', array( $dm, 'dispatch' ), 100);
        $eventManager->attach('postsave', array( $dm, 'dispatch' ), 100);
        $eventManager->attach('prerecycle', array( $dm, 'dispatch' ), 100);
        $eventManager->attach('recycle', array( $dm, 'dispatch' ), 100);
        $eventManager->attach('postrecycle', array( $dm, 'dispatch' ), 100);

        return parent::setEventManager($eventManager);
    }

    /**
     * @param string $modelName
     *
     * @return DataModel
     */
    public function model($modelName)
    {
        return $this->getModelServiceVerify()->get($modelName);
//        $sm = $this->getServiceLocator();
//        $tm = $sm->get( '\Wepo\Lib\GatewayService' );
//
//        return $tm->getModel( $name );
    }

    /**
     * @param string $tableName
     *
     * @return MongoGateway
     */
    public function table($tableName)
    {
        return $this->getGatewayServiceVerify()->get($tableName);
//        if ( $tableName == 'Lead' )
//        {
//            return $this->getServiceLocator()->get( 'ModelFramework\GatewayService' )->get( $tableName );
//        }
//        else
//        {
//            return $this->getServiceLocator()->get( 'Wepo\Lib\GatewayService' )->getGateway( $tableName );
//        }
    }

    /**
     * @param Object $setting
     *
     * @return \Mail\Receive\BaseTransport|\Mail\Send\BaseTransport
     */
    public function mail($setting)
    {
        $sm = $this->getServiceLocator();
        $tm = $sm->get('Mail\MailService');

        $purpose      = $setting->type;
        $protocolName = $setting->setting_protocol;
        $settingId    = (string) $setting->_id;
        if ($purpose == 'Send') {
            $setting = [
                'name'              => 'Wepo',
                'host'              => $setting->setting_host,
                'port'              => $setting->setting_port,
                'connection_class'  => 'login',
                'connection_config' => [
                    'ssl'      => $setting->setting_security,
                    'username' => $setting->setting_user,
                    'password' => $setting->pass,
                ],
            ];
        } else {
            $setting = array(
                'host'     => $setting->setting_host,
                'user'     => $setting->setting_user,
                'password' => $setting->pass,
                'ssl'      => $setting->setting_security,
                'port'     => $setting->setting_port,
            );
        }

        return $tm->getGateway($purpose, $protocolName, $setting, $settingId);
    }

    /**
     * @param string $template  PDF template that should be rendered
     * @param string $action    Actions such as ['showPDF','showView','save']
     * @param array  $variables Contains variables to render in tamlate
     * @param array  $dir       Dirictory to save generated PDF. To save pdf on server set $action = 'save', $dir = 'your/path/to/save';
     * @param array  $params    Contains pdf parametrs for pdf generator such as ['paperSize','paperOrientation','fileName']
     *
     * @return WepoMail
     */
    public function generatePDF($template, $action, $variables = [ ], $dir = null, $params = [ ])
    {
        $sm  = $this->getServiceLocator();
        $pdf = $sm->get('\Wepo\Lib\PDFService');

        switch ($action) {
            case 'showPDF':
                return $pdf->getPDFResponse($template, $variables, $params);
                break;
            case 'showView':
                return $pdf->getViewModel($template, $variables, $params);
                break;
            case 'save':
                if (isset($dir)) {
                    return $pdf->saveAsPDF($template, $dir, $variables, $params);
                }

                return $pdf->getPDFtoSave($template, $variables, $params);
        }

        return;
    }

    /**
     * @param $name
     *
     * @return mixed
     * @throws \Exception
     */
    public function dynmodel($name)
    {
        throw new \Exception('dynmodel call');
        $sl = $this->getServiceLocator();
        $ms = $sl->get('Wepo\Lib\ModelService');

        return $ms->getModel($name);
    }

    public function dynform($name, $model, $mode)
    {
        throw new \Exception('dynform call');
        $sl = $this->getServiceLocator();
        $ms = $sl->get('Wepo\Lib\ModelService');

        return $ms->getForm($name, $model, $mode);
    }

    public function viewModel($name, $model, $mode)
    {
        //        throw new \Exception( 'viewModel call' );
        $sl = $this->getServiceLocator();
        $ms = $sl->get('Wepo\Lib\ModelService');

        return $ms->getViewModel($name, $model, $mode);
    }

    public function getModelConfig($name)
    {
        $sl = $this->getServiceLocator();
        $ms = $sl->get('ModelFramework\ModelConfigParserService')->getModelConfig($name);

        return $ms;
    }

    public function getViewConfig($modelname, $viewname)
    {
        throw new \Exception('getViewConfig call');
        $sl = $this->getServiceLocator();
        $ms = $sl->get('Wepo\Lib\ModelService');

        return $ms->prepareView($modelname, $viewname);
    }

    /**
     * @param string $name
     *
     * @return WepoForm
     */
    public function form($name)
    {
        $sm = $this->getServiceLocator();
        $tm = $sm->get('\Wepo\Lib\GatewayService');

        return $tm->getForm($name);
    }

    public function mainUser($mainUser = null)
    {
        $auth = $this->getServiceLocator()->get('ModelFramework\AuthService');
        if (func_num_args() > 0) {
            $auth->setMainUser($mainUser);
        }

        return $auth->getMainUser();
    }

    public function user($user = null)
    {
        $auth = $this->getServiceLocator()->get('ModelFramework\AuthService');
        if (func_num_args() > 0) {
            $auth->setUser($user);
        }

        return $auth->getUser();
    }

    public function isAllowed($resource, $mode)
    {
        $auth = $this->getServiceLocator()->get('ModelFramework\AuthService');

        return $auth->isAllowed($resource, $mode);
    }

    public function getPermission($resource)
    {
        return AuthService::ALL;
        # :TODO: we need new auth scheme
//        $auth       = $this->getServiceLocator()->get( 'ModelFramework\AuthService' );
//        $permission = $auth->getPermission( $resource );
//        if ( $permission == AuthService::NONE )
//        {
//            throw new \Exception( 'You don\'t have access to this resource: ' . $resource );
//        }
//
//        return $permission;
    }

    public function refresh($message = null, $tourl = null, $seconds = 0)
    {
        $viewModel = new ViewModel(array(
                                        'message' => $message, 'user' => $this->user(), 'toUrl' => $tourl,
                                        'seconds' => $seconds,
                                    ));

        return $viewModel->setTemplate('wepo/partial/refresh.twig');
    }

    public function showerror($message = null, $tourl = null, $seconds = null)
    {
        $viewModel = new ViewModel(array(
                                        'message' => $message, 'user' => $this->user(), 'toUrl' => $tourl,
                                        'seconds' => $seconds,
                                    ));

        return $viewModel->setTemplate('wepo/partial/error.twig');
    }

    public function getClientIp()
    {
        $_args   = [ 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'default' => 'REMOTE_ADDR' ];
        $_result = null;
        while (count($_args) && $_result === null) {
            $_result = $this->getRequest()->getServer(array_shift($_args));
        }

        return $_result;
    }

    public function fields($fields, $order = array())
    {
        $result[ 'fields' ] = [ 'id' ];
        foreach ($this->table('Field')->find($fields, $order) as $_field) {
            $result[ 'fields' ][ ]                                                           = $_field->field;
            $result[ 'labels' ][ empty($_field->alias) ? $_field->field : $_field->alias ] = $_field->label;
        }

        return $result;
    }

    public function display($field, $transport, $tableId, $permission, $status = array())
    {
        //        $permission = $this -> getPermission( 'data:'.$transport );

        $fieldType = $this->model('Field');
        $result    = [ ];
        if (isset($field[ 'executor' ])) {
            $result += $this->fields([ 'table_id' => $fieldType->table_id($tableId), 'target' => 'list' ],
                                      [ 'order' => 'asc' ]);
        } else {
            $result += $this->fields([
                                          'table_id' => $fieldType->table_id($tableId),
                                          'visible'  => $fieldType->visible(1),
                                          'target'   => 'list',
                                      ], [ 'order' => 'asc' ]);
        }
        $result[ 'order' ] = array();
        $s                 = (int) $this->params()->fromRoute('desc', 1);
        $sort              = $this->params()->fromRoute('sort', 'created_dtm');
        if ($sort !== null) {
            $result[ 'order' ][ $sort ] = ($s == 1) ? 'desc' : 'asc';
        }
        if ($sort !== null && !array_key_exists($sort, $result[ 'labels' ])) {
            $result[ 'order' ] = array();
        }
        if ($transport == 'EventLog') {
            foreach ($field as $value) {
                $result[ 'params' ][ 'id' ] = $value;
            }
            $result[ 'params' ][ 'action' ] = 'view';
        } else {
            if ($permission == Auth::ALL) {
                $field = array();
            }
            $result[ 'params' ][ 'action' ] = 'list';
        }
        $result[ 'table' ][ 'id' ] = $tableId;
        $result[ 'modelname' ]     = strtolower($transport);
        $result[ 'paginator' ]     =
            $this->table($transport)->getPages($result[ 'fields' ], $field + $status, $result[ 'order' ]);
//        $result[ 'pages' ]            = $result[ 'paginator' ] -> getPages( 'Elastic' );
        $result[ 'params' ][ 'sort' ] = $sort;
        $result[ 'params' ][ 'desc' ] = $s;
        $result[ 'permission' ]       = $permission;
        $result[ 'saurl' ]            = '?back='.$this->generateLabel();
        $result[ 'saurlback' ]        = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));
        $result[ 'user' ]             = $this->user();

        return $result;
    }

    protected function getParam($name, $default = '')
    {
        $param = $this->params()->fromQuery($name, $default);
        if ($param === $default) {
            $param = $this->params()->fromRoute($name, $default);
        }

        return $param;
    }

    public function getListing($modelName, $where = [ ])
    {
        $searchQuery = $this->getParam('q', '');
//        $pageCount   = $this->table( 'Table' )->get( Table::getTableId( $modelName ) )->rows;
        $pageCount = 10;
        $results   = $this->displaySearch($modelName, $where, $searchQuery);
        if ($results[ 'paginator' ]->count() > 0) {
            $results[ 'paginator' ]->setCurrentPageNumber($this->getParam('page', 1))
                                   ->setItemCountPerPage($pageCount);
        }
        $results[ 'search_query' ] = $searchQuery;
        $results[ 'rows' ]         = array( 5, 10, 25, 50, 100 );

        prn($results);

        return $results;
    }

    public function displaySearch($modelName, $where = [ ], $search = '')
    {
        $tableId    = Table::getTableId($modelName);
        $permission = $this->getPermission('data:'.ucfirst($modelName));
        $field      = [ ];
        $fieldType  = $this->model('Field');
        $result     = [ ];
        $result += $this->fields([
                                      'table_id' => $fieldType->table_id($tableId),
                                      'visible'  => $fieldType->visible(1),
                                      //                                      , 'target'=>'list'
                                  ], [ 'order' => 'asc' ]);

        $result[ 'order' ]          = array();
        $s                          = (int) $this->getParam('desc', 1);
        $sort                       = $this->getParam('sort', 'created_dtm');
        $result[ 'order' ][ $sort ] = ($s == 1) ? 'desc' : 'asc';

        if (!isset($result[ 'labels' ]) || !array_key_exists($sort, $result[ 'labels' ])) {
            $result[ 'order' ] = [ ];
        }

        if ($permission == Auth::OWN) {
            $field = [ 'owner_id' => (string) $this->user()->id() ];
        }

        $result[ 'params' ][ 'action' ] = 'list';
        if ($search) {
            $result[ 'params' ][ 'q' ] = $search;
        }
        $result[ 'params' ][ 'model' ] = $modelName;

        $_dataWhere = $field + $where;
        if (empty($search)) {
            $_where = $_dataWhere;
        } else {
            $_where = [
                '$and' => [ $_dataWhere, [ '$text' => [ '$search' => $search ] ] ],
            ];
        }

        $result[ 'table' ][ 'id' ] = $tableId;
        $result[ 'modelname' ]     = strtolower($modelName);
        $result[ 'paginator' ]     =
            $this->table(ucfirst($modelName))->getPages($result[ 'fields' ], $_where, $result[ 'order' ]);

        $result[ 'params' ][ 'sort' ] = $sort;
        $result[ 'params' ][ 'desc' ] = $s;
        $result[ 'permission' ]       = $permission;
        $result[ 'saurl' ]            = '?back='.$this->generateLabel();
        $result[ 'saurlback' ]        = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));

        $result[ 'user' ] = $this->user();

        return $result;
    }

    public function getwidget($conf, $inmodel)
    {
        $result = [ ];

        $conf = $conf->toArray();

        $modelName = $conf[ 'data_model' ];
        $where     = $conf[ 'where' ];
        $model     = $this->model($modelName);
        $fieldType = $this->model('Field');
        $tableId   = Table::getTableId($modelName);
        $result += $this->fields([
                                      'table_id' => $fieldType->table_id($tableId),
                                      'visible'  => $fieldType->visible(1),
                                      'target'   => 'widget',
                                  ], [ 'order' => 'asc' ]);
        foreach ($where as $_f => $_v) {
            if (is_array($_v)) {
                foreach ($_v as $_key => $_value) {
                    if ($_value{0} == ':' && isset($_v[ $inmodel->getModelName() ])) {
                        $_m                                            = substr($_value, 1);
                        $where[ $_f.".".$inmodel->getModelName() ] = [ $model->$_f($inmodel->{$_m}) ];
                        unset($where[ $_f ]);
                    }
                }
            } elseif ($_v{0} == ':') {
                $_m           = substr($_v, 1);
                $where[ $_f ] = $model->$_f($inmodel->{$_m});
            }
        }

        if (isset($conf[ 'action' ])) {
            foreach ($conf[ 'action' ] as $action => $config) {
                $result[ 'action' ][ $action ] = $config;
            }
        }
        if (isset($conf[ 'model_link' ])) {
            foreach ($conf[ 'model_link' ] as $modelkey => $link) {
                if (!isset($link[ 'params' ])) {
                    continue;
                }
                foreach ($link[ 'params' ] as $_key => $_v) {
                    if ($_v{0} == ':') {
                        $_m = substr($_v, 1);
//                        $link[ 'params' ][ $_key ] = $model->$_m( $inmodel->{$_m} );
                        $link[ 'params' ][ $_key ] = (string) $inmodel->{$_m};
                    }
                }
                $result[ 'model_link' ][ $modelkey ] = $link;
            }
        }

        $result[ 'data' ]  = $this->table($modelName)->find($where, $conf[ 'order' ], $conf[ 'limit' ]);
        $result[ 'model' ] = strtolower($modelName);

        return $result;
    }

    public function widgets($pagename, $model)
    {
        $pagename    = strtolower($pagename);
        $results     = [ ];
        $widgetconfs = $this->table('Widget')->find([ 'path' => $pagename ], [ 'output_order' => 'asc' ]);
        if (!count($widgetconfs)) {
            return [ ];
        }

        foreach ($widgetconfs as $_wconf) {
            $results[ $_wconf->name ] = $this->getwidget($_wconf, $model);
        }

        return $results;
    }

    public function recycle($modelName)
    {
        $permission             = $this->getPermission('data:'.$modelName);
        $request                = $this->getRequest();
        $results[ 'modelname' ] = strtolower($modelName);
        $results[ 'action' ]    = $this->params('action');
        $ids                    = $request->getPost('checkedid', null);
        if (!is_array($ids)) {
            $id = $this->params()->fromRoute('id', 0);
            if ($id) {
                $ids = array( $id );
            } else {
                $this->redirect()->toRoute($results[ 'modelname' ],
                                            [ 'action' => $results[ 'action' ] == 'delete' ? 'list' : 'recyclelist' ]);
            }
        }
        $results[ 'ids' ] = $ids;
        foreach ($ids as $id) {
            try {
                $results[ 'items' ][ $id ] = $this->table($modelName)->find([ '_id' => $id ])->current();
            } catch (\Exception $ex) {
                return $this->refresh($modelName.' data is invalid '.$ex->getMessage(), $this->url()
                                                                                                  ->fromRoute($results[ 'modelname' ],
                                                                                                               array( 'action' => 'list' )));
            }
            if ($permission != 1 && isset($results[ 'items' ][ $id ]->owner_id) &&
                 ($results[ 'items' ][ $id ]->owner_id != $this->user()->id())
            ) {
                return $this->showerror('You don\'t have access to this page.',
                                         $this->url()->fromRoute('dashboard'));
            }
        }
        if ($request->isPost()) {
            $delyes = $request->getPost('delyes', null);
            $delno  = $request->getPost('delno', null);
            if ($delyes !== null) {
                $this->trigger('prerecycle', $results[ 'items' ]);
                $this->trigger('recycle', $results[ 'items' ]);
                $this->trigger('postrecycle', $results[ 'items' ]);
                $url = $this->getSaurlBack($this->params()->fromQuery('back'));
                if (!isset($url)) {
                    $url = $this->url()->fromRoute($results[ 'modelname' ], [
                        'action' => $results[ 'action' ] == 'delete' ? 'list' : 'recyclelist'
                    ]);
                }

                return $this->refresh(ucfirst($results[ 'action' ]).' was successfull ', $url);
            }
            if ($delno !== null) {
                return $this->redirect()->toRoute($results[ 'modelname' ], [
                    'action' => $results[ 'action' ] == 'delete' ? 'list' : 'recyclelist'
                ]);
            }
        }
        $results[ 'permission' ] = $permission;
        $results[ 'user' ]       = $this->user();
        $results[ 'saurl' ]      = '?back='.$this->params()->fromQuery('back', 'home');
        $results[ 'saurlback' ]  = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));

        return $results;
    }
//////////////////////////////USE trueTableHash function instead///////////////////////
//    public function tableHash( $modelName, $valuefield, $lablefield, $excludeValueField = array(),
//                               $excludeLableField = array() )
//    {
//        $permission = $this->getPermission( 'data:' . $modelName );
//        //FIXME
//        //
//        //
//        $model = $this->model( $modelName );
//        if ( in_array( 'owner_id', $model->getFieldNames() ) && ( $permission == 2 ) && $modelName != 'Product' )
//        {
//            $tableResultset = $this->table( $modelName )->find( array( 'owner_id' => $this->user()->id() ) );
//        }
//        //
//        //
//        //
//        else
//        {
//            $tableResultset = $this->table( $modelName )->fetchAll();
//        }
//        $tableHash = array( 0 => 'Please select ... ' );
//        foreach ( $tableResultset as $table )
//        {
//            if ( !( in_array( (string) $table->$valuefield, $excludeValueField ) ||
//                    in_array( (string) $table->$lablefield, $excludeLableField ) )
//            ) //will not work if there is the same value in the table
//            {
//                $tableHash[ (string) $table->$valuefield ] = (string) $table->$lablefield;
//            }
//        }
//
//        return $tableHash;
//    }

    public function trueTableHash($modelName, $valuefield, $lablefield, $where = array(), $use_default = true,
                                   $defaultValue = [ 0 => 'Please select ... ' ])
    {
        $permission = $this->getPermission('data:'.$modelName);

        $model      = $this->model($modelName);
        $fieldNames = array_keys($model->toArray());
        if (in_array('owner_id', $fieldNames) && ($permission == 2) && $modelName != 'Product') {
            $where[ 'owner_id' ] = $this->user()->id();
            $tableResultset      = $this->table($modelName)->find($where);
        } else {
            $tableResultset = $this->table($modelName)->find($where);
        }

        $tableHash = $use_default ? $defaultValue : array();
        foreach ($tableResultset as $table) {
            $tableHash[ (string) $table->$valuefield ] = (string) $table->$lablefield;
        }

        return $tableHash;
    }

    public function add($form, $transport, $permission = 2)
    {
        $model             = $this->model($transport);
        $results           = [ ];
        $results[ 'user' ] = $this->user();
        $form->setAttribute('action', $this->url()->fromRoute($form->getRoute(), [ 'action' => $form->getAction() ] +
                                                                                   $form->getActionParams()));
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->updateInputFilter($model->getInputFilter(), 'fields');
            $form->setData($request->getPost());
            if ($form->isValid()) {
                try {
                    $model_data = array();
                    foreach ($form->getData() as $_k => $_data) {
                        $model_data += is_array($_data) ? $_data : array( $_k => $_data );
                    }
                    $model->merge($model_data);
                    $this->trigger('presave', $model);
                    $model->postExchange();
                } catch (\Exception $ex) {
                    $results[ 'message' ] = 'Error.'.$ex->getMessage();
                }
                if (!isset($results[ 'message' ]) || !strlen($results[ 'message' ])) {
                    try {
                        $tr = $this->table($transport);
                        $tr->save($model);
                        $model->setId($tr->getLastInsertId());
                    } catch (\Exception $ex) {
                        $results[ 'message' ] = 'Invalid input data.'.$ex->getMessage();
                    }
                }
                if (!isset($results[ 'message' ]) || !strlen($results[ 'message' ])) {
                    $this->trigger('postsave', $model);

                    return $this->refresh($transport.' data was successfully add', $this->url()
                                                                                           ->fromRoute($form->getRoute(),
                                                                                                        array( 'action' => $form->getBackAction() ) +
                                                                                                        $form->getActionParams()));
                }
            } else {
                $results[ 'message' ] = 'Invalid input data.';
            }
        }
        $form->prepare();
        $results[ 'form' ]       = $form;
        $results[ 'modelname' ]  = strtolower($model->getModelName());
        $results[ 'permission' ] = $permission;
        $results[ 'saurl' ]      = '?back='.$this->generateLabel();
        $results[ 'saurlback' ]  = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));

        return $results;
    }

    public function edit($form, $transport, $permission = 2)
    {
        if (!$form->getActionParams('id')) {
            return $this->redirect()->toRoute($form->getRoute());
        }

        $form->setAttribute('action', $this->url()->fromRoute($form->getRoute(), [ 'action' => $form->getAction() ] +
                                                                                   $form->getActionParams()));
        $results           = [ ];
        $results[ 'user' ] = $this->user();
        try {
            $model    = $this->table($transport)->get($form->getActionParams('id'));
            $old_data = $model->split($form->getValidationGroup());

            //Это жесть конечно и забавно, но на время сойдет :)
//            $model_bind = array_diff( $model->toArray(), $model->split( $form->getValidationGroup() ) );
            $model_bind = $model->toArray();
            foreach ($model_bind as $_k => $_v) {
                //                $_wrs = explode( '_', $_k );
                if (substr($_k, -4) == '_dtm') {
                    $model->$_k = str_replace(' ', 'T', $_v);
                }
            }
            //Конец жести
        } catch (\Exception $ex) {
            throw $ex;
            exit();

            return $this->redirect()->toRoute($form->getRoute(), array( 'action' => 'list' ));
        }
        if ($permission != 1 && isset($model->owner_id) && ($model->owner_id != $this->user()->id())) {
            return $this->showerror('You don\'t have access to this page.', $this->url()->fromRoute('dashboard'));
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->addInputFilter($model->getInputFilter(), 'fields');
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $model_data = array();

                foreach ($form->getData() as $_k => $_data) {
                    $model_data += is_array($_data) ? $_data : array( $_k => $_data );
                }
                $model->merge($model_data);
                $model->merge($old_data);
                $this->trigger('presave', $model);
                if (!isset($results[ 'message' ]) || !strlen($results[ 'message' ])) {
                    try {
                        $tr = $this->table($transport);
                        $tr->save($model);
                        $model->setId($tr->getLastInsertId());
                    } catch (\Exception $ex) {
                        $results[ 'message' ] = 'Invalid input data.'.$ex->getMessage();
                    }
                }
                if (!isset($results[ 'message' ]) || !strlen($results[ 'message' ])) {
                    $this->trigger('postsave', $model);
                    $url = $this->getBackUrl();
                    if ($url == null || $url == '/') {
                        $url = $this->url()->fromRoute($form->getRoute(), array( 'action' => $form->getBackAction() ) +
                                                                           $form->getActionParams());
                    }

                    return $this->refresh($transport.' data was successfully changed', $url);
                }
            }
        } else {
            $form->bind($model);
        }
        $form->prepare();
        $results[ 'form' ]       = $form;
        $results[ 'permission' ] = $permission;
        $results[ 'modelname' ]  = strtolower($model->getModelName());
        $results[ 'saurl' ]      = '?back='.$this->generateLabel();
        $results[ 'saurlback' ]  = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));
        if (isset($form->getFieldsets()[ 'saurl' ])) {
            $form->getFieldsets()[ 'saurl' ]->get('back')->setValue($this->params()->fromQuery('back', 'home'));
        }

        return $results;
    }

    public function dynedit($modelName, $form = null)
    {
        //        $permission = $this->getPermission( 'data:Lead' );

        if ($form == null) {
            $id = (string) $this->params()->fromRoute('id', '0');

            $modelGetWay = $this->table($modelName);
            if ($id == '0') {
                // :FIXME: check create permission
                $model = $modelGetWay->model();
                $mode  = Acl::MODE_CREATE;
            } else {
                // :FIXME: add security filter
                $model = $modelGetWay->get($id);
                $mode  = Acl::MODE_EDIT;
            }
            $form = $this->dynform($modelName, $model, $mode);
        }

        $form->setRoute(strtolower($modelName))->setAction($this->params()->fromRoute('action', 'edit'));
        if ($id != '0') {
            $form->setActionParams([ 'id' => $id ]);
        }

        $results           = [ ];
        $results[ 'user' ] = $this->user();

        try {
            //            $model    = $this->table( $modelName )->get( $form->getActionParams( 'id' ) );
            $old_data = $model->split($form->getValidationGroup());
            //Это жесть конечно и забавно, но на время сойдет :)
            $model_bind = $model->toArray();
            foreach ($model_bind as $_k => $_v) {
                //                $_wrs = explode( '_', $_k );
                if (substr($_k, -4) == '_dtm') {
                    $model->$_k = str_replace(' ', 'T', $_v);
                }
            }
            //Конец жести
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute($form->getRoute(), array( 'action' => 'list' ));
        }

//        if ( $permission != 1 && isset( $model->owner_id ) && ( $model->owner_id != $this->user()->id() ) )
//        {
//            return $this->showerror( 'You don\'t have access to this page.', $this->url()->fromRoute( 'dashboard' ) );
//        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->addInputFilter($model->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $model_data = array();
                foreach ($form->getData() as $_k => $_data) {
                    $model_data += is_array($_data) ? $_data : array( $_k => $_data );
                }
                $model->merge($model_data);
                $model->merge($old_data);

                $this->trigger('presave', $model);
                if (!isset($results[ 'message' ]) || !strlen($results[ 'message' ])) {
                    try {
                        $this->table($modelName)->save($model);
                    } catch (\Exception $ex) {
                        $results[ 'message' ] = 'Invalid input data.'.$ex->getMessage();
                    }
                }
                if (!isset($results[ 'message' ]) || !strlen($results[ 'message' ])) {
                    $this->trigger('postsave', $model);
                    $url = $this->getBackUrl();
                    if ($url == null || $url == '/') {
                        $actionParams = [ 'action' => $form->getBackAction() ];
                        if ($form->getActionParams() !== null) {
                            $actionParams += $form->getActionParams();
                        }
                        $url = $this->url()->fromRoute($form->getRoute(), $actionParams);
                    }

                    return $this->refresh($modelName.' data was successfully saved', $url);
                }
            }
        } else {
            $form->bind($model);
        }

        $form->prepare();
        $results[ 'form' ] = $form;
//        $results[ 'permission' ] = $permission;
        $results[ 'modelname' ] = strtolower($model->getModelName());
        $results[ 'saurl' ]     = '?back='.$this->generateLabel();
        $results[ 'saurlback' ] = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));
        if (isset($form->getFieldsets()[ 'saurl' ])) {
            $form->getFieldsets()[ 'saurl' ]->get('back')->setValue($this->params()->fromQuery('back', 'home'));
        }

        return $results;
    }

    public function view($modelName)
    {
        $permission = $this->getPermission('data:'.$modelName);
        $id         = (string) $this->params()->fromRoute('id', 0);
        $_atts      = array( '_id' => $id );
        if ($permission == Auth::OWN && $modelName != 'Product') {
            //fixme

            $_atts[ 'owner_id' ] = $this->user()->id();
        }
        $model = $this->table($modelName)->findOne($_atts);
        if (!$model) {
            return $this->showerror('Data not found', $this->url()->fromRoute(strtolower($modelName)));
        }

        $results[ 'widgets' ] = $this->widgets($modelName, $model);
        $tableId              = Table:: getTableId($modelName);
//      $table                = '\Wepo\Model\Table';
//        try
//        {
//            $pagecount = 10;
//            $results   = $this -> display( array( 'target_id' => (string) $id, 'table_id' => $tableId ), 'EventLog', \Wepo\Model\Table::EVENT_LOG, $permission );
//            if ( $results[ 'paginator' ] -> count() > 0 )
//            {
//                $results[ 'paginator' ] -> setCurrentPageNumber( $this -> params() -> fromRoute( 'page' ) ) -> setItemCountPerPage( $pagecount );
//                $items = $results[ 'paginator' ] -> getCurrentItems();
//                $items -> buffer();
//            }
//        }
//        catch ( \Exception $ex )
//        {
//            return $this -> refresh( 'Error', $this -> url() -> fromRoute( 'dashboard' ) );
//        }
//        $this->trigger( 'presave', $model );
//        try
//        {
//            $this->table( $modelName )->save( $model );
//        }
//        catch ( \Exception $ex )
//        {
//
//        }
        $results[ 'user' ]           = $this->user();
        $results[ 'field_labels' ]   = $this->fields(array( 'table_id' => $tableId, 'target' => 'list' ))[ 'labels' ];
        $results[ 'model' ]          = $model;
        $results[ 'table_id' ]       = $tableId;
        $results[ 'params' ][ 'id' ] = $id;
        $results[ 'saurl' ]          = '?back='.$this->generateLabel();
        $results[ 'delsaurl' ]       = '?back='.$this->params()->fromQuery('back', 'home');
        $results[ 'saurlback' ]      = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));

        prn($results);

        return $results;
    }

    public function dynamicview($modelName)
    {
        /*
         * new stuff start
         */

        // $results =  $this->getWindow( $modelName . '.view' );
        /*
         * results should return permitted model
         *
         *
         */

        /*
         * /new stuff end
         *
         */

//        $permission = $this->getPermission( 'data:' . $modelName );

        $id    = (string) $this->params()->fromRoute('id', 0);
        $model = $this->table($modelName)->findOne([ '_id' => $id ]);
        if (!$model) {
            return $this->showerror('Data not found', $this->url()->fromRoute(strtolower($modelName)));
        }
//        $viewModel = $this -> viewModel($modelName, $model, Acl::MODE_READ);
        $viewModel            = $this->viewModel2($modelName, $model, Acl::MODE_READ);
        $results[ 'widgets' ] = $this->widgets($modelName, $model);
        $tableId              = Table:: getTableId($modelName);
        $this->trigger('presave', $model);
        try {
            $this->table($modelName)->save($model);
        } catch (\Exception $ex) {
        }
        $results[ 'user' ]           = $this->user();
        $results[ 'field_labels' ]   = $this->fields(array( 'table_id' => $tableId ))[ 'labels' ];
        $results[ 'model' ]          = $viewModel;
        $results[ 'table_id' ]       = $tableId;
        $results[ 'params' ][ 'id' ] = $id;
        $results[ 'saurl' ]          = '?back='.$this->generateLabel();
        $results[ 'delsaurl' ]       = '?back='.$this->params()->fromQuery('back', 'home');
        $results[ 'saurlback' ]      = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));

        return $results;
    }

//    public function updateMailChains($user = null)
//    {
//        $user = is_null($user)? $this->user() : $user;
//        $noChainMails = $this->table( 'Mail' )->find( [ 'chain_id' => '', 'owner_id' => $user->id() ] );
////        prn('all mails',$noChainMails->toArray());
////        exit;
//
//        foreach ( $noChainMails as $mail )
//        {
////            prn('//////////////////////////////////////////////////////////////////////////////////////////////');
//            $MInReplyTo = isset($mail->header['in-reply-to'])?$mail->header['in-reply-to']:null;
//            $MMessageId = $mail->header['message-id'];
//            $MReferences = isset($mail->header['references'])?$mail->header['references']:[];
//            $chainWhere = $MReferences;
//            if(isset($MInReplyTo))
//            {
//                array_push($chainWhere, $MMessageId, $MInReplyTo);
//            }
//            else
//            {
//                array_push($chainWhere, $MMessageId);
//            }
//            $chainWhere = array_unique($chainWhere);
//            $chains = $this->table('MailChain')->find(['reference'=>$chainWhere]);
////            prn('chain search array', $chainWhere);
////            prn('chain search result', $chains->toArray());
//
//
//            $chain = $this->model('MailChain');
//            $chain->reference = $chainWhere;
//            $chain->title = $mail->title;
//            $chain->date = $mail->date;
//            $chain->count = 1;
//            $chain->status_id = $mail->status_id;
//            $oldChainIds = [];
//
//            if(count($chains))
//            {
//                foreach($chains as $oldChain)
//                {
//                    $oldChainIds[] = $oldChain->id();
//                    $chain->reference = array_unique(array_merge($chain->reference,$oldChain->reference ));
//
//                    $chainDate = strtotime($chain->date);
//                    $oldChainDate = strtotime($oldChain->date);
//                    if($chainDate < $oldChainDate)
//                    {
//                        $chain->title = $oldChain->title;
//                    }
//                    else
//                    {
//                        $date = new \DateTime('@'.$oldChainDate);
//                        $chain->date = $date->format('Y-m-d H:i:s');//$oldChainDate;
//                    }
//                }
//                $chain->_id = array_pop($oldChainIds);
//                $mail->chain_id = $chain->_id;
//            }
//            $chain->count = count($chain->reference);
//            $chain->reference = array_values($chain->reference);
//
//
//            try
//            {
//                $this->trigger('presave', $chain);
//                $tr = $this->table('MailChain');
//                $tr->save($chain);
////                $mail->chain_id = $tr->getLastInsertId()?:$mail->chain_id;
////                $this->table('Mail')->save($mail);
//                $tr->delete( ['_id' => $oldChainIds] );
////                $this->trigger('postsave',$chain);
//            }
//            catch(\Exception $ex)
//            {
//                throw $ex;
//                continue;
//            }
//        }
//
//        foreach($noChainMails as $mail)
//        {
//            $message_id = 'message-id';
//            $chain = $this->table('MailChain')->findOne(['reference'=>[$mail->header[$message_id]]]);
//            $mail->chain_id = $chain->_id;
//            $this->table('Mail')->save($mail);
//        }
//    }

//    public function checkMailSettingExist( $actionType, $user = null )
//    {
//        if ( !$user )
//        {
//            $user = $this->user();
//        }
//        switch ( $actionType )
//        {
//            case 'sync':
//                $settings = $this->table( 'MailSetting' )->find( [
//                                                                     'user_id'          => $user->id(),
//                                                                     'setting_protocol' => \Wepo\Model\MailSetting::receiveProtocols(),
//                                                                     'status_id'        => [
//                                                                         Status::NORMAL,
//                                                                         Status::NEW_
//                                                                     ]
//                                                                 ] );
//                break;
//            case 'send': //change when mail setting become apart for send and sync
//                $settings = $this->table( 'MailSetting' )->find( [
//                                                                     'user_id'          => $user->id(),
//                                                                     'setting_protocol' => \Wepo\Model\MailSetting::sendProtocols(),
//                                                                     'status_id'        => [
//                                                                         Status::NORMAL,
//                                                                         Status::NEW_
//                                                                     ]
//                                                                 ] );
//                break;
//            default:
//                throw new \Exception( 'actionType is wrong' );
//                break;
//        }
//
//        return $settings;
//    }


//    public function syncMails( $user = null )
//    {
//        $user = !is_null($user) ? $user : $this->user();
//        ini_set( 'max_execution_time', 300 );
//        $settings = $this->checkMailSettingExist( 'sync', $user );
//        $count    = 0;
//        $mails    = $this->table( 'Mail' )->find( [ 'owner_id' => $this->user()->id() ] );
//        $newMails = [ ];
//        foreach ( $settings as $setting )
//        {
//            $exceptUids = [ ];
//            foreach ( $mails as $mail )
//            {
//                if ( isset( $mail->protocol_ids[ $setting->id() ] ) )
//                {
//                    $exceptUids[ ] = $mail->protocol_ids[ $setting->id() ];
//                }
//            }
////            prn($exceptUids);
////            exit();
//            $syncService = $this->mail($setting);
//            $fetchedMails = $syncService -> fetchAll( $exceptUids );
//            if($syncService->lastSyncIsSuccessful())
//            {
//                $this->table('Mail')->delete(['header.message-id'=>'send']);
//            }
////            prn( $fetchedMails );
//            foreach ( $fetchedMails as $key => $mail )
//            {
//                if ( isset( $newMails[ $key ] ) )
//                {
//                    $newMails[ $key ]->protocol_ids =
//                        array_merge( $mail->protocol_ids, $newMails[ $key ]->protocol_ids );
//                }
//                else
//                {
//                    $newMails[ $key ] = $this->model( 'Mail' )->exchangeArray( $mail );
//                }
//            }
//        }
//
////        prn($newMails);
//        $oldMails = count($newMails)? $this->table('Mail')->find([ 'header.message-id' => array_keys($newMails), 'owner_id' => $user->id()]):[];
//
//        foreach($oldMails as $oldMail)
//        {
//            $newMail = $newMails[$oldMail->header['message-id']];
//            unset($newMails[$oldMail->header['message-id']]);
//            $oldMail->protocol_ids = array_merge( $newMail->protocol_ids, $oldMail->protocol_ids );
//            $this->table('Mail')->save($oldMail);
//        }
//
//        foreach($newMails as $newMail)
//        {
//            $this->trigger('presave',$newMail);
//            $this->table('Mail')->save($newMail);
//            $count++;
//        }
//
//        return $count;
//    }


    public function getSaurlBack($backhash)
    {
        $saurlback = $this->table('SaUrl')->find(array( 'label' => $backhash ));
        if ($saurlback->count() > 0) {
            $saurlback = $saurlback->current()->url;
        } else {
            $saurlback = '/';
        }

        return $saurlback;
    }

    public function getBackUrl()
    {
        $url    = null;
        $_saurl = $this->params()->fromPost('saurl', [ ]);
        if (isset($_saurl[ 'back' ])) {
            $url = $this->getSaurlBack($_saurl[ 'back' ]);
        }

        return $url;
    }

    public function generateLabel()
    {
        $saurl      = $this->model('SaUrl');
        $saurl->url = $this->getRequestUrl();
        $checkurl   = $this->table('SaUrl')->find(array( 'url' => $saurl->url ));
        if ($checkurl->count()) {
            return $checkurl->current()->label;
        } else {
            if (strlen($saurl->url)) {
                $saurl->label = md5($saurl->url);
            }
            $i = 0;
            while (++$i < 6 && $this->table('SaUrl')->find(array( 'label' => $saurl->label ))->count()) {
                $saurl->label = md5($saurl->url.time().(rand() * 10000));
            }
            if ($i >= 6) {
                return '/';
            }
            try {
                $this->table('SaUrl')->save($saurl);
            } catch (\Exception $ex) {
                $saurl->label = '/';
            }

            return $saurl->label;
        }
    }

    public function getRequestUrl()
    {
        return $this->getRequest()->getServer('REQUEST_URI');
    }

    public function SaUrl()
    {
        $saurl = new SaUrl();
        $check = $this->table('SaUrl')->find(array( 'label' => $saurl->label ));
        if ($check->count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function RowsCount($tableId)
    {
        $request           = $this->getRequest();
        $countrows         = $request->getPost('rows', 10);
        $results[ 's' ]    = $request->getPost('s', 0);
        $results[ 'sort' ] = $request->getPost('sort', null);
        $tabletemp         = $this->table('Table')->get($tableId);
        $tabletemp->rows   = $countrows;
        $this->table('Table')->save($tabletemp);
        $results[ 'action' ]    = 'list';
        $results[ 'saurl' ]     = '?back='.$this->generateLabel();
        $results[ 'saurlback' ] = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));

        return $results;
    }

    public function trigger($eventname, $params = [ ])
    {
        return $this->getEventManager()->trigger($eventname, $this, $params);
    }
}
