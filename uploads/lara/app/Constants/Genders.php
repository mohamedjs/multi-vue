<?php


namespace App\Constants;


final class Genders
{
    const MALE = 1 ;
    const FEMALE = 2;

    public static function getList()
    {
        return [
            self::MALE => "Male",
            self::FEMALE => "Female"
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : "";
    }
}
