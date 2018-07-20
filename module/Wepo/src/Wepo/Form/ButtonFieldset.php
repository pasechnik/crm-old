<?php

namespace Wepo\Form;

use Wepo\Lib\WepoFieldset;

class ButtonFieldset extends WepoFieldset
{
    public function __construct($name = null)
    {
        parent::__construct('button');
        $this->setAttribute('class', 'buttons');
        $this->add(array(
            'name'       => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Save',
//                'id' => 'save',
                'goto' => 'list',
            ),
            'options' => array(
                'label' => 'save',
            ),
        ));
        $this->add(array(
            'name'       => 'submit_and_new',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Save & New',
//                'id' => 'save_and_new',
                'goto' => 'new_form',
            ),
            'options' => array(
                'label' => 'save_and_new',
            ),
        ));
    }
}
