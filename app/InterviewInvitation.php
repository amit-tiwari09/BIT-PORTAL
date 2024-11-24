<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewInvitation extends Model
{
    protected $fillable = [
        'application_id', 'interview_date', 'interview_time', 'interview_place'
    ];

    public function application()
    {
        return $this->belongsTo(JobApplication::class);
    }
}
