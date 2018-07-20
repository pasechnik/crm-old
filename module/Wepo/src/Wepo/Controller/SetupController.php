<?php

namespace Wepo\Controller;

use Wepo\Lib\WepoController;

class SetupController extends WepoController
{
    public function indexAction()
    {
        return $this->redirect()->toRoute('setup', array( 'action' => 'list' ));
    }

    public function listAction()
    {
        $results                = [ ];
        $results[ 'user' ]      = $this->user();
        $results[ 'saurl' ]     = '?back='.$this->generateLabel();
        $results[ 'saurlback' ] = $this->table('SaUrl')->find(array( 'label' => $this->params()->fromQuery('back', 'home') ));
        if ($results[ 'saurlback' ]->count() > 0) {
            $results[ 'saurlback' ] = $results[ 'saurlback' ]->current()->url;
        } else {
            $results[ 'saurlback' ] = '/';
        }

        return $results;
    }

    public function viewAction()
    {
        $tableid               = (string) $this->params()->fromRoute('table', 0);
        $results[ 'user' ]     = $this->user();
        $results[ 'action' ]   = $this->table("Table")->get($tableid)->table;
        $results[ 'rows' ]     = $this->table("Field")->find(array( 'table_id' => $tableid, 'target' => 'list' ), array( 'order' => 'asc' ));
        $results[ 'table_id' ] = $tableid;
        if ($results[ 'action' ] == 'activity') {
            $results[ 'action' ] = 'activities';
        }
        $results[ 'params' ][ 'action' ] = 'view';
        $results[ 'saurl' ]              = '?back='.$this->generateLabel();
        $results[ 'saurlback' ]          = $this->table('SaUrl')->find(array( 'label' => $this->params()->fromQuery('back', 'home') ));
        if ($results[ 'saurlback' ]->count() > 0) {
            $results[ 'saurlback' ] = $results[ 'saurlback' ]->current()->url;
        } else {
            $results[ 'saurlback' ] = '/';
        }
        $results[ 'back' ] = '';
        if ($this->params()->fromQuery('back', null) !== null) {
            $results[ 'back' ] = '?back='.$this->params()->fromQuery('back', 'home');
        }
        $results [ 'permission' ] = 1;

        return $results;
    }

    public function saveAction()
    {
        $msg     = 'SAVED';
        $url     = $this->getSaurlBack($this->params()->fromQuery('back', 'home'));
        $request = $this->getRequest();
        if ($request->isPost()) {
            $_rows = $this->params()->fromPost('row');

            if (is_array($_rows)) {
                $anyVisible = false;
                foreach ($_rows as $_k => $_row) {
                    if (empty($_row[ 'visible' ])) {
                        $_rows[ $_k ][ 'visible' ] = 0;
                    } else {
                        $anyVisible = true;
                    }
                }
                if ($anyVisible) {
                    foreach ($_rows as $_row) {
                        try {
                            $field = $this->table("Field")->get($_row[ 'id' ]);
                            $field->merge($_row);
                            $this->table("Field")->save($field);
                        } catch (\Exception $ex) {
                            return $this->refresh($ex->getMessage(), $url);
                        }
                    }
                }
            }

            return $this->refresh($msg, $url);
        }
    }
}
