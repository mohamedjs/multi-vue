<?php


namespace App\Constants;


final class UserTypes
{
    const ADMIN  = 1;
    const USER   = 3;

    public static function getList()
    {
        $list = [
            self::USER   => trans('User'),
        ];

        if (auth()->user()->hasAccess("admin.users.index.admin")) {
            $list[self::ADMIN] = trans('Admin');
        }

        return $list;
    }
}
