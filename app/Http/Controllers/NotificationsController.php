<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Http\Requests\SendSmsRequest;
use App\Jobs\SendEmail;
use App\Jobs\SendSms;
use App\Models\User;
use App\Services\notifications\Constants\EmailTypes;
use App\Services\notifications\Exceptions\UserDoesNotHaveNumber;
use App\Services\notifications\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    ## show send eamil form
    public function email()
    {
        $users=User::all();
        $emailTypes=EmailTypes::toString();
        return view('notifications.send-email',compact('users','emailTypes'));
    }

    public function sendEmail(SendEmailRequest $request)
    {
        try {
              $mailable=EmailTypes::toMail($request->email_type);
              SendEmail::dispatch(User::find($request->user),new $mailable);

            return redirect()->back()->with('success',__('notification.email_send_successfully'));
        }catch (\Throwable $th){
            return redirect()->back()->with('failed',__('notification.email_has_problem'));
        }
    }

    public function sms()
    {
        $users=User::all();
        return view('notifications.send-sms',compact('users'));
    }

    public function sendSms(SendSmsRequest $request )
    {

        try {
            SendSms::dispatch(User::find($request->user),$request->text);
            return $this->redirectBack('success',__('notification.sms_send_successfully'));
        }
        catch (\Exception $e){
            return $this->redirectBack('failed',__('notification.sms_has_problem'));
        }
    }


    public function redirectBack(string $type, string $text)
    {
        return redirect()->back()->with($type,$text);
    }

}
