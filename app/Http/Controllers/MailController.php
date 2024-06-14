<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
     public function sendMail(){

        try {
             $toEmailAddress = "abdelkader@gmail.com";
             $welcomeMessage = "welocme abdelkader to mail trapmail integration";
             Mail::to($toEmailAddress)->send(new SendWelcomeMail($welcomeMessage));
        } catch (Exception $e) {
            Log::error("unable to send mail ". $e->getMessage());
        }

     }

    }
