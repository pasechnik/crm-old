<?php

return [
    'ViewConfig' => [
        'system' => [
            'Mail.widget'              => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'EmailToMail',
                'key'       => 'Mail.widget',
                'title'     => 'Emails',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'EmailToMail',
                'template'  => 'common/widget.twig',
                'query'     => 'EmailToMail.widget',
                'fields'    => [
                    'mail_title',
                    'mail_type',
                    'mail_date'
                ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'mail_id',
                        'routeparams' => [ 'view' => 'view', 'data' => 'mailDetail' ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Send new',
                        'routeparams' => [ 'view' => 'send', 'data' => 'mail' ],
                        'queryparams' => [ 'recipient' => ':id' ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [ 'view' => 'list', 'data' => 'mail' ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'mail_date' => 'asc' ],
                'rows'      => '5',
            ],
        ],
        'custom' => [
            'LeadUser.widget'          => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Leads',
                'key'       => 'LeadUser.widget',
                'title'     => 'Leads',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Lead',
                'template'  => 'common/widget.twig',
                'query'     => 'LeadUser',
                'fields'    => [ 'title', 'fname', 'lname', 'email' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [ 'view' => 'view', 'data' => 'lead' ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'lead'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [ 'view' => 'list', 'data' => 'lead' ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Lead.widget'              => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Leads',
                'key'       => 'Lead.widget',
                'title'     => 'Leads',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Lead',
                'template'  => 'common/widget.twig',
                'query'     => 'Lead.list',
                'fields'    => [ 'title', 'fname', 'lname', 'email' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [ 'view' => 'view', 'data' => 'lead' ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'lead'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [ 'view' => 'list', 'data' => 'lead' ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'PatientUser.widget'       => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Patients',
                'title'     => 'Patients',
                'custom'    => 0,
                'key'       => 'PatientUser.widget',
                'mode'      => 'widget',
                'model'     => 'Patient',
                'template'  => 'common/widget.twig',
                'query'     => 'PatientUser',
                'fields'    => [ 'title', 'fname', 'lname', 'email' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'view',
                            'data' => 'patient'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'patient'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'patient'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Patient.widget'           => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Patients',
                'title'     => 'Patients',
                'custom'    => 0,
                'key'       => 'Patient.widget',
                'mode'      => 'widget',
                'model'     => 'Patient',
                'template'  => 'common/widget.twig',
                'query'     => 'Patient.list',
                'fields'    => [ 'title', 'fname', 'lname', 'email' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'view',
                            'data' => 'patient'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'patient'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'patient'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'PatientAccount.widget'    => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Patients',
                'title'     => 'Patients',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Patient',
                'template'  => 'common/widget.twig',
                'query'     => 'PatientsAccount',
                'fields'    => [ 'title', 'fname', 'lname', 'email' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'view',
                            'data' => 'patient'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'patient'
                        ],
                        'queryparams' => [ 'account'=> ':id'],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'patient'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'row'       => '5',
            ],
            'AccountUser.widget'       => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Accounts',
                'title'     => 'Accounts',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Account',
                'template'  => 'common/widget.twig',
                'query'     => 'AccountUser',
                'fields'    => [
                    'title',
                    //                    'fname',
                    //                    'lname',
                    'email',
                ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'view',
                            'data' => 'account'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'account'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'account'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'History.widget'           => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'History',
                'title'     => 'History',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'EventLog',
                'template'  => 'common/widget.twig',
                'query'     => 'History',
                'fields'    => [
                    'event_dtm',
                    'target',
                    'executor_title',
                    'table_label',
                    'event_type',
                ],
                'actions'   => [ ],
                'links'     => [
                    'list' => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'eventlog'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'HistoryWhose.widget'      => [
                'observers' => [ 'WidgetObserver' ],
                'key'       => 'HistoryWho.widget',
                'document'  => 'History',
                'title'     => 'History',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'EventLog',
                'template'  => 'common/widget.twig',
                'query'     => 'HistoryWhose',
                'fields'    => [
                    'event_dtm',
                    'target',
                    'executor_title',
                    'table_label',
                    'event_type',
                ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'view',
                            'data' => 'eventlog'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'list' => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'eventlog'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'ActivityUser.widget'      => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Activities',
                'title'     => 'Activities',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Activity',
                'template'  => 'common/activitywidget.twig',
                'query'     => 'ActivityUser',
                'fields'    => [
                    'title',
                    'type_title',
                    'created_dtm',
                ],
                'actions'   => [ ],
                'links'     => [
                    'calllead'     => [
                        'route'       => 'common',
                        'label'       => 'Call to lead',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'calllead'
                        ],
                        'queryparams' => [ ],
                    ],
                    'callpatient'  => [
                        'route'       => 'common',
                        'label'       => 'Call to patient',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'callpatient'
                        ],
                        'queryparams' => [ ],
                    ],
                    'tasklead'     => [
                        'route'       => 'common',
                        'label'       => 'Task to lead',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'tasklead'
                        ],
                        'queryparams' => [ ],
                    ],
                    'taskpatient'  => [
                        'route'       => 'common',
                        'label'       => 'Task to patient',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'taskpatient'
                        ],
                        'queryparams' => [ ],
                    ],
                    'eventlead'    => [
                        'route'       => 'common',
                        'label'       => 'Event to lead',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'eventlead'
                        ],
                        'queryparams' => [ ],
                    ],
                    'eventpatient' => [
                        'route'       => 'common',
                        'label'       => 'Event to patient',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'eventpatient'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'         => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'activity'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'ActivityLead.widget'      => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Activities',
                'title'     => 'Activities',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Activity',
                'template'  => 'common/activitywidget.twig',
                'query'     => 'ActivityLead',
                'fields'    => [
                    'title',
                    'type_title',
                    'created_dtm',
                ],
                'actions'   => [ ],
                'links'     => [
                    'calllead'  => [
                        'route'       => 'common',
                        'label'       => 'Add call',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'calllead'
                        ],
                        'queryparams' => [ 'target' => ':id' ],
                    ],
                    'tasklead'  => [
                        'route'       => 'common',
                        'label'       => 'Add task',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'tasklead'
                        ],
                        'queryparams' => [ 'target' => ':id' ],
                    ],
                    'eventlead' => [
                        'route'       => 'common',
                        'label'       => 'Add event',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'eventlead'
                        ],
                        'queryparams' => [ 'target' => ':id' ],
                    ],
                    'list'      => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'activity'
                        ],
                        'queryparams' => [ 'target' => ':id' ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'ActivityPatient.widget'   => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Activities',
                'title'     => 'Activities',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Activity',
                'template'  => 'common/activitywidget.twig',
                'query'     => 'ActivityPatient',
                'fields'    => [
                    'title',
                    'type_title',
                    'created_dtm',
                ],
                'actions'   => [ ],
                'links'     => [
                    'callpatient'  => [
                        'route'       => 'common',
                        'label'       => 'Add call',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'callpatient'
                        ],
                        'queryparams' => [ 'target' => ':id' ],
                    ],
                    'taskpatient'  => [
                        'route'       => 'common',
                        'label'       => 'Add task',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'taskpatient'
                        ],
                        'queryparams' => [ 'target' => ':id' ],
                    ],
                    'eventpatient' => [
                        'route'       => 'common',
                        'label'       => 'Add event',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'eventpatient'
                        ],
                        'queryparams' => [ 'target' => ':id' ],
                    ],
                    'list'         => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'activity'
                        ],
                        'queryparams' => [ 'target' => ':id' ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Attachment.widget'        => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Attachments',
                'title'     => 'Attachments',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Document',
                'template'  => 'common/widget.twig',
                'query'     => 'Attachments',
                'fields'    => [
                    'title',
                    'document_name',
                    'created_dtm',
                ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'view',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'AttachmentLead.widget'    => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Attachments',
                'title'     => 'Attachments',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Document',
                'template'  => 'common/widget.twig',
                'query'     => 'AttachmentsLead',
                'fields'    => [
                    'title',
                    'document_name',
                    'created_dtm',
                ],
                'actions'   => [
                    'download' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'download',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'view',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'document'
                        ],
                        'queryparams' => [ 'lead' => ':id' ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'AttachmentPatient.widget' => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Attachments',
                'title'     => 'Attachments',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Document',
                'template'  => 'common/widget.twig',
                'query'     => 'AttachmentsPatient',
                'fields'    => [
                    'title',
                    'document_name',
                    'created_dtm',
                ],
                'actions'   => [
                    'download' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'download',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'view',
                            'data' => 'document'
                        ],
                        'queryparams' => [ 'patient' => ':id' ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'document'
                        ],
                        'queryparams' => ['patient' => ':id' ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'AttachmentUser.widget'    => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Attachments',
                'title'     => 'Attachments',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Document',
                'template'  => 'common/widget.twig',
                'query'     => 'AttachmentsUser',
                'fields'    => [
                    'title',
                    'document_name',
                    'created_dtm',
                ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'view',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'document'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'CardLead.widget'          => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Card',
                'title'     => 'Payment Cards',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'CardLead',
                'template'  => 'common/widget.twig',
                'query'     => 'CardLead.widget',
                'fields'    => [ 'title', 'created_dtm' ],
                'actions'   => [
                    'delete' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'delete',
                            'data' => 'cardlead'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'cardlead'
                        ],
                        'queryparams' => [ 'lead' => ':id' ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'CardPatient.widget'       => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'CardPatient',
                'title'     => 'Payment Cards',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'CardPatient',
                'template'  => 'common/widget.twig',
                'query'     => 'CardPatient.widget',
                'fields'    => [ 'title', 'exp_date' ],
                'actions'   => [
                    'delete' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'delete',
                            'data' => 'cardpatient'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'cardpatient'
                        ],
                        'queryparams' => [ 'patient' => ':id' ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'NoteLead.widget'          => [
                'observers' => [ 'WidgetObserver' ],
                'key'       => 'NoteLead.widget',
                'document'  => 'Note',
                'title'     => 'Notes',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'NoteLead',
                'template'  => 'common/notewidget.twig',
                'query'     => 'NoteLead',
                'fields'    => [
                    'title',
                    'content',
                    'fname',
                    'lname',
                    'email'
                ],
                'actions'   => [
                    'update' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'update',
                            'data' => 'notelead'
                        ],
                        'queryparams' => [ ],
                    ],
                    'delete' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'delete',
                            'data' => 'notelead'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'notelead'
                        ],
                        'queryparams' => [ 'lead' => ':id' ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'NotePatient.widget'       => [
                'observers' => [ 'WidgetObserver' ],
                'key'       => 'NotePatient.widget',
                'document'  => 'Note',
                'title'     => 'Notes',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'NotePatient',
                'template'  => 'common/notewidget.twig',
                'query'     => 'NotePatient',
                'fields'    => [
                    'title',
                    'content',
                    'fname',
                    'lname',
                    'email'
                ],
                'actions'   => [
                    'update' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'update',
                            'data' => 'notepatient'
                        ],
                        'queryparams' => [ ],
                    ],
                    'delete' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view' => 'delete',
                            'data' => 'notepatient'
                        ],
                        'queryparams' => [ 'patient' => ':id' ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'notepatient'
                        ],
                        'queryparams' => [ 'patient' => ':id' ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Email.widget'             => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Emails',
                'title'     => 'Emails',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Email',
                'template'  => 'common/widget.twig',
                'query'     => 'Email',
                'fields'    => [ 'title', 'fname', 'lname', 'email' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'email'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Send new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'email'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'email'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Order.widget'             => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Orders',
                'title'     => 'Orders',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Order',
                'template'  => 'common/widget.twig',
                'query'     => 'Order.list',
                'fields'    => [ 'title', 'created_dtm', 'grand_total' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'order'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'order'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'order'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'OrderUser.widget'         => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Orders',
                'title'     => 'Sales Orders',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Order',
                'template'  => 'common/widget.twig',
                'query'     => 'OrdersUser',
                'fields'    => [ 'title', 'created_dtm', 'grand_total' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'order'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'order'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'order'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'OrderPatient.widget'      => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Orders',
                'title'     => 'Sales Orders',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Order',
                'template'  => 'common/widget.twig',
                'query'     => 'OrdersPatient',
                'fields'    => [ 'title', 'created_dtm', 'grand_total' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'order'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'order'
                        ],
                        'queryparams' => [ 'patient' => ':id' ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'order'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Quote.widget'             => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Quotes',
                'title'     => 'Quotes',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Quote',
                'template'  => 'common/widget.twig',
                'query'     => [
                    '-status_id' => '5295fdf7c5b9f222acd3c74f',
                ],
                'fields'    => [ 'title', 'created_dtm', 'grand_total' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'quote'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'quote'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'quote'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'QuoteUser.widget'         => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Quotes',
                'title'     => 'Quotes',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Quote',
                'template'  => 'common/widget.twig',
                'query'     => 'QuotesUser',
                'fields'    => [ 'title', 'created_dtm', 'grand_total' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'quote'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'quote'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'quote'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'QuotePatient.widget'      => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Quotes',
                'title'     => 'Quotes',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Quote',
                'template'  => 'common/widget.twig',
                'query'     => 'QuotePatient',
                'fields'    => [ 'title', 'created_dtm', 'grand_total' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'quote'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'quote'
                        ],
                        'queryparams' => [
                            'patient' => ':id'
                        ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'quote'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Invoice.widget'           => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Invoices',
                'title'     => 'Invoices',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Invoice',
                'template'  => 'common/widget.twig',
                'query'     => 'Invoice.list',
                'fields'    => [ 'title', 'created_dtm', 'grand_total' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'invoice'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
//                    'insert' => [
//                        'route'       => 'common',
//                        'label'       => 'Add new',
//                        'routeparams' => [
//                            'view' => 'insert',
//                            'data' => 'invoice'
//                            /*, 'patient_id'=> ':_id'*/
//                        ],
//                        'queryparams' => [ ],
//                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'invoice'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'InvoiceUser.widget'       => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Invoices',
                'title'     => 'Invoices',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Invoice',
                'template'  => 'common/widget.twig',
                'query'     => 'InvoicesUser',
                'fields'    => [ 'title', 'created_dtm', 'grand_total' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'invoice'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
//                    'insert' => [
//                        'route'       => 'common',
//                        'label'       => 'Add new',
//                        'routeparams' => [
//                            'view' => 'insert',
//                            'data' => 'invoice'
//                            /*, 'patient_id'=> ':_id'*/
//                        ],
//                        'queryparams' => [ ],
//                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'invoice'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'InvoicePatient.widget'    => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Invoices',
                'title'     => 'Invoices',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Invoice',
                'template'  => 'common/widget.twig',
                'query'     => 'InvoicesPatient',
                'fields'    => [ 'title', 'created_dtm', 'grand_total' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'invoice'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'invoice'
                        ],
                        'queryparams' => [ 'patient' => ':id' ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'invoice'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Payment.widget'           => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Payments',
                'title'     => 'Payments',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Payment',
                'template'  => 'common/widget.twig',
                'query'     => [
                    '-status_id' => '5295fdf7c5b9f222acd3c74f',
                ],
                'fields'    => [ 'title', 'created_dtm', 'sum' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'payment'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'payment'
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'payment'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'PaymentUser.widget'       => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Payments',
                'title'     => 'Payments',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Payment',
                'template'  => 'common/widget.twig',
                'query'     => 'PaymentsUser',
                'fields'    => [ 'title', 'created_dtm', 'sum' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'payment'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'payment'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'payment'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'PaymentPatient.widget'    => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Payments',
                'title'     => 'Payments',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Payment',
                'template'  => 'common/widget.twig',
                'query'     => 'PaymentsPatient',
                'fields'    => [ 'title', 'created_dtm', 'sum' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'payment'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'payment'
                        ],
                        'queryparams' => [ 'patient' => ':id' ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'payment'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Account.widget'           => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Accounts',
                'title'     => 'Accounts',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Account',
                'template'  => 'common/widget.twig',
                'query'     => [
                    '-status_id' => '5295fdf7c5b9f222acd3c74f',
                ],
                'fields'    => [ 'title', 'changed_dtm', 'email', 'phone' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'account'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'account'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'account'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Product.widget'           => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Products',
                'title'     => 'Products',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Product',
                'template'  => 'common/widget.twig',
                'query'     => [
                    '-status_id' => '5295fdf7c5b9f222acd3c74f',
                ],
                'fields'    => [
                    'title',
                    'changed_dtm',
                    'price',
                    'product_category'
                ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'product'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'product'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'product'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'ProductUser.widget'       => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Products',
                'title'     => 'Products',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Product',
                'template'  => 'common/widget.twig',
                'query'     => 'ProductUser',
                'fields'    => [
                    'title',
                    'changed_dtm',
                    'price',
                    'product_category_title'
                ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'product'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'product'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'product'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'Pricebook.widget'         => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Pricebooks',
                'title'     => 'Pricebooks',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Pricebook',
                'template'  => 'common/widget.twig',
                'query'     => [ '-status_id' => '5295fdf7c5b9f222acd3c74f' ],
                'fields'    => [ 'title', 'changed_dtm', 'description' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'pricebook'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'pricebook'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'pricebook'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'PricebookUser.widget'     => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'Pricebooks',
                'title'     => 'Pricebooks',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'Pricebook',
                'template'  => 'common/widget.twig',
                'query'     => 'PricebookUser',
                'fields'    => [ 'title', 'changed_dtm', 'description' ],
                'actions'   => [
                    'view' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'pricebook'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add new',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'pricebook'
                            /*, 'patient_id'=> ':_id'*/
                        ],
                        'queryparams' => [ ],
                    ],
                    'list'   => [
                        'route'       => 'common',
                        'label'       => 'View all',
                        'routeparams' => [
                            'view' => 'list',
                            'data' => 'pricebook'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
            'PricebookDetail.widget'   => [
                'observers' => [ 'WidgetObserver' ],
                'document'  => 'PricebookDetails',
                'title'     => 'Pricebooks',
                'custom'    => 0,
                'mode'      => 'widget',
                'model'     => 'PricebookDetail',
                'template'  => 'common/widget.twig',
                'query'     => 'ProductPricebook',
                'fields'    => [
                    'pricebook_title',
                    'changed_dtm',
                    'list_price'
                ],
                'actions'   => [
                    'view'   => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'label'       => 'View',
                        'routeparams' => [
                            'view'   => 'view',
                            'action' => 'pricebookdetail',
                            'id'     => ':id'
                        ],
                        'queryparams' => [ ],
                    ],
                    'update' => [
                        'route'       => 'common',
                        'id'          => 'id',
                        'label'       => 'update',
                        'routeparams' => [
                            'view' => 'update',
                            'data' => 'pricebookdetail',
                            'id'   => ':id'
                        ],
                        'queryparams' => [ ],
                    ],
                ],
                'links'     => [
                    'insert' => [
                        'route'       => 'common',
                        'label'       => 'Add to pricebook',
                        'routeparams' => [
                            'view' => 'insert',
                            'data' => 'pricebookdetail'
                        ],
                        'queryparams' => [ 'product' => ':id' ],
                    ],
                ],
                'params'    => [ ],
                'order'     => [ 'changed_dtm' => 'asc' ],
                'rows'      => '5',
            ],
        ],

    ],

];
