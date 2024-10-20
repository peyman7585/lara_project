<?php
namespace App\Services\notifications;


use App\Models\User;
use App\Services\notifications\Contracts\Provider;
use Illuminate\Mail\Mailable;

/**
 * @method sendSms(App\Models\User $user ,String $text)
 * @method sendEmail(App\Models\User $user , Illuminate\Mail\Mailable $mailable)
 */

class Notification
{
    public function __call($method ,$arguments)
    {
        $providerPath= __NAMESPACE__ . '\Providers\\' . substr($method,4).'Provider';

        if (!class_exists($providerPath))
        {
            throw new \Exception("Class does not exist");
        }
        $provideInstance=new $providerPath(... $arguments);

        if (!is_subclass_of($provideInstance ,Provider::class))
        {
            throw new \Exception("Class must implements App\Services\Notifications\Contracts\Provider");
        }
        return $provideInstance->send();
    }

}
