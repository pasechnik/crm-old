<?php

namespace Wepo\Model;

class Role
{

    //    public $table_name = 'role';

//    const TABLE_NAME = 'role';
    const ADMIN = '5295fdf7c5b9f222acd3c405';
    const SENIOR = '5295fdf7c5b9f222acd3c406';
    const USER = '5295fdf7c5b9f222acd3c404';
    const GUEST = '5295fdf7c5b9f222acd3c403';
    const GUESTNAME = 'guest';
    const GUEST_TITLE = 'guest';
    const ADMIN_TITLE = 'admin';
    const SENIOR_TITLE = 'senior';
    const USER_TITLE = 'user';

    public $_fields
        = [
            '_id'  => ['type' => 'pk', 'datatype' => 'string', 'default' => ''],
            'id'   => ['type' => 'field', 'datatype' => 'int', 'default' => 0],
            'role' => [
                'type'     => 'field',
                'datatype' => 'string',
                'default'  => ''
            ],
        ];
    protected $inputFilter;

    public static function ids()
    {
        return [self::GUEST, self::USER, self::SENIOR, self::ADMIN];
    }

    public static function getTitle($id)
    {
        switch ($id) {
            case self::ADMIN:
                return self::ADMIN_TITLE;
            case self::USER:
                return self::USER_TITLE;
            case self::SENIOR:
                return self::SENIOR_TITLE;
            default:
                return self::GUEST_TITLE;
        }
    }

    public static function getId($role)
    {
        switch ($role) {
            case self::ADMIN_TITLE:
                return self::ADMIN;
            case self::USER_TITLE:
                return self::USER;
            case self::SENIOR_TITLE:
                return self::SENIOR;
            default:
                return self::GUEST;
        }
    }
}
