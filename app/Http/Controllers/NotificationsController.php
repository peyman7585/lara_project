<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Models\User;
use App\Services\notifications\Constants\EmailTypes;
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
        $request->validated();

        try {
            $notification=resolve(Notification::class);
            $mailable=EmailTypes::toMail($request->email_type);
            $notification->sendEmail(User::find($request->user),new $mailable);

            return redirect()->back()->with('success',__('notification.email_send_successfully'));
        }catch (\Throwable $th){
            return redirect()->back()->with('failed',__('notification.email_has_problem'));
        }
    }
}
