<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApprovedStaff extends Model
{
   

    // The table associated with the model
    protected $table = 'approved_staff';

    // Fillable attributes to allow mass assignment
    protected $fillable = ['application_id'];

    /**
     * Define the relationship with the JobApplication model.
     */
    public function application()
    {
        return $this->belongsTo(JobApplication::class, 'application_id');
    }
}
