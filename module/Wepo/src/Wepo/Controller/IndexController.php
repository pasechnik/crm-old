<?php

namespace Wepo\Controller;

use Wepo\Lib\WepoController;
use Zend\InputFilter\InputFilter;
use Zend\EventManager\EventManagerInterface;
use Wepo\Model\Status;

class IndexController extends WepoController
{
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $logicService = $this->getServiceLocator()->get('ModelFramework\LogicService');

        $eventManager->attach('signin', array( $logicService, 'dispatch' ), 100);
        $eventManager->attach('signup', array( $logicService, 'dispatch' ), 100);
        $eventManager->attach('presave', array( $logicService, 'dispatch' ), 100);
        $eventManager->attach('install', array( $logicService, 'dispatch' ), 100);

        return parent::setEventManager($eventManager);
    }

    public function indexAction()
    {
        if (isset($this->user()->id) && $this->user()->id) {
            return $this->redirect()->toRoute('dashboard', array());
        }

        return array( 'user' => $this->user(), 'mainuser' => $this->mainUser() );
    }

    public function listAction()
    {
        if (isset($this->user()->id) && $this->user()->id) {
            return $this->redirect()->toRoute('dashboard', array());
        } else {
            return $this->redirect()->toRoute('home', array());
        }
    }

    public function signinAction()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $login = $this->getRequest()->getPost('login', null);
            $pass = md5($this->getRequest()->getPost('password', null));
            $user = $this->table('MainUser')->find(['login' => $login, 'password' => $pass]);
            if (count($user)) {
                $good_credentials = true;
            } else {
                $good_credentials = false;
            }
            $results = new \Zend\View\Model\JsonModel([ 'good_credentials' => $good_credentials ]);
            $results->setTemplate('/');

            return $results;
        }

        $results = [ ];

        $form = $this->form('SigninForm');

        // $form -> getFieldsets()[ 'buttons' ] -> get( 'submit' ) -> setValue( 'Enter' );
//        $form -> getFieldsets()[ 'top_right_buttons' ] -> get( 'submit' ) -> setValue( 'Enter' );
        $form->setAttribute('action', $this->url()->fromRoute('index', array( 'action' => 'signin' )));

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            $mainUser    = $this->model('MainUser');
//            $inputFilter = new InputFilter();
//            $inputFilter->add( $mainUser->getInputFilter(), 'fields' );
//            $form->setInputFilter( $inputFilter );
            try {
                if ($form->isValid()) {
                    $credentials = array();
                    $_data       = $form->getData();
                    if (isset($_data[ 'fields' ])) {
                        $credentials = $_data[ 'fields' ];
                    }

                    unset($_data);
                    # :FIXME: implement crypt function for all of password staff
                    $credentials [ 'password' ] = md5($credentials [ 'password' ]);
                    $check                      = $this->table('MainUser')->find($credentials);

                    if ($check->count()) {
                        $mainUser = $check->current();

                        if (in_array((string) $mainUser->status_id, [ Status::NEW_, Status::NORMAL ])) {
                            $this->mainUser($mainUser);
                            $this->trigger('signin', $mainUser);

                            return $this->refresh('You have been authorized', $this->url()->fromRoute('dashboard'));
                        } else {
                            $results[ 'message' ] = 'Your account blocked or deleted. Please contact administrator.';
                        }
                    } else {
                        $results[ 'message' ] =
                            'There is an error with your Login/Password combination. Please try again.';
                    }
                } else {
                    $results[ 'message' ] = 'There is an error with your Login/Password combination. Please try again.';
                }
            } catch (\Exception $ex) {
                return $this->refresh('Error', $this->url()->fromRoute('dashboard'));
            }
        }
        $form->prepare();
        $results[ 'form' ]      = $form;
        $results[ 'saurlback' ] = '../';

        return $results;
    }

    public function signoutAction()
    {
        $this->mainUser($this->model('MainUser'));
        $this->User($this->model('User'));

        return $this->refresh('Sign Out', null);
    }

    public function signupAction()
    {
        $results = [ ];
        $form    = $this->form('SignupForm');
        $form->setAttribute('action', $this->url()->fromRoute('index', array( 'action' => 'signup' )));
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            $inputFilter = new InputFilter();
            $mainUser    = $this->model('MainUser');
            $mainCompany = $this->model('MainCompany');
            $inputFilter->add($mainUser->getInputFilter(), 'user');
            $inputFilter->add($mainCompany->getInputFilter(), 'company');
            $form->setInputFilter($inputFilter);
            if ($form->isValid()) {
                $registration_data = $form->getData();
                $mainUser->merge($registration_data[ 'user' ]);
                $mainCompany->merge($registration_data[ 'company' ]);
                $mainUser->postExchange();

                $this->trigger('presave', $mainCompany);
                $this->trigger('install', [ $mainCompany, $mainUser ]);
                $this->trigger('presave', $mainUser);
                $this->trigger('signup', $mainUser);
                if (!isset($results[ 'message' ]) || !strlen($results[ 'message' ])) {
                    return $this->refresh('Your data was successfully added', $this->url()->fromRoute('index'));
                }
            }
        }
        $form->prepare();
        $results[ 'form' ]      = $form;
        $results[ 'saurlback' ] = '../';

        return $results;
    }

    public function resetPasswordAction()
    {
        $form    = $this->form('ResetPassForm');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $request = $request->getPost();
            $user = isset($request['fields']['login']) ? $this->table('MainUser')->findOne(['login' => $request['fields']['login']]) : false;
            if ($user) {
            }

            return $this->refresh('Mail with new password was send to your email. Please check and login with new password', $this->url()->fromRoute('index'), 5);
        }
        $form->prepare();
        $results['form'] = $form;

        return $results;
    }
}
