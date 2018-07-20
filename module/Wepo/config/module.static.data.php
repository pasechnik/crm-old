<?php

return [
    'StaticDataSource' => [
        'system' => [
            'Gender'              => [
                'key'        => 'Gender',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    'Male'   => [ 'title' => 'Male' ],
                    'Female' => [ 'title' => 'Female' ],
                ],
            ],
            'DiscountType'        => [
                'key'        => 'DiscountType',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0 => [ 'title' => '% of Price' ],
                    1 => [ 'title' => 'Direct Price Reduction' ],
                ],
            ],
            'MailSecurity'        => [
                'key'        => 'MailSecurity',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    'ssl' => [ 'title' => 'ssl' ],
                    'tls' => [ 'title' => 'tls' ],
                    // 'none' => ['title'=>'None'],
                ],
            ],
            'ReceiveMailProtocol' => [
                'key'        => 'ReceiveMailProtocol',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    'Imap' => [ 'title' => 'Imap' ],
                    'Pop3' => [ 'title' => 'Pop3' ],
                ],
            ],
            'SendMailProtocol'    => [
                'key'        => 'SendMailProtocol',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    'SMTP' => [ 'title' => 'SMTP' ],
                ],
            ],
        ],
        'custom' => [
            'Status'          => [
                'key'        => 'Status',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                    'const',
                ],
                'options'    => [
                    '5295fdf7c5b9f222acd3c74b' => [
                        'title' => 'New',
                        'const' => 'NEW_'
                    ],
                    '5295fdf7c5b9f222acd3c74c' => [
                        'title' => 'Normal',
                        'const' => 'NORMAL'
                    ],
                    '5295fdf7c5b9f222acd3c74d' => [
                        'title' => 'Converted',
                        'const' => 'CONVERTED'
                    ],
                    '5295fdf7c5b9f222acd3c74e' => [
                        'title' => 'Dead',
                        'const' => 'DEAD'
                    ],
                    '5295fdf7c5b9f222acd3c74f' => [
                        'title' => 'Deleted',
                        'const' => 'DELETED'
                    ],
                    '5295fdf7c5b9f222acd3c750' => [
                        'title' => 'Paid',
                        'const' => 'PAID'
                    ],
                    '54a1717632a9a567791343eb' => [
                        'title' => 'System',
                        'const' => 'SYSTEM'
                    ],
                    '54c90755901e95095cc62665' => [
                        'title' => 'Sending',
                        'const' => 'SENDING'
                    ],
                    '54d096cedd8170a2bbdf7daf' => [
                        'title' => 'Send',
                        'const' => 'SEND'
                    ],
                    '54d096d5dd8170a2bbdf7db0' => [
                        'title' => 'Send error',
                        'const' => 'SENDERROR'
                    ],
                    '54d09645d18120a23bd37db1' => [
                        'title' => 'In Progress',
                        'const' => 'INPROGRESS'
                    ],
                ],
            ],
            'user_status'          => [
                'key'        => 'user_status',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    '1' => [
                        'title' => 'Active',
                    ],
                    '2' => [
                        'title' => 'Disabled',
                    ],
                ],
            ],
            'confirmed'          => [
                'key'        => 'confirmed',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    '1' => [
                        'title' => 'Confirmed',
                    ],
                    '2' => [
                        'title' => 'Not Confirmed',
                    ],
                ],
            ],
            'CardStatus'          => [
                'key'        => 'CardStatus',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    '1' => [
                        'title' => 'Primary Card',
                    ],
                    '2' => [
                        'title' => 'Secondary Card',
                    ],
                ],
            ],
            'Role'            => [
                'key'        => 'Role',
                'attributes' => [ 'select_field' => 'title' ],
                'fields'     => [ 'title', 'const' ],
                'options'    => [
//                    '5295fdf7c5b9f222acd3c403' => [
//                        'title' => 'guest',
//                        'role'  => 'guest',
//                        'const' => 'GUEST'
//                    ],
                    '5295fdf7c5b9f222acd3c404' => [
                        'title' => 'user',
                        'role'  => 'user',
                        'const' => 'USER'
                    ],
                    '5295fdf7c5b9f222acd3c405' => [
                        'title' => 'admin',
                        'role'  => 'admin',
                        'const' => 'ADMIN'
                    ],
                    '5295fdf7c5b9f222acd3c406' => [
                        'title' => 'senior',
                        'role'  => 'senior',
                        'const' => 'SENIOR'
                    ],
                ],
            ],
            'LeadSource'      => [
                'key'        => 'LeadSource',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0  => [ 'title' => 'None' ],
                    1  => [ 'title' => 'Advertisement' ],
                    2  => [ 'title' => 'Cold Call' ],
                    3  => [ 'title' => 'Employee Referral' ],
                    4  => [ 'title' => 'External Referral' ],
                    5  => [ 'title' => 'OnlineStore' ],
                    6  => [ 'title' => 'Partner' ],
                    7  => [ 'title' => 'Public Relations' ],
                    8  => [ 'title' => 'Sales Mail Alias' ],
                    9  => [ 'title' => 'Seminar Partner' ],
                    10 => [ 'title' => 'Seminar-Internal' ],
                    11 => [ 'title' => 'Trade Show' ],
                    12 => [ 'title' => 'Web Download' ],
                    13 => [ 'title' => 'Web Research' ],
                    14 => [ 'title' => 'www.hcg1.com' ],
                    15 => [ 'title' => 'www.texas.hgh1.com' ],
                    16 => [ 'title' => 'www.hght.com' ],
                    17 => [ 'title' => 'www.hgh1.com' ],
                    18 => [ 'title' => 'www.hghinjections.com' ],
                    19 => [ 'title' => 'Professor Mark' ],
                    20 => [ 'title' => 'Chat' ],
                ],
            ],
            'LeadStatus'      => [
                'key'        => 'LeadStatus',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0  => [ 'title' => 'None' ],
                    1  => [ 'title' => 'Attempted to Contact' ],
                    2  => [ 'title' => 'Contact in Future' ],
                    3  => [ 'title' => 'Contacted' ],
                    4  => [ 'title' => 'Junk Lead' ],
                    5  => [ 'title' => 'Lost Lead' ],
                    6  => [ 'title' => 'Not Contacted' ],
                    7  => [ 'title' => 'Pre Qualified' ],
                    8  => [ 'title' => 'Waiting for Lab Reults' ],
                    9  => [ 'title' => 'Waiting fo Physical' ],
                    10 => [ 'title' => 'Awaiting Physician Approval' ],
                    11 => [ 'title' => 'Need Medical History Form' ],
                    12 => [ 'title' => 'Hot Lead' ],
                    13 => [ 'title' => 'Ready to Close' ],
                    14 => [ 'title' => 'Closed' ],
                ],
            ],
            'CardType'        => [
                'key'        => 'CardType',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0 => [ 'title' => 'None' ],
                    1 => [ 'title' => 'Visa' ],
                    2 => [ 'title' => 'MasterCard' ],
                    3 => [ 'title' => 'American Express' ],
                    4 => [ 'title' => 'Discover' ],
                ],
            ],
            'PaymentOption'   => [
                'key'        => 'PaymentOption',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'options'    => [
                    0 => [ 'title' => 'Primary Credit Card' ],
                    1 => [ 'title' => 'Secondary Credit Card' ],
                    2 => [ 'title' => 'Both Credit Cards' ],
                ],
            ],
            'ProductCategory' => [
                'key'        => 'ProductCategory',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0 => [ 'title' => 'None' ],
                    1 => [ 'title' => 'Commercial Products' ],
                    2 => [ 'title' => 'Injectables' ],
                    3 => [ 'title' => 'Compounded Capsules' ],
                    4 => [ 'title' => 'Shipping Prices' ],
                    5 => [ 'title' => 'Commercial HgH' ],
                    6 => [ 'title' => 'Compounded Creams' ],
                    7 => [ 'title' => 'Supplies' ],
                    8 => [ 'title' => 'Services' ],
                    9 => [ 'title' => 'Tablet' ],
                   10 => [ 'title' => 'Lab Panels' ],
                ],
            ],
            'UsageUnit'       => [
                'key'        => 'UsageUnit',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0  => [ 'title' => 'None' ],
                    1  => [ 'title' => 'per box' ],
                    2  => [ 'title' => 'per unit' ],
                    3  => [ 'title' => 'per tablet' ],
                    4  => [ 'title' => 'per vial' ],
                    5  => [ 'title' => 'per capsule' ],
                    6  => [ 'title' => 'per troche' ],
                    7  => [ 'title' => 'per 5 ml' ],
                    8  => [ 'title' => 'per 30' ],
                    9  => [ 'title' => 'per 30 ml' ],
                   10  => [ 'title' => 'per 60 ' ],
                   11  => [ 'title' => 'per 60 gm' ],
                   12  => [ 'title' => 'per 60 ml' ],
                   13  => [ 'title' => 'per 60 gm/ml' ],
                   14  => [ 'title' => 'per 100' ],
                   15  => [ 'title' => 'per gr' ],
                   16  => [ 'title' => 'per ml' ],
                ],
            ],
            'ActivityType'    => [
                'key'        => 'ActivityType',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0 => [ 'title' => 'Call to Lead' ],
                    1 => [ 'title' => 'Call to Patient' ],
                    2 => [ 'title' => 'Task to Lead' ],
                    3 => [ 'title' => 'Task to Patient' ],
                    4 => [ 'title' => 'Event to Lead' ],
                    5 => [ 'title' => 'Event to Patient' ],
                ],
            ],
            'Priority'        => [
                'key'        => 'Priority',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0 => [ 'title' => 'Low' ],
                    1 => [ 'title' => 'Medium' ],
                    2 => [ 'title' => 'High' ]
                ],
            ],
            'CallType'        => [
                'key'        => 'CallType',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0 => [ 'title' => 'Inbound' ],
                    1 => [ 'title' => 'Outbound' ],
                ],
            ],
            'CallPurpose'     => [
                'key'        => 'CallPurpose',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0 => [ 'title' => 'None' ],
                    1 => [ 'title' => 'Prospecting' ],
                    2 => [ 'title' => 'Administrative' ],
                    3 => [ 'title' => 'Negotiation' ],
                    4 => [ 'title' => 'Demo' ],
                    5 => [ 'title' => 'Project' ],
                    6 => [ 'title' => 'Support' ],
                ],
            ],
            'ModelList'          => [
                'key'        => 'ModelList',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0 => [
                        'title' => 'order',
                    ],
                    1 => [
                        'title' => 'quote',
                    ],
                    2 =>[
                        'title' => 'lead',
                    ],
                    3 =>[
                        'title' => 'patient',
                    ],
                ],
            ],
            'QuoteStage'       => [
                'key'        => 'QuoteStage',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0  => [ 'title' => 'Draft' ],
                    1  => [ 'title' => 'Negotiation' ],
                    2  => [ 'title' => 'Delivered' ],
                    3  => [ 'title' => 'On Hold' ],
                    4  => [ 'title' => 'Confirmed' ],
                    5  => [ 'title' => 'Closed Won' ],
                    6  => [ 'title' => 'Closed Lost' ],
                ],
            ],
            'OrderStatus'       => [
                'key'        => 'OrderStatus',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0  => [ 'title' => 'None' ],
                    1  => [ 'title' => 'Created' ],
                    2  => [ 'title' => 'Approved' ],
                    3  => [ 'title' => 'Delivered' ],
                    4  => [ 'title' => 'Cancelled' ],
                    5  => [ 'title' => 'Paid' ],
                    6  => [ 'title' => 'Declined' ],
                    7  => [ 'title' => 'Signature' ],
                    8  => [ 'title' => 'Pending cc' ],
                    9  => [ 'title' => 'Pending MR' ],
                   10  => [ 'title' => 'Processing  PH' ],
                   11  => [ 'title' => 'Shipped ' ],
                ],
            ],
            'Carrier'       => [
                'key'        => 'Carrier',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0  => [ 'title' => 'FedEX' ],
                    1  => [ 'title' => 'UPS' ],
                    2  => [ 'title' => 'USPS' ],
                    3  => [ 'title' => 'DHL' ],
                    4  => [ 'title' => 'BlueDart' ],
                ],
            ],
            'RefillNumber'       => [
                'key'        => 'RefillNumber',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0  => [ 'title' => '0' ],
                    1  => [ 'title' => '1' ],
                    2  => [ 'title' => 'None' ],
                ],
            ],
            'doc_type'       => [
                'key'        => 'doc_type',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0  => [ 'title' => 'Program' ],
                    1  => [ 'title' => 'Labwork' ],
                    2  => [ 'title' => 'Both' ],
                ],
            ],
            'asap'       => [
                'key'        => 'asap',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0  => [ 'title' => 'None' ],
                    1  => [ 'title' => 'Yes' ],
                    2  => [ 'title' => 'No' ],
                ],
            ],
            'empty'       => [
                'key'        => 'empty',
                'attributes' => [
                    'select_field' => 'title',
                ],
                'fields'     => [
                    'title',
                ],
                'options'    => [
                    0 => [ 'title' => 'None' ]
                ],
            ]
        ],
    ],
];
