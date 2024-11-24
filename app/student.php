<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $guarded = ["id"];
    protected $table = 'students';



    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // app/Student.php
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function testimonial()
    {
        return $this->hasOne(Testimonial::class);
    }
}
