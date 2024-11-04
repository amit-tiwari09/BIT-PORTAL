<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $fillable = ['department', 'semester1_fee', 'semester2_fee', 'semester3_fee', 'semester4_fee', 'semester5_fee', 'semester6_fee'];
}
