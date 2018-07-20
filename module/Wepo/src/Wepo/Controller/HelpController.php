<?php

namespace Wepo\Controller;

use Wepo\Lib\WepoController;

class HelpController extends WepoController
{
    public function indexAction()
    {
        //        prn( $this->getServiceLocator()->get('Config') );
//        exit();
        $results  = [];
        $results['user']  = $this->user();

        return $results;
    }

    public function manualAction()
    {
        $results  = [];
        $results['user']  = $this->user();

        return $results;
    }

    public function faqAction()
    {
        $results  = [];
        $results['user']  = $this->user();

        return $results;
    }
}
