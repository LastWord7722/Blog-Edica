<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $password; // cтоит указать паблик

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password)
    {
        $this->password = $password; // инициализация
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.user.password'); // оформления письма
    }
}
