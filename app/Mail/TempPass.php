<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TempPass extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$password_temporal)
    {
        $this->email = $email;
        $this->password_temporal = $password_temporal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Storm.Engineering.Contacto@gmail.com')
        ->view('email.TempPass',['email'=> $this->email ,'password_temporal'=>$this->password_temporal]);
    }
}
