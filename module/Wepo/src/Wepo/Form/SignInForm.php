<?php

namespace Wepo\Form;

use Wepo\Lib\WepoForm;

class SignInForm extends WepoForm
{
    protected $filter;

    public function __construct()
    {
        parent::__construct('form');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'validate');
//        $this -> setAttribute('onsubmit','return checkCredentials()');
//        $this -> add( array(
//            'name' => 'login',
//            'attributes' => array(
//                'type' => 'email',
//            ),
//            'attributes' => array(
//                'id' => 'wepologin',
//                'required'=>true,
//                'placeholder'=>'Username',
//                'class'=>'placehold',
//                ),
//            'options' => array(
//             //   'label' => 'Login',
//             //   'label_attributes' => array(
//                  //  'class' => 'required',
//               // ),
//            ),
////        ) );
//        $this -> add( array(
//            'name' => 'password',
//            'attributes' => array(
//                'type' => 'password',
//            ),
//            'attributes' => array(
//                'id' => 'wepopassword',
//                'required'=>true,
//                'placeholder'=>'**********',
//                'class'=>'placehold',
//                'type'=>'password',
//            ),
//            'options' => array(
//              //  'label' => 'Password',
//              //  'label_attributes' => array(
//                  //  'class' => 'required'
//                ),
//           // ),
//        ) );
//         $this -> add( array(
//            'name'       => 'submit',
//            'type'       => 'Submit',
//            'attributes' => array(
//                'value' => 'Sign in',
//                'id'    => 'weposubmit',
//            ),
//        ) );
//        $this -> add( array(
//            'type' => 'Wepo\Form\ButtonFieldset',
//            'name' => 'top_right_buttons',
//        ) );
        $this->add(array(
            'type' => 'Wepo\Form\SigninFieldset',
            'options' => array(
                'use_as_base_fieldset' => true,
            ),
        ));
        $this->add(array(
            'type' => 'Wepo\Form\ButtonFieldset',
            'name' => 'buttons',
        ));
        $this->setValidationGroup(array(
            'fields' => array(
                'login',
                'password',
            ),
        ));
    }
}
