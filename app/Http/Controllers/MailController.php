<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Carbon\Carbon;

class MailController extends Controller
{
     public function sendMail(){

            $to = "abdelkader@gmail.com";
            $send = "welocme abdelkader to mail trapmail integration";
            $mail = new SendMailJob($to, $send);
             $mail->delay(Carbon::now()->addSeconds(10))->dispatch($to, $send);






     }

    }
