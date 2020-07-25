<?php


namespace App\Constants;


final class GenderTypes
{
    const MALE   = 1;
    const FEMALE = 2;

    public static function getList()
    {
        return [
            self::MALE => "male",
            self::FEMALE => "female",
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : "";
    }
}
