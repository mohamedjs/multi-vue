<?php


namespace App\Constants;


final class ActiveStatus
{
    const ACTIVE = 1;
    const DISABLED =0;

    public static function getList()
    {
        return [
            self::ACTIVE => "Active",
            self::DISABLED => "Disabled",
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : "";
    }
}
