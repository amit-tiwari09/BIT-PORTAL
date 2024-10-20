<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselSlide extends Model
{
    protected $fillable = ['main_text', 'secondary_text', 'image'];
}
