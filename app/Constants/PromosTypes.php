<?php


namespace App\Constants;


final class PromosTypes
{
    const VALUE = 1;
    const PERCENTAGE = 2;

    public static function getList()
    {
        return [
            self::VALUE => trans("Value"),
            self::PERCENTAGE => trans("Percentage")
        ];
    }

    public static function getLabel($key){
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : " ";
    }
}
