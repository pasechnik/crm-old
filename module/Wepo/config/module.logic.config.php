<?php

use \Wepo\Model\Status;

return [
    'LogicConfig' => [
        'system' => [

            'Email.update'                   => [
                'key'       => 'Email.update',
                'model'     => 'Email',
                'observers' => [
                    'FillJoinsObserver',
                ],
            ],
            'EmailToMail.update'             => [
                'key'       => 'EmailToMail.update',
                'model'     => 'EmailToMail',
                'observers' => [
                    'FillJoinsObserver',
                ],
            ],
            //SENDING MAILS
            'User.mailsend'                  => [
                'key'       => 'User.mailsend',
                'model'     => 'User',
                'observers' => [
                    'MailSyncObserver' => [ 'action' => 'send' ],
                ],
            ],
            //END SENDING MAILS
            //FETCHING MAILS
            'User.mailfetch'                 => [
                'key'       => 'User.mailfetch',
                'model'     => 'User',
                'observers' => [
                    'MailSyncObserver' => [ 'action' => 'fetch' ],
                ],
            ],
            //END FETCHING MAILS
            //COMMON MAIL STUFF
            'Mail.postview'                  => [
                'key'       => 'Mail.postview',
                'model'     => 'Mail',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [ Status::NEW_, Status::NORMAL ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Mail.create'                    => [
                'key'       => 'Mail.sync',
                'model'     => 'Mail',
                'observers' => [
                    'AclObserver' => [
                        '_acl' => [
                            'owner' => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'MailDetail.setDefaults'         => [
                'key'       => 'MailDetail.setDefaults',
                'model'     => 'MailDetail',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [
                        'to_id'       => 'recipient',
                        'template_id' => 'template'
                    ],
                ],
            ],
            'MailDetail.presave'             => [
                'key'       => 'MailDetail.presave',
                'model'     => 'MailDetail',
                'observers' => [
                    'AclObserver'   => [
                        '_acl' => [
                            'owner' => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                        ],
                    ],
                    'OwnerObserver' => [ 'owner_id' ],
                    'FillJoinsObserver'
                ],
            ],
            'MailDetail.postview'            => [
                'key'       => 'MailDetail.postview',
                'model'     => 'MailDetail',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'MailDetail.delete'              => [
                'key'       => 'MailDetail.delete',
                'model'     => 'MailDetail',
                'observers' => [
                    'MailChainObserver' => [ 'action' => 'delete' ],
                    'MailLinkObserver'  => [ 'action' => 'delete' ],
                ],
            ],
            'MailDetail.postsync'            => [
                'key'       => 'MailDetail.update',
                'model'     => 'MailDetail',
                'observers' => [
                    'MailLinkObserver'  => [ 'action' => 'update' ],
                    'MailChainObserver' => [ 'action' => 'update' ],
                    'UpdateMailFields'  => [ 'destination' => 'from_to_title' ],
                    'SaveObserver'
                ],
            ],
            'MailDetail.updateTitle'         => [
                'key'       => 'MailDetail.updateTitle',
                'model'     => 'MailDetail',
                'observers' => [
                    'UpdateMailFields' => [ 'destination' => 'from_to_title' ],
                    'SaveObserver',
                ],
            ],
            //END COMMON MAIL STUFF
            'MailSendSetting.setDefaults'    => [
                'key'       => 'MailSendSetting.setDefaults',
                'model'     => 'MailSendSetting',
                'observers' => [
                    'OwnerObserver' => [ 'owner_id', 'user_id' ],
                ],
            ],
            'MailSendSetting.preinsert'      => [
                'key'       => 'MailSendSetting.preinsert',
                'model'     => 'MailSendSetting',
                'observers' => [
                    'OwnerObserver'         => [ 'owner_id', 'user_id' ],
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ConcatenationObserver' => [ 'title' => [ 'email' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read',
                                    'write',
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'MailSendSetting.preupdate'      => [
                'key'       => 'MailSendSetting.preupdate',
                'model'     => 'MailSendSetting',
                'observers' => [
                    'OwnerObserver'         => [ 'owner_id', 'user_id' ],
                    'SetAsDefaultObserver'  => [
                        'isdefault_field' => 'is_default',
                        'unique_fields'   => [
                            'owner_id',
                        ],
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'email' ] ],
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read',
                                    'write',
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'MailSendSetting.restore'        => [
                'key'       => 'MailSendSetting.restore',
                'model'     => 'MailSendSetting',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'MailSendSetting.delete'         => [
                'key'       => 'MailSendSetting.delete',
                'model'     => 'MailSendSetting',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'MailSendSetting.clean'          => [
                'key'       => 'MailSendSetting.clean',
                'model'     => 'MailSendSetting',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'MailReceiveSetting.setDefaults' => [
                'key'       => 'MailReceiveSetting.setDefaults',
                'model'     => 'MailReceiveSetting',
                'observers' => [
                    'OwnerObserver' => [ 'owner_id', 'user_id' ],
                ],
            ],
            'MailReceiveSetting.preinsert'   => [
                'key'       => 'MailReceiveSetting.preinsert',
                'model'     => 'MailReceiveSetting',
                'observers' => [
                    'OwnerObserver'         => [ 'owner_id', 'user_id' ],
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ConcatenationObserver' => [ 'title' => [ 'email' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read',
                                    'write',
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'MailReceiveSetting.preupdate'   => [
                'key'       => 'MailReceiveSetting.preupdate',
                'model'     => 'MailReceiveSetting',
                'observers' => [
                    'OwnerObserver'         => [ 'owner_id', 'user_id' ],
                    'SetAsDefaultObserver'  => [
                        'isdefault_field' => 'is_default',
                        'unique_fields'   => [
                            'owner_id',
                        ],
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'email' ] ],
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read',
                                    'write',
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'MailReceiveSetting.restore'     => [
                'key'       => 'MailReceiveSetting.restore',
                'model'     => 'MailReceiveSetting',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'MailReceiveSetting.delete'      => [
                'key'       => 'MailReceiveSetting.delete',
                'model'     => 'MailReceiveSetting',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'MailReceiveSetting.clean'       => [
                'key'       => 'MailReceiveSetting.clean',
                'model'     => 'MailReceiveSetting',
                'observers' => [
                    'CleanObserver',
                ],
            ],
        ],
        'custom' => [
            'CardPatient.setDefaults'            => [
                'key'       => 'CardPatient.setDefaults',
                'model'     => 'CardPatient',
                'observers' => [
                    'ParamsObserver' => [ 'patient_id' => 'patient' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'CardPatient.preinsert'              => [
                'key'       => 'CardPatient.preinsert',
                'model'     => 'CardPatient',
                'observers' => [
                    'ParamsObserver'        => [ 'patient_id' => 'patient' ],
                    //                    'ConstantObserver'      => ['status_id' => Status::NEW_],
                    'ConditionObserver'     => [
                        'status_id' => [
                            [ Status::NORMAL, null ],
                            Status::NEW_
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'          => [ 'title' => 'card_number' ],
                    'FormatObserver'        => [ 'title' => 'card' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                    'ConcatenationObserver' => [
                        'title' => [
                            'card_type_title',
                            'title',
                        ],
                    ],
                ],
            ],
            'CardPatient.preinsertconverted'     => [
                'key'       => 'CardPatient.preinsertconverted',
                'model'     => 'CardPatient',
                'observers' => [
                    'AclObserver' => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                ],
            ],
            'CardPatient.delete'                 => [
                'key'       => 'CardPatient.delete',
                'model'     => 'CardPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'CardLead.setDefaults'               => [
                'key'       => 'CardLead.setDefaults',
                'model'     => 'CardLead',
                'observers' => [
                    'ParamsObserver' => [ 'lead_id' => 'lead' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'CardLead.preinsert'                 => [
                'key'       => 'CardLead.preinsert',
                'model'     => 'CardLead',
                'observers' => [
                    'ParamsObserver'        => [ 'lead_id' => 'lead' ],
                    //                    'ConstantObserver'      => ['status_id' => Status::NEW_],
                    'ConditionObserver'     => [
                        'status_id' => [
                            [ Status::NORMAL, null ],
                            Status::NEW_
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'          => [ 'title' => 'card_number' ],
                    'FormatObserver'        => [ 'title' => 'card' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                    'ConcatenationObserver' => [
                        'title' => [
                            'card_type_title',
                            'title',
                        ],
                    ],
                ],
            ],
            'CardLead.delete'                    => [
                'key'       => 'CardLead.delete',
                'model'     => 'CardLead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Notelead.setDefaults'               => [
                'key'       => 'Notelead.setDefaults',
                'model'     => 'NoteLead',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [ 'lead_id' => 'lead' ],
                ],
            ],
            'Notelead.preinsert'                 => [
                'key'       => 'Notelead.preinsert',
                'model'     => 'NoteLead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Notelead.preupdate'                 => [
                'key'       => 'Notelead.preupdate',
                'model'     => 'NoteLead',
                'observers' => [
                    'ChangerObserver' => [ 'changer_id' ],
                    'DateObserver'    => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'AclObserver'     => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Notelead.delete'                    => [
                'key'       => 'Notelead.delete',
                'model'     => 'NoteLead',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Lead.preview'                       => [
                'key'       => 'Lead.preview',
                'model'     => 'Lead',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'Lead.setDefaults'                   => [
                'key'       => 'Lead.setDefaults',
                'model'     => 'Lead',
                'observers' => [
                    'OwnerObserver' => [ 'owner_id' ],
                ],
            ],
            'Lead.preinsert'                     => [
                'key'       => 'Lead.preinsert',
                'model'     => 'Lead',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'AgeObserver'           => [
                        'age' => [
                            'source' => 'birth_date',
                            'format' => '%y',
                        ],
                    ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [
                        'title' => [
                            'fname',
                            'lname',
                        ],
                    ],
                    'FormatObserver'        => [
                        'mobile' => 'phone',
                        'phone'  => 'phone',
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Lead.postinsert'                    => [
                'key'       => 'Lead.postinsert',
                'model'     => 'Lead',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                    'EmailObserver'   => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver',
                ],
            ],
            'Lead.postview'                      => [
                'key'       => 'Lead.postview',
                'model'     => 'Lead',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [ Status::NEW_, Status::NORMAL ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Lead.preupdate'                     => [
                'key'       => 'Lead.preupdate',
                'model'     => 'Lead',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [ Status::NEW_, Status::NORMAL ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'AgeObserver'           => [
                        'age' => [ 'source' => 'birth_date', 'format' => '%y' ],
                    ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [
                        'title' => [ 'fname', 'lname' ],
                    ],
                    'FormatObserver'        => [
                        'mobile' => 'phone',
                        'phone'  => 'phone',
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Lead.postupdate'                    => [
                'key'       => 'Lead.postupdate',
                'model'     => 'Lead',
                'observers' => [
                    'EmailObserver' => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver'
                ],
            ],
            'Lead.preconvert'                    => [
                'key'       => 'Lead.preconvert',
                'model'     => 'Lead',
                'observers' => [
                    'AvatarCopyObserver'    => [ 'avatar' ],
                    'ConstantObserver'      => [ 'status_id' => Status::CONVERTED ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'AgeObserver'           => [
                        'age' => [
                            'source' => 'birth_date',
                            'format' => '%y',
                        ],
                    ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [
                        'title' => [
                            'fname',
                            'lname',
                        ],
                    ],
                    'FormatObserver'        => [
                        'mobile' => 'phone',
                        'phone'  => 'phone',
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Lead.delete'                        => [
                'key'       => 'Lead.delete',
                'model'     => 'Lead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Lead.restore'                       => [
                'key'       => 'Lead.restore',
                'model'     => 'Lead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Lead.clean'                         => [
                'key'       => 'Lead.clean',
                'model'     => 'Lead',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Lead.convert'                       => [
                'key'       => 'Lead.convert',
                'model'     => 'Lead',
                'observers' => [
                    'EmailObserver' => [
                        'action'       => 'delete',
                        'search_field' => 'email'
                    ],
                    'ConvertObserver',
                ],
            ],
            'Notepatient.setDefaults'            => [
                'key'       => 'Notepatient.setDefaults',
                'model'     => 'NotePatient',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [ 'patient_id' => 'patient' ],
                ],
            ],
            'Notepatient.preinsert'              => [
                'key'       => 'Notepatient.preinsert',
                'model'     => 'NotePatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'ChangerObserver'  => [ 'changer_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Notepatient.preinsertconverted'     => [
                'key'       => 'Notepatient.preinsertconverted',
                'model'     => 'NotePatient',
                'observers' => [
                    'AclObserver' => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Notepatient.preupdate'              => [
                'key'       => 'Notepatient.preupdate',
                'model'     => 'NotePatient',
                'observers' => [
                    'ChangerObserver' => [ 'changer_id' ],
                    'DateObserver'    => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'AclObserver'     => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Notepatient.delete'                 => [
                'key'       => 'Notepatient.delete',
                'model'     => 'NotePatient',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Patient.setDefaults'                => [
                'key'       => 'Patient.setDefaults',
                'model'     => 'Patient',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [
                        'account_id' => 'account'
                    ]
                ],
            ],
            'Patient.preupdate'                  => [
                'key'       => 'Patient.preupdate',
                'model'     => 'Patient',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'AgeObserver'           => [
                        'age' => [
                            'source' => 'birth_date',
                            'format' => '%y',
                        ],
                    ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [
                        'title' => [
                            'fname',
                            'lname',
                        ],
                    ],
                    'FormatObserver'        => [
                        'mobile' => 'phone',
                        'phone'  => 'phone',
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Patient.preinsert'                  => [
                'key'       => 'Patient.preinsert',
                'model'     => 'Patient',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'AgeObserver'           => [
                        'age' => [
                            'source' => 'birth_date',
                            'format' => '%y',
                        ],
                    ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [
                        'title' => [
                            'fname',
                            'lname',
                        ],
                    ],
                    'FormatObserver'        => [
                        'mobile' => 'phone',
                        'phone'  => 'phone',
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Patient.postinsert'                 => [
                'key'       => 'Patient.postinsert',
                'model'     => 'Patient',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                    'EmailObserver'   => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver',
                ],
            ],
            'Patient.preinsertconverted'         => [
                'key'       => 'Patient.preinsertconverted',
                'model'     => 'Patient',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'AgeObserver'           => [
                        'age' => [
                            'source' => 'birth_date',
                            'format' => '%y',
                        ],
                    ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [
                        'title' => [
                            'fname',
                            'lname',
                        ],
                    ],
                    'FormatObserver'        => [
                        'mobile' => 'phone',
                        'phone'  => 'phone',
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Patient.postinsertconverted'        => [
                'key'       => 'Patient.postinsertconverted',
                'model'     => 'Patient',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                    'EmailObserver'   => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver',
                ],
            ],
            'Account.postinsertconverted'        => [
                'key'       => 'Account.postinsertconverted',
                'model'     => 'Account',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                    'EmailObserver'   => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver',
                ],
            ],
            'Patient.postupdate'                 => [
                'key'       => 'Patient.postupdate',
                'model'     => 'Patient',
                'observers' => [
                    'EmailObserver' => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver',
                ],
            ],
            'Patient.postview'                   => [
                'key'       => 'Patient.postview',
                'model'     => 'Patient',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Patient.delete'                     => [
                'key'       => 'Patient.delete',
                'model'     => 'Patient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Patient.restore'                    => [
                'key'       => 'Patient.restore',
                'model'     => 'Patient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Patient.clean'                      => [
                'key'       => 'Patient.clean',
                'model'     => 'Patient',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Account.postinsert'                 => [
                'key'       => 'Account.postinsert',
                'model'     => 'Account',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                    'EmailObserver'   => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver',
                ],
            ],
            'Account.postupdate'                 => [
                'key'       => 'Account.postupdate',
                'model'     => 'Account',
                'observers' => [
                    'EmailObserver' => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver',
                ],
            ],
            'Account.postview'                   => [
                'key'       => 'Account.postview',
                'model'     => 'Account',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Account.setDefaults'                => [
                'key'       => 'Account.setDefaults',
                'model'     => 'Account',
                'observers' => [
                    'OwnerObserver' => [ 'owner_id' ],
                ],
            ],
            'Account.preinsert'                  => [
                'key'       => 'Account.preinsert',
                'model'     => 'Account',
                'observers' => [
                    'OwnerObserver'    => [ 'owner_id' ],
                    'FormatObserver'   => [ 'phone' => 'phone' ],
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'     => [ 'title' => 'name' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Account.preupdate'                  => [
                'key'       => 'Account.preupdate',
                'model'     => 'Account',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'FormatObserver'    => [ 'phone' => 'phone' ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'DateObserver'      => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'CopyObserver'      => [ 'title' => 'name' ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Account.preinsertconverted'         => [
                'key'       => 'Account.preinsertconverted',
                'model'     => 'Account',
                'observers' => [
                    'FormatObserver'   => [ 'phone' => 'phone' ],
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'CopyObserver'     => [ 'title' => 'name' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read',
                                    'write'
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Account.delete'                     => [
                'key'       => 'Account.delete',
                'model'     => 'Account',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Account.restore'                    => [
                'key'       => 'Account.restore',
                'model'     => 'Account',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Account.clean'                      => [
                'key'       => 'Account.clean',
                'model'     => 'Account',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Doctor.setDefaults'                 => [
                'key'       => 'Doctor.setDefaults',
                'model'     => 'Doctor',
                'observers' => [
                    'OwnerObserver' => [ 'owner_id' ],
                ],
            ],
            'Doctor.delete'                      => [
                'key'       => 'Doctor.delete',
                'model'     => 'Doctor',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Doctor.preinsert'                   => [
                'key'       => 'Doctor.preinsert',
                'model'     => 'Doctor',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'FormatObserver'        => [
                        'phone' => 'phone',
                        'fax'   => 'phone',
                    ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'name' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Doctor.preupdate'                   => [
                'key'       => 'Doctor.preupdate',
                'model'     => 'Doctor',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'FormatObserver'    => [
                        'phone' => 'phone',
                        'fax'   => 'phone',
                    ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'DateObserver'      => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'CopyObserver'      => [ 'title' => 'name' ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Doctor.postinsert'                  => [
                'key'       => 'Doctor.postinsert',
                'model'     => 'Doctor',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                    'EmailObserver'   => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver',
                ],
            ],
            'Doctor.postupdate'                  => [
                'key'       => 'Doctor.postupdate',
                'model'     => 'Doctor',
                'observers' => [
                    'EmailObserver' => [
                        'action'       => 'update',
                        'search_field' => 'email'
                    ],
                    'SaveObserver',
                ],
            ],
            'Doctor.postview'                    => [
                'key'       => 'Doctor.postview',
                'model'     => 'Doctor',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Doctor.restore'                     => [
                'key'       => 'Doctor.restore',
                'model'     => 'Doctor',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Doctor.clean'                       => [
                'key'       => 'Doctor.clean',
                'model'     => 'Doctor',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Document.setDefaults'               => [
                'key'       => 'Document.setDefaults',
                'model'     => 'Document',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [
                        'patient_id' => 'patient',
                        'lead_id'    => 'lead'
                    ]
                ],
            ],
            'Document.delete'                    => [
                'key'       => 'Document.delete',
                'model'     => 'Document',
                'observers' => [
                    'RecycleObserver',
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'SaveObserver',
                ],
            ],
            'Document.restore'                   => [
                'key'       => 'Document.restore',
                'model'     => 'Document',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Document.clean'                     => [
                'key'       => 'Document.clean',
                'model'     => 'Document',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Document.preupdate'                 => [
                'key'       => 'Document.preupdate',
                'model'     => 'Document',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [ Status::NEW_, Status::NORMAL ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [
                        'title' => [ 'document_name' ],
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Product.preview'                    => [
                'key'       => 'Product.preview',
                'model'     => 'Product',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'Product.preinsert'                  => [
                'key'       => 'Product.preinsert',
                'model'     => 'Product',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'name' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Product.postinsert'                 => [
                'key'       => 'Product.postinsert',
                'model'     => 'Product',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                    'ConvertObserver' => [ 'save' => true ],
                ],
            ],
            'Product.postupdate'                 => [
                'key'       => 'Product.postupdate',
                'model'     => 'Product',
                'observers' => [
                    'NewItemObserver'        => [ 'owner_id' => -1 ],
                    'TriggerByModelObserver' => [
                        '_id' => [
                            'logic'     => 'updateDefaultPB',
                            'modelname' => 'PricebookDetail',
                            'key'       => 'product_id'
                        ]
                    ],
                ],
            ],
            'PricebookDetail.updateDefaultPB'    => [

                'key'       => 'PricebookDetail.updateDefaultPB',
                'model'     => 'PricebookDetail',
                'observers' => [
                    'FillJoinsObserver',
                    'CopyObserver' => [ 'list_price' => 'product_price' ],
                    'SaveObserver'
                ],
            ],
            'Product.postview'                   => [
                'key'       => 'Product.postview',
                'model'     => 'Product',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Product.preupdate'                  => [
                'key'       => 'Product.preupdate',
                'model'     => 'Product',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [ 'title' => [ 'name' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Product.delete'                     => [
                'key'       => 'Product.delete',
                'model'     => 'Product',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Product.restore'                    => [
                'key'       => 'Product.restore',
                'model'     => 'Product',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Product.clean'                      => [
                'key'       => 'Product.clean',
                'model'     => 'Product',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Product.setDefaults'                => [
                'key'       => 'Product.setDefaults',
                'model'     => 'Product',
                'observers' => [
                    'OwnerObserver' => [ 'owner_id' ],
                ],
            ],
            'PricebookDetail.setDefaults'        => [
                'key'       => 'PricebookDetail.setDefaults',
                'model'     => 'PricebookDetail',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [
                        'pricebook_id' => 'pricebook',
                        'product_id'   => 'product',
                    ],
                ],
            ],
            'PricebookDetail.preinsert'          => [
                'key'       => 'PricebookDetail.preinsert',
                'model'     => 'PricebookDetail',
                'observers' => [
                    'OwnerObserver'   => [ 'owner_id' ],
                    'ChangerObserver' => [ 'changer_id', 'creator_id' ],
                    'DateObserver'    => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                        'created_dtm' => 'Y-m-d H:i:s',
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'    => [ 'title' => 'product_title' ],
                    'AclObserver'     => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                ],
            ],
            'PricebookDetail.preupdate'          => [
                'key'       => 'PricebookDetail.preupdate',
                'model'     => 'PricebookDetail',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'DateObserver'      => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'      => [ 'title' => 'product_title' ],
                ],
            ],
            'PricebookDetail.predelete'          => [
                'key'       => 'PricebookDetail.predelete',
                'model'     => 'PricebookDetail',
                'observers' => [
                    'ChangerObserver'  => [ 'changer_id' ],
                    'DateObserver'     => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConstantObserver' => [
                        'status_id' => Status::DEAD,
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'PricebookDetail.delete'             => [
                'key'       => 'PricebookDetail.delete',
                'model'     => 'PricebookDetail',
                'observers' => [
                    'SaveObserver',
                ],
            ],
            'Pricebook.setDefaults'              => [
                'key'       => 'Pricebook.setDefaults',
                'model'     => 'Pricebook',
                'observers' => [
                    'OwnerObserver' => [ 'owner_id' ],
                ],
            ],
            'Pricebook.postview'                 => [
                'key'       => 'Pricebook.postview',
                'model'     => 'Pricebook',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Pricebook.preinsert'                => [
                'key'       => 'Pricebook.preinsert',
                'model'     => 'Pricebook',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'     => [ 'title' => 'pricebook' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Pricebook.postinsert'               => [
                'key'       => 'Pricebook.postinsert',
                'model'     => 'Pricebook',
                'observers' => [ 'NewItemObserver' => [ 'owner_id' => 1 ] ],
            ],
            'Pricebook.preupdate'                => [
                'key'       => 'Pricebook.preupdate',
                'model'     => 'Pricebook',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'DateObserver'      => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'CopyObserver'      => [ 'title' => 'pricebook' ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Pricebook.postupdate'               => [
                'key'       => 'Pricebook.postinsert',
                'model'     => 'Pricebook',
                'observers' => [ ],
            ],
            'Pricebook.delete'                   => [
                'key'       => 'Pricebook.delete',
                'model'     => 'Pricebook',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Pricebook.restore'                  => [
                'key'       => 'Pricebook.restore',
                'model'     => 'Pricebook',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Pricebook.clean'                    => [
                'key'       => 'Pricebook.clean',
                'model'     => 'Pricebook',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Quote.setDefaults'                  => [
                'key'       => 'Quote.setDefaults',
                'model'     => 'Quote',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [ 'patient_id' => 'patient' ],
                ],
            ],
            'Quote.postview'                     => [
                'key'       => 'Quote.postview',
                'model'     => 'Quote',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Quote.preinsert'                    => [
                'key'       => 'Quote.preinsert',
                'model'     => 'Quote',
                'observers' => [
//                    'ConstantObserver' => [ 'status_id' => Status::INPROGRESS ],
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'UniqidObserver'   => ['quote_number'],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'     => [ 'title' => 'subject' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FormulaObserver'  => [
                        'grand_total' => '$model->sub_total - $model->discount + $model->tax + $model->adjustment',
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Quote.postinsert'                   => [
                'key'       => 'Quote.postinsert',
                'model'     => 'Quote',
                'observers' =>
                    [
                        'NewItemObserver' => [ 'owner_id' => 1 ]
                    ],
            ],
            'Quote.preupdate'                    => [
                'key'       => 'Quote.preupdate',
                'model'     => 'Quote',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
//                        'status_id' => [
//                            Status::INPROGRESS,
//                            Status::NEW_,
//                        ],
                    ],
                    'NewItemObserver'   => [ 'owner_id' => 1 ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'DateObserver'      => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'CopyObserver'      => [ 'title' => 'subject' ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FormulaObserver'   => [
                        'grand_total' => '$model->sub_total - $model->discount + $model->tax + $model->adjustment',
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Quote.delete'                       => [
                'key'       => 'Quote.delete',
                'model'     => 'Quote',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Quote.restore'                      => [
                'key'       => 'Quote.restore',
                'model'     => 'Quote',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Quote.clean'                        => [
                'key'       => 'Quote.clean',
                'model'     => 'Quote',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Quote.detailsUpdated'               => [
                'key'       => 'Quote.detailsUpdated',
                'model'     => 'Quote',
                'observers' => [
                    'DetailsSumObserver' => [
                        'sub_total' => [
                            'query' => 'QuoteDetailsByQuote',
                            'field' => 'total',
                        ],
                    ],
                    //                    'PriceObserver'      => [ ],
                    'FormulaObserver'    => [
                        'grand_total' => '$model->sub_total - $model->discount + $model->tax + $model->adjustment',
                    ],
                    'SaveObserver',
                ],
            ],
            'Quote.convert'                      => [
                'key'       => 'Quote.convert',
                'model'     => 'Quote',
                'observers' => [
                    'ConvertObserver',
                ],
            ],
            'Activity.setDefaults'               => [
                'key'       => 'Activity.setDefaults',
                'model'     => 'Activity',
                'observers' => [
                    'OwnerObserver' => [ 'owner_id' ],
                ],
            ],
            'Activity.delete'                    => [
                'key'       => 'Activity.delete',
                'model'     => 'Activity',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Activity.restore'                   => [
                'key'       => 'Activity.restore',
                'model'     => 'Activity',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Activity.clean'                     => [
                'key'       => 'Activity.clean',
                'model'     => 'Activity',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'QuoteDetail.setDefaults'            => [
                'key'       => 'QuoteDetail.setDefaults',
                'model'     => 'QuoteDetail',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [ 'quote_id' => 'quote' ],
                ],
            ],
            'QuoteDetail.preinsert'              => [
                'key'       => 'QuoteDetail.preinsert',
                'model'     => 'QuoteDetail',
                'observers' => [
                    'OwnerObserver'   => [ 'owner_id' ],
                    'ChangerObserver' => [ 'changer_id', 'creator_id' ],
                    'DateObserver'    => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                        'created_dtm' => 'Y-m-d H:i:s',
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'    => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver' => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model->discount + $model->tax',
                    ],
                    'AclObserver'     => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                ],
            ],
            'QuoteDetail.preupdate'              => [
                'key'       => 'QuoteDetail.preupdate',
                'model'     => 'QuoteDetail',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'DateObserver'      => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'FillJoinsObserver',
                    'CopyObserver'      => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver'   => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model -> discount + $model->tax',
                    ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                ],
            ],
            'QuoteDetail.postinsert'             => [
                'key'       => 'QuoteDetail.postinsert',
                'model'     => 'QuoteDetail',
                'observers' => [
                    'TriggerObserver' => [ 'quote_id' => 'detailsUpdated' ],
                ],
            ],
            'QuoteDetail.postupdate'             => [
                'key'       => 'QuoteDetail.postupdate',
                'model'     => 'QuoteDetail',
                'observers' => [
                    'TriggerObserver' => [ 'quote_id' => 'detailsUpdated' ],
                ],
            ],
            'QuoteDetail.predelete'              => [
                'key'       => 'QuoteDetail.predelete',
                'model'     => 'QuoteDetail',
                'observers' => [
                    'ChangerObserver'  => [ 'changer_id' ],
                    'DateObserver'     => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConstantObserver' => [
                        'status_id' => Status::DEAD,
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'QuoteDetail.delete'                 => [
                'key'       => 'QuoteDetail.delete',
                'model'     => 'QuoteDetail',
                'observers' => [
                    'SaveObserver',
                ],
            ],
            'QuoteDetail.postdelete'             => [
                'key'       => 'QuoteDetail.postdelete',
                'model'     => 'QuoteDetail',
                'observers' => [
                    'TriggerObserver' => [ 'quote_id' => 'detailsUpdated' ],
                ],
            ],
            'Order.setDefaults'                  => [
                'key'       => 'Order.setDefaults',
                'model'     => 'Order',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [ 'patient_id' => 'patient' ],
                ],
            ],
            'Order.postview'                     => [
                'key'       => 'Order.postview',
                'model'     => 'Order',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Order.preview'                      => [
                'key'       => 'Order.preview',
                'model'     => 'Order',
                'observers' => [
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Order.preinsert'                    => [
                'key'       => 'Order.preinsert',
                'model'     => 'Order',
                'observers' => [
//                  'ConstantObserver' => [ 'status_id' => Status::INPROGRESS ],
                    'UniqidObserver'   => ['order_number'],
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'     => [ 'title' => 'subject' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FormulaObserver'  => [
                        'grand_total' => '$model->sub_total - $model->discount + $model->tax + $model->adjustment',
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Order.postinsert'                   => [
                'key'       => 'Order.postinsert',
                'model'     => 'Order',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ]
                ],
            ],
            'PricebookDetail.preview'                      => [
                'key'       => 'PricebookDetail.preview',
                'model'     => 'PricebookDetail',
                'observers' => [
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'PricebookDetail.preinsertconverted' => [
                'key'       => 'PricebookDetail.preinsertconverted',
                'model'     => 'PricebookDetail',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'     => [ 'title' => 'product_title' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read'
                                ],
                                'admin'  => [
                                    'read'
                                ],
                                'user'   => [
                                    'read'
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Order.preinsertconverted'           => [
                'key'       => 'Order.preinsertconverted',
                'model'     => 'Order',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'UniqidObserver'   => ['order_number'],
                    'ChangerObserver'  => [ 'changer_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'     => [ 'title' => 'subject' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read'
                                ],
                            ],
                        ],
                    ],
                    'FormulaObserver'  => [
                        'grand_total' => '$model->sub_total - $model->discount + $model->tax + $model->adjustment',
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Order.postinsertconverted'          => [
                'key'       => 'Order.postinsertconverted',
                'model'     => 'Order',
                'observers' => [ 'NewItemObserver' => [ 'owner_id' => 1 ] ],
            ],
            'Order.preupdate'                    => [
                'key'       => 'Order.preupdate',
                'model'     => 'Order',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
//                        'status_id' => [
//                            Status::INPROGRESS,
//                            Status::NEW_,
//                        ],
                    ],
                    'NewItemObserver'   => [ 'owner_id' => 1 ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'DateObserver'      => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'CopyObserver'      => [ 'title' => 'subject' ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FormulaObserver'   => [
                        'grand_total' => '$model->sub_total - $model->discount + $model->tax + $model->adjustment',
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Order.delete'                       => [
                'key'       => 'Order.delete',
                'model'     => 'Order',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Order.restore'                      => [
                'key'       => 'Order.restore',
                'model'     => 'Order',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Order.clean'                        => [
                'key'       => 'Order.clean',
                'model'     => 'Order',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Order.detailsUpdated'               => [
                'key'       => 'Order.detailsUpdated',
                'model'     => 'Order',
                'observers' => [
                    'DetailsSumObserver' => [
                        'sub_total' => [
                            'query' => 'OrderDetailsByOrder',
                            'field' => 'total',
                        ],
                    ],
                    //                    'PriceObserver'      => [ ],
                    'FormulaObserver'    => [
                        'grand_total' => '$model->sub_total - $model->discount + $model->tax + $model->adjustment',
                    ],
                    'SaveObserver',
                ],
            ],
            'Order.convert'                      => [
                'key'       => 'Order.convert',
                'model'     => 'Order',
                'observers' => [
                    'ConvertObserver',
                ],
            ],
            'Invoice.setDefaults'                => [
                'key'       => 'Invoice.setDefaults',
                'model'     => 'Invoice',
                'observers' => [
                    'ParamsObserver' => [ 'patient_id' => 'patient' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'Invoice.delete'                     => [
                'key'       => 'Invoice.delete',
                'model'     => 'Invoice',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Invoice.restore'                    => [
                'key'       => 'Invoice.restore',
                'model'     => 'Invoice',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Invoice.clean'                      => [
                'key'       => 'Invoice.clean',
                'model'     => 'Invoice',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'Invoice.preinsert'                  => [
                'key'       => 'Invoice.preinsert',
                'model'     => 'Invoice',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'DateObserver'     => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'     => [ 'title' => 'subject' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Invoice.preinsertconverted'         => [
                'key'       => 'Invoice.preinsertconverted',
                'model'     => 'Invoice',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id' ],
                    'DateObserver'     => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'CopyObserver'     => [ 'title' => 'subject' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read'
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Invoice.detailsUpdated'             => [
                'key'       => 'Invoice.detailsUpdated',
                'model'     => 'Invoice',
                'observers' => [
                    'DetailsSumObserver' => [
                        'sub_total' => [
                            'query' => 'InvoiceDetailsByInvoice',
                            'field' => 'total',
                        ],
                    ],
                    'SaveObserver',
                ],
            ],
            'Payment.preview'                    => [
                'key'       => 'Payment.preview',
                'model'     => 'Payment',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'Payment.preinsert'                  => [
                'key'       => 'Payment.preinsert',
                'model'     => 'Payment',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [ 'read' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Payment.postinsert'                 => [
                'key'       => 'Payment.postinsert',
                'model'     => 'Payment',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                ],
            ],
            'Payment.postview'                   => [
                'key'       => 'Payment.postview',
                'model'     => 'Payment',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Payment.preupdate'                  => [
                'key'       => 'Payment.preupdate',
                'model'     => 'Payment',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Payment.setDefaults'                => [
                'key'       => 'Payment.setDefaults',
                'model'     => 'Payment',
                'observers' => [
                    'ParamsObserver' => [ 'patient_id' => 'patient' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'Payment.delete'                     => [
                'key'       => 'Payment.delete',
                'model'     => 'Payment',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Payment.restore'                    => [
                'key'       => 'Payment.restore',
                'model'     => 'Payment',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'CallLead.preview'                   => [
                'key'       => 'CallLead.preview',
                'model'     => 'CallLead',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'CallLead.preinsert'                 => [
                'key'       => 'CallLead.preinsert',
                'model'     => 'CallLead',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'CallLead.postinsert'                => [
                'key'       => 'CallLead.postinsert',
                'model'     => 'CallLead',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                ],
            ],
            'CallLead.postview'                  => [
                'key'       => 'CallLead.postview',
                'model'     => 'CallLead',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'CallLead.preupdate'                 => [
                'key'       => 'CallLead.preupdate',
                'model'     => 'CallLead',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'CallLead.delete'                    => [
                'key'       => 'CallLead.delete',
                'model'     => 'CallLead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'CallLead.restore'                   => [
                'key'       => 'CallLead.restore',
                'model'     => 'CallLead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'CallLead.clean'                     => [
                'key'       => 'CallLead.clean',
                'model'     => 'CallLead',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'CallLead.setDefaults'               => [
                'key'       => 'CallLead.setDefaults',
                'model'     => 'CallLead',
                'observers' => [
                    'ParamsObserver' => [ 'target_id' => 'target' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'CallPatient.setDefaults'            => [
                'key'       => 'CallPatient.setDefaults',
                'model'     => 'CallPatient',
                'observers' => [
                    'ParamsObserver' => [ 'target_id' => 'target' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'CallPatient.preview'                => [
                'key'       => 'CallPatient.preview',
                'model'     => 'CallPatient',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'CallPatient.preinsert'              => [
                'key'       => 'CallPatient.preinsert',
                'model'     => 'CallPatient',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'CallPatient.preinsertconverted'     => [
                'key'       => 'CallPatient.preinsertconverted',
                'model'     => 'CallPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read',
                                    'write'
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'TaskPatient.preinsertconverted'     => [
                'key'       => 'TaskPatient.preinsertconverted',
                'model'     => 'TaskPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read',
                                    'write'
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'EventPatient.preinsertconverted'    => [
                'key'       => 'EventPatient.preinsertconverted',
                'model'     => 'EventPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read',
                                    'write'
                                ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'CallPatient.postinsert'             => [
                'key'       => 'CallPatient.postinsert',
                'model'     => 'CallPatient',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                ],
            ],
            'CallPatient.postview'               => [
                'key'       => 'CallPatient.postview',
                'model'     => 'CallPatient',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'CallPatient.preupdate'              => [
                'key'       => 'CallPatient.preupdate',
                'model'     => 'CallPatient',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'CallPatient.delete'                 => [
                'key'       => 'CallPatient.delete',
                'model'     => 'CallPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'CallPatient.restore'                => [
                'key'       => 'CallPatient.restore',
                'model'     => 'CallPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'CallPatient.clean'                  => [
                'key'       => 'CallPatient.clean',
                'model'     => 'CallPatient',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'TaskLead.preview'                   => [
                'key'       => 'TaskLead.preview',
                'model'     => 'TaskLead',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'TaskLead.preinsert'                 => [
                'key'       => 'TaskLead.preinsert',
                'model'     => 'TaskLead',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'TaskLead.postinsert'                => [
                'key'       => 'TaskLead.postinsert',
                'model'     => 'TaskLead',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                ],
            ],
            'TaskLead.postview'                  => [
                'key'       => 'TaskLead.postview',
                'model'     => 'TaskLead',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'TaskLead.preupdate'                 => [
                'key'       => 'TaskLead.preupdate',
                'model'     => 'TaskLead',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'TaskLead.delete'                    => [
                'key'       => 'TaskLead.delete',
                'model'     => 'TaskLead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'TaskLead.restore'                   => [
                'key'       => 'TaskLead.restore',
                'model'     => 'TaskLead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'TaskLead.clean'                     => [
                'key'       => 'TaskLead.clean',
                'model'     => 'TaskLead',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'TaskPatient.preview'                => [
                'key'       => 'TaskPatient.preview',
                'model'     => 'TaskPatient',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'TaskPatient.preinsert'              => [
                'key'       => 'TaskPatient.preinsert',
                'model'     => 'TaskPatient',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'TaskPatient.postinsert'             => [
                'key'       => 'TaskPatient.postinsert',
                'model'     => 'TaskPatient',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                ],
            ],
            'TaskPatient.postview'               => [
                'key'       => 'TaskPatient.postview',
                'model'     => 'TaskPatient',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'TaskPatient.preupdate'              => [
                'key'       => 'TaskPatient.preupdate',
                'model'     => 'TaskPatient',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'TaskPatient.delete'                 => [
                'key'       => 'TaskPatient.delete',
                'model'     => 'TaskPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'TaskPatient.restore'                => [
                'key'       => 'TaskPatient.restore',
                'model'     => 'TaskPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'TaskPatient.clean'                  => [
                'key'       => 'TaskPatient.clean',
                'model'     => 'TaskPatient',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'TaskLead.setDefaults'               => [
                'key'       => 'TaskPatient.setDefaults',
                'model'     => 'TaskLead',
                'observers' => [
                    'ParamsObserver' => [ 'target_id' => 'target' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'TaskPatient.setDefaults'            => [
                'key'       => 'TaskPatient.setDefaults',
                'model'     => 'TaskPatient',
                'observers' => [
                    'ParamsObserver' => [ 'target_id' => 'target' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'EventLead.preview'                  => [
                'key'       => 'EventLead.preview',
                'model'     => 'EventLead',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'EventLead.preinsert'                => [
                'key'       => 'EventLead.preinsert',
                'model'     => 'EventLead',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'EventLead.postinsert'               => [
                'key'       => 'EventLead.postinsert',
                'model'     => 'EventLead',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                ],
            ],
            'EventLead.postview'                 => [
                'key'       => 'EventLead.postview',
                'model'     => 'EventLead',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'EventLead.preupdate'                => [
                'key'       => 'EventLead.preupdate',
                'model'     => 'EventLead',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'EventLead.delete'                   => [
                'key'       => 'EventLead.delete',
                'model'     => 'EventLead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'EventLead.restore'                  => [
                'key'       => 'EventLead.restore',
                'model'     => 'EventLead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'EventLead.clean'                    => [
                'key'       => 'EventLead.clean',
                'model'     => 'EventLead',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'EventPatient.preview'               => [
                'key'       => 'EventPatient.preview',
                'model'     => 'EventPatient',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'EventPatient.preinsert'             => [
                'key'       => 'EventPatient.preinsert',
                'model'     => 'EventPatient',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'EventPatient.postinsert'            => [
                'key'       => 'EventPatient.postinsert',
                'model'     => 'EventPatient',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                ],
            ],
            'EventPatient.postview'              => [
                'key'       => 'EventPatient.postview',
                'model'     => 'EventPatient',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'EventPatient.preupdate'             => [
                'key'       => 'EventPatient.preupdate',
                'model'     => 'EventPatient',
                'observers' => [
                    'ConditionObserver'     => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'EventPatient.delete'                => [
                'key'       => 'EventPatient.delete',
                'model'     => 'EventPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'EventPatient.restore'               => [
                'key'       => 'EventPatient.restore',
                'model'     => 'EventPatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'EventPatient.clean'                 => [
                'key'       => 'EventPatient.clean',
                'model'     => 'EventPatient',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'EventLead.setDefaults'              => [
                'key'       => 'EventLead.setDefaults',
                'model'     => 'EventLead',
                'observers' => [
                    'ParamsObserver' => [ 'target_id' => 'target' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'EventPatient.setDefaults'           => [
                'key'       => 'EventPatient.setDefaults',
                'model'     => 'EventPatient',
                'observers' => [
                    'ParamsObserver' => [ 'target_id' => 'target' ],
                    'OwnerObserver'  => [ 'owner_id' ],
                ],
            ],
            'Payment.setDefaults'                => [
                'key'       => 'Payment.setDefaults',
                'model'     => 'Payment',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [
                        'invoice_id'  => 'invoice',
                        'patient_id'  => 'patient',
                        'subject'     => 'subject',
                        'description' => 'description',
                        'sum'         => 'grandtotal',
                    ],
                ],
            ],
            'Payment.clean'                      => [
                'key'       => 'Payment.clean',
                'model'     => 'Payment',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'User.delete'                        => [
                'key'       => 'User.delete',
                'model'     => 'User',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'User.restore'                       => [
                'key'       => 'User.restore',
                'model'     => 'User',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'User.clean'                         => [
                'key'       => 'User.clean',
                'model'     => 'User',
                'observers' => [
                    'CleanObserver',
                ],
            ],
            'User.preinsert'                     => [
                'key'       => 'User.preinsert',
                'model'     => 'User',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [
                        'title' => [
                            'fname',
                            'lname',
                        ],
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'User.postinsert'                    => [
                'key'       => 'User.postinsert',
                'model'     => 'User',
                'observers' => [
                    'EmailObserver' => [
                        'action'       => 'update',
                        'search_field' => 'login'
                    ],
                    'SaveObserver',
                ],
            ],
            'User.postupdate'                    => [
                'key'       => 'User.postupdate',
                'model'     => 'User',
                'observers' => [
                    'EmailObserver' => [
                        'action'       => 'update',
                        'search_field' => 'login'
                    ],
                    'SaveObserver',
                ],
            ],
            'Document.preview'                   => [
                'key'       => 'Document.preview',
                'model'     => 'Document',
                'observers' => [ 'FillJoinsObserver' ],
            ],
            'Document.postview'                  => [
                'key'       => 'Document.postview',
                'model'     => 'Document',
                'observers' => [
                    'NewItemObserver'   => [ 'owner_id' => -1 ],
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'Document.preinsert'                 => [
                'key'       => 'Document.preinsert',
                'model'     => 'Document',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'       => [ 'changer_id', 'creator_id' ],
                    'OwnerObserver'         => [ 'owner_id' ],
                    'DateObserver'          => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'ConcatenationObserver' => [ 'title' => [ 'document_name' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Document.postinsert'                => [
                'key'       => 'Document.postinsert',
                'model'     => 'Document',
                'observers' => [
                    'NewItemObserver' => [ 'owner_id' => 1 ],
                ],
            ],
            'OrderDetail.setDefaults'            => [
                'key'       => 'OrderDetail.setDefaults',
                'model'     => 'OrderDetail',
                'observers' => [
                    'OwnerObserver'  => [ 'owner_id' ],
                    'ParamsObserver' => [ 'order_id' => 'order' ],
                ],
            ],
            'OrderDetail.preinsert'              => [
                'key'       => 'OrderDetail.preinsert',
                'model'     => 'OrderDetail',
                'observers' => [
                    'ConstantObserver' => [
                        'status_id' => Status::NEW_,
                    ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'ChangerObserver'  => [ 'changer_id', 'creator_id' ],
                    'DateObserver'     => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                        'created_dtm' => 'Y-m-d H:i:s',
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'     => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver'  => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model->discount + $model->tax',
                    ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ]
                ],
            ],
            'OrderDetail.preinsertconverted'     => [
                'key'       => 'OrderDetail.preinsertconverted',
                'model'     => 'OrderDetail',
                'observers' => [
                    'OwnerObserver'   => [ 'owner_id' ],
                    'ChangerObserver' => [ 'changer_id' ],
                    'DateObserver'    => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                        'created_dtm' => 'Y-m-d H:i:s',
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'    => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver' => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model->discount + $model->tax',
                    ],
                    'AclObserver'     => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [
                                    'read'
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'OrderDetail.preupdate'              => [
                'key'       => 'OrderDetail.preupdate',
                'model'     => 'OrderDetail',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'DateObserver'      => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'FillJoinsObserver',
                    'CopyObserver'      => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver'   => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model -> discount + $model->tax',
                    ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                ],
            ],
            'OrderDetail.postinsert'             => [
                'key'       => 'OrderDetail.postinsert',
                'model'     => 'OrderDetail',
                'observers' => [
                    'TriggerObserver' => [ 'order_id' => 'detailsUpdated' ],
                ],
            ],
            'OrderDetail.postinsertconverted'    => [
                'key'       => 'OrderDetail.postinsertconverted',
                'model'     => 'OrderDetail',
                'observers' => [
                    'TriggerObserver' => [ 'order_id' => 'detailsUpdated' ],
                ],
            ],
            'OrderDetail.postupdate'             => [
                'key'       => 'OrderDetail.postupdate',
                'model'     => 'OrderDetail',
                'observers' => [
                    'TriggerObserver' => [ 'order_id' => 'detailsUpdated' ],
                ],
            ],
            'OrderDetail.predelete'              => [
                'key'       => 'OrderDetail.predelete',
                'model'     => 'OrderDetail',
                'observers' => [
                    'ChangerObserver'  => [ 'changer_id' ],
                    'DateObserver'     => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'ConstantObserver' => [
                        'status_id' => Status::DEAD,
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'OrderDetail.delete'                 => [
                'key'       => 'OrderDetail.delete',
                'model'     => 'OrderDetail',
                'observers' => [
                    'SaveObserver',
                ],
            ],
            'OrderDetail.postdelete'             => [
                'key'       => 'OrderDetail.postdelete',
                'model'     => 'OrderDetail',
                'observers' => [
                    'TriggerObserver' => [ 'order_id' => 'detailsUpdated' ],
                ],
            ],
            'InvoiceDetail.preinsert'            => [
                'key'       => 'InvoiceDetail.preinsert',
                'model'     => 'InvoiceDetail',
                'observers' => [
                    'OwnerObserver'   => [ 'owner_id' ],
                    'ChangerObserver' => [ 'changer_id' ],
                    'DateObserver'    => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                        'created_dtm' => 'Y-m-d H:i:s',
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'    => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver' => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model->discount + $model->tax',
                    ],
                    'AclObserver'     => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                ],
            ],
            'InvoiceDetail.preinsertconverted'   => [
                'key'       => 'InvoiceDetail.preinsertconverted',
                'model'     => 'InvoiceDetail',
                'observers' => [
                    'OwnerObserver'   => [ 'owner_id' ],
                    'ChangerObserver' => [ 'changer_id' ],
                    'DateObserver'    => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                        'created_dtm' => 'Y-m-d H:i:s',
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'    => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver' => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model->discount + $model->tax',
                    ],
                    'AclObserver'     => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                ],
            ],
            'InvoiceDetail.preupdate'            => [
                'key'       => 'InvoiceDetail.preupdate',
                'model'     => 'InvoiceDetail',
                'observers' => [
                    'ConditionObserver' => [
                        'status_id' => [
                            Status::NEW_,
                            Status::NORMAL,
                        ],
                    ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'DateObserver'      => [ 'changed_dtm' => 'Y-m-d H:i:s' ],
                    'FillJoinsObserver',
                    'CopyObserver'      => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver'   => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model -> discount + $model->tax',
                    ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ ],
                            ],
                        ],
                    ],
                ],
            ],
            'InvoiceDetail.postinsert'           => [
                'key'       => 'InvoiceDetail.postinsert',
                'model'     => 'InvoiceDetail',
                'observers' => [
                    'TriggerObserver' => [ 'invoice_id' => 'detailsUpdated' ],
                ],
            ],
            'InvoiceDetail.postinsertconverted'  => [
                'key'       => 'InvoiceDetail.postinsertconverted',
                'model'     => 'InvoiceDetail',
                'observers' => [
                    'TriggerObserver' => [ 'invoice_id' => 'detailsUpdated' ],
                ],
            ],
            /////////////////////ZOHO IMPORT LOGIC///////////////////////////
            'Lead.zohoimport'                    => [
                'key'       => 'Lead.zohoimport',
                'model'     => 'Lead',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'AgeObserver'           => [
                        'age' => [
                            'source' => 'birth_date',
                            'format' => '%y',
                        ],
                    ],
                    'ConcatenationObserver' => [
                        'title' => [
                            'fname',
                            'lname',
                        ],
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'User.zohoimport'                    => [
                'key'       => 'User.zohoimport',
                'model'     => 'User',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'changer_id' ],
                    'ConcatenationObserver' => [
                        'title' => [
                            'fname',
                            'lname',
                        ],
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                    'MainUserObserver',
                ],
            ],
            'Patient.zohoimport'                 => [
                'key'       => 'Lead.zohoimport',
                'model'     => 'Lead',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'AgeObserver'           => [
                        'age' => [
                            'source' => 'birth_date',
                            'format' => '%y',
                        ],
                    ],
                    'ConcatenationObserver' => [
                        'title' => [
                            'fname',
                            'lname',
                        ],
                    ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Account.zohoimport'                 => [
                'key'       => 'Account.zohoimport',
                'model'     => 'Account',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'ConcatenationObserver' => [ 'title' => [ 'name' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Product.zohoimport'                 => [
                'key'       => 'Product.zohoimport',
                'model'     => 'Product',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'ConcatenationObserver' => [ 'title' => [ 'name' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'ConvertObserver'       => [ 'save' => true ],
                    'FillJoinsObserver',
                ],
            ],
            'Pricebook.zohoimport'               => [
                'key'       => 'Pricebook.zohoimport',
                'model'     => 'Pricebook',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'ConcatenationObserver' => [ 'title' => [ 'pricebook' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Quote.zohoimport'                   => [
                'key'       => 'Quote.zohoimport',
                'model'     => 'Quote',
                'observers' => [
                    'CheckNumFieldObserver' => [
                        'sub_total',
                        'discount',
                        'tax',
                        'adjustment',
                        'grand_total',
                    ],
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    //                    'DateObserver'     => [
                    //                        'created_dtm' => 'Y-m-d H:i:s',
                    //                        'changed_dtm' => 'Y-m-d H:i:s',
                    //                    ],
                    'CopyObserver'          => [ 'title' => 'subject' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FormulaObserver'       => [
                        'grand_total' => '$model->sub_total - $model->discount + $model->tax + $model->adjustment',
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Order.zohoimport'                   => [
                'key'       => 'Order.zohoimport',
                'model'     => 'Order',
                'observers' => [
                    'CheckNumFieldObserver' => [
                        'sub_total',
                        'discount',
                        'tax',
                        'adjustment',
                        'grand_total',
                    ],
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'CopyObserver'          => [ 'title' => 'subject' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FormulaObserver'       => [
                        'grand_total' => '$model->sub_total - $model->discount + $model->tax + $model->adjustment',
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'Invoice.zohoimport'                 => [
                'key'       => 'Invoice.zohoimport',
                'model'     => 'Invoice',
                'observers' => [
                    'CheckNumFieldObserver' => [
                        'sub_total',
                        'discount',
                        'tax',
                        'adjustment',
                        'grand_total',
                    ],
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'CopyObserver'          => [ 'title' => 'subject' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'QuoteDetail.zohoimport'             => [
                'key'       => 'QuoteDetail.zohoimport',
                'model'     => 'QuoteDetail',
                'observers' => [
                    'CheckNumFieldObserver' => [
                        'list_price',
                        'qty',
                        'amount',
                        'discount',
                        'tax',
                        'total',
                    ],
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'          => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver'       => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model->discount + $model->tax',
                    ],
                ],
            ],
            'OrderDetail.zohoimport'             => [
                'key'       => 'OrderDetail.zohoimport',
                'model'     => 'OrderDetail',
                'observers' => [
                    'CheckNumFieldObserver' => [
                        'list_price',
                        'qty',
                        'amount',
                        'discount',
                        'tax',
                        'total',
                    ],
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'          => [ 'title' => 'pricebook_detail_title' ],
                    'FormulaObserver'       => [
                        'amount' => '$model->list_price * $model->qty',
                        'total'  => '$model->amount - $model->discount + $model->tax',
                    ],
                ],
            ],
            'InvoiceDetail.zohoimport'           => [
                'key'       => 'InvoiceDetail.zohoimport',
                'model'     => 'InvoiceDetail',
                'observers' => [
                    'CheckNumFieldObserver' => [
                        'list_price',
                        'qty',
                        'amount',
                        'discount',
                        'tax',
                        'total',
                    ],
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'create',
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'create',
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                    'CopyObserver'          => [ 'title' => 'pricebook_detail_title' ],
                ],
            ],
            'CallLead.zohoimport'                => [
                'key'       => 'CallLead.zohoimport',
                'model'     => 'CallLead',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                ],
            ],
            'CallPatient.zohoimport'             => [
                'key'       => 'CallPatient.zohoimport',
                'model'     => 'CallPatient',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'TaskLead.zohoimport'                => [
                'key'       => 'TaskLead.zohoimport',
                'model'     => 'TaskLead',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                ],
            ],
            'TaskPatient.zohoimport'             => [
                'key'       => 'TaskPatient.zohoimport',
                'model'     => 'TaskPatient',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'EventLead.zohoimport'               => [
                'key'       => 'EventLead.zohoimport',
                'model'     => 'EventLead',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'EventPatient.zohoimport'            => [
                'key'       => 'EventPatient.zohoimport',
                'model'     => 'EventPatient',
                'observers' => [
                    'ConstantObserver'      => [ 'status_id' => Status::NEW_ ],
                    'OwnerObserver'         => [ 'owner_id', 'changer_id' ],
                    'ConcatenationObserver' => [ 'title' => [ 'subject' ] ],
                    'AclObserver'           => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'NoteLead.zohoimport'                => [
                'key'       => 'Notelead.preinsert',
                'model'     => 'NoteLead',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'OwnerObserver'    => [ 'owner_id', 'changer_id' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                                'delete'
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'NotePatient.zohoimport'             => [
                'key'       => 'NotePatient.zohoimport',
                'model'     => 'NotePatient',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NORMAL ],
                    'OwnerObserver'    => [ 'owner_id', 'changer_id' ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [
                                'read',
                                'write',
                            ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'TemplatePDF.preinsert'              => [
                'key'       => 'TemplatePDF.preinsert',
                'model'     => 'TemplatePDF',
                'observers' => [
                    'ConstantObserver'  => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'DateObserver'      => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write', 'delete' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'IsDefaultObserver' => [ 'isdefault' => 'model_id' ],
                    'FillJoinsObserver',
                ],
            ],
            'TemplatePDF.postinsert'             => [
                'key'       => 'TemplatePDF.postinsert',
                'model'     => 'TemplatePDF',
                'observers' => [
                ],
            ],
            'TemplatePDF.preupdate'              => [
                'key'       => 'TemplatePDF.preupdate',
                'model'     => 'TemplatePDF',
                'observers' => [
                    'ChangerObserver'   => [ 'changer_id' ],
                    'DateObserver'      => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write', 'delete' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'IsDefaultObserver' => [ 'isdefault' => 'model_id' ],
                    'FillJoinsObserver',
                ],
            ],
            'TemplatePDF.postupdate'             => [
                'key'       => 'TemplatePDF.postupdate',
                'model'     => 'TemplatePDF',
                'observers' => [
                ],
            ],
            'TemplatePDF.templateUpdated'        => [
                'key'       => 'TemplatePDF.templateUpdated',
                'model'     => 'TemplatePDF',
                'observers' => [
                ],
            ],
            'TemplatePDF.setDefaults'            => [
                'key'       => 'TemplatePDF.setDefaults',
                'model'     => 'TemplatePDF',
                'observers' => [
                    'OwnerObserver' => [ 'creator_id', 'owner_id' ],
                ],
            ],
            'TemplatePDF.delete'                 => [
                'key'       => 'TemplatePDF.delete',
                'model'     => 'TemplatePDF',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'TemplateEmail.preinsert'            => [
                'key'       => 'TemplateEmail.preinsert',
                'model'     => 'TemplateEmail',
                'observers' => [
                    'ConstantObserver'  => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'   => [ 'changer_id' ],
                    'OwnerObserver'     => [ 'owner_id' ],
                    'DateObserver'      => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write', 'delete' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'IsDefaultObserver' => [ 'isdefault' => 'model_id' ],
                    'FillJoinsObserver',
                ],
            ],
            'TemplateEmail.postinsert'           => [
                'key'       => 'TemplateEmail.postinsert',
                'model'     => 'TemplateEmail',
                'observers' => [
                ],
            ],
            'TemplateEmail.preupdate'            => [
                'key'       => 'TemplateEmail.preupdate',
                'model'     => 'TemplateEmail',
                'observers' => [
                    'ChangerObserver'   => [ 'changer_id' ],
                    'DateObserver'      => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'       => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write', 'delete' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'IsDefaultObserver' => [ 'isdefault' => 'model_id' ],
                    'FillJoinsObserver',
                ],
            ],
            'TemplateEmail.postupdate'           => [
                'key'       => 'TemplateEmail.postupdate',
                'model'     => 'TemplateEmail',
                'observers' => [
                ],
            ],
            'TemplateEmail.templateUpdated'      => [
                'key'       => 'TemplateEmail.templateUpdated',
                'model'     => 'TemplateEmail',
                'observers' => [
                ],
            ],
            'TemplateEmail.setDefaults'          => [
                'key'       => 'TemplateEmail.setDefaults',
                'model'     => 'TemplateEmail',
                'observers' => [
                    'OwnerObserver' => [ 'creator_id', 'owner_id' ],
                ],
            ],
            'TemplateEmail.delete'               => [
                'key'       => 'TemplateEmail.delete',
                'model'     => 'TemplateEmail',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
            'TemplateEmailFolder.preinsert'      => [
                'key'       => 'TemplateEmailFolder.preinsert',
                'model'     => 'TemplateEmailFolder',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::NEW_ ],
                    'ChangerObserver'  => [ 'changer_id' ],
                    'OwnerObserver'    => [ 'owner_id' ],
                    'DateObserver'     => [
                        'created_dtm' => 'Y-m-d H:i:s',
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'      => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write', 'delete' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'TemplateEmailFolder.postinsert'     => [
                'key'       => 'TemplateEmailFolder.postinsert',
                'model'     => 'TemplateEmailFolder',
                'observers' => [
                ],
            ],
            'TemplateEmailFolder.preupdate'      => [
                'key'       => 'TemplateEmailFolder.preupdate',
                'model'     => 'TemplateEmailFolder',
                'observers' => [
                    'ChangerObserver' => [ 'changer_id' ],
                    'DateObserver'    => [
                        'changed_dtm' => 'Y-m-d H:i:s',
                    ],
                    'AclObserver'     => [
                        '_acl' => [
                            'owner'     => [ 'read', 'write', 'delete' ],
                            'hierarchy' => [
                                'senior' => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'admin'  => [
                                    'read',
                                    'write',
                                    'delete'
                                ],
                                'user'   => [ 'read' ],
                            ],
                        ],
                    ],
                    'FillJoinsObserver',
                ],
            ],
            'TemplateEmailFolder.postupdate'     => [
                'key'       => 'TemplateEmailFolder.postupdate',
                'model'     => 'TemplateEmailFolder',
                'observers' => [
                ],
            ],
            'TemplateEmailFolder.setDefaults'    => [
                'key'       => 'TemplateEmailFolder.setDefaults',
                'model'     => 'TemplateEmailFolder',
                'observers' => [
                    'OwnerObserver' => [ 'creator_id', 'owner_id' ],
                ],
            ],
            'TemplateEmailFolder.delete'         => [
                'key'       => 'TemplateEmailFolder.delete',
                'model'     => 'TemplateEmailFolder',
                'observers' => [
                    'ConstantObserver' => [ 'status_id' => Status::DELETED ],
                    'FillJoinsObserver',
                    'SaveObserver',
                ],
            ],
        ],
    ]
];
