<?php


namespace App\Constants;


final class VerifyStatus
{
    const YES = 1;
    const NO  = 2;

    public static function getList()
    {
        return [
            self::YES => "Yes",
            self::NO  => "No",
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : "";
    }
}
