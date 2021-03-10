<?php


namespace App\Http\Traits;


use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

trait SendEmail
{

    protected function send_EmailFun($email,$text,$title)
    {
          Mail::send([
            'html' => 'layouts.site.email-temp'],
            ['text' => $text, 'email' => $email, 'logo' => 'http://malkheir.com/site/img/logo.png', 'title' => $title],
             function ($message) use($email)  {
                $message->to($email,'mazaadElkheir')
                    ->from('support@malkheir.com','mazaadElkheir')
                    ->subject(__('Reservation Details'));
            }
        );
    }





}
