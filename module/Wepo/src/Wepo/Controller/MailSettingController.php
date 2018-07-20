<?php

namespace Wepo\Controller;

use Wepo\Lib\WepoController;
use Wepo\Model\Table;
use ModelFramework\AuthService\AuthService as Auth;
use Wepo\Model\Status;
//////

class MailSettingController extends WepoController
{
    public function indexAction()
    {
        return $this->redirect()->toRoute('mailsetting', array( 'action' => 'list' ));
    }

    public function listAction()
    {
        //        prn( $this->getListing('MailSetting',['status_id' => [ Status::NEW_, Status::NORMAL ]]));
//        prn( $this->table('MailSetting')->find(['status_id' => [ Status::NEW_, Status::NORMAL ]])->toArray());
//        exit();
        return $this->getListing('MailSetting', ['status_id' => [ Status::NEW_, Status::NORMAL ]]);
    }

    public function removeSettingAction()
    {
    }

    public function addSendAction()
    {
        $permission = $this->getPermission('data:MailSetting');
        $form       = $this->form('MailSendSettingForm');

        $form->setRoute('mailsetting')->setAction('addSend')->setActionParams([ 'id' => null ]);

        $mails = $this->table('MailSendSetting')->fetchAll();

        $mails_user_id = [ ];
        foreach ($mails as $mail) {
            $mails_user_id[] = $mail->user_id;
        }

        if ($permission == Auth::ALL) {
            $form->getFieldsets()[ 'fields' ]->add(array(
                'type'       => 'Zend\Form\Element\Select',
                'name'       => 'user_id',
                'attributes' => array(
                    'id'       => 'owner_id',
                    'required' => 'required',
                    'value'    => $this->user()->id(),
                ),
                'options'    => array(
                    'label_attributes' => array(
                        'class' => 'required',
                    ),
                    'label'            => 'User',
                    'value_options'    => $this->trueTableHash('User', '_id', 'login', ['status_id' => [ Status::NEW_, Status::NORMAL ] ]),
                ),
            ));

            $form->getFieldsets()[ 'fields' ]->add(array(
                'type'       => 'Zend\Form\Element\Select',
                'name'       => 'owner_id',
                'attributes' => array(
                    'id'       => 'iduser',
                    'disabled' => '',
                    'required' => 'required',
                    'value'    => $this->user()->id(),
                ),
                'options'    => array(
                    'label'         => 'Owner',
                    'value_options' => $this->trueTableHash('User', '_id', 'login', ['status_id' => [ Status::NEW_, Status::NORMAL ] ]),
                ),
            ));

            $form->addValidationField('fields', 'user_id');
            $form->addValidationField('fields', 'owner_id');
        }

        $form->getFieldsets()[ 'protocol' ]->get('setting_protocol')->setOptions(
            [
                'value_options' => \Wepo\Model\MailSendSetting::protocolTypes(),
            ]
        );
        $form->getFieldsets()[ 'protocol' ]->get('setting_security')->setOptions(
            [
                'value_options' => \Wepo\Model\MailSendSetting::securityTypes(),
            ]
        );

        return $this->add($form, 'MailSendSetting', $permission);
    }

    public function addReceiveAction()
    {
        $permission = $this->getPermission('data:MailSetting');
        $form       = $this->form('MailReceiveSettingForm');
        $form->setRoute('mailsetting')->setAction('addReceive')->setActionParams([ 'id' => null ]);

        $mails = $this->table('MailReceiveSetting')->fetchAll();

        $mails_user_id = [ ];
        foreach ($mails as $mail) {
            $mails_user_id[] = $mail->user_id;
        }

        if ($permission == Auth::ALL) {
            $form->getFieldsets()[ 'fields' ]->add(array(
                'type'       => 'Zend\Form\Element\Select',
                'name'       => 'user_id',
                'attributes' => array(
                    'id'       => 'owner_id',
                    'required' => 'required',
                    'value'    => $this->user()->id(),
                ),
                'options'    => array(
                    'label_attributes' => array(
                        'class' => 'required',
                    ),
                    'label'            => 'User',
                    'value_options'    => $this->trueTableHash('User', '_id', 'login', ['status_id' => [ Status::NEW_, Status::NORMAL ] ]),
                ),
            ));

            $form->getFieldsets()[ 'fields' ]->add(array(
                'type'       => 'Zend\Form\Element\Select',
                'name'       => 'owner_id',
                'attributes' => array(
                    'id'       => 'iduser',
                    'disabled' => '',
                    'required' => 'required',
                    'value'    => $this->user()->id(),
                ),
                'options'    => array(
                    'label'         => 'Owner',
                    'value_options' => $this->trueTableHash('User', '_id', 'login', ['status_id' => [ Status::NEW_, Status::NORMAL ] ]),
                ),
            ));

            $form->addValidationField('fields', 'user_id');
            $form->addValidationField('fields', 'owner_id');
        }

        $form->getFieldsets()[ 'protocol' ]->get('setting_protocol')->setOptions(
            [
                'value_options' => \Wepo\Model\MailReceiveSetting::protocolTypes(),
            ]
        );
        $form->getFieldsets()[ 'protocol' ]->get('setting_security')->setOptions(
            [
                'value_options' => \Wepo\Model\MailReceiveSetting::securityTypes(),
            ]
        );

        return $this->add($form, 'MailReceiveSetting', $permission);
    }

