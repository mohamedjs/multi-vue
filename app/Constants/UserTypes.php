<?php


namespace App\Constants;


final class UserTypes
{
    const SUPERADMIN = 1;
    const ADMIN      = 2;
    const STAFF      = 3;
    const CLIENT     = 4;

    public static function getList()
    {
        return [
            self::SUPERADMIN  => trans('SuperAdmin'),
            self::ADMIN       => trans('Admin'),
            self::STAFF       => trans('Staff'),
            self::CLIENT      => trans('Client'),
        ];
    }

    public static function getLabel($key)
    {
        return self::getList()[$key];
    }
}
