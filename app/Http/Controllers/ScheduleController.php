<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InterviewInvitation;
use App\JobApplication;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewScheduled;

class ScheduleController extends Controller
{
    public function store(Request $request, $application_id)
    {
        // Validate the request
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'place' => 'required|string|max:255',
        ]);

        // Retrieve the application
        $application = JobApplication::findOrFail($application_id);
        InterviewInvitation::create([
            'application_id' => $application_id,
            'interview_date' => $validated['date'],
            'interview_time' => $validated['time'],
            'interview_place' => $validated['place'],
        ]);
        
        // Send email to the student with the interview details
        Mail::to($application->student->email)->send(new InterviewScheduled($application, $validated));
        $application->status = 'interviewing';
        $application->save();
        
        // Redirect back with a success message
        return redirect()->route('job-applications.index', $application_id)->with('success', 'Interview scheduled and email sent.');
    }
}
