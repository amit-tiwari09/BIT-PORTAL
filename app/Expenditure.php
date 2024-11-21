<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    protected $fillable = ['item', 'amount', 'date', 'person_name', 'description'];
}
