<?php
namespace App\Services\notifications\Constants;
class EmailTypes
{
    const USER_REGISTER=1;
    const TOPIC_CREATED=2;
    const FORGET_PASSWORD=3;

    public static function toString()
    {
        return [
            self::USER_REGISTER=>'ثبت نام کاربر',
            self::TOPIC_CREATED=>'ایجاد مقاله جدید',
            self::FORGET_PASSWORD=>'فراموشی رمز عبور'
        ];
    }
}
