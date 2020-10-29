<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $rec;
    public $sen;
    public $mes; 
    public $nam;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recipient, $email, $message, $name)
    {
       $this->rec= $recipient;
       $this->sen= $email;
       $this->mes= $message;
       $this->nam= $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.sendMail');
    }
}
