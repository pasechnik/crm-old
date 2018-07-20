<?php

return [
    'modellist' => [
        'system' => [
            'email'              => [
                'key'   => 'email',
                'label' => 'Email base',
                'model' => 'Email',
            ],
            'emailtomail'        => [
                'key'   => 'emailtomail',
                'label' => 'Mail link to Email',
                'model' => 'EmailToMail',
            ],
            'acl'                => [
                'key'   => 'acl',
                'label' => 'Acl Configuration',
                'model' => 'Acl',
            ],
            'mainuser'           => [
                'key'   => 'mainuser',
                'label' => 'Main User',
                'model' => 'MainUser',
            ],
            'maincompany'        => [
                'key'   => 'maincompany',
                'label' => 'Main Company',
                'model' => 'MainCompany',
            ],
            'maindb'             => [
                'key'   => 'maindb',
                'label' => 'Main Db',
                'model' => 'MainDb',
            ],
            'user'               => [
                'key'   => 'user',
                'label' => 'User',
                'model' => 'User',
            ],
            'saurl'              => [
                'key'   => 'saurl',
                'label' => 'SaUrl',
                'model' => 'SaUrl',
            ],
            'role'               => [
                'key'   => 'role',
                'label' => 'Role',
                'model' => 'Role',
            ],
            'mail'               => [
                'key'   => 'mail',
                'label' => 'Mail',
                'model' => 'Mail',
            ],
            'mailraw'            => [
                'key'   => 'mailraw',
                'label' => 'Mail Raw',
                'model' => 'MailRaw',
            ],
            'maildetail'         => [
                'key'   => 'maildetail',
                'label' => 'Mail',
                'model' => 'MailDetail',
            ],
            'mailreceivesetting' => [
                'key'   => 'mailreceivesetting',
                'label' => 'Mail receive setting',
                'model' => 'MailReceiveSetting',
            ],
            'mailsendsetting'    => [
                'key'   => 'mailsendsetting',
                'label' => 'Mail send setting',
                'model' => 'MailSendSetting',
            ],
            'status'             => [
                'key'   => 'status',
                'label' => 'Status',
                'model' => 'Status',
            ],
            'eventlog'           => [
                'key'   => 'eventlog',
                'label' => 'Event log',
                'model' => 'EventLog',
            ],
        ],
        'custom' => [
            'cardlead'        => [
                'key'   => 'cardlead',
                'label' => 'Card Lead',
                'model' => 'CardLead',
            ],
            'cardpatient'     => [
                'key'   => 'cardpatient',
                'label' => 'Card Patient',
                'model' => 'CardPatient',
            ],
            'lead'            => [
                'key'   => 'lead',
                'label' => 'Lead',
                'model' => 'Lead',
            ],
            'patient'         => [
                'key'   => 'patient',
                'label' => 'Patient',
                'model' => 'Patient',
            ],
            'account'         => [
                'key'   => 'account',
                'label' => 'Account',
                'model' => 'Account',
            ],
            'doctor'          => [
                'key'   => 'doctor',
                'label' => 'Doctor',
                'model' => 'Doctor',
            ],
            'document'        => [
                'key'   => 'document',
                'label' => 'Document',
                'model' => 'Document',
            ],
            'notelead'        => [
                'key'   => 'notelead',
                'label' => 'Note Lead',
                'model' => 'NoteLead',
            ],
            'notepatient'     => [
                'key'   => 'notepatient',
                'label' => 'Note Patient',
                'model' => 'NotePatient',
            ],
            'product'         => [
                'key'   => 'product',
                'label' => 'Product',
                'model' => 'Product',
            ],
            'pricebook'       => [
                'key'   => 'pricebook',
                'label' => 'Pricebook',
                'model' => 'Pricebook',
            ],
            'pricebookdetail' => [
                'key'   => 'pricebookdetail',
                'label' => 'Pricebook Detail',
                'model' => 'PricebookDetail',
            ],
            'quote'           => [
                'key'   => 'quote',
                'label' => 'Quote',
                'model' => 'Quote',
            ],
            'quotedetail'     => [
                'key'   => 'quotedetail',
                'label' => 'Quote Detail',
                'model' => 'QuoteDetail',
            ],
            'order'           => [
                'key'   => 'order',
                'label' => 'Order',
                'model' => 'Order',
            ],
            'orderdetail'     => [
                'key'   => 'orderdetail',
                'label' => 'Order Detail',
                'model' => 'OrderDetail',
            ],
            'invoice'         => [
                'key'   => 'invoice',
                'label' => 'Invoice',
                'model' => 'Invoice',
            ],
            'invoicedetail'   => [
                'key'   => 'invoicedetail',
                'label' => 'Invoice Detail',
                'model' => 'InvoiceDetail',
            ],
            'activity'        => [
                'key'   => 'activity',
                'label' => 'Activity',
                'model' => 'Activity',
            ],
            'calllead'        => [
                'key'   => 'calllead',
                'label' => 'Call Lead',
                'model' => 'CallLead',
            ],
            'callpatient'     => [
                'key'   => 'callpatient',
                'label' => 'Call Patient',
                'model' => 'CallPatient',
            ],
            'tasklead'        => [
                'key'   => 'tasklead',
                'label' => 'Task Lead',
                'model' => 'TaskLead',
            ],
            'taskpatient'     => [
                'key'   => 'taskpatient',
                'label' => 'Task Patient',
                'model' => 'TaskPatient',
            ],
            'eventlead'       => [
                'key'   => 'eventlead',
                'label' => 'Event Lead',
                'model' => 'EventLead',
            ],
            'eventpatient'    => [
                'key'   => 'eventpatient',
                'label' => 'Event Patient',
                'model' => 'EventPatient',
            ],
            'payment'         => [
                'key'   => 'payment',
                'label' => 'Payment',
                'model' => 'Payment',
            ],
            'vendor'          => [
                'key'   => 'vendor',
                'label' => 'Vendor',
                'model' => 'Vendor',
            ],
            'templatepdf'     => [
                'key'   => 'templatepdf',
                'label' => 'Template pdf',
                'model' => 'TemplatePDF',
            ],
            'templateemail'     => [
                'key'   => 'templateemail',
                'label' => 'Template email',
                'model' => 'TemplateEmail',
            ],
            'templateemailfolder'     => [
                'key'   => 'templateemailfolder',
                'label' => 'Template email Folder',
                'model' => 'TemplateEmailFolder',
            ],
        ]
    ]
];
