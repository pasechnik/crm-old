<?php

return [

    'AllFieldsConfig' => [

        'system' => [ ],
        'custom' => [
            'Model'              => [
                '_id',
                '_acl',
                'title',
                'key',
                'adapter',
                'model',
                'table',
                'config',
                'fields',
                'groups',
                'unique',
            ],
            'Lead'               => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'fname',
                'lname',
                'flink',
                'tlink',
                'llink',
                'glink',
                'age',
                'height',
                'weight',
                'gender_title',
                'gender_id',
                'lead_status_title',
                'lead_status_id',
                'lead_source_title',
                'lead_source_id',
                'state',
                'country',
                'city',
                'address',
                'zip',
                'avatar',
                'website',
                'birth_date',
                'phone',
                'description',
                'mobile',
                'email',
                'email_id',
                'email_link',
                'sec_email',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'Patient'            => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'account_title',
                'account_id',
                'fname',
                'lname',
                'flink',
                'tlink',
                'llink',
                'glink',
                'age',
                'height',
                'weight',
                'gender_title',
                'gender_id',
                'sec_email',
                'social_security',
                'driver_license',
                'consultant',
                'allergies',
                'physician_exam',
                'last_lab',
                'medical_history',
                'lead_source_title',
                'lead_source_id',
                'card_type_title',
                'card_type_id',
                'card_number',
                'sec_code',
                'exp_date',
                'card_type_2_title',
                'card_type_2_id',
                'card_number_2',
                'sec_code_2',
                'exp_date_2',
                'state',
                'country',
                'city',
                'address',
                'zip',
                'avatar',
                'website',
                'payment_option_title',
                'payment_option_id',
                'doctor_title',
                'doctor_id',
                'phone',
                'description',
                'mobile',
                'email',
                'email_id',
                'email_link',
                'birth_date',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'Account'            => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'flink',
                'tlink',
                'llink',
                'glink',
                'name',
                'phone',
                'email',
                'email_id',
                'email_link',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'state',
                'country',
                'city',
                'address',
                'zip',
                'avatar',
                'changed_dtm',
                'created_dtm',
                'description',
                'status_title',
                'status_id',
            ],
            'Document'           => [
                '_id',
                '_acl',
                'owner_title',
                'owner_id',
                'title',
                'document_name',
                'description',
                'document',
                'document_real_name',
                'document_extension',
                'document_size',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'attach_to',
                'lead_title',
                'lead_id',
                'patient_title',
                'patient_id',
                'attach_to_names',
                'status_title',
                'status_id',
            ],
            'Product'            => [
                '_id',
                '_acl',
                'owner_title',
                'owner_id',
                'title',
                'name',
                'active',
                'price',
                'product_category_title',
                'product_category_id',
                'usage_unit_title',
                'usage_unit_id',
                'description',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'Pricebook'          => [
                '_id',
                '_acl',
                'owner_title',
                'owner_id',
                'title',
                'pricebook',
                'description',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'active',
                'pricing_model',
                'pricing_details',
                'pharmacy',
            ],
            'PricebookDetail'    => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'pricebook_title',
                'pricebook_id',
                'product_title',
                'product_price',
                'product_active',
                'product_id',
                'list_price',
            ],
            'Activity'           => [
                '_id',
                '_acl',
                'title',
                'type_title',
                'type_id',
                'owner_title',
                'owner_id',
                'table_label',
                'table_id',
                'target_title',
                'target_id',
                'subject',
                'description',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'remind_dtm',
                'status_title',
                'status_id',
            ],
            'Quote'              => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'subject',
                'description',
                'patient_title',
                'patient_id',
                'sub_total',
                'discount',
                'tax',
                'adjustment',
                'grand_total',
            ],
            'QuoteDetail'        => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'quote_title',
                'quote_id',
                'pricebook_detail_title',
                'pricebook_detail_pricebook_title',
                'pricebook_detail_product_id',
                'pricebook_detail_id',
                'list_price',
                'qty',
                'amount',
                'discount',
                'tax',
                'total',
                'description',
            ],
            'Order'              => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'quote_title',
                'quote_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'subject',
                'description',
                'patient_title',
                'patient_id',
                'sub_total',
                'discount',
                'tax',
                'adjustment',
                'grand_total',
            ],
            'OrderDetail'        => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'order_title',
                'order_id',
                'pricebook_detail_title',
                'pricebook_detail_pricebook_title',
                'pricebook_detail_product_id',
                'pricebook_detail_id',
                'list_price',
                'qty',
                'amount',
                'discount',
                'tax',
                'total',
                'description',
            ],
            'Invoice'            => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'order_title',
                'order_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'subject',
                'description',
                'patient_title',
                'patient_id',
                'sub_total',
                'discount',
                'tax',
                'adjustment',
                'grand_total',
            ],
            'InvoiceDetail'      => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'invoice_title',
                'invoice_id',
                'pricebook_detail_title',
                'pricebook_detail_pricebook_title',
                'pricebook_detail_product_id',
                'pricebook_detail_id',
                'list_price',
                'qty',
                'amount',
                'discount',
                'tax',
                'total',
                'description',
            ],
            'Payment'            => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'patient_title',
                'patient_id',
                'invoice_title',
                'invoice_id',
                'subject',
                'description',
                'sum',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'EventLog'           => [
                '_id',
                '_acl',
                'event_dtm',
                'target',
                'executor_title',
                'executor_id',
                'table_label',
                'table_id',
                'event_type',
                'event_id',
                '_id',
                '_acl',
                'event_dtm',
                'target',
                'executor_title',
                'executor_id',
                'table_label',
                'table_id',
                'event_type',
                'event_id',
            ],
            'Doctor'             => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'name',
                'dea',
                'license',
                'phone',
                'fax',
                'email',
                'email_id',
                'email_link',
                'state',
                'country',
                'city',
                'address',
                'zip',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'description',
                'status_title',
                'status_id',
            ],
            'CardPatient'        => [
                '_id',
                '_acl',
                'title',
                'patient_title',
                'patient_id',
                'card_type_title',
                'card_type_id',
                'card_number',
                'sec_code',
                'exp_date',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'owner_title',
                'owner_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'CardLead'           => [
                '_id',
                '_acl',
                'title',
                'lead_title',
                'lead_id',
                'card_type_title',
                'card_type_id',
                'card_number',
                'sec_code',
                'exp_date',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'owner_title',
                'owner_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'Note'               => [
                '_id',
                '_acl',
                'owner_title',
                'owner_id',
                'title',
                'content',
                'table_id',
                'parent_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'NoteLead'           => [
                '_id',
                '_acl',
                'owner_title',
                'owner_id',
                'title',
                'content',
                'lead_title',
                'lead_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'NotePatient'        => [
                '_id',
                '_acl',
                'owner_title',
                'owner_id',
                'title',
                'content',
                'patient_title',
                'patient_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'Call'               => [
                '_id',
                '_acl',
                'type_title',
                'type_id',
                'owner_title',
                'owner_id',
                'target',
                'title',
                'subject',
                'call_type_title',
                'call_type_id',
                'call_purpose_title',
                'call_purpose_id',
                'description',
                'call_duration',
                'call_start_dtm',
                'call_end_dtm',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'remind_dtm',
                'billable',
                'call_result',
                'status_title',
                'status_id',
            ],
            'Task'               => [
                '_id',
                '_acl',
                'type_title',
                'type_id',
                'owner_title',
                'owner_id',
                'target',
                'title',
                'subject',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'description',
                'priority_title',
                'priority_id',
                'recurring',
                'rec_start_date',
                'rec_end_date',
                'changed_dtm',
                'created_dtm',
                'due_dtm',
                'remind_dtm',
                'status_title',
                'status_id',
            ],
            'Event'              => [
                '_id',
                '_acl',
                'type_title',
                'type_id',
                'owner_title',
                'owner_id',
                'target',
                'subject',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'title',
                'changed_dtm',
                'created_dtm',
                'remind_dtm',
                'start_dtm',
                'end_dtm',
                'r_when_date',
                'r_repeat',
                'r_alert',
                'rec_start_date',
                'rec_end_date',
                'invites',
                'venue',
                'description',
                'recurring',
                'status_title',
                'status_id',
            ],
            'Vendor'             => [
                '_id',
                '_acl',
                'title',
                'owner_title',
                'owner_id',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'name',
                'subject',
                'description',
                'email',
                'email_id',
                'phone',
                'state',
                'country',
                'city',
                'address',
                'zip',
                'gl_account',
                'category',
                'website',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'User'               => [
                '_id',
                '_acl',
                'title',
                'fname',
                'lname',
                'main_id',
                'role_title',
                'role_id',
                'groups',
                'avatar',
                'login',
                'login_link',
                'password',
                'ip',
                'birth_date',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'newitems',
                'flink',
                'tlink',
                'llink',
                'glink',
                'theme',
                '_id',
                '_acl',
                'title',
                'fname',
                'lname',
                'main_id',
                'role_title',
                'role_id',
                'groups',
                'avatar',
                'login',
                'login_link',
                'password',
                'ip',
                'birth_date',
                'creator_title',
                'creator_id',
                'changer_title',
                'changer_id',
                'changed_dtm',
                'created_dtm',
                'status_title',
                'status_id',
                'newitems',
                'flink',
                'tlink',
                'llink',
                'glink',
                'theme',
            ],
            'Mail'               => [
                '_id',
                '_acl',
                'title',
                'last_mail',
                'reference',
                'date',
                'count',
                'status_title',
                'status_id',
                'owner_title',
                'owner_id',
                '_id',
                '_acl',
                'title',
                'last_mail',
                'reference',
                'date',
                'count',
                'status_title',
                'status_id',
                'owner_title',
                'owner_id',
            ],
            'Test'               => [
                '_id',
                '_acl',
                'name',
                'owner_title',
                'owner_id',
                'status_title',
                'status_id',
                'email',
                'email_id',
                'sec_email',
                'sec_email_id',
            ],
            'EmailToMail'        => [
                '_id',
                '_acl',
                'model_email',
                'model_data',
                'model_id',
                'model_title',
                'mail_email',
                'mail_field',
                'mail_id',
                'mail_title',
            ],
            'Acl'                => [
                '_id',
                '_acl',
                'type',
                'resource',
                'role_role',
                'role_id',
                'permissions',
                'fields',
            ],
            'MainUser'           => [
                '_id',
                '_acl',
                'fname',
                'lname',
                'company_id',
                'role_title',
                'role_id',
                'login',
                'password',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'MainCompany'        => [
                '_id',
                '_acl',
                'company',
                'created_dtm',
                'status_title',
                'status_id',
            ],
            'MainDb'             => [
                '_id',
                '_acl',
                'driver',
                'gateway',
                'dsn',
                'driver_options',
                'dbname',
                'name',
                'company_id',
                'username',
                'password',
                'status_title',
                'status_id',
            ],
            'SaUrl'              => [
                '_id',
                '_acl',
                'label',
                'url',
            ],
            'Role'               => [
                '_id',
                '_acl',
                'role',
            ],
            'MailDetail'         => [
                '_id',
                '_acl',
                'protocol_ids',
                'header',
                'text',
                'title',
                'info',
                'attachment',
                'type',
                'date',
                'size',
                'from_to_title',
                'from_title',
                'from_id',
                'to_title',
                'to_id',
                'chain_id',
                'status_title',
                'status_id',
                'owner_title',
                'owner_id',
            ],
            'MailReceiveSetting' => [
                '_id',
                '_acl',
                'title',
                'email',
                'setting_user',
                'setting_protocol_title',
                'setting_protocol_id',
                'setting_host',
                'setting_port',
                'setting_security_title',
                'setting_security_id',
                'pass',
                'type',
                'owner_title',
                'owner_id',
                'user_title',
                'user_id',
                'status_title',
                'status_id',
            ],
            'MailSendSetting'    => [
                '_id',
                '_acl',
                'title',
                'email',
                'setting_user',
                'setting_protocol_title',
                'setting_protocol_id',
                'setting_host',
                'setting_port',
                'setting_security_title',
                'setting_security_id',
                'pass',
                'type',
                'is_default',
                'owner_title',
                'owner_id',
                'user_title',
                'user_id',
                'status_title',
                'status_id',
            ],
            'Email0'             => [
                '_id',
                '_acl',
                'model_email',
                'model_data',
                'model_id',
                'model_title',
            ],
            'Email'              => [
                '_id',
                '_acl',
                'email',
                'user_name',
                'user_name_source',
            ],
        ],
    ]
];
