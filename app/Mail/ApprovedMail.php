<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;

    public function __construct($email,$password)
    {
        $this->email = $email;
        $this->password= $password;
    }
    // resources\views\emails\applicantApproved.blade.php
    public function build()
    {
        return $this->view('emails.applicantApproved')
                    ->with([
                        'email' => $this->email,
                        'password' => $this->password,
                    ]);
    }
    
     
}
