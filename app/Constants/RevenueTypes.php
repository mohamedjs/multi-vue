<?php


namespace App\Constants;


final class RevenueTypes
{
    const REVENUE = 1;
    const HOLD = 2;

    public static function getList()
    {
        return [
            self::REVENUE => trans("Revenue"),
            self::HOLD => trans("Hold"),
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : "";
    }
}
