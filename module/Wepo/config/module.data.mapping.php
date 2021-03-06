<?php

return [
    'DataMappingConfig' => [
        'system' => [ ],
        'custom' => [
            'Lead'           => [
                'key'     => 'Lead',
                'model'   => 'Lead',
                'targets' => [
                    'Account' => [
                        'model'  => 'Account',
                        'fields' => [
                            // Account Fields
                            'title'         => ':Lead.title',
                            'owner_id'      => ':Lead.owner_id',
                            'owner_title'   => ':Lead.owner_title',
                            'flink'         => ':Lead.flink',
                            'tlink'         => ':Lead.tlink',
                            'llink'         => ':Lead.llink',
                            'glink'         => ':Lead.glink',
                            'name'          => ':Lead.title',
                            'phone'         => ':Lead.phone',
                            'email'         => ':Lead.email',
                            'changer_id'    => ':Lead.changer_id',
                            'changer_title' => ':Lead.changer_title',
                            'state'         => ':Lead.state',
                            'country'       => ':Lead.country',
                            'city'          => ':Lead.city',
                            'address'       => ':Lead.address',
                            'zip'           => ':Lead.zip',
                            'avatar'        => ':Lead.avatar',
                            'changed_dtm'   => ':Lead.changed_dtm',
                            'created_dtm'   => ':Lead.created_dtm',
                            'description'   => ':Lead.description',
                            'status_id'     => ':Lead.status_id',
                            'status_title'  => ':Lead.status_title',
                            // Account Fields
                            /* Lead Fields
                            'fname',
                            'lname',

                            'age',
                            'height',
                            'weight',
                            'gender_id',
                            'gender_title',

                            'sec_email',
                            'lead_status_id',
                            'lead_status_title',
                            'lead_source_id',
                            'lead_source_title',
                            'card_type_id',
                            'card_type_title',
                            'card_number',
                            'sec_code',
                            'exp_date',
                            'website',
                            'mobile',
                            'birth_date',
                            // Lead Fields
                            */
                        ],
                    ],
                    'Patient' => [
                        'model'   => 'Patient',
                        'fields'  => [
                            // Lead2Patient

                            'title'                => ':Lead.title',
                            'owner_id'             => ':Lead.owner_id',
                            'owner_title'          => ':Lead.owner_title',
                            'fname'                => ':Lead.fname',
                            'lname'                => ':Lead.lname',
                            'flink'                => ':Lead.flink',
                            'tlink'                => ':Lead.tlink',
                            'llink'                => ':Lead.llink',
                            'glink'                => ':Lead.glink',
                            'age'                  => ':Lead.age',
                            'height'               => ':Lead.height',
                            'weight'               => ':Lead.weight',
                            'gender_id'            => ':Lead.gender_id',
                            'gender_title'         => ':Lead.gender_title',
                            'sec_email'            => ':Lead.sec_email',
                            'lead_source_id'       => ':Lead.lead_source_id',
                            'lead_source_title'    => ':Lead.lead_source_title',
                            'card_type_id'         => ':Lead.card_type_id',
                            'card_type_title'      => ':Lead.card_type_title',
                            'card_number'          => ':Lead.card_number',
                            'sec_code'             => ':Lead.sec_code',
                            'exp_date'             => ':Lead.exp_date',
                            'state'                => ':Lead.state',
                            'country'              => ':Lead.country',
                            'city'                 => ':Lead.city',
                            'address'              => ':Lead.address',
                            'zip'                  => ':Lead.zip',
                            'state_sh'             => ':Lead.state_sh',
                            'country_sh'           => ':Lead.country_sh',
                            'city_sh'              => ':Lead.city_sh',
                            'address_sh'           => ':Lead.address_sh',
                            'zip_sh'               => ':Lead.zip_sh',
                            'avatar'               => ':Lead.avatar',
                            'website'              => ':Lead.website',
                            'phone'                => ':Lead.phone',
                            'description'          => ':Lead.description',
                            'mobile'               => ':Lead.mobile',
                            'email'                => ':Lead.email',
                            'birth_date'           => ':Lead.birth_date',
                            'changer_id'           => ':Lead.changer_id',
                            'changer_title'        => ':Lead.changer_title',
                            'changed_dtm'          => ':Lead.changed_dtm',
                            'created_dtm'          => ':Lead.created_dtm',
                            'status_id'            => ':Lead.status_id',
                            'status_title'         => ':Lead.status_title',
                            'reassigned'           => ':Lead.reassigned',
                            'email_unsubscr'       => ':Lead.email_unsubscr',
                            /* Patient new fields */
                            'account_id'           => ':Account.id',
                            'account_title'        => ':Account.title',
                            /* Patient empty fields */
                            'social_security'      => '',
                            'driver_license'       => '',
                            'consultant'           => '',
                            'allergies'            => '',
                            'physician_exam'       => '',
                            'last_lab'             => '',
                            'medical_history'      => '',
                            'card_type_2_id'       => '',
                            'card_type_2_title'    => '',
                            'card_number_2'        => '',
                            'sec_code_2'           => '',
                            'exp_date_2'           => '',
                            'payment_option_id'    => '',
                            'payment_option_title' => '',
                            'doctor_id'            => '',
                            'doctor_title'         => '',
                            /*
                                Patient new fields
                            */

                            /* -- Lead
                            'lead_status_id',
                            'lead_status_title',
                             /Lead
                            */
                        ],
                        'related' => [
                            'CardLead'       => [ 'lead_id' => ':Lead.id' ],
                            'NoteLead'       => [ 'lead_id' => ':Lead.id' ],
                            'AttachmentLead' => [ 'lead_id' => ':Lead.id' ],
                            'CallLead'       => [ 'target_id' => ':Lead.id', 'type_id' => '0' ],
                            'TaskLead'       => [ 'target_id' => ':Lead.id', 'type_id' => '2' ],
                            'EventLead'      => [ 'target_id' => ':Lead.id', 'type_id' => '4' ],
                        ],
                    ],
                ],
                'post'    => [
                    'status_id' => \Wepo\Model\Status::CONVERTED,
                ],

            ],
            'AttachmentLead' => [
                'key'     => 'AttachmentLead',
                'model'   => 'Document',
                'targets' => [
                    'Attachment' => [
                        'model'  => 'Document',
                        'fields' => [
                            'document_name'      => ':AttachmentLead.document_name',
                            'description'        => ':AttachmentLead.description',
                            'document'           => ':AttachmentLead.document',
                            'document_real_name' => ':AttachmentLead.document_real_name',
                            'document_extension' => ':AttachmentLead.document_extension',
                            'document_size'      => ':AttachmentLead.document_size',
                            //                            'lead',
                            //                            'attach_to_names',
                            'title'              => ':AttachmentLead.title',
                            'patient_id'         => ':Patient.id',
                            'patient_title'      => ':Patient.title',
                            'changer_id'         => ':AttachmentLead.changer_id',
                            'changer_title'      => ':AttachmentLead.changer_title',
                            'owner_id'           => ':AttachmentLead.owner_id',
                            'owner_title'        => ':AttachmentLead.owner_title',
                            'changed_dtm'        => ':AttachmentLead.changed_dtm',
                            'created_dtm'        => ':AttachmentLead.created_dtm',
                            'status_id'          => ':AttachmentLead.status_id',
                            'status_title'       => ':AttachmentLead.status_title',
                        ],
                    ],
                ],
                'post'    => [
                    'status_id' => \Wepo\Model\Status::CONVERTED,
                ],
            ],
            'CardLead'       => [
                'key'     => 'CardLead',
                'model'   => 'CardLead',
                'targets' => [
                    'CardPatient' => [
                        'model'  => 'CardPatient',
                        'fields' => [
                            'title'           => ':CardLead.title',
                            'patient_id'      => ':Patient.id',
                            'patient_title'   => ':Patient.title',
                            'card_type_id'    => ':CardLead.card_type_id',
                            'card_type_title' => ':CardLead.card_type_title',
                            'card_number'     => ':CardLead.card_number',
                            'sec_code'        => ':CardLead.sec_code',
                            'exp_date'        => ':CardLead.exp_date',
                            'changer_id'      => ':CardLead.changer_id',
                            'changer_title'   => ':CardLead.changer_title',
                            'owner_id'        => ':CardLead.owner_id',
                            'owner_title'     => ':CardLead.owner_title',
                            'changed_dtm'     => ':CardLead.changed_dtm',
                            'created_dtm'     => ':CardLead.created_dtm',
                            'status_id'       => ':CardLead.status_id',
                            'status_title'    => ':CardLead.status_title',
                        ],
                    ],
                ],
            ],
            'CallLead'       => [
                'key'     => 'CallLead',
                'model'   => 'CallLead',
                'targets' => [
                    'CallPatient' => [
                        'model'  => 'CallPatient',
                        'fields' => [
                            'title'          => ':CallLead.title',
                            'target_id'      => ':Patient.id',
                            'target_title'   => ':Patient.title',
                            'subject'        => ':CallLead.subject',
                            'call_purpose'   => ':CallLead.call_purpose',
                            'description'    => ':CallLead.description',
                            'call_duration'  => ':CallLead.call_duration',
                            'call_start_dtm' => ':CallLead.call_start_dtm',
                            'call_end_dtm'   => ':CallLead.call_end_dtm',
                            'remind_dtm'     => ':CallLead.remind_dtm',
                            'billable'       => ':CallLead.billable',
                            'call_result'    => ':CallLead.call_result',
                            'changer_id'     => ':CallLead.changer_id',
                            'changer_title'  => ':CallLead.changer_title',
                            'owner_id'       => ':CallLead.owner_id',
                            'owner_title'    => ':CallLead.owner_title',
                            'changed_dtm'    => ':CallLead.changed_dtm',
                            'created_dtm'    => ':CallLead.created_dtm',
                            'status_id'      => ':CallLead.status_id',
                            'status_title'   => ':CallLead.status_title',
                        ],
                    ],
                ],
            ],
            'TaskLead'       => [
                'key'     => 'TaskLead',
                'model'   => 'TaskLead',
                'targets' => [
                    'TaskPatient' => [
                        'model'  => 'TaskPatient',
                        'fields' => [
                            'title'          => ':TaskLead.title',
                            'target_id'      => ':Patient.id',
                            'target_title'   => ':Patient.title',
                            'subject'        => ':TaskLead.subject',
                            'priority'       => ':TaskLead.priority',
                            'description'    => ':TaskLead.description',
                            'recurring'      => ':TaskLead.recurring',
                            'rec_start_date' => ':TaskLead.rec_start_date',
                            'rec_end_date'   => ':TaskLead.rec_end_date',
                            'remind_dtm'     => ':TaskLead.remind_dtm',
                            'due_dtm'        => ':TaskLead.due_dtm',
                            'changer_id'     => ':TaskLead.changer_id',
                            'changer_title'  => ':TaskLead.changer_title',
                            'owner_id'       => ':TaskLead.owner_id',
                            'owner_title'    => ':TaskLead.owner_title',
                            'changed_dtm'    => ':TaskLead.changed_dtm',
                            'created_dtm'    => ':TaskLead.created_dtm',
                            'status_id'      => ':TaskLead.status_id',
                            'status_title'   => ':TaskLead.status_title',
                        ],
                    ],
                ],
            ],
            'EventLead'      => [
                'key'     => 'EventLead',
                'model'   => 'EventLead',
                'targets' => [
                    'EventPatient' => [
                        'model'  => 'EventPatient',
                        'fields' => [
                            'title'          => ':EventLead.title',
                            'target_id'      => ':Patient.id',
                            'target_title'   => ':Patient.title',
                            'subject'        => ':EventLead.subject',
                            'r_alert'        => ':EventLead.r_alert',
                            'description'    => ':EventLead.description',
                            'call_duration'  => ':EventLead.call_duration',
                            'start_dtm'      => ':EventLead.start_dtm',
                            'end_dtm'        => ':EventLead.end_dtm',
                            'remind_dtm'     => ':EventLead.remind_dtm',
                            'r_when_date'    => ':EventLead.r_when_date',
                            'r_repeat'       => ':EventLead.r_repeat',
                            'rec_start_date' => ':EventLead.rec_start_date',
                            'rec_end_date'   => ':EventLead.rec_end_date',
                            'invites'        => ':EventLead.invites',
                            'venue'          => ':EventLead.venue',
                            'changer_id'     => ':EventLead.changer_id',
                            'changer_title'  => ':EventLead.changer_title',
                            'owner_id'       => ':EventLead.owner_id',
                            'owner_title'    => ':EventLead.owner_title',
                            'changed_dtm'    => ':EventLead.changed_dtm',
                            'created_dtm'    => ':EventLead.created_dtm',
                            'status_id'      => ':EventLead.status_id',
                            'status_title'   => ':EventLead.status_title',
                        ],
                    ],
                ],
            ],
            'NoteLead'       => [
                'key'     => 'NoteLead',
                'model'   => 'NoteLead',
                'targets' => [
                    'NotePatient' => [
                        'model'  => 'NotePatient',
                        'fields' => [
                            'owner_id'      => ':NoteLead.owner_id',
                            'owner_title'   => ':NoteLead.owner_title',
                            'title'         => ':NoteLead.title',
                            'content'       => ':NoteLead.content',
                            'patient_id'    => ':Patient.id',
                            'patient_title' => ':Patient.title',
                            'changer_id'    => ':NoteLead.changer_id',
                            'changer_title' => ':NoteLead.changer_title',
                            'changed_dtm'   => ':NoteLead.changed_dtm',
                            'created_dtm'   => ':NoteLead.created_dtm',
                            'status_id'     => ':NoteLead.status_id',
                            'status_title'  => ':NoteLead.status_title',
                        ],
                    ],
                ],
            ],
            'Quote'          => [
                'key'     => 'Quote',
                'model'   => 'Quote',
                'targets' => [
                    'Order' => [
                        'model'   => 'Order',
                        'fields'  => [
                            'title'          => ':Quote.title',
                            'quote_id'       => ':Quote.id',
                            'quote_title'    => ':Quote.title',
                            'owner_id'       => ':Quote.owner_id',
                            'owner_title'    => ':Quote.owner_title',
                            'creator_id'     => ':Quote.creator_id',
                            'creator_title'  => ':Quote.creator_title',
                            'changer_id'     => ':Quote.changer_id',
                            'changer_title'  => ':Quote.changer_title',
                            'changed_dtm'    => ':Quote.changed_dtm',
                            'created_dtm'    => ':Quote.created_dtm',
                            'status_id'      => ':Quote.status_id',
                            'status_title'   => ':Quote.status_title',
                            'subject'        => ':Quote.subject',
                            'description'    => ':Quote.description',
                            'patient_id'     => ':Quote.patient_id',
                            'patient_title'  => ':Quote.patient_title',
                            //price fields
                            'sub_total'      => ':Quote.sub_total',
                            'discount'       => ':Quote.discount',
                            'tax'            => ':Quote.tax',
                            'adjustment'     => ':Quote.adjustment',
                            'grand_total'    => ':Quote.grand_total',
                            'state'          => ':Quote.state',
                            'country'        => ':Quote.country',
                            'city'           => ':Quote.city',
                            'address'        => ':Quote.address',
                            'zip'            => ':Quote.zip',
                            'state_sh'       => ':Quote.state_sh',
                            'country_sh'     => ':Quote.country_sh',
                            'city_sh'        => ':Quote.city_sh',
                            'address_sh'     => ':Quote.address_sh',
                            'zip_sh'         => ':Quote.zip_sh',
                            'carrier_id'     => ':Quote.carrier_id',
                            'carrier_title'  => ':Quote.carrier_title',
                            'shipping_instr' => ':Quote.shipping_instr',
                            'payment_instr'  => ':Quote.payment_instr',
                        ],
                        'related' => [
                            'QuoteDetail' => [ 'quote_id' => ':Quote.id' ],
                        ],
                    ],

                ],
//                'post'    => [
//                    'status_id' => \Wepo\Model\Status::CONVERTED,
//                ],
            ],
            'QuoteDetail'    => [
                'key'     => 'QuoteDetail',
                'model'   => 'QuoteDetail',
                'targets' => [
                    'OrderDetail' => [
                        'model'  => 'OrderDetail',
                        'fields' => [
                            'title'                            => ':QuoteDetail.title',
                            'owner_id'                         => ':QuoteDetail.owner_id',
                            'owner_title'                      => ':QuoteDetail.owner_title',
                            'changer_id'                       => ':QuoteDetail.changer_id',
                            'changer_title'                    => ':QuoteDetail.changer_title',
                            'changed_dtm'                      => ':QuoteDetail.changed_dtm',
                            'created_dtm'                      => ':QuoteDetail.created_dtm',
                            'status_id'                        => ':QuoteDetail.status_id',
                            'status_title'                     => ':QuoteDetail.status_title',
                            'quote_id'                         => ':QuoteDetail.quote_id',
                            'quote_title'                      => ':QuoteDetail.quote_title',
                            'order_id'                         => ':Order.id',
                            'order_title'                      => ':Order.title',
                            'pricebook_detail_id'              => ':QuoteDetail.pricebook_detail_id',
                            'pricebook_detail_title'           => ':QuoteDetail.pricebook_detail_title',
                            'pricebook_detail_pricebook_title' => ':QuoteDetail.pricebook_detail_pricebook_title',
                            'pricebook_detail_product_id'      => ':QuoteDetail.pricebook_detail_product_id',
                            'list_price'                       => ':QuoteDetail.list_price',
                            'qty'                              => ':QuoteDetail.qty',
                            'amount'                           => ':QuoteDetail.amount',
                            'discount'                         => ':QuoteDetail.discount',
                            'tax'                              => ':QuoteDetail.tax',
                            'total'                            => ':QuoteDetail.total',
                            'description'                      => ':QuoteDetail.description',
                        ],
                    ],
                ],
            ],
            'Product'        => [
                'key'     => 'Product',
                'model'   => 'Product',
                'targets' => [
                    'PricebookDetail' => [
                        'model'  => 'PricebookDetail',
                        'fields' => [
                            'title'           => ':Product.title',
                            'owner_id'        => ':Product.owner_id',
                            'owner_title'     => ':Product.owner_title',
                            'changer_id'      => ':Product.changer_id',
                            'changer_title'   => ':Product.changer_title',
                            'changed_dtm'     => ':Product.changed_dtm',
                            'created_dtm'     => ':Product.created_dtm',
                            'status_id'       => ':Product.status_id',
                            'status_title'    => ':Product.status_title',
                            'pricebook_id'    => 'a00000000000000000000001',
                            'pricebook_title' => 'Default Pricebook',
                            'product_id'      => ':Product.id',
                            'product_title'   => ':Product.title',
                            'product_price'   => ':Product.price',
                            'list_price'      => ':Product.price',
                        ],
                    ],
                ],
            ],
            'Order'          => [
                'key'     => 'Order',
                'model'   => 'Order',
                'targets' => [
                    'Invoice' => [
                        'model'   => 'Invoice',
                        'fields'  => [
                            'title'         => ':Order.title',
                            'order_id'      => ':Order.id',
                            'order_title'   => ':Order.title',
                            'owner_id'      => ':Order.owner_id',
                            'owner_title'   => ':Order.owner_title',
                            'changer_id'    => ':Order.changer_id',
                            'changer_title' => ':Order.changer_title',
                            'changed_dtm'   => ':Order.changed_dtm',
                            'created_dtm'   => ':Order.created_dtm',
                            'status_id'     => ':Order.status_id',
                            'status_title'  => ':Order.status_title',
                            'subject'       => ':Order.subject',
                            'description'   => ':Order.description',
                            'patient_id'    => ':Order.patient_id',
                            'patient_title' => ':Order.patient_title',
                            //price fields
                            'sub_total'     => ':Order.sub_total',
                            'discount'      => ':Order.discount',
                            'tax'           => ':Order.tax',
                            'adjustment'    => ':Order.adjustment',
                            'grand_total'   => ':Order.grand_total',
                            'state'         => ':Order.state',
                            'country'       => ':Order.country',
                            'city'          => ':Order.city',
                            'address'       => ':Order.address',
                            'zip'           => ':Order.zip',
                            'state_sh'      => ':Order.state_sh',
                            'country_sh'    => ':Order.country_sh',
                            'city_sh'       => ':Order.city_sh',
                            'address_sh'    => ':Order.address_sh',
                            'zip_sh'        => ':Order.zip_sh',
                            'carrier_title' => ':Order.carrier_title',
                        ],
                        'related' => [
                            'OrderDetail' => [ 'order_id' => ':Order.id' ],
                        ],
                    ],

                ],
                'post'    => [
                    'status_id' => \Wepo\Model\Status::CONVERTED,
                ],
            ],
            'OrderDetail'    => [
                'key'     => 'OrderDetail',
                'model'   => 'OrderDetail',
                'targets' => [
                    'InvoiceDetail' => [
                        'model'  => 'InvoiceDetail',
                        'fields' => [
                            'title'                            => ':OrderDetail.title',
                            'owner_id'                         => ':OrderDetail.owner_id',
                            'owner_title'                      => ':OrderDetail.owner_title',
                            'changer_id'                       => ':OrderDetail.changer_id',
                            'changer_title'                    => ':OrderDetail.changer_title',
                            'changed_dtm'                      => ':OrderDetail.changed_dtm',
                            'created_dtm'                      => ':OrderDetail.created_dtm',
                            'status_id'                        => ':OrderDetail.status_id',
                            'status_title'                     => ':OrderDetail.status_title',
                            'quote_id'                         => ':OrderDetail.quote_id',
                            'quote_title'                      => ':OrderDetail.quote_title',
                            'invoice_id'                       => ':Invoice.id',
                            'invoice_title'                    => ':Invoice.title',
                            'pricebook_detail_id'              => ':OrderDetail.pricebook_detail_id',
                            'pricebook_detail_title'           => ':OrderDetail.pricebook_detail_title',
                            'pricebook_detail_pricebook_title' => ':OrderDetail.pricebook_detail_pricebook_title',
                            'pricebook_detail_product_id'      => ':OrderDetail.pricebook_detail_product_id',
                            'list_price'                       => ':OrderDetail.list_price',
                            'qty'                              => ':OrderDetail.qty',
                            'amount'                           => ':OrderDetail.amount',
                            'discount'                         => ':OrderDetail.discount',
                            'tax'                              => ':OrderDetail.tax',
                            'total'                            => ':OrderDetail.total',
                            'description'                      => ':OrderDetail.description',
                        ],
                    ],
                ],
            ],
        ],
    ]
];
