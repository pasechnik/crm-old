<?php

namespace Wepo\Form;

use Wepo\Lib\WepoFieldset;

class SigninFieldset extends WepoFieldset
{
    public function __construct($name = null)
    {
        parent::__construct('fields');
        $this->setLabel('');
        $this->setAttribute('class', 'table');
        $this->add(array(
            'name' => 'login',
            'attributes' => array(
                'type' => 'email',
            ),
            'attributes' => array(
                'id' => 'wepologin',
                'required' => true,
                'placeholder' => 'Username',
                'class' => 'placehold',
                ),
            'options' => array(
             //   'label' => 'Login',
             //   'label_attributes' => array(
                  //  'class' => 'required',
               // ),
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
            ),
            'attributes' => array(
                'id' => 'wepopassword',
                'required' => true,
                'placeholder' => '**********',
                'class' => 'placehold',
                'type' => 'password',
            ),
            'options' => array(
              //  'label' => 'Password',
              //  'label_attributes' => array(
                  //  'class' => 'required'
                ),
           // ),
        ));
        $this->add(array(
            'name'       => 'sign_in',
            'type'       => 'Submit',
            'attributes' => array(
                'value' => 'Sign in',
                'id'    => 'weposubmit',
            ),
        ));
    }
}
