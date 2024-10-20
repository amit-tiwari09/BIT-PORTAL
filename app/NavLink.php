<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavLink extends Model
{
    // Specify the table associated with the model (optional if follows Laravel convention)
    protected $table = 'nav_links';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'key', // Name of the nav link
        'value', // URL of the nav link
    ];

    // You can also define any additional relationships or methods as needed
}
