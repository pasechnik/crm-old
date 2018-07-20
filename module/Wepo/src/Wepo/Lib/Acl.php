<?php

namespace Wepo\Lib;

class Acl
{

    const DATA_CREATE = 'create';
    const DATA_READ = 'read';
    const DATA_EDIT = 'write';
    const DATA_DELETE = 'delete';
    const DATA_NONE = 'none';

    const MODE_INSERT = 'insert';
    const MODE_UPDATE = 'update';

    public static function getFieldPerms( $mode = null )
    {
        $results = [ ];

        switch ($mode) {
            case self::MODE_INSERT:
            case self::MODE_UPDATE:
                $results[ ] = self::DATA_EDIT;
        }
//        switch ($mode) {
//            case self::MODE_DELETE:
//                break;
//            case self::MODE_READ:
//                $results[ ] = self::MODE_READ;
//            case self::MODE_EDIT:
//            case self::MODE_CREATE:
//                $results[ ] = self::MODE_EDIT;
//
//        }

        return $results;
    }

    public static function getDataPerm( $mode = null )
    {
        $result = self::DATA_NONE;

        switch ($mode) {
            case self::MODE_INSERT:
            case self::MODE_UPDATE:
                $result = self::DATA_EDIT;
        }

        return $result;
    }
}
