<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaLink extends Model
{
    protected $fillable = ['name', 'url', 'image'];
}
