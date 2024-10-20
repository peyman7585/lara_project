<?php

namespace App\Services\notifications\Providers;

use App\Models\User;
use App\Services\notifications\Contracts\Provider;
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

    public function send()
    {
        $sender = "2000500666";
        $receptor = $this->user->phone_number;
        $message = $this->text;
        $api= new KavenegarApi("5131314C45714F566C77674D5858567334434C6F34796555624471615A3649696932472B4D717041696D413D");
        $api ->Send( $sender,$receptor,$message);
    }

}
