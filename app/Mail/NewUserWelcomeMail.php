<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    //create a new message instance
    public function __construct()
    {
        //
    }

    //build the message
    public function build()
    {
        return $this->markdown('emails.welcome-email');
    }
}
