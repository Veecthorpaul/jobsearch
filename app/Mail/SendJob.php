<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendJob extends Mailable
{
    use Queueable, SerializesModels;
    public $sen;
    public $res;
    public $mes; 
    public $urls;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender, $recipient, $message, $url)
    {
       $this->sen= $sender;
       $this->res= $recipient;
       $this->mes= $message;
       $this->urls= $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.jobEmail');
    }
}
