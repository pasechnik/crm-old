<?php

namespace Wepo\Lib;

use Zend\Session\Container; // Use the session with Zend libraries
use Wepo\Model\User;
use Wepo\Model\MainUser;
use Wepo\Model\Role;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\AclInterface;

/**
 * Description of AuthService
 *
 * @author PROG-3
 */
class AuthService implements AclInterface
{
    const NONE = 0;
    const ALL  = 1;
    const OWN  = 2;

    private $_acl = null;
    private $_serviceManager = null;
    private $_mainUser = null;
    private $_user = null;
    private $_role = null;
    private $_session = null;
    private $_transport = null;

    public function hasResource($resource)
    {
        return true;
    }

    public function __construct(\Zend\ServiceManager\ServiceManager $serviceManager)
    {
        $this->_session        = new Container('auth');
        $this->_serviceManager = $serviceManager;
        $this->_transport      = $serviceManager->get('Wepo\Lib\GatewayService');
        $this->_user           = $this->_transport->getModel('User');
        $this->_mainUser       = $this->_transport->getModel('MainUser');
        $this->_role           = $this->_transport->getModel('Role');

        $this->_role->exchangeArray([ 'id' => Role::GUEST, 'role' => Role::GUESTNAME ]);
        $this->checkAuth();
    }

    public function setAcl(Acl $acl)
    {
        $this->_acl = $acl;

        return $this;
    }

    public function setUser(User $user)
    {
        $this->_user = $user;
        if ($user !== null && $user instanceof WepoModel) {
            $this->_session->offsetSet('user_id', $user->_id);
        } else {
            $this->_session->offsetSet('user_id', 0);
        }

        return $this;
    }

    public function setMainUser(MainUser $mainUser)
    {
        $this->_mainUser = $mainUser;
        if ($mainUser !== null && $mainUser instanceof WepoModel) {
            $this->_session->offsetSet('main_user_id', $mainUser->_id);
        } else {
            $this->_session->offsetSet('main_user_id', 0);
        }

        return $this;
    }

    public function initAcl($rules)
    {
        $this->_acl = new Acl();
        foreach ($rules[ 'roles' ] as $role => $extends) {
            if (is_int($role) && is_string($extends)) {
                $role    = $extends;
                $extends = null;
            }
            $this->_acl->addRole(new \Zend\Permissions\Acl\Role\GenericRole($role), $extends);
            //var_dump('addRole('.var_export($role, true).', '.var_export($extends, true));
        }
        //var_dump($rules['allows']);
        foreach ($rules[ 'allows' ] as $role => $allow) {
            foreach ($allow as $controller => $actions) {
                if (is_int($controller) && is_string($actions)) {
                    $controller = $actions;
                    $actions    = null;
                }
                if (!$this->_acl->hasResource($controller)) {
                    $this->_acl->addResource(new \Zend\Permissions\Acl\Resource\GenericResource($controller));
                }
                $this->_acl->allow($role, $controller, $actions);
                //var_dump('allow('.var_export($role, true).', '.var_export($controller, true).', '.var_export($actions, true));
            }
        }

        foreach ($rules[ 'dataAccess' ] as $role => $dataAllow) {
            foreach ($dataAllow as $dataType => $mode) {
                if (!$this->_acl->hasResource($dataType)) {
                    $this->_acl->addResource($dataType);
                }

                $this->_acl->allow($role, $dataType, $mode);
            }
        }
    }

    private function checkAuth()
    {
        //If the session does not exist
        if (
            isset($this->_session->main_user_id) && $this->_session->main_user_id
        ) {
            // at the beginning of this variable is equal to zero


            try {
                $this->_mainUser = $this->_transport->getGateway('MainUser')->get($this->_session->main_user_id);

                $company = $this->_transport->getGateway('MainCompany')->get($this->_mainUser->company_id);

                $dbs = $this->_transport->getGateway('MainDb')->find([ 'company_id' => $company->_id ]);

                if ($dbs->count() > 0) {
                    $db         = $dbs->current();
                    $connection = $this->_serviceManager->get('wepo_company')->getDriver()->getConnection();
                    $connection->setConnectionParameters($db->getParamsArray());
                    $this->_user =
                        $this->_transport->getGateway('User')->find([ 'main_id' => $this->_mainUser->_id ])
                                         ->current();
                    if ($this->_user == null) {
                        throw new \Exception('Can\'t find appropriate user ');
                    }
                    $this->_role = $this->_transport->getGateway('Role')->get($this->_user->role_id);

                    if (strlen($this->_user->theme)) {
                        $config = $this->_serviceManager->get('Config');
                        if (is_array($config) && isset($config[ 'view_manager' ])) {
                            $config = $config[ 'view_manager' ];
                            if (is_array($config) && isset($config[ 'template_path_stack' ])) {
                                $config[ 'template_path_stack' ][ 'wepo' ] =
                                    __DIR__.'/../../../../../../module/Wepo/themes/'.$this->_user->theme;

                                $config[ 'template_path_stack' ]['partial'] =
                                    __DIR__.'/../../../../../../module/Wepo/themes/'.$this->_user->theme.'/wepo';
                                $config[ 'template_path_stack' ][ 'wepopdf' ] =
                                    __DIR__.'/../../../../../../module/Wepo/themes/'.$this->_user->theme.'/pdf';

                                $config[ 'template_path_stack' ]['partialpdf'] =
                                    __DIR__.'/../../../../../../module/Wepo/themes/'.$this->_user->theme.'/pdf/wepo';

//                                    __DIR__ . '/../themes/view/wepo',
                            }

//                        prn(__DIR__ . '/../../../view/' . 'wepo1', $config[ 'template_path_stack' ]['wepo']);

                            $zZfcTwigLoaderTemplatePathStack =
                                $this->_serviceManager->get('ZfcTwigLoaderTemplatePathStack');
                            $paths                           = $zZfcTwigLoaderTemplatePathStack->getPaths();
                            $zZfcTwigLoaderTemplatePathStack->setPaths($config[ 'template_path_stack' ]);
//                        prn($zZfcTwigLoaderTemplatePathStack, $paths );
                        }
                    }

                    // 1:'zfctwigtwigstackloader' 2:'ZfcTwigLoaderTemplatePathStack'
                } else {
                    throw new \Exception('Could not connect to db');
                }
            } catch (\Exception $ex) {
                $this->_session->offsetSet('main_user_id', 0);
                throw new \Exception($ex->getMessage());
            }
        }
    }

    public function isGranted($resource = null, $privilege = null)
    {
        return $this->_acl->isAllowed($this->getRole(), $resource, $privilege);
    }

    public function isAllowed($role = null, $resource = null, $privilege = null)
    {
        return $this->_acl->isAllowed($role, $resource, $privilege);
    }

    public function getPermission($resource)
    {
        if (null === $this->_acl) {
            return false;
        }
        if (!$this->_acl->hasResource($resource)) {
            return false;
        }
        if (!$this->_acl->hasRole($this->getRole())) {
            return false;
        }
        if ($this->isGranted($resource, 'all')) {
            return self::ALL;
        } elseif ($this->isGranted($resource, 'own')) {
            return self::OWN;
        } else {
            return self::NONE;
        }
    }

    public function getMainUser()
    {
        return $this->_mainUser;
    }

    public function getUser()
    {
        return $this->_user;
    }

    public function getAcl()
    {
        return $this->_acl;
    }

    public function getRole()
    {
        return $this->_role->role;
    }
}
