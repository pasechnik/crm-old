<?php

namespace Wepo\Lib;

use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GatewayService implements ServiceLocatorAwareInterface
{
    protected $services;
    protected $_models = [ ];
    protected $_modelproto = null;
    protected $_tables = [ ];

    public function __construct()
    {
        //        $this->_modelproto = new WepoModel();
    }

    protected function getConfig($adaptername)
    {
        $sm = $this->services;
        if (!$sm->has($adaptername)) {
            throw new \Exception('Wrong adpater name in '.$adaptername.' model');
        }

        return $sm->get($adaptername)->getDriver()->getConnection()->getConnectionParameters();
    }

    protected function getArrayValue($array, $key, $default = null)
    {
        if (!empty($array[ $key ])) {
            $result = $array[ $key ];
        } else {
            $result = $default;
        }

        return $result;
    }

    protected function getDriverName($name)
    {
        return $this->getArrayValue($config = $this->getConfig($name), 'driver', 'Pdo');
    }

    public function getObjectConfig($modelname, $where, $create = false)
    {
        $gw     = $this->getGateway($modelname);
        $config = $gw->findOne($where);
        if ($config == null) {
            if ($create) {
                $config = clone $gw->getResultSetPrototype()->getArrayObjectPrototype();
            } else {
                throw new \Exception(' Unknown object name ');
            }
        }

        return $config;
    }

    public function getFormConfig($name, $create = false)
    {
        return $this->getObjectConfig('ConfigForm', [ 'name' => $name ], $create);
    }

    public function getModelConfig($name, $create = false)
    {
        return $this->getObjectConfig('ConfigModel', [ 'model' => $name ], $create);
    }

    public function giveMeObject($class_name, $params = null)
    {
        return $this->createObject($class_name, $params);
    }

    protected function createObject($class_name, $params = null)
    {
        if (!class_exists($class_name)) {
            return;
        }

        if ($params === null) {
            return new $class_name();
        }

        if (method_exists($class_name, '__construct') === false) {
            throw new \Exception('Constructor for the class '.$class_name.
                                  ' does not exist, you should not pass arguments to the constructor of this class!');
        }

        $refMethod = new \ReflectionMethod($class_name, '__construct');
        $re_args   = [ ];
        foreach ($refMethod->getParameters() as $param) {
            if (array_key_exists($param->getName(), $params)) {
                if ($param->isPassedByReference()) {
                    $re_args[ $param->getName() ] = &$params[ $param->getName() ];
                } else {
                    $re_args[ $param->getName() ] = $params[ $param->getName() ];
                }
            } elseif ($param->isOptional()) {
                $re_args[ $param->getName() ] = $param->getDefaultValue();
            }
        }

        $refClass = new \ReflectionClass($class_name);

        return $refClass->newInstanceArgs($re_args);
    }

    protected function createModel($modelname)
    {
        $config = $this->getModelConfig($modelname);
        $model  = $this->createObject('\\Wepo\\Lib\\Wepo'.$this->getdrivername($config->adapter).'Model');

        if ($model === null) {
            throw new Exception('Unknown classname \\Wepo\\Lib\\Wepo'.$this->getdrivername($config->adapter).
                                 'Model in '.$config->adapter.' adapter settings');
        }
        $model->parseconfig($config->toArray());
        $model->exchangeArray([ ]);

        return $model;
    }

    public function getModel($modelname)
    {
        $model = $this->createObject('\\Wepo\\Model\\'.$modelname);
        if ($model == null) {
            $model = $this->createModel($modelname);
        }

        return $model;
    }

    public function getGateway($name)
    {
        $model = $this->getModel($name);
        if (!isset($this->_tables[ $name ])) {
            $adapterConfig = $this->getConfig($model->adapterName);
            $gwName        = $this->getArrayValue($adapterConfig, 'gateway', null);
            if ($gwName === null) {
                $gwName = $this->getArrayValue($adapterConfig, 'driver', null);
            }
            if ($gwName === null) {
                throw new \Exception('Unknown gateway');
            }

            // create resultset prototype
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype($model);

            // create custom transport for the model
            $dbAdapter = $this->services->get($model->adapterName);
            $gw        = $this->createObject('\\Wepo\\Model\\Transport\\'.$name,
                                              [ 'table'              => $model->table_name, 'adapter' => $dbAdapter,
                                                'resultSetPrototype' => $resultSetPrototype
                                              ]);
            if ($gw === null) {
                // use general gw class
                $gw = $this->createObject('\\Wepo\\Lib\\Wepo'.$gwName.'Gateway',
                                           [ 'table'              => $model->table_name, 'adapter' => $dbAdapter,
                                             'resultSetPrototype' => $resultSetPrototype
                                           ]);
            }
            $gw->setServiceLocator($this->getServiceLocator());
            $this->_tables[ $name ] = $gw;
        }

        return $this->_tables[ $name ];
    }

    public function getForm($name)
    {
        $form = $this->createObject('\\Wepo\\Form\\'.$name);
        if ($form !== null) {
            //New formOrFieldset save
//            $configForm = new \Wepo\Model\ConfigForm( $form -> getConfig() );
//            $this -> getGateway( 'ConfigForm' ) -> save( $configForm );
        } else {
            $form = $this->createForm($name);
        }

        return $form;
    }

    public function createForm($name)
    {
        $config    = $this->getFormConfig($name, $create = false);
        $fieldsets = [ ];
        foreach ($config->fieldsets as $_k => $_v) {
            $fieldsets[ $_k ] = $this->getForm($_v[ 'type' ]);
        }
        if ($config->type == 'form') {
            $classname = '\\Wepo\\Lib\\WepoForm';
        } elseif ($config->type == 'fieldset') {
            $classname = '\\Wepo\\Lib\\WepoFieldset';
        } else {
            throw new Exception('Config type must be form or fieldset');
        }
        $formOrFieldset = $this->createObject($classname);
        if ($formOrFieldset === null) {
            throw new Exception('Unknown classname '.$classname);
        }
        $formOrFieldset->parseconfig($config, $fieldsets);

        return $formOrFieldset;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->services;
    }

    public function clearTableCache()
    {
        $this->_tables = [ ];
    }
}
