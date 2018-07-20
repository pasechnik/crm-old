<?php

namespace Wepo\Controller;

use Wepo\Lib\WepoController;
use Zend\EventManager\EventManagerInterface;

class ProfileController extends WepoController
{
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $dm = $this->getServiceLocator()->get('ModelFramework\LogicService');
        $eventManager->attach('passwordChange', array( $dm, 'dispatch' ), 100);

        return parent::setEventManager($eventManager);
    }

    public function passwordAction()
    {
        $permission        = $this->getPermission('data:User');
        $results[ 'user' ] = $this->user();
        $form              = $this->form('NewpassForm');
        $form->getFieldsets()[ 'button' ]
            ->get('submit')
            ->setValue('Change');
        $form
            ->setAttribute('action', $this->url()->fromRoute('profile', array( 'action' => 'password' )));
        $request           = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $newdata = $form->getData()[ 'pwd' ];
                if ($newdata[ 'newpass' ] != $newdata[ 'newpass2' ]) {
                    $results[ 'message' ] = 'New passwords not equal. Try again';
                } else {
                    try {
                        if (md5($newdata[ 'password' ]) === $this->user()->password) {
                            $this->user()->password = md5($newdata[ 'newpass' ]);
                            try {
                                $this->table('User')->save($this->user());
                            } catch (\Exception $ex) {
                                $results[ 'message' ] = 'Invalid input data.'.$ex->getMessage();
                            }
                            $this->trigger('passwordChange', $this->user());
                            if (!isset($results[ 'message' ]) || !strlen($results[ 'message' ])) {
                                return $this->refresh('Your password was successfully changed '.$this->user()->login, $this->url()->fromRoute('dashboard'));
                            }
                        } else {
                            $results[ 'message' ] = 'Current password is invalid';
                        }
                    } catch (\Exception $ex) {
                        $results[ 'message' ] = 'There was an error with your Password check. Please try again.';
                    }
                }
            }
        }
        $form->getFieldsets()['button']->remove('submit_and_new');
        $form->prepare();
        $results[ 'permission' ] = $permission;
        $results[ 'saurlback' ]  = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));
        $results[ 'form' ]       = $form;

        return $results;
    }
}
