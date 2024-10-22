<?php
namespace App\Services\notifications\Constants;
use App\Mail\ForgetPassword;
use App\Mail\TopicCreate;
use App\Mail\UserRegister;

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
    public static function toMail($type)
    {
        try {
            return[
                self::USER_REGISTER=>UserRegister::class,
                self::TOPIC_CREATED=>TopicCreate::class,
                self::FORGET_PASSWORD=>ForgetPassword::class
            ][$type];
        }catch (\Throwable $th){
            throw new \InvalidArgumentException('Mailable class does not exist');
        }
    }

}
