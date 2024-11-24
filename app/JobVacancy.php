<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $fillable = ['title', 'description', 'required_documents', 'created_by'];

    protected $casts = [
        'required_documents' => 'array', // Automatically cast to array
    ];

    public function createdBy()
    {
        return $this->belongsTo(Staff::class, 'created_by'); // Reference to staff model
    }

    

    // app/JobVacancy.php
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
