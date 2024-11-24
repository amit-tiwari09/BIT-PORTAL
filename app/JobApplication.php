<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = ['job_vacancy_id', 'student_id', 'documents'];

    protected $casts = [
        'documents' => 'array', // Automatically cast to array
    ];

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function approvedStaff()
    {
        return $this->hasOne(ApprovedStaff::class, 'application_id');
    }
}
