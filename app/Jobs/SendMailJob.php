<?php

namespace App\Jobs;

use App\Mail\SendWelcomeMail;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $to ;
    private $send ;
    public function __construct($to , $send)
    {
        $this->to = $to;
        $this->send = $send;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            dd($this->send);

            Mail::to($this->to)->send(new SendWelcomeMail($this->send));

           } catch (Exception $e) {
           Log::error("unable to send mail ". $e->getMessage());
       }
    }
}
