<?php

namespace App\Services\notifications\Providers;

use App\Models\User;
use App\Services\notifications\Contracts\Provider;
use App\Services\notifications\Exceptions\UserDoesNotHaveNumber;
use Kavenegar\KavenegarApi;

class SmsProvider implements Provider
{
    private $user;
    private $text;
    public function __construct(User $user,string $text)
    {
        $this->user=$user;
        $this->text=$text;
    }
    private function havePhoneNumber()
    {
        if (is_null($this->user->phone_number)){
            throw new UserDoesNotHaveNumber();
        }
    }
    public function send()
    {
        $this->havePhoneNumber();

        $sender = "2000500666";
        $receptor = $this->user->phone_number;
        $message = $this->text;
        $api= new KavenegarApi("5131314C45714F566C77674D5858567334434C6F34796555624471615A3649696932472B4D717041696D413D");
        $api ->Send( $sender,$receptor,$message);
    }


}
