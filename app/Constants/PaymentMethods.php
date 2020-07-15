<?php


namespace App\Constants;


final class PaymentMethods
{
    const CASH = 1;

    public static function getList()
    {
        return [
            self::CASH => trans("Cash"),
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : "";
    }
}
