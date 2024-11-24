<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\JobApplication;

class InterviewScheduled extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $interviewDetails;

    public function __construct(JobApplication $application, $interviewDetails)
    {
        $this->application = $application;
        $this->interviewDetails = $interviewDetails;
    }

    public function build()
    {
        return $this->subject('Interview Scheduled')
                    ->view('emails.interview-scheduled');
    }
}