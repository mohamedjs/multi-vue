<?php


namespace App\Constants;


final class PaymentMethods
{
    const CASH = 1;
    const VISA = 2;

    public static function getList()
    {
        return [
            self::CASH => "Cash",
            self::VISA => "Visa"
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : "";
    }
}