    public function viewAction()
    {
        $id         = (string) $this->params()->fromRoute('id', 0);
        $type = $this->table('MailSetting')->findOne(['_id' => $id])->type;
        $type = $type == 'Send' ? 'MailSendSetting' : 'MailReceiveSetting';

        return $this->view($type);
    }

    public function editAction()
    {
        $id         = (string) $this->params()->fromRoute('id', 0);
        $type = $this->table('MailSetting')->findOne(['_id' => $id])->type;
        $type = $type == 'Send' ? 'MailSendSetting' : 'MailReceiveSetting';
        $permission = $this->getPermission('data:'.$type);
        $form       = $this->form($type.'Form');
        $form->setRoute('mailsetting')->setAction('edit')->setActionParams([ 'id' => (string) $this->params()->fromRoute('id', 0) ]);

        $model = '\\Wepo\\Model\\'.$type;
        $model = new $model();

        if ($permission == Auth::ALL) {
            $form->getFieldsets()[ 'fields' ]->add(array(
                'type'       => 'Zend\Form\Element\Select',
                'name'       => 'user_id',
                'attributes' => array(
                    'id'       => 'owner_id',
                    'required' => 'required',
                    'value'    => $this->user()->id(),
                ),
                'options'    => array(
                    'label_attributes' => array(
                        'class' => 'required',
                    ),
                    'label'            => 'User',
                    'value_options'    => $this->trueTableHash('User', '_id', 'login', ['status_id' => [ Status::NEW_, Status::NORMAL ] ]),
                ),
            ));

            $form->getFieldsets()[ 'fields' ]->add(array(
                'type'       => 'Zend\Form\Element\Select',
                'name'       => 'owner_id',
                'attributes' => array(
                    'id'       => 'iduser',
                    'disabled' => '',
                    'required' => 'required',
                    'value'    => $this->user()->id(),
                ),
                'options'    => array(
                    'label'         => 'Owner',
                    'value_options' => $this->trueTableHash('User', '_id', 'login', ['status_id' => [ Status::NEW_, Status::NORMAL ] ]),
                ),
            ));

            $form->addValidationField('fields', 'user_id');
            $form->addValidationField('fields', 'owner_id');
        }

        $form->getFieldsets()[ 'protocol' ]->get('setting_protocol')->setOptions(
            [
                'value_options' => $model->protocolTypes(),
            ]
        );
        $form->getFieldsets()[ 'protocol' ]->get('setting_security')->setOptions(
            [
                'value_options' => $model->securityTypes(),
            ]
        );

        if (!$this->getRequest()->isPost()) {
            $model = $this->table($type)->get($form->getActionParams('id'));

            $form->getFieldsets()[ 'protocol' ]->get('setting_protocol')->setValue($model->setting_protocol);
            $form->getFieldsets()[ 'protocol' ]->get('setting_user')->setValue($model->setting_user);
            $form->getFieldsets()[ 'protocol' ]->get('setting_host')->setValue($model->setting_host);
            $form->getFieldsets()[ 'protocol' ]->get('setting_port')->setValue($model->setting_port);
            $form->getFieldsets()[ 'protocol' ]->get('setting_security')->setValue($model->setting_security);
            if ($type == 'MailSendSetting') {
                $form->getFieldsets()[ 'protocol' ]->get('is_default')->setValue($model->is_default);
            }
        }

        return $this->dynedit($form, $type, $permission);
    }

    public function deleteAction()
    {
        return $this->recycle('MailSetting');
    }

    public function cleanAction()
    {
        return $results = $this->recycle('MailSetting');
    }

    public function restoreAction()
    {
        return $results = $this->recycle('MailSetting');
    }

    public function rowscountAction()
    {
        $results = $this->RowsCount(Table::MAIL_SETTING);

        return $this->redirect()->toRoute('mailsetting', $results);
    }

    public function recyclelistAction()
    {
        $permission = $this->getPermission('data:MailSetting');
        try {
            $pagecount = 30;
            $results   = $this->display([ 'owner_id' => $this->user()->id() ], 'MailSetting', Table::MAIL_SETTING, $permission, [ 'status_id' => Status::DELETED ]);
            if ($results[ 'paginator' ]->count() > 0) {
                $results[ 'paginator' ]->setCurrentPageNumber($this->params()->fromRoute('page'))->setItemCountPerPage($pagecount);
                $results[ 'params' ][ 'action' ] = 'recyclelist';
            }
        } catch (\Exception $ex) {
            return $this->refresh('Error', $this->url()->fromRoute('mailsetting'));
        }

        return $results;
    }
}
