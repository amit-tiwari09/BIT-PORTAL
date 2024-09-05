<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $guarded = ["id"];
    protected $table = 'students';
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    // Automatically hash the password when setting it
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
}
}