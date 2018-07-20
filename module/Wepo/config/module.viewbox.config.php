<?php

return [

    'ViewBoxConfig' => [
        'system' => [
            'Mail.list'                      => [
                'document' => 'Mail',
                'mode'     => 'list',
                'key'      => 'Mail.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Emails',
                'blocks'   => [
                    'list' => [ 'Mail.list' ],
                ],
            ],
            'Mail.send'                      => [
                'document' => 'Mail',
                'mode'     => 'insert',
                'key'      => 'Mail.send',
                'template' => 'common/formbox.twig',
                'title'    => 'Send Email',
                'blocks'   => [
                    'form' => [ 'Tiny.menu','MailDetail.send' ],

                ],
            ],
            'Mail.view'                      => [
                'document' => 'Mail',
                'mode'     => 'view',
                'key'      => 'Mail.view',
                'template' => 'common/detailsbox.twig',
                'title'    => 'Chain view',
                'blocks'   => [
                    'view'    => [ 'Mail.view' ],
                    'details' => [ 'MailDetail.list' ],
                ],
            ],
            'MailDetail.view'                => [
                'document' => 'MailDetail',
                'mode'     => 'view',
                'key'      => 'MailDetail.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Mail view',
                'blocks'   => [
                    'view' => [ 'MailDetail.view' ],
                ],
            ],
            'MailDetail.text'                => [
                'document' => 'MailDetail',
                'mode'     => 'view',
                'key'      => 'MailDetail.text',
                'template' => 'common/simplebox.twig',
                'title'    => 'Mail view',
                'blocks'   => [
                    'view' => [ 'MailDetail.text' ],
                ],
            ],
            'User.mailfetch'                  => [
                'document' => 'User',
                'mode'     => 'mailfetch',
                'key'      => 'User.mailfetch',
                'template' => 'common/listbox.twig',
                'title'    => 'Sync mails',
                'blocks'   => [
                    'list' => [ 'User.mailfetch' ],
                ],
            ],
            'MailSendSetting.list'           => [
                'document' => 'MailSendSetting',
                'key'      => 'MailSendSetting.list',
                'title'    => 'Email send settings',
                'mode'     => 'list',
                'template' => 'common/listbox.twig',
                'blocks'   => [
                    'list' => [ 'MailSendSetting.list' ],
                ],
            ],
            'MailSendSetting.view'           => [
                'document' => 'MailSendSetting',
                'key'      => 'MailSendSetting.view',
                'mode'     => 'view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Mail send settings view',
                'blocks'   => [
                    'view' => [ 'MailSendSetting.view' ],
                ],
            ],
            'MailSendSetting.recyclelist'    => [
                'document' => 'MailSendSetting',
                'mode'     => 'recyclelist',
                'key'      => 'MailSendSetting.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Mail Send Settings: Recycle',
                'blocks'   => [
                    'list' => [ 'MailSendSetting.recyclelist' ],
                ],
            ],
            'MailSendSetting.insert'         => [
                'document' => 'MailSendSetting',
                'key'      => 'MailSendSetting.insert',
                'title'    => 'Email add settings',
                'mode'     => 'insert',
                'template' => 'common/formbox.twig',
                'blocks'   => [
                    'form' => [ 'MailSendSetting.insert' ],
                ],
            ],
            'MailSendSetting.update'           => [
                'document' => 'MailSendSetting',
                'key'      => 'MailSendSetting.update',
                'title'    => 'Email add settings',
                'mode'     => 'edit',
                'template' => 'common/formbox.twig',
                'blocks'   => [
                    'form' => [ 'MailSendSetting.edit' ],
                ],
            ],
            'MailSendSetting.restore'        => [
                'document' => 'MailSendSetting',
                'mode'     => 'restore',
                'key'      => 'MailSendSetting.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Mail Send Setting',
                'blocks'   => [
                    'form' => [ 'MailSendSetting.restore' ],
                ],
            ],
            'MailSendSetting.delete'         => [
                'document' => 'MailSendSetting',
                'mode'     => 'delete',
                'key'      => 'MailSendSetting.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Mail Send Setting',
                'blocks'   => [
                    'form' => [ 'MailSendSetting.delete' ],
                ],
            ],
            'MailSendSetting.clean'          => [
                'document' => 'MailSendSetting',
                'mode'     => 'clean',
                'key'      => 'MailSendSetting.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Mail Send Setting',
                'blocks'   => [
                    'form' => [ 'MailSendSetting.clean' ],
                ],
            ],
            'MailReceiveSetting.list'        => [
                'document' => 'MailReceiveSetting',
                'key'      => 'MailReceiveSetting.list',
                'title'    => 'Email send settings',
                'mode'     => 'list',
                'template' => 'common/listbox.twig',
                'blocks'   => [
                    'list' => [ 'MailReceiveSetting.list' ],
                ],
            ],
            'MailReceiveSetting.view'        => [
                'document' => 'MailReceiveSetting',
                'key'      => 'MailReceiveSetting.view',
                'mode'     => 'view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Mail send settings view',
                'blocks'   => [
                    'view' => [ 'MailReceiveSetting.view' ],
                ],
            ],
            'MailReceiveSetting.recyclelist' => [
                'document' => 'MailReceiveSetting',
                'mode'     => 'recyclelist',
                'key'      => 'MailReceiveSetting.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Mail Send Settings: Recycle',
                'blocks'   => [
                    'list' => [ 'MailReceiveSetting.recyclelist' ],
                ],
            ],
            'MailReceiveSetting.insert'      => [
                'document' => 'MailReceiveSetting',
                'key'      => 'MailReceiveSetting.insert',
                'title'    => 'Email add settings',
                'mode'     => 'insert',
                'template' => 'common/formbox.twig',
                'blocks'   => [
                    'form' => [ 'MailReceiveSetting.insert' ],
                ],
            ],
            'MailReceiveSetting.update'        => [
                'document' => 'MailReceiveSetting',
                'key'      => 'MailReceiveSetting.update',
                'title'    => 'Email add settings',
                'mode'     => 'edit',
                'template' => 'common/formbox.twig',
                'blocks'   => [
                    'form' => [ 'MailReceiveSetting.update' ],
                ],
            ],
            'MailReceiveSetting.restore'     => [
                'document' => 'MailReceiveSetting',
                'mode'     => 'restore',
                'key'      => 'MailReceiveSetting.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Mail Receive Setting',
                'blocks'   => [
                    'form' => [ 'MailReceiveSetting.restore' ],
                ],
            ],
            'MailReceiveSetting.delete'      => [
                'document' => 'MailReceiveSetting',
                'mode'     => 'delete',
                'key'      => 'MailReceiveSetting.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Mail Receive Setting',
                'blocks'   => [
                    'form' => [ 'MailReceiveSetting.delete' ],
                ],
            ],
            'MailReceiveSetting.clean'       => [
                'document' => 'MailReceiveSetting',
                'mode'     => 'clean',
                'key'      => 'MailReceiveSetting.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Mail Receive Setting',
                'blocks'   => [
                    'form' => [ 'MailReceiveSetting.clean' ],
                ],
            ],
            'Home.list'                 => [
                'document' => 'Home',
                'key'      => 'Home.list',
                'title'    => 'Home',
                'mode'     => 'list',
                'template' => 'common/homebox.twig',
                'blocks'   => [
                    'home' => [ 'Home' ],
                ],
            ],
            'model.index.list'            => [
                'document' => 'Setup',
                'key'      => 'model.index.list',
                'template' => 'common/model.twig',
                'mode'     => 'list',
                'title'    => 'Fields',
                'blocks'   => [
//                    'field' => [ 'EnsureIndex.list' ],
                ],
            ],
        ],
        'custom' => [
            'CardPatient.insert'          => [
                'document' => 'CardPatient',
                'key'      => 'CardPatient.insert',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Add Payment Card',
                'blocks'   => [
                    'form' => [ 'CardPatient.insert' ],
                ],
            ],
            'CardPatient.delete'          => [
                'document' => 'CardPatient',
                'mode'     => 'delete',
                'key'      => 'CardPatient.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Card',
                'blocks'   => [
                    'form' => [ 'CardPatient.delete' ],
                ],
            ],
            'Cardlead.insert'             => [
                'document' => 'CardLead',
                'key'      => 'Cardlead.insert',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Add Payment Card',
                'blocks'   => [
                    'form' => [ 'CardLead.insert' ],
                ],
            ],
            'Cardlead.delete'             => [
                'document' => 'CardLead',
                'mode'     => 'delete',
                'key'      => 'Cardlead.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Card',
                'blocks'   => [
                    'form' => [ 'CardLead.delete' ],
                ],
            ],
            'Notelead.insert'             => [
                'document' => 'Notelead',
                'key'      => 'Notelead.insert',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Add Note',
                'blocks'   => [
                    'form' => [ 'Notelead.insert' ],
                ],
            ],
            'Notelead.delete'             => [
                'document' => 'Notelead',
                'mode'     => 'delete',
                'key'      => 'Notelead.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Note',
                'blocks'   => [
                    'form' => [ 'Notelead.delete' ],
                ],
            ],
            'Notelead.update'                   => [
                'document' => 'Notelead',
                'mode'     => 'edit',
                'key'      => 'Notelead.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Edit Note',
                'blocks'   => [
                    'form' => [ 'Notelead.update' ],
                ],
            ],
            'Notepatient.insert'             => [
                'document' => 'Notepatient',
                'key'      => 'Notepatient.insert',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Add Note',
                'blocks'   => [
                    'form' => [ 'Notepatient.insert' ],
                ],
            ],
            'Notepatient.delete'             => [
                'document' => 'Notepatient',
                'mode'     => 'delete',
                'key'      => 'Notepatient.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Note',
                'blocks'   => [
                    'form' => [ 'Notepatient.delete' ],
                ],
            ],
            'Notepatient.update'                   => [
                'document' => 'Notepatient',
                'mode'     => 'edit',
                'key'      => 'Notepatient.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Note edit',
                'blocks'   => [
                    'form' => [ 'Notepatient.update' ],
                ],
            ],
            'Signin.list'                 => [
                'document' => 'Signin',
                'key'      => 'Signin.list',
                'title'    => 'Sign In',
                'mode'     => 'list',
                'template' => 'common/signinbox.twig',
                'blocks'   => [
                    'signin' => [ 'Signin' ],
                ],
            ],
            'Signout.list'                 => [
                'document' => 'Signout',
                'key'      => 'Signout.list',
                'title'    => 'Sign Out',
                'mode'     => 'list',
                'template' => 'common/signoutbox.twig',
                'blocks'   => [
                    'signout' => [ 'Signout' ],
                ],
            ],
            'Signup.list'                 => [
                'document' => 'Signup',
                'key'      => 'Signup.list',
                'title'    => 'Sign Up',
                'mode'     => 'list',
                'template' => 'common/signupbox.twig',
                'blocks'   => [
                    'signup' => [ 'Signup' ],
                ],
            ],
            'Dashboard.list'         => [
                'document' => 'Dashboard',
                'key'      => 'Dashboard.list',
                'title'    => 'Dashboard',
                'mode'     => 'Dashboard',
                'template' => 'common/dashboard.twig',
//                'template' => 'common/dummy.twig',
                'blocks'   => [
                    'dashboard' => [ 'User.dashboard' ],
                    'widgets'   => [
                        'Lead.widget',
                        'Patient.widget',
//                        'History.widget',
                        'ActivityUser.widget',
                        'Attachment.widget',
                    ],
                ],
            ],
            'Search.list'                 => [
                'document' => 'Search',
                'key'      => 'Search.list',
                'title'    => 'Search',
                'mode'     => 'list',
                'template' => 'common/searchbox.twig',
                'blocks'   => [
                    'dashboard' => [ 'Search.list' ],
                    'widgets'   => [
                        'Lead.widget',
                        'Patient.widget',
                        'ActivityUser.widget',
                        'Attachment.widget',
                        'Order.widget',
//                        'Invoice.widget',
                    ],
                ],
            ],
            'Search.setup'                => [
                'document' => 'Search',
                'key'      => 'Search.setup',
                'title'    => 'Search',
                'mode'     => 'setup',
                'template' => 'common/searchbox.twig',
                'blocks'   => [
                    'dashboard' => [ 'Search.list' ],
                    'widgets'   => [ ],
                ],
            ],
            'Setup.field.list'            => [
                'document' => 'Setup',
                'key'      => 'Setup.field.list',
                'template' => 'common/fieldbox.twig',
                'mode'     => 'list',
                'title'    => 'Fields',
                'blocks'   => [
                    'field' => [ 'Field.list' ],
                ],
            ],
            'Setup.index.list'            => [
                'document' => 'Setup',
                'key'      => 'Setup.index.list',
                'template' => 'common/fieldbox.twig',
                'mode'     => 'list',
                'title'    => 'Fields',
                'blocks'   => [
                    'field' => [ 'EnsureIndex.list' ],
                ],
            ],
            'Model.list'                   => [
                'document' => 'Model',
                'key'      => 'Model.list',
                'template' => 'common/listbox.twig',
                'mode'     => 'list',
                'title'    => 'Models',
                'blocks'   => [
                    'list' => [ 'Model.list' ],
                ],
            ],
            'Model.update'                   => [
                'document' => 'Model',
                'mode'     => 'edit',
                'key'      => 'Model.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Model edit',
                'blocks'   => [
                    'form' => [ 'Model.update' ],
                ],
            ],
            'Lead.list'                   => [
                'document' => 'Lead',
                'key'      => 'Lead.list',
                'template' => 'common/listbox.twig',
                'mode'     => 'list',
                'title'    => 'Leads',
                'blocks'   => [
                    'list' => [ 'Lead.list' ],
                ],
            ],
            'Eventlog.list'               => [
                'document' => 'Eventlog',
                'key'      => 'Eventlog.list',
                'template' => 'common/listbox.twig',
                'mode'     => 'list',
                'title'    => 'History',
                'blocks'   => [
                    'list' => [ 'Eventlog.list' ],
                ],
            ],
            'Lead.view'                   => [
                'document' => 'Lead',
                'key'      => 'Lead.view',
                'mode'     => 'view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Lead view',
                'blocks'   => [
                    'view'    => [ 'Lead.view' ],
                    'toolbar_partials' => [
                        'LeadMail.templates',
                    ],
                    'view_partials' => [
                        'CardLead.partial',
                        'NoteLead.partial'
                    ],
                    'widgets' => [
                        'ActivityLead.widget',
                        'AttachmentLead.widget',
//                        'HistoryWhose.widget',
                        'Mail.widget',
                    ],
                ],
            ],
            'Lead.insert'                 => [
                'document' => 'Lead',
                'key'      => 'Lead.insert',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Lead add',
                'blocks'   => [
                    'form' => [ 'Lead.insert' ],
                ],
            ],
            'Lead.update'                   => [
                'document' => 'Lead',
                'mode'     => 'edit',
                'key'      => 'Lead.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Lead edit',
                'blocks'   => [
                    'form' => [ 'Lead.update' ],
                ],
            ],
            'Lead.recyclelist'            => [
                'document' => 'Lead',
                'mode'     => 'recyclelist',
                'key'      => 'Lead.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Leads: Recycle',
                'blocks'   => [
                    'list' => [ 'Lead.recyclelist' ],
                ],
            ],
            'Lead.delete'                 => [
                'document' => 'Lead',
                'mode'     => 'delete',
                'key'      => 'Lead.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Lead',
                'blocks'   => [
                    'form' => [ 'Lead.delete' ],
                ],
            ],
            'Lead.clean'                  => [
                'document' => 'Lead',
                'mode'     => 'clean',
                'key'      => 'Lead.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Lead',
                'blocks'   => [
                    'form' => [ 'Lead.clean' ],
                ],
            ],
            'Lead.restore'                => [
                'document' => 'Lead',
                'mode'     => 'restore',
                'key'      => 'Lead.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Lead',
                'blocks'   => [
                    'form' => [ 'Lead.restore' ],
                ],
            ],
            'Lead.convert'                => [
                'document' => 'Lead',
                'mode'     => 'convert',
                'key'      => 'Lead.convert',
                'template' => 'common/formbox.twig',
                'title'    => 'Convert Lead to Patient',
                'blocks'   => [
                    'form' => [ 'Lead.convert' ],
                ],
            ],
            'Patient.list'                => [
                'document' => 'Patient',
                'mode'     => 'list',
                'key'      => 'Patient.list',
                'title'    => 'Patients',
                'template' => 'common/listbox.twig',
                'blocks'   => [
                    'list' => [ 'Patient.list' ],
                ],
            ],
            'Patient.view'                => [
                'document' => 'Patient',
                'mode'     => 'view',
                'key'      => 'Patient.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Patient view',
                'blocks'   => [
                    'view'    => [ 'Patient.view' ],
                    'toolbar_partials' => [
                        'LeadMail.templates',
                    ],
                    'view_partials' => [
                        'CardPatient.partial',
                        'NotePatient.partial'
                    ],
                    'widgets' => [
                        'AttachmentPatient.widget',
//                        'HistoryWhose.widget',
                        'ActivityPatient.widget',
//                        'NotePatient.widget',
                        'OrderPatient.widget',
                        'QuotePatient.widget',
//                        'InvoicePatient.widget',
//                        'PaymentPatient.widget',
                        'Mail.widget',
                        //  'Emails.widget'
                    ],
                ],
            ],
            'Patient.update'                => [
                'document' => 'Patient',
                'mode'     => 'edit',
                'key'      => 'Patient.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Patient edit',
                'blocks'   => [
                    'form' => [ 'Patient.update' ],
                ],
            ],
            'Patient.recyclelist'         => [
                'document' => 'Patient',
                'mode'     => 'recyclelist',
                'key'      => 'Patient.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Patients: Recycle',
                'blocks'   => [
                    'list' => [ 'Patient.recyclelist' ],
                ],
            ],
            'Patient.delete'              => [
                'document' => 'Patient',
                'mode'     => 'delete',
                'key'      => 'Patient.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Patient',
                'blocks'   => [
                    'form' => [ 'Patient.delete' ],
                ],
            ],
            'Patient.insert'              => [
                'document' => 'Patient',
                'mode'     => 'insert',
                'key'      => 'Patient.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Add Patient',
                'blocks'   => [
                    'form' => [ 'Patient.insert' ],
                ],
            ],
            'Patient.clean'               => [
                'document' => 'Patient',
                'mode'     => 'clean',
                'key'      => 'Patient.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Patient',
                'blocks'   => [
                    'form' => [ 'Patient.clean' ],
                ],
            ],
            'Patient.restore'             => [
                'document' => 'Patient',
                'mode'     => 'restore',
                'key'      => 'Patient.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Patient',
                'blocks'   => [
                    'form' => [ 'Patient.restore' ],
                ],
            ],
            'Account.list'                => [
                'document' => 'Account',
                'mode'     => 'list',
                'key'      => 'Account.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Accounts',
                'blocks'   => [
                    'list' => [ 'Account.list' ],
                ],
            ],
            'Account.view'                => [
                'document' => 'Account',
                'mode'     => 'view',
                'key'      => 'Account.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Account view',
                'blocks'   => [
                    'view'    => [ 'Account.view' ],
                    'widgets' => [
                        'PatientAccount.widget',
//                        'HistoryWhose.widget',
                        'Mail.widget'
                    ],
                ],
            ],
            'Account.update'                => [
                'document' => 'Account',
                'mode'     => 'edit',
                'key'      => 'Account.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Account edit',
                'blocks'   => [
                    'form' => [ 'Account.update' ],
                ],
            ],
            'Account.insert'              => [
                'document' => 'Account',
                'mode'     => 'insert',
                'key'      => 'Account.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Account add',
                'blocks'   => [
                    'form' => [ 'Account.insert' ],
                ],
            ],
            'Account.recyclelist'         => [
                'document' => 'Account',
                'mode'     => 'recyclelist',
                'key'      => 'Account.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Accounts: Recycle',
                'blocks'   => [
                    'list' => [ 'Account.recyclelist' ],
                ],
            ],
            'Account.delete'              => [
                'document' => 'Account',
                'mode'     => 'delete',
                'key'      => 'Account.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Account',
                'blocks'   => [
                    'form' => [ 'Account.delete' ],
                ],
            ],
            'Account.clean'               => [
                'document' => 'Account',
                'mode'     => 'clean',
                'key'      => 'Account.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Account',
                'blocks'   => [
                    'form' => [ 'Account.clean' ],
                ],
            ],
            'Account.restore'             => [
                'document' => 'Account',
                'mode'     => 'restore',
                'key'      => 'Account.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Account',
                'blocks'   => [
                    'form' => [ 'Account.restore' ],
                ],
            ],
            'Doctor.list'                 => [
                'document' => 'Doctor',
                'mode'     => 'list',
                'key'      => 'Doctor.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Doctors',
                'blocks'   => [
                    'list' => [ 'Doctor.list' ],
                ],
            ],
            'Doctor.view'                 => [
                'document' => 'Doctor',
                'mode'     => 'view',
                'key'      => 'Doctor.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Doctor view',
                'blocks'   => [
                    'view' => [ 'Doctor.view' ],
                ],
            ],
            'Doctor.update'                 => [
                'document' => 'Doctor',
                'mode'     => 'edit',
                'key'      => 'Doctor.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Doctor edit',
                'blocks'   => [
                    'form' => [ 'Doctor.update' ],
                ],
            ],
            'Doctor.recyclelist'          => [
                'document' => 'Doctor',
                'mode'     => 'recyclelist',
                'key'      => 'Doctor.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Doctors: Recycle',
                'blocks'   => [
                    'list' => [ 'Doctor.recyclelist' ],
                ],
            ],
            'Doctor.delete'               => [
                'document' => 'Doctor',
                'mode'     => 'delete',
                'key'      => 'Doctor.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Doctor',
                'blocks'   => [
                    'form' => [ 'Doctor.delete' ],
                ],
            ],
            'Doctor.clean'                => [
                'document' => 'Doctor',
                'mode'     => 'clean',
                'key'      => 'Doctor.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Doctor',
                'blocks'   => [
                    'form' => [ 'Doctor.clean' ],
                ],
            ],
            'Doctor.insert'               => [
                'document' => 'Doctor',
                'mode'     => 'insert',
                'key'      => 'Doctor.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Add Doctor',
                'blocks'   => [
                    'form' => [ 'Doctor.insert' ],
                ],
            ],
            'Doctor.restore'              => [
                'document' => 'Doctor',
                'mode'     => 'restore',
                'key'      => 'Doctor.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Doctor',
                'blocks'   => [
                    'form' => [ 'Doctor.restore' ],
                ],
            ],
            'Product.list'                => [
                'document' => 'Product',
                'mode'     => 'list',
                'key'      => 'Product.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Products',
                'blocks'   => [
                    'list' => [ 'Product.list' ],
                ],
            ],
            'Product.view'                => [
                'document' => 'Product',
                'mode'     => 'view',
                'key'      => 'Product.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Product view',
                'blocks'   => [
                    'view'    => [ 'Product.view' ],
                    'widgets' => [ 'PricebookDetail.widget' ],
                ],
            ],
            'Product.update'                => [
                'document' => 'Product',
                'mode'     => 'edit',
                'key'      => 'Product.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Product edit',
                'blocks'   => [
                    'form' => [ 'Product.update' ],
                ],
            ],
            'Product.insert'              => [
                'document' => 'Product',
                'mode'     => 'insert',
                'key'      => 'Product.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Product add',
                'blocks'   => [
                    'form' => [ 'Product.insert' ],
                ],
            ],
            'Product.recyclelist'         => [
                'document' => 'Product',
                'mode'     => 'recyclelist',
                'key'      => 'Product.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Products: Recycle',
                'blocks'   => [
                    'list' => [ 'Product.recyclelist' ],
                ],
            ],
            'Product.delete'              => [
                'document' => 'Product',
                'mode'     => 'delete',
                'key'      => 'Product.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Product',
                'blocks'   => [
                    'form' => [ 'Product.delete' ],
                ],
            ],
            'Product.clean'               => [
                'document' => 'Product',
                'mode'     => 'clean',
                'key'      => 'Product.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Product',
                'blocks'   => [
                    'form' => [ 'Product.clean' ],
                ],
            ],
            'Product.restore'             => [
                'document' => 'Product',
                'mode'     => 'restore',
                'key'      => 'Product.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Product',
                'blocks'   => [
                    'form' => [ 'Product.restore' ],
                ],
            ],
            'Document.list'               => [
                'document' => 'Document',
                'mode'     => 'list',
                'key'      => 'Document.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Documents',
                'blocks'   => [
                    'list' => [ 'Document.list' ],
                ],
            ],
            'Document.view'               => [
                'document' => 'Document',
                'mode'     => 'view',
                'key'      => 'Document.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Document view',
                'blocks'   => [
                    'view' => [ 'Document.view', /*'Document.attach'*/ ]
                ],
            ],
            'Document.update'               => [
                'document' => 'Document',
                'mode'     => 'edit',
                'key'      => 'Document.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Document edit',
                'blocks'   => [
                    'form' => [ 'Document.update' ],
                ],
            ],
            'Document.insert'             => [
                'document' => 'Document',
                'mode'     => 'insert',
                'key'      => 'Document.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Document add',
                'blocks'   => [
                    'form' => [ 'Document.insert' ],
                ],
            ],
            'Document.recyclelist'        => [
                'document' => 'Document',
                'mode'     => 'recyclelist',
                'key'      => 'Document.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Documents: Recycle',
                'blocks'   => [
                    'list' => [ 'Document.recyclelist' ],
                ],
            ],
            'Document.delete'             => [
                'document' => 'Document',
                'mode'     => 'delete',
                'key'      => 'Document.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Document',
                'blocks'   => [
                    'form' => [ 'Document.delete' ],
                ],
            ],
            'Document.clean'              => [
                'document' => 'Document',
                'mode'     => 'clean',
                'key'      => 'Document.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Document',
                'blocks'   => [
                    'form' => [ 'Document.clean' ],
                ],
            ],
            'Document.restore'            => [
                'document' => 'Document',
                'mode'     => 'restore',
                'key'      => 'Document.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Document',
                'blocks'   => [
                    'form' => [ 'Document.restore' ],
                ],
            ],
            'Document.download'           => [
                'document' => 'Document',
                'mode'     => 'download',
                'key'      => 'Document.download',
                'template' => 'common/formbox.twig',
                'title'    => 'Download Document',
                'blocks'   => [
                    'form' => [ 'Document.download' ],
                ],
            ],
            'Payment.list'                => [
                'document' => 'Payment',
                'mode'     => 'list',
                'key'      => 'Payment.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Payments',
                'blocks'   => [
                    'list' => [ 'Payment.list' ],
                ],
            ],
            'Payment.view'                => [
                'document' => 'Payment',
                'mode'     => 'view',
                'key'      => 'Payment.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Payment view',
                'blocks'   => [
                    'view' => [ 'Payment.view' ],
                ],
            ],
            'Payment.update'                => [
                'document' => 'Payment',
                'mode'     => 'edit',
                'key'      => 'Payment.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Payment edit',
                'blocks'   => [
                    'form' => [ 'Payment.update' ],
                ],
            ],
            'Payment.insert'              => [
                'document' => 'Payment',
                'mode'     => 'insert',
                'key'      => 'Payment.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Payment add',
                'blocks'   => [
                    'form' => [ 'Payment.insert' ],
                ],
            ],
            'Payment.recyclelist'         => [
                'document' => 'Payment',
                'mode'     => 'recyclelist',
                'key'      => 'Payment.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Payments: Recycle',
                'blocks'   => [
                    'list' => [ 'Payment.recyclelist' ],
                ],
            ],
            'Payment.delete'              => [
                'document' => 'Payment',
                'mode'     => 'delete',
                'key'      => 'Payment.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Payment',
                'blocks'   => [
                    'form' => [ 'Payment.delete' ],
                ],
            ],
            'Payment.clean'               => [
                'document' => 'Payment',
                'mode'     => 'clean',
                'key'      => 'Payment.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Payment',
                'blocks'   => [
                    'form' => [ 'Payment.clean' ],
                ],
            ],
            'Payment.restore'             => [
                'document' => 'Payment',
                'mode'     => 'restore',
                'key'      => 'Payment.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Payment',
                'blocks'   => [
                    'form' => [ 'Payment.restore' ],
                ],
            ],
            'Quote.list'                  => [
                'document' => 'Quote',
                'mode'     => 'list',
                'key'      => 'Quote.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Quotes',
                'blocks'   => [
                    'list' => [ 'Quote.list' ],
                ],
            ],
            'Quote.view'                  => [
                'document' => 'Quote',
                'mode'     => 'view',
                'key'      => 'Quote.view',
                'template' => 'common/detailsbox.twig',
                'title'    => 'Quote view',
                'blocks'   => [
                    'view'        => [ 'Quote.view' ],
                    'toolbar_partials' => [
                        'OrderPdf.templates',
                    ],
                    'details'     => [ 'QuoteDetail.list' ],
                    'viewPrices'  => [ 'Quote.viewPrices'],
                ],
            ],
            'Quote.update'                  => [
                'document' => 'Quote',
                'mode'     => 'edit',
                'key'      => 'Quote.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Quote edit',
                'blocks'   => [
                    'form' => [ 'Quote.update' ],
                ],
            ],
            'Quote.insert_bak'                => [
                'document' => 'Quote',
                'mode'     => 'insert',
                'key'      => 'Quote.insert_bak',
                'template' => 'common/formbox.twig',
                'title'    => 'Quote add',
                'blocks'   => [
                    'form' => [ 'Quote.insert' ],
                ],
            ],
            'Quote.insert'                => [
                'document' => 'Quote',
                'mode'     => 'insert',
                'key'      => 'Quote.insert',
                'template' => 'common/formboxjs_quote.twig',
                'title'    => 'Quote add',
                'blocks'   => [
                    'form' => [ 'Quote.insert_js' ],
                    'detail' => [ 'QuoteDetail.list_js' ],
                ],
            ],
            'Quote.recyclelist'           => [
                'document' => 'Quote',
                'mode'     => 'recyclelist',
                'key'      => 'Quote.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Quotes: Recycle',
                'blocks'   => [
                    'list' => [ 'Quote.recyclelist' ],
                ],
            ],
            'Quote.delete'                => [
                'document' => 'Quote',
                'mode'     => 'delete',
                'key'      => 'Quote.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Quote',
                'blocks'   => [
                    'form' => [ 'Quote.delete' ],
                ],
            ],
            'Quote.clean'                 => [
                'document' => 'Quote',
                'mode'     => 'clean',
                'key'      => 'Quote.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Quote',
                'blocks'   => [
                    'form' => [ 'Quote.clean' ],
                ],
            ],
            'Quote.restore'               => [
                'document' => 'Quote',
                'mode'     => 'restore',
                'key'      => 'Quote.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Quote',
                'blocks'   => [
                    'form' => [ 'Quote.restore' ],
                ],
            ],
            'Quote.convert'               => [
                'document' => 'Quote',
                'mode'     => 'convert',
                'key'      => 'Quote.convert',
                'template' => 'common/formbox.twig',
                'title'    => 'Convert Quote to Order',
                'blocks'   => [
                    'form' => [ 'Quote.convert' ],
                ],
            ],
            'Pricebook.list'              => [
                'document' => 'Pricebook',
                'mode'     => 'list',
                'key'      => 'Pricebook.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Pricebooks',
                'blocks'   => [
                    'list' => [ 'Pricebook.list' ],
                ],
            ],
            'Pricebook.view'              => [
                'document' => 'Pricebook',
                'key'      => 'Pricebook.view',
                'mode'     => 'view',
                'title'    => 'Pricebook view',
                'template' => 'common/detailsbox.twig',
                'blocks'   => [
                    'view'    => [ 'Pricebook.view' ],
                    'details' => [ 'Pricebookdetail.list' ],
                ],
            ],
            'Pricebook.update'              => [
                'document' => 'Pricebook',
                'mode'     => 'edit',
                'key'      => 'Pricebook.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Pricebook edit',
                'blocks'   => [
                    'form' => [ 'Pricebook.update' ],
                ],
            ],
            'Pricebook.insert'            => [
                'document' => 'Pricebook',
                'mode'     => 'insert',
                'key'      => 'Pricebook.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Pricebook add',
                'blocks'   => [
                    'form' => [ 'Pricebook.insert' ],
                ],
            ],
            'Pricebook.recyclelist'       => [
                'document' => 'Pricebook',
                'mode'     => 'recyclelist',
                'key'      => 'Pricebook.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Pricebooks: Recycle',
                'blocks'   => [
                    'list' => [ 'Pricebook.recyclelist' ],
                ],
            ],
            'Pricebook.delete'            => [
                'document' => 'Pricebook',
                'mode'     => 'delete',
                'key'      => 'Pricebook.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Pricebook',
                'blocks'   => [
                    'form' => [ 'Pricebook.delete' ],
                ],
            ],
            'Pricebook.clean'             => [
                'document' => 'Pricebook',
                'mode'     => 'clean',
                'key'      => 'Pricebook.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Pricebook',
                'blocks'   => [
                    'form' => [ 'Pricebook.clean' ],
                ],
            ],
            'Pricebook.restore'           => [
                'document' => 'Pricebook',
                'mode'     => 'restore',
                'key'      => 'Pricebook.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Pricebook',
                'blocks'   => [
                    'form' => [ 'Pricebook.restore' ],
                ],
            ],
            'Order.list'                  => [
                'document' => 'Order',
                'mode'     => 'list',
                'key'      => 'Order.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Sales Orders',
                'blocks'   => [
                    'list' => [ 'Order.list' ],
                ],
            ],
            'Order.view'                  => [
                'document' => 'Order',
                'mode'     => 'view',
                'key'      => 'Order.view',
                'template' => 'common/detailsbox.twig',
                'title'    => 'Sales Order view',
                'blocks'   => [
                    'view'        => [ 'Order.view' ],
                    'toolbar_partials' => [
                        'OrderPdf.templates',
                    ],
                    'details'     => [ 'OrderDetail.list' ],
                    'viewPrices'  => [ 'Order.viewPrices'],

                ],
            ],
            'Order.update'                  => [
                'document' => 'Order',
                'mode'     => 'edit',
                'key'      => 'Order.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Sales Order edit',
                'blocks'   => [
                    'form' => [ 'Order.update' ],
                ],
            ],
            'Order.insert_bak'                => [
                'document' => 'Order',
                'mode'     => 'insert',
                'key'      => 'Order.insert_bak',
                'template' => 'common/formbox.twig',
                'title'    => 'Sales Order add',
                'blocks'   => [
                    'form' => [ 'Order.insert' ],
                ],
            ],
            'Order.insert'                => [
                'document' => 'Order',
                'mode'     => 'insert',
                'key'      => 'Order.insert',
                'template' => 'common/formboxjs.twig',
                'title'    => 'Sales Order add',
                'blocks'   => [
                    'form'   =>   [ 'Order.insert_js' ],
                    'detail' =>   [ 'OrderDetail.list_js' ],
                ],
            ],
            'Order.clone'                => [
                'document' => 'Order',
                'mode'     => 'insert',
                'key'      => 'Order.clone',
                'template' => 'common/formboxjs.twig',
                'title'    => 'Sales Order clone',
                'blocks'   => [
                    'form'   =>   [ 'Order.clone' ],
                    'detail' =>   [ 'OrderDetail.list_js' ],
                ],
            ],
            'Order.recyclelist'           => [
                'document' => 'Order',
                'mode'     => 'recyclelist',
                'key'      => 'Order.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Sales Orders: Recycle',
                'blocks'   => [
                    'list' => [ 'Order.recyclelist' ],
                ],
            ],
            'Order.delete'                => [
                'document' => 'Order',
                'mode'     => 'delete',
                'key'      => 'Order.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Sales Order',
                'blocks'   => [
                    'form' => [ 'Order.delete' ],
                ],
            ],
            'Order.clean'                 => [
                'document' => 'Order',
                'mode'     => 'clean',
                'key'      => 'Order.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Sales Order',
                'blocks'   => [
                    'form' => [ 'Order.clean' ],
                ],
            ],
            'Order.restore'               => [
                'document' => 'Order',
                'mode'     => 'restore',
                'key'      => 'Order.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Sales Order',
                'blocks'   => [
                    'form' => [ 'Order.restore' ],
                ],
            ],
            'Order.convert'               => [
                'document' => 'Order',
                'mode'     => 'convert',
                'key'      => 'Order.convert',
                'template' => 'common/formbox.twig',
                'title'    => 'Convert Order to Invoice',
                'blocks'   => [
                    'form' => [ 'Order.convert' ],
                ],
            ],
            'Order.pdf'               => [
                'document' => 'Order',
                'mode'     => 'pdf',
                'key'      => 'Order.pdf',
                'template' => 'common/formbox.twig',
                'title'    => 'Convert Order to PDF',
                'blocks'   => [
                    'form' => [ 'Order.pdf' ],
                    'view' => [ 'Order.getpdf' ],
                ],
            ],
            'Invoice.list'                => [
                'document' => 'Invoice',
                'mode'     => 'list',
                'key'      => 'Invoice.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Invoices',
                'blocks'   => [
                    'list' => [ 'Invoice.list' ],
                ],
            ],
            'Invoice.view'                => [
                'document' => 'Invoice',
                'mode'     => 'view',
                'key'      => 'Invoice.view',
                'template' => 'common/detailsbox.twig',
                'title'    => 'Invoice view',
                'blocks'   => [
                    'view'        => [ 'Invoice.view' ],
                    'details'     => [ 'InvoiceDetail.list' ],
                    'viewPrices'  => [ 'Invoice.viewPrices'],
                ],
            ],
            'Invoice.update'                => [
                'document' => 'Invoice',
                'mode'     => 'edit',
                'key'      => 'Invoice.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Invoice edit',
                'blocks'   => [
                    'form' => [ 'Invoice.update' ],
                ],
            ],
            'Invoice.insert'              => [
                'document' => 'Invoice',
                'mode'     => 'insert',
                'key'      => 'Invoice.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Invoice add',
                'blocks'   => [
                    'form' => [ 'Invoice.insert' ],
                ],
            ],
            'Invoice.recyclelist'         => [
                'document' => 'Invoice',
                'mode'     => 'recyclelist',
                'key'      => 'Invoice.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Invoices: Recycle',
                'blocks'   => [
                    'list' => [ 'Invoice.recyclelist' ],
                ],
            ],
            'Invoice.delete'              => [
                'document' => 'Invoice',
                'mode'     => 'delete',
                'key'      => 'Invoice.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Invoice',
                'blocks'   => [
                    'form' => [ 'Invoice.delete' ],
                ],
            ],
            'Invoice.clean'               => [
                'document' => 'Invoice',
                'mode'     => 'clean',
                'key'      => 'Invoice.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Invoice',
                'blocks'   => [
                    'form' => [ 'Invoice.clean' ],
                ],
            ],
            'Invoice.restore'             => [
                'document' => 'Invoice',
                'mode'     => 'restore',
                'key'      => 'Invoice.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Invoice',
                'blocks'   => [
                    'form' => [ 'Invoice.restore' ],
                ],
            ],
            'User.list'                   => [
                'document' => 'User',
                'mode'     => 'list',
                'key'      => 'User.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Users',
                'blocks'   => [
                    'list' => [ 'User.list' ],
                ],
            ],
            'User.view'                   => [
                'document' => 'User',
                'mode'     => 'view',
                'key'      => 'User.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'User view',
                'blocks'   => [
                    'view'    => [ 'User.view' ],
                    'widgets' => [
                        'AttachmentUser.widget',
//                        'History.widget',
                        'ActivityUser.widget',
                        'OrderUser.widget',
                        'QuoteUser.widget',
//                        'InvoiceUser.widget',
                        'PaymentUser.widget',
                        'LeadUser.widget',
                        'PatientUser.widget',
                        'AccountUser.widget',
                        'ProductUser.widget',
                        'PricebookUser.widget',
                        'Mail.widget',
                    ],
                ],
            ],
            'User.update'                   => [
                'document' => 'User',
                'mode'     => 'edit',
                'key'      => 'User.update',
                'template' => 'common/formbox.twig',
                'title'    => 'User edit',
                'blocks'   => [
                    'form' => [ 'User.update' ],
                ],
            ],
            'User.insert'                 => [
                'document' => 'User',
                'mode'     => 'insert',
                'key'      => 'User.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'User add',
                'blocks'   => [
                    'form' => [ 'User.insert' ],
                ],
            ],
            'User.recyclelist'            => [
                'document' => 'User',
                'mode'     => 'recyclelist',
                'key'      => 'User.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Users: Recycle',
                'blocks'   => [
                    'list' => [ 'User.recyclelist' ],
                ],
            ],
            'User.delete'                 => [
                'document' => 'User',
                'mode'     => 'delete',
                'key'      => 'User.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete User',
                'blocks'   => [
                    'form' => [ 'User.delete' ],
                ],
            ],
            'User.clean'                  => [
                'document' => 'User',
                'mode'     => 'clean',
                'key'      => 'User.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean User',
                'blocks'   => [
                    'form' => [ 'User.clean' ],
                ],
            ],
            'User.restore'                => [
                'document' => 'User',
                'mode'     => 'restore',
                'key'      => 'User.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore User',
                'blocks'   => [
                    'form' => [ 'User.restore' ],
                ],
            ],
            'Pricebookdetail.list'        => [
                'document' => 'PricebookDetail',
                'mode'     => 'list',
                'key'      => 'PricebookDetail.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Pricebook Details',
                'blocks'   => [
                    'list' => [ 'Pricebookdetail.list' ],
                ],
            ],
            'Pricebookdetail.view'        => [
                'document' => 'PricebookDetail',
                'mode'     => 'view',
                'key'      => 'PricebookDetail.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Pricebook Detail view',
                'blocks'   => [
                    'view' => [ 'PricebookDetail.view' ],
                ],
            ],
            'Pricebookdetail.update'        => [
                'document' => 'PricebookDetail',
                'mode'     => 'edit',
                'key'      => 'PricebookDetail.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Pricebook Detail edit',
                'blocks'   => [
                    'form' => [ 'PricebookDetail.update' ],
                ],
            ],
            'Pricebookdetail.insert'      => [
                'document' => 'PricebookDetail',
                'mode'     => 'insert',
                'key'      => 'PricebookDetail.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Pricebook Detail add',
                'blocks'   => [
                    'form' => [ 'PricebookDetail.insert' ],
                ],
            ],
            'Pricebookdetail.recyclelist' => [
                'document' => 'PricebookDetail',
                'mode'     => 'recyclelist',
                'key'      => 'PricebookDetail.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Pricebook Details: Recycle',
                'blocks'   => [
                    'list' => [ 'PricebookDetail.recyclelist' ],
                ],
            ],
            'Pricebookdetail.delete'      => [
                'document' => 'PricebookDetail',
                'mode'     => 'delete',
                'key'      => 'PricebookDetail.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Pricebook Detail',
                'blocks'   => [
                    'form' => [ 'PricebookDetail.delete' ],
                ],
            ],
            'Pricebookdetail.clean'       => [
                'document' => 'PricebookDetail',
                'mode'     => 'clean',
                'key'      => 'PricebookDetail.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Pricebook Detail',
                'blocks'   => [
                    'form' => [ 'PricebookDetail.clean' ],
                ],
            ],
            'Pricebookdetail.restore'     => [
                'document' => 'PricebookDetail',
                'mode'     => 'restore',
                'key'      => 'PricebookDetail.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Pricebook Detail',
                'blocks'   => [
                    'form' => [ 'PricebookDetail.restore' ],
                ],
            ],
            'Quote.clone'                => [
                'document' => 'Quote',
                'mode'     => 'insert',
                'key'      => 'Quote.clone',
                'template' => 'common/formboxjs_quote.twig',
                'title'    => 'Quote clone',
                'blocks'   => [
                    'form'   =>   [ 'Quote.clone' ],
                    'detail' =>   [ 'QuoteDetail.list_js' ],
                ],
            ],
            'Quotedetail.list'            => [
                'document' => 'QuoteDetail',
                'mode'     => 'list',
                'key'      => 'QuoteDetail.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Quote Details',
                'blocks'   => [
                    'list' => [ 'QuoteDetail.list' ],
                ],
            ],
            'Quotedetail.view'            => [
                'document' => 'QuoteDetail',
                'mode'     => 'view',
                'key'      => 'QuoteDetail.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Quote Detail view',
                'blocks'   => [
                    'view' => [ 'QuoteDetail.view' ],
                ],
            ],
            'Quotedetail.update'            => [
                'document' => 'QuoteDetail',
                'mode'     => 'edit',
                'key'      => 'QuoteDetail.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Quote Detail edit',
                'blocks'   => [
                    'form' => [ 'QuoteDetail.update' ],
                ],
            ],
            'Quotedetail.insert'          => [
                'document' => 'QuoteDetail',
                'mode'     => 'insert',
                'key'      => 'QuoteDetail.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Quote Detail add',
                'blocks'   => [
                    'form' => [ 'QuoteDetail.insert' ],
                ],
            ],
            'Quotedetail.recyclelist'     => [
                'document' => 'QuoteDetail',
                'mode'     => 'recyclelist',
                'key'      => 'QuoteDetail.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Quote Details: Recycle',
                'blocks'   => [
                    'list' => [ 'QuoteDetail.recyclelist' ],
                ],
            ],
            'Quotedetail.delete'          => [
                'document' => 'QuoteDetail',
                'mode'     => 'delete',
                'key'      => 'QuoteDetail.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Quote Detail',
                'blocks'   => [
                    'form' => [ 'QuoteDetail.delete' ],
                ],
            ],
            'Quotedetail.clean'           => [
                'document' => 'QuoteDetail',
                'mode'     => 'clean',
                'key'      => 'QuoteDetail.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Quote Detail',
                'blocks'   => [
                    'form' => [ 'QuoteDetail.clean' ],
                ],
            ],
            'Quotedetail.restore'         => [
                'document' => 'QuoteDetail',
                'mode'     => 'restore',
                'key'      => 'QuoteDetail.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Quote Detail',
                'blocks'   => [
                    'form' => [ 'QuoteDetail.restore' ],
                ],
            ],
            'Orderdetail.list'            => [
                'document' => 'OrderDetail',
                'mode'     => 'list',
                'key'      => 'OrderDetail.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Sales Order Details',
                'blocks'   => [
                    'list' => [ 'OrderDetail.list' ],
                ],
            ],
            'Orderdetail.view'            => [
                'document' => 'OrderDetail',
                'mode'     => 'view',
                'key'      => 'OrderDetail.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Sales Order Detail view',
                'blocks'   => [
                    'view' => [ 'OrderDetail.view' ],
                ],
            ],
            'Orderdetail.update'            => [
                'document' => 'OrderDetail',
                'mode'     => 'edit',
                'key'      => 'OrderDetail.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Sales Order Detail edit',
                'blocks'   => [
                    'form' => [ 'OrderDetail.update' ],
                ],
            ],
            'Orderdetail.insert'          => [
                'document' => 'OrderDetail',
                'mode'     => 'insert',
                'key'      => 'OrderDetail.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Sales Order Detail add',
                'blocks'   => [
                    'form' => [ 'OrderDetail.insert' ],
                ],
            ],
            'Orderdetail.recyclelist'     => [
                'document' => 'OrderDetail',
                'mode'     => 'recyclelist',
                'key'      => 'OrderDetail.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Sales Order Details: Recycle',
                'blocks'   => [
                    'list' => [ 'OrderDetail.recyclelist' ],
                ],
            ],
            'Orderdetail.delete'          => [
                'document' => 'OrderDetail',
                'mode'     => 'delete',
                'key'      => 'OrderDetail.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Sales Order Detail',
                'blocks'   => [
                    'form' => [ 'OrderDetail.delete' ],
                ],
            ],
            'Orderdetail.clean'           => [
                'document' => 'OrderDetail',
                'mode'     => 'clean',
                'key'      => 'OrderDetail.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Sales Order Detail',
                'blocks'   => [
                    'form' => [ 'OrderDetail.clean' ],
                ],
            ],
            'Orderdetail.restore'         => [
                'document' => 'OrderDetail',
                'mode'     => 'restore',
                'key'      => 'OrderDetail.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Sales Order Detail',
                'blocks'   => [
                    'form' => [ 'OrderDetail.restore' ],
                ],
            ],
            'Invoicedetail.list'          => [
                'document' => 'InvoiceDetail',
                'mode'     => 'list',
                'key'      => 'InvoiceDetail.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Invoice Details',
                'blocks'   => [
                    'list' => [ 'InvoiceDetail.list' ],
                ],
            ],
            'Invoicedetail.view'          => [
                'document' => 'InvoiceDetail',
                'mode'     => 'view',
                'key'      => 'InvoiceDetail.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Invoice Detail view',
                'blocks'   => [
                    'view' => [ 'InvoiceDetail.view' ],
                ],
            ],
            'Invoicedetail.update'          => [
                'document' => 'InvoiceDetail',
                'mode'     => 'edit',
                'key'      => 'InvoiceDetail.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Invoice Detail edit',
                'blocks'   => [
                    'form' => [ 'InvoiceDetail.update' ],
                ],
            ],
            'Invoicedetail.insert'        => [
                'document' => 'InvoiceDetail',
                'mode'     => 'insert',
                'key'      => 'InvoiceDetail.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Invoice Detail add',
                'blocks'   => [
                    'form' => [ 'InvoiceDetail.insert' ],
                ],
            ],
            'Invoicedetail.recyclelist'   => [
                'document' => 'InvoiceDetail',
                'mode'     => 'recyclelist',
                'key'      => 'InvoiceDetail.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Invoice Details: Recycle',
                'blocks'   => [
                    'list' => [ 'InvoiceDetail.recyclelist' ],
                ],
            ],
            'Invoicedetail.delete'        => [
                'document' => 'InvoiceDetail',
                'mode'     => 'delete',
                'key'      => 'Lead.delete',
                'title'    => 'Delete Invoice Detail',
                'blocks'   => [
                    'delete' => [ 'InvoiceDetail.delete' ],
                ],
            ],
            'Invoicedetail.clean'         => [
                'document' => 'InvoiceDetail',
                'mode'     => 'clean',
                'key'      => 'InvoiceDetail.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Invoice Detail',
                'blocks'   => [
                    'form' => [ 'InvoiceDetail.clean' ],
                ],
            ],
            'Invoicedetail.restore'       => [
                'document' => 'InvoiceDetail',
                'mode'     => 'restore',
                'key'      => 'InvoiceDetail.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Invoice Detail',
                'blocks'   => [
                    'form' => [ 'InvoiceDetail.restore' ],
                ],
            ],
            'Call.list'                   => [
                'document' => 'Call',
                'mode'     => 'list',
                'key'      => 'Call.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Calls',
                'blocks'   => [
                    'list' => [ 'Call.list' ],
                ],
            ],
            'Calllead.insert'             => [
                'document' => 'Calllead',
                'mode'     => 'insert',
                'key'      => 'Calllead.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'New Call to lead',
                'blocks'   => [
                    'form' => [ 'CallLead.insert' ],
                ],
            ],
            'Calllead.view'               => [
                'document' => 'Calllead',
                'mode'     => 'view',
                'key'      => 'Calllead.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Call to lead',
                'blocks'   => [
                    'view' => [ 'Calllead.view' ],
                ],
            ],
            'Callpatient.insert'          => [
                'document' => 'Callpatient',
                'mode'     => 'insert',
                'key'      => 'Callpatient.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'New Call to patient',
                'blocks'   => [
                    'form' => [ 'CallPatient.insert' ],
                ],
            ],
            'Callpatient.view'            => [
                'document' => 'Callpatient',
                'mode'     => 'view',
                'key'      => 'Callpatient.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Call to patient',
                'blocks'   => [
                    'view' => [ 'CallPatient.view' ],
                ],
            ],
            'Tasklead.insert'             => [
                'document' => 'Tasklead',
                'mode'     => 'insert',
                'key'      => 'Tasklead.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'New Task to lead',
                'blocks'   => [
                    'form' => [ 'TaskLead.insert' ],
                ],
            ],
            'Tasklead.view'               => [
                'document' => 'Tasklead',
                'mode'     => 'view',
                'key'      => 'Tasklead.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Task to lead',
                'blocks'   => [
                    'view' => [ 'TaskLead.view' ],
                ],
            ],
            'Taskpatient.view'            => [
                'document' => 'Taskpatient',
                'mode'     => 'view',
                'key'      => 'Taskpatient.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Task to patient',
                'blocks'   => [
                    'view' => [ 'TaskPatient.view' ],
                ],
            ],
            'Taskpatient.insert'          => [
                'document' => 'Taskpatient',
                'mode'     => 'insert',
                'key'      => 'Taskpatient.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'New Task to patient',
                'blocks'   => [
                    'form' => [ 'TaskPatient.insert' ],
                ],
            ],
            'Eventlead.insert'            => [
                'document' => 'Eventlead',
                'mode'     => 'insert',
                'key'      => 'Eventlead.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'New Event to lead',
                'blocks'   => [
                    'form' => [ 'EventLead.insert' ],
                ],
            ],
            'Eventpatient.insert'         => [
                'document' => 'Eventpatient',
                'mode'     => 'insert',
                'key'      => 'Eventpatient.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'New Event to patient',
                'blocks'   => [
                    'form' => [ 'EventPatient.insert' ],
                ],
            ],
            'Eventlead.update'              => [
                'document' => 'Eventlead',
                'mode'     => 'update',
                'key'      => 'Eventlead.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Edit Event to lead',
                'blocks'   => [
                    'form' => [ 'EventLead.update' ],
                ],
            ],
            'Eventpatient.update'           => [
                'document' => 'Eventpatient',
                'mode'     => 'update',
                'key'      => 'Eventpatient.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Edit Event to patient',
                'blocks'   => [
                    'form' => [ 'EventPatient.update' ],
                ],
            ],
            'Tasklead.update'               => [
                'document' => 'Tasklead',
                'mode'     => 'update',
                'key'      => 'Tasklead.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Edit Task to lead',
                'blocks'   => [
                    'form' => [ 'TaskLead.update' ],
                ],
            ],
            'Taskpatient.update'            => [
                'document' => 'Taskpatient',
                'mode'     => 'update',
                'key'      => 'Taskpatient.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Edit Task to patient',
                'blocks'   => [
                    'form' => [ 'TaskPatient.update' ],
                ],
            ],
            'Calllead.update'               => [
                'document' => 'Calllead',
                'mode'     => 'update',
                'key'      => 'Calllead.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Edit Call to lead',
                'blocks'   => [
                    'form' => [ 'CallLead.update' ],
                ],
            ],
            'Callpatient.update'            => [
                'document' => 'Callpatient',
                'mode'     => 'update',
                'key'      => 'Callpatient.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Edit Call to patient',
                'blocks'   => [
                    'form' => [ 'CallPatient.update' ],
                ],
            ],
            'Eventlead.view'              => [
                'document' => 'Eventlead',
                'mode'     => 'view',
                'key'      => 'Eventlead.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Event to lead',
                'blocks'   => [
                    'view' => [ 'Eventlead.view' ],
                ],
            ],
            'Eventpatient.view'           => [
                'document' => 'Eventpatient',
                'mode'     => 'view',
                'key'      => 'Eventpatient.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Event to patient',
                'blocks'   => [
                    'view' => [ 'Eventpatient.view' ],
                ],
            ],
            'Eventpatient.delete'         => [
                'document' => 'Eventpatient',
                'mode'     => 'delete',
                'key'      => 'Eventpatient.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Event',
                'blocks'   => [
                    'form' => [ 'EventPatient.delete' ],
                ],
            ],
            'Eventpatient.clean'          => [
                'document' => 'Eventpatient',
                'mode'     => 'clean',
                'key'      => 'Eventpatient.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Event',
                'blocks'   => [
                    'form' => [ 'EventPatient.clean' ],
                ],
            ],
            'Eventpatient.restore'        => [
                'document' => 'Eventpatient',
                'mode'     => 'restore',
                'key'      => 'Eventpatient.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Event',
                'blocks'   => [
                    'form' => [ 'EventPatient.restore' ],
                ],
            ],
            'Taskpatient.delete'          => [
                'document' => 'Taskpatient',
                'mode'     => 'delete',
                'key'      => 'Taskpatient.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Task',
                'blocks'   => [
                    'form' => [ 'TaskPatient.delete' ],
                ],
            ],
            'Taskpatient.clean'           => [
                'document' => 'Taskpatient',
                'mode'     => 'clean',
                'key'      => 'Taskpatient.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Task',
                'blocks'   => [
                    'form' => [ 'TaskPatient.clean' ],
                ],
            ],
            'Taskpatient.restore'         => [
                'document' => 'Taskpatient',
                'mode'     => 'restore',
                'key'      => 'Taskpatient.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Task',
                'blocks'   => [
                    'form' => [ 'TaskPatient.restore' ],
                ],
            ],
            'Callpatient.delete'          => [
                'document' => 'Callpatient',
                'mode'     => 'delete',
                'key'      => 'Callpatient.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Call',
                'blocks'   => [
                    'form' => [ 'CallPatient.delete' ],
                ],
            ],
            'Callpatient.clean'           => [
                'document' => 'Callpatient',
                'mode'     => 'clean',
                'key'      => 'Callpatient.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Call',
                'blocks'   => [
                    'form' => [ 'CallPatient.clean' ],
                ],
            ],
            'Callpatient.restore'         => [
                'document' => 'Callpatient',
                'mode'     => 'restore',
                'key'      => 'Callpatient.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Call',
                'blocks'   => [
                    'form' => [ 'CallPatient.restore' ],
                ],
            ],
            'Eventlead.delete'            => [
                'document' => 'Eventlead',
                'mode'     => 'delete',
                'key'      => 'Eventlead.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Event',
                'blocks'   => [
                    'form' => [ 'EventLead.delete' ],
                ],
            ],
            'Eventlead.clean'             => [
                'document' => 'Eventlead',
                'mode'     => 'clean',
                'key'      => 'Eventlead.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Event',
                'blocks'   => [
                    'form' => [ 'EventLead.clean' ],
                ],
            ],
            'Eventlead.restore'           => [
                'document' => 'Eventlead',
                'mode'     => 'restore',
                'key'      => 'Eventlead.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Event',
                'blocks'   => [
                    'form' => [ 'EventLead.restore' ],
                ],
            ],
            'Tasklead.delete'             => [
                'document' => 'Tasklead',
                'mode'     => 'delete',
                'key'      => 'Tasklead.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Task',
                'blocks'   => [
                    'form' => [ 'TaskLead.delete' ],
                ],
            ],
            'Tasklead.clean'              => [
                'document' => 'Tasklead',
                'mode'     => 'clean',
                'key'      => 'Tasklead.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Task',
                'blocks'   => [
                    'form' => [ 'TaskLead.clean' ],
                ],
            ],
            'Tasklead.restore'            => [
                'document' => 'Tasklead',
                'mode'     => 'restore',
                'key'      => 'Tasklead.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Task',
                'blocks'   => [
                    'form' => [ 'TaskLead.restore' ],
                ],
            ],
            'Calllead.delete'             => [
                'document' => 'Calllead',
                'mode'     => 'delete',
                'key'      => 'Calllead.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Call',
                'blocks'   => [
                    'form' => [ 'CallLead.delete' ],
                ],
            ],
            'Calllead.clean'              => [
                'document' => 'Calllead',
                'mode'     => 'clean',
                'key'      => 'Calllead.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Call',
                'blocks'   => [
                    'form' => [ 'CallLead.clean' ],
                ],
            ],
            'Calllead.restore'            => [
                'document' => 'Calllead',
                'mode'     => 'restore',
                'key'      => 'Calllead.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Call',
                'blocks'   => [
                    'form' => [ 'CallLead.restore' ],
                ],
            ],
            'Task.list'                   => [
                'document' => 'Task',
                'mode'     => 'list',
                'key'      => 'Task.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Tasks',
                'blocks'   => [
                    'list' => [ 'Task.list' ],
                ],
            ],
            'Event.list'                  => [
                'document' => 'Event',
                'mode'     => 'list',
                'key'      => 'Event.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Events',
                'blocks'   => [
                    'list' => [ 'Event.list' ],
                ],
            ],
            'Activity.list'               => [
                'document' => 'Activity',
                'mode'     => 'list',
                'key'      => 'Activity.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Activities',
                'blocks'   => [
                    'list' => [ 'Activity.list' ],
                ],
            ],
            'Activity.view'               => [
                'document' => 'Activity',
                'mode'     => 'view',
                'key'      => 'Activity.view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Activity view',
                'blocks'   => [
                    'view' => [ 'Activity.view' ],
                ],
            ],
            'Activity.update'               => [
                'document' => 'Activity',
                'mode'     => 'edit',
                'key'      => 'Activity.update',
                'template' => 'common/formbox.twig',
                'title'    => 'Activity edit',
                'blocks'   => [
                    'form' => [ 'Activity.update' ],
                ],
            ],
            'Activity.insert'             => [
                'document' => 'Activity',
                'mode'     => 'insert',
                'key'      => 'Activity.insert',
                'template' => 'common/formbox.twig',
                'title'    => 'Activity add',
                'blocks'   => [
                    'form' => [ 'Activity.insert' ],
                ],
            ],
            'Activity.recyclelist'        => [
                'document' => 'Activity',
                'mode'     => 'recyclelist',
                'key'      => 'Activity.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Activities: Recycle',
                'blocks'   => [
                    'list' => [ 'Activity.recyclelist' ],
                ],
            ],
            'Callpatient.recyclelist'     => [
                'document' => 'Callpatient',
                'mode'     => 'recyclelist',
                'key'      => 'Callpatient.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Call to Patients: Recycle',
                'blocks'   => [
                    'list' => [ 'CallPatient.recyclelist' ],
                ],
            ],
            'Taskpatient.recyclelist'     => [
                'document' => 'Taskpatient',
                'mode'     => 'recyclelist',
                'key'      => 'Taskpatient.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Task to Patients: Recycle',
                'blocks'   => [
                    'list' => [ 'TaskPatient.recyclelist' ],
                ],
            ],
            'Eventpatient.recyclelist'    => [
                'document' => 'Eventpatient',
                'mode'     => 'recyclelist',
                'key'      => 'Eventpatient.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'EventPatients: Recycle',
                'blocks'   => [
                    'list' => [ 'EventPatient.recyclelist' ],
                ],
            ],
            'Calllead.recyclelist'        => [
                'document' => 'Calllead',
                'mode'     => 'recyclelist',
                'key'      => 'Calllead.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Call to Leads: Recycle',
                'blocks'   => [
                    'list' => [ 'CallLead.recyclelist' ],
                ],
            ],
            'Tasklead.recyclelist'        => [
                'document' => 'Tasklead',
                'mode'     => 'recyclelist',
                'key'      => 'Tasklead.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Task to Leads: Recycle',
                'blocks'   => [
                    'list' => [ 'TaskLead.recyclelist' ],
                ],
            ],
            'Eventlead.recyclelist'       => [
                'document' => 'Eventlead',
                'mode'     => 'recyclelist',
                'key'      => 'Eventlead.recyclelist',
                'template' => 'common/listbox.twig',
                'title'    => 'Event to Leads: Recycle',
                'blocks'   => [
                    'list' => [ 'EventLead.recyclelist' ],
                ],
            ],
            'Callpatient.list'            => [
                'document' => 'Callpatient',
                'mode'     => 'list',
                'key'      => 'Callpatient.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Call to Patients',
                'blocks'   => [
                    'list' => [ 'CallPatient.list' ],
                ],
            ],
            'Taskpatient.list'            => [
                'document' => 'Taskpatient',
                'mode'     => 'list',
                'key'      => 'Taskpatient.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Task to Patients',
                'blocks'   => [
                    'list' => [ 'TaskPatient.list' ],
                ],
            ],
            'Eventpatient.list'           => [
                'document' => 'Eventpatient',
                'mode'     => 'list',
                'key'      => 'Eventpatient.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Event to Patients',
                'blocks'   => [
                    'list' => [ 'EventPatient.list' ],
                ],
            ],
            'Calllead.list'               => [
                'document' => 'Calllead',
                'mode'     => 'list',
                'key'      => 'Calllead.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Calls to Leads',
                'blocks'   => [
                    'list' => [ 'CallLead.list' ],
                ],
            ],
            'Tasklead.list'               => [
                'document' => 'Tasklead',
                'mode'     => 'list',
                'key'      => 'Tasklead.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Tasks to Leads',
                'blocks'   => [
                    'list' => [ 'TaskLead.list' ],
                ],
            ],
            'Eventlead.list'              => [
                'document' => 'Eventlead',
                'mode'     => 'list',
                'key'      => 'Eventlead.list',
                'template' => 'common/listbox.twig',
                'title'    => 'Events to Leads',
                'blocks'   => [
                    'list' => [ 'EventLead.list' ],
                ],
            ],
            'Activity.delete'             => [
                'document' => 'Activity',
                'mode'     => 'delete',
                'key'      => 'Activity.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Activity',
                'blocks'   => [
                    'form' => [ 'Activity.delete' ],
                ],
            ],
            'Activity.clean'              => [
                'document' => 'Activity',
                'mode'     => 'clean',
                'key'      => 'Activity.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Activity',
                'blocks'   => [
                    'form' => [ 'Activity.clean' ],
                ],
            ],
            'Activity.restore'            => [
                'document' => 'Activity',
                'mode'     => 'restore',
                'key'      => 'Activity.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Activity',
                'blocks'   => [
                    'form' => [ 'Activity.restore' ],
                ],
            ],
            'Vendor.list'                 => [
                'document' => 'Vendor',
                'key'      => 'Vendor.list',
                'template' => 'common/listbox.twig',
                'mode'     => 'list',
                'title'    => 'Vendors',
                'blocks'   => [
                    'list' => [ 'Vendor.list' ],
                ],
            ],
            'TemplatePDF.list'                 => [
                'document' => 'TemplatePDF',
                'key'      => 'TemplatePDF.list',
                'template' => 'common/listbox.twig',
                'mode'     => 'list',
                'title'    => 'Templates for PDF',
                'blocks'   => [
                    'list' => [ 'TemplatePDF.list' ],
                ],
            ],
            'TemplatePDF.insert'                 => [
                'document' => 'TemplatePDF',
                'key'      => 'TemplatePDF.insert',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Templates for PDF add',
                'blocks'   => [
                    'form' => [ 'Tiny.menu','TemplatePDF.insert' ],
                ],
            ],
            'TemplatePDF.update'                 => [
                'document' => 'TemplatePDF',
                'key'      => 'TemplatePDF.update',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Templates for PDF add',
                'blocks'   => [
                    'form' => ['Tiny.menu', 'TemplatePDF.update' ],
                ],
            ],
            'TemplatePDF.view'                 => [
                'document' => 'TemplatePDF',
                'key'      => 'TemplatePDF.view',
                'template' => 'common/viewbox.twig',
                'mode'     => 'view',
                'title'    => 'Templates for PDF',
                'blocks'   => [
                    'view' => [ 'TemplatePDF.view' ],
                ],
            ],
            'TemplatePDF.delete'             => [
                'document' => 'TemplatePDF',
                'mode'     => 'delete',
                'key'      => 'TemplatePDF.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Template PDF',
                'blocks'   => [
                    'form' => [ 'TemplatePDF.delete' ],
                ],
            ],
            'TemplatePDF.clean'              => [
                'document' => 'TemplatePDF',
                'mode'     => 'clean',
                'key'      => 'TemplatePDF.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Template PDF',
                'blocks'   => [
                    'form' => [ 'TemplatePDF.clean' ],
                ],
            ],
            'TemplatePDF.restore'            => [
                'document' => 'TemplatePDF',
                'mode'     => 'restore',
                'key'      => 'TemplatePDF.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Template PDF',
                'blocks'   => [
                    'form' => [ 'TemplatePDF.restore' ],
                ],
            ],
            'TemplateEmail.list'                 => [
                'document' => 'TemplateEmail',
                'key'      => 'TemplateEmail.list',
                'template' => 'common/listbox.twig',
                'mode'     => 'list',
                'title'    => 'Templates for Email',
                'blocks'   => [
                    'list' => [ 'TemplateEmail.list' ],
                ],
            ],
            'TemplateEmail.insert'                 => [
                'document' => 'TemplateEmail',
                'key'      => 'TemplateEmail.insert',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Templates for Email add',
                'blocks'   => [
                    'form' => [ 'Tiny.menu','TemplateEmail.insert' ],
                ],
            ],
            'TemplateEmail.update'                 => [
                'document' => 'TemplateEmail',
                'key'      => 'TemplateEmail.update',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Templates for Email add',
                'blocks'   => [
                    'form' => [ 'Tiny.menu','TemplateEmail.update' ],
                ],
            ],
            'TemplateEmail.view'                 => [
                'document' => 'TemplateEmail',
                'key'      => 'TemplateEmail.view',
                'template' => 'common/viewbox.twig',
                'mode'     => 'view',
                'title'    => 'Templates for Email',
                'blocks'   => [
                    'view' => [ 'TemplateEmail.view' ],
                ],
            ],
            'TemplateEmail.delete'             => [
                'document' => 'TemplateEmail',
                'mode'     => 'delete',
                'key'      => 'TemplateEmail.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Template Email',
                'blocks'   => [
                    'form' => [ 'TemplateEmail.delete' ],
                ],
            ],
            'TemplateEmail.clean'              => [
                'document' => 'TemplateEmail',
                'mode'     => 'clean',
                'key'      => 'TemplateEmail.clean',
                'template' => 'common/formbox.twig',
                'title'    => 'Clean Template Email',
                'blocks'   => [
                    'form' => [ 'TemplateEmail.clean' ],
                ],
            ],
            'TemplateEmail.restore'            => [
                'document' => 'TemplateEmail',
                'mode'     => 'restore',
                'key'      => 'TemplateEmail.restore',
                'template' => 'common/formbox.twig',
                'title'    => 'Restore Template Email',
                'blocks'   => [
                    'form' => [ 'TemplateEmail.restore' ],
                ],
            ],
            'TemplateEmailFolder.list'                 => [
                'document' => 'TemplateEmailFolder',
                'key'      => 'TemplateEmailFolder.list',
                'template' => 'common/listbox.twig',
                'mode'     => 'list',
                'title'    => 'Templates for Email',
                'blocks'   => [
                    'list' => [ 'TemplateEmailFolder.list' ],
                ],
            ],
            'TemplateEmailFolder.insert'                 => [
                'document' => 'TemplateEmailFolder',
                'key'      => 'TemplateEmailFolder.insert',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Templates for Email add',
                'blocks'   => [
                    'form' => [ 'TemplateEmailFolder.insert' ],
                ],
            ],
            'TemplateEmailFolder.update'                 => [
                'document' => 'TemplateEmailFolder',
                'key'      => 'TemplateEmailFolder.update',
                'template' => 'common/formbox.twig',
                'mode'     => 'insert',
                'title'    => 'Templates for Email add',
                'blocks'   => [
                    'form' => [ 'TemplateEmailFolder.update' ],
                ],
            ],
            'TemplateEmailFolder.delete'             => [
                'document' => 'TemplateEmailFolder',
                'mode'     => 'delete',
                'key'      => 'TemplateEmailFolder.delete',
                'template' => 'common/formbox.twig',
                'title'    => 'Delete Template Email',
                'blocks'   => [
                    'form' => [ 'TemplateEmailFolder.delete' ],
                ],
            ],
            'Lead.mail'                   => [
                'document' => 'Lead',
                'key'      => 'Lead.mail',
                'mode'     => 'view',
                'template' => 'common/viewbox.twig',
                'title'    => 'Lead view',
                'blocks'   => [
                    'view'    => [ 'Lead.view' ],
                    'toolbar_partials' => [
                        'LeadMail.templates',
                    ],
                    'widgets' => [
                        'ActivityLead.widget',
                        'AttachmentLead.widget',
//                        'HistoryWhose.widget',
                        'Mail.widget',
                    ],
                ],
            ],

        ],
    ]

];
