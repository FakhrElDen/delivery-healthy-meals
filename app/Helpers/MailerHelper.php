<?php

namespace App\Helpers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Mail;
class mailerHelper
{

    static function MailerSender($emailTitle,$bodyMessage,$userEmail,$userName,$companyEmail){

        $arr = array();
            $data = array('userName'=>$userName,'usermail'=>$userEmail,'Bodymessage'=>$bodyMessage);
            Mail::send('mail', $data, function($message) use ($userEmail,$userName,$companyEmail,$emailTitle) {
                $message->to("info@tripiata.com",$userName)->subject($emailTitle);
                $message->from("mirettemahmoud92@gmail.com");
            });
                //dd($userEmail);
                return true;
    }

}
