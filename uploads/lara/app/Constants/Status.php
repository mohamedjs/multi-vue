<?php


namespace App\Constants;


final class Status
{
    const ACTIVE = 1;
    const DEACTIVATE = 0;

    /**
     * @return array
     */
    public static function getList()
    {
        return [
            self::ACTIVE => "Active",
            self::DEACTIVATE => "Deactivate"
        ];
    }

    /**
     * @param $key
     * @return mixed|string
     */
    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ?
            self::getList()[$key] :
            "";
    }
}
