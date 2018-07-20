<?php

return [
    'fieldTypes' => [
        'text_editor'      => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'textarea',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 500,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name'  => 'field',
                    'type'  => 'textarea',
                    'id'    => 'edit_text',
                    'class' => '',
                ],
                'options'    => [
                    'label' => 'Label',
                ],
            ],
        ],
        'text'          => [
            'field'   => [
                'type'      => 'field',
                'fieldtype' => 'text',
                'datatype'  => 'string',
                'default'   => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 0,
                            'max'      => 100,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name'  => 'field',
                    'type'  => 'text',
                    'class' => '',
                ],
                'options'    => [
                    'label'            => 'Label',
                    'label_attributes' => ['class' => 'Label'],
                ],
            ],
        ],
        'password'      => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'password',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 3,
                            'max'      => 100,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name'  => 'field',
                    'type'  => 'password',
                    'class' => '',
                ],
                'options'    => [
                    'label'            => 'Label',
                    'label_attributes' => ['class' => 'Label'],
                ],
            ],
        ],
        'hidden'      => [
            'field'   => [
                'type'      => 'field',
                'fieldtype' => 'hidden',
                'datatype'  => 'string',
                'default'   => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 3,
                            'max'      => 3000,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name'  => 'field',
                    'type'  => 'hidden',
                    'class' => '',
                ],
                'options'    => [
                    'label'            => 'Label',
                    'label_attributes' => ['class' => 'Label'],
                ],
            ],
        ],
        'checkbox'      => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'checkbox',
                'datatype' => 'string',
                'default'  => 'false',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 3,
                            'max'      => 100,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'    => 'Zend\\Form\\Element\\Checkbox',
                'name'    => 'field',
                'class'   => '',
                'options' => [
                    'label'            => 'Label',
                    'label_attributes' => ['class' => 'Label'],
                    'checked_value'    => 'true',
                    'unchecked_value'  => 'false',
                ],
            ],
        ],
        'array'         => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'array',
                'datatype' => 'array',
                'default'  => [],
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 500,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name'  => 'field',
                    'type'  => 'textarea',
                    'class' => '',
                ],
                'options'    => [
                    'label' => 'Label',
                ],
            ],
        ],
        'textarea'      => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'textarea',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 3000,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name'  => 'field',
                    'type'  => 'textarea',
                    'class' => '',
                ],
                'options'    => [
                    'label' => 'Label',
                ],
            ],
        ],
        'htmltext'      => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'textarea',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                ],
                'validators' => [
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name'  => 'field',
                    'type'  => 'textarea',
                    'class' => 'htmltext',
                ],
                'options'    => [
                    'label' => 'Label',
                ],
            ],
        ],
        'integer'       => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'integer',
                'datatype' => 'int',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'     => 'field',
                'required' => false,
                'filters'  => [['name' => 'Int']],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name'  => 'field',
                    'type'  => 'text',
                    'class' => '',
                ],
                'options'    => [
                    'label_attributes' => ['class' => 'required'],
                    'label'            => 'Label',
                ],
            ],
        ],
        'date'          => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'date',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 10,
                            'max'      => 20,
                        ],
                    ],
                    [
                        'name'    => 'Date',
                        'options' => ['format' => 'Y-m-d']
                    ],
                    [
                        'name'    => 'Between',
                        'options' => [
                            'min' => '1940-01-01',
                            'max' => '2114-01-24',
                        ]
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name' => 'birth_date',
                    'type' => 'date',
                    'min'  => '1940-01-01',
                    'max'  => '2244-01-29',
                ],
                'options'    => ['label' => 'Label'],
            ],
        ],
        'month'          => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'month',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'max'      => 20,
                        ],
                    ],
                    [
                        'name'    => 'Date',
                        'options' => ['format' => 'Y-m']
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name' => 'field',
                    'type' => 'month',
                ],
                'options'    => ['label' => 'Label'],
            ],
        ],
        'datetime'      => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'datetime',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 5,
                            'max'      => 20,
                        ],
                    ],
                    //                    [
                    //                        'name'    => 'Date',
                    //                        'options' => [ 'format' => "d.m.Y H:i" ]
                    //                    ],
                    [
                        'name'    => 'Between',
                        'options' => [
                            'min' => '1940-01-01 00:00:00',
                            'max' => '2114-01-24 00:00:00',
                        ]
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element\\DateTimeLocal',
                'attributes' => [
                    'type' => 'datetime-local',
                    'name' => 'call_start_dtm',
                ],
                'options'    => ['label' => 'Start call'],
            ],
        ],
        'email'         => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'email',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [
                'email_id' => [
                    'type'     => 'field',
                    'fieldtype' => 'source',
                    'datatype' => 'string',
                    'default'  => 0,
                    'label'    => '',
                    'source'   => '',
                ],
            ],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 3,
                            'max'      => 100,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name' => 'login',
                    'type' => 'text',
                ],
                'options'    => [
                    'label' => 'Account Name',
                ],
            ],
        ],
        'login'         => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'email',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [
                'login_id' => [
                    'type'     => 'field',
                    'fieldtype' => 'source',
                    'datatype' => 'string',
                    'default'  => 0,
                    'label'    => '',
                    'source'   => '',
                ],
            ],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 3,
                            'max'      => 100,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name' => 'login',
                    'type' => 'text',
                ],
                'options'    => [
                    'label' => 'Account Name',
                ],
            ],
        ],
        'phone'         => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'phone',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 7,
                            'max'      => 100,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name' => 'phone',
                    'type' => 'text',
                ],
                'options'    => [
                    'label' => 'Phone',
                ],
            ],
        ],
        'lookup'        => [
            'field'   => [
                'type'     => 'source',
                'fieldtype' => 'lookup',
                'datatype' => 'string',
                'default'  => '',
                'alias'    => 'lookup',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\Form\Element\Select',
                'name'       => 'field',
                'attributes' => [
                    'id' => 'field',
                ],
                'options'    => [
                    'label'         => 'Field',
                    'value_options' => ['' => 'Please select ... '],
                ],
            ],
        ],
        'jlookup'        => [
            'field'   => [
                'type'     => 'source',
                'fieldtype' => 'lookup',
                'datatype' => 'string',
                'default'  => '',
                'alias'    => 'lookup',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\Form\Element\Select',
                'name'       => 'field',
                'attributes' => [
                    'id' => 'field',
                ],
                'options'    => [
                    'label'         => 'Field',
                    'value_options' => ['' => 'Please select ... '],
                ],
            ],
        ],
        'file'          => [
            'field'   => [
                'type'     => 'field',
                'fieldtype' => 'file',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
//            'filter'  => [
//                'name'       => 'field',
//                'required'   => false,
//                'validators' => [
////                    [
////                        'name'    => 'StringLength',
////                        'options' => [
////                            'encoding' => 'UTF-8',
////                            'min'      => 0,
////                            'max'      => 100,
////                        ],
//                ],
//            ],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'validators' => [
                    [
                        'name'    => 'Zend\Validator\File\UploadFile',
                    ],
                ],
            ],
            'element' => [
                "type"       => "Zend\\Form\\Element\\File",
                "name"       => "field",
                "attributes" => [
                    'id' => "field",
                ],
                "options"    => [
                    "label" => "field",
                ],
            ],
        ],
        'static_lookup' => [
            'field'   => [
                'type'     => 'source',
                'fieldtype' => 'static_lookup',
                'datatype' => 'string',
                'default'  => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\Form\Element\Select',
                'name'       => 'field',
                'attributes' => [
                    'id' => 'field',
                ],
                'options'    => [
                    'label'         => 'Field',
                    'value_options' => ['' => 'Please select ... '],
                ],
            ],
        ],
        'credit_card'          => [
            'field'   => [
                'type'      => 'field',
                'fieldtype' => 'text',
                'datatype'  => 'string',
                'default'   => '',
            ],
            'utility' => [],
            'filter'  => [
                'name'       => 'field',
                'required'   => false,
                'filters'    => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'Zend\Validator\CreditCard',
//                        'options' => [
//                            'type' => Zend\Validator\CreditCard::AMERICAN_EXPRESS
//                        ],
                    ],
                ],
            ],
            'element' => [
                'type'       => 'Zend\\Form\\Element',
                'attributes' => [
                    'name'  => 'field',
                    'type'  => 'text',
                    'class' => '',
                ],
                'options'    => [
                    'label'            => 'Label',
                    'label_attributes' => ['class' => 'Label'],
                ],
            ],
        ],
    ],
];
