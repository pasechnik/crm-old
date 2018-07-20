<?php

namespace Wepo\Model;

class Status
{
    const NEW_       = "5295fdf7c5b9f222acd3c74b";
    const NORMAL     = "5295fdf7c5b9f222acd3c74c";
    const CONVERTED  = "5295fdf7c5b9f222acd3c74d";
    const DEAD       = "5295fdf7c5b9f222acd3c74e";
    const DELETED    = "5295fdf7c5b9f222acd3c74f";
    const PAID       = "5295fdf7c5b9f222acd3c750";
    const SYSTEM     = "54a1717632a9a567791343eb";
    const SENDING    = "54c90755901e95095cc62665";
    const SEND       = "54d096cedd8170a2bbdf7daf";
    const SENDERROR  = "54d096d5dd8170a2bbdf7db0";
    const INPROGRESS = "54d09645d18120a23bd37db1";
    const INSTALL    = 8;

    protected static $_labels = [
        self::NEW_       => "new",
        self::NORMAL     => "normal",
        self::CONVERTED  => "converted",
        self::DEAD       => "dead",
        self::DELETED    => "deleted",
        self::PAID       => "paid",
        self::SYSTEM     => "system",
        self::SENDING    => "sending",
        self::SEND       => "send",
        self::SENDERROR  => "senderror",
        self::INPROGRESS => "inprogress",
        self::INSTALL    => 8,
    ];

    public $adapterName = 'wepo_company';

    public static function getLabel($id)
    {
        if (isset(self::$_labels[ $id ])) {
            return self::$_labels[ $id ];
        }

        return '';
    }

    public static function ids()
    {
        return array( self::NEW_, self::NORMAL, self::CONVERTED, self::DEAD, self::DELETED , self::INPROGRESS );
    }
}
