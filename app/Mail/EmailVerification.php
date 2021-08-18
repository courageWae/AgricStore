<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $userName ;
    protected $verificationCode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $userName, $verificationCode)
    {
        $this->userName = $userName;
        $this->verificationCode = $verificationCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.email-verification');
    }
}
