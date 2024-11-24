<?php

namespace App\Http\Controllers;


use App\JobApplication;
use App\JobVacancy;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JobApplicationController extends Controller
{

    public function index()
    {
        // Fetch all job applications, along with the related job vacancy and student data
        $applications = JobApplication::with(['student', 'jobVacancy'])->get();

        return view('job-applications.index', compact('applications'));
    }

    public function store(Request $request, JobVacancy $job)
    {
        // Validate the incoming request
        $request->validate([
            'documents' => 'required|array',  // Ensure documents are an array
            'documents.*' => 'file',  // Validate the file types
        ]);

        // Get the authenticated student (you might need to adjust this if not using auth()->user())
        // $student = auth()->user();  // Assuming the student is logged in

        // Handle file upload and renaming
        $documents = [];

        // Iterate over the uploaded files (documents)
        foreach ($request->file('documents') as $file) {
            // Generate a new filename based on current timestamp or student ID
            $filename = Str::random(10) . '_' . time() . '.' . $file->getClientOriginalExtension();

            // Move the file to the 'public/pictures' folder
            $file->move(public_path('pictures'), $filename);

            // Store the new file name in the $documents array
            $documents[] = $filename;
        }

        // Create a new JobApplication record
        JobApplication::create([
            'job_vacancy_id' => $job->id,  // Use the job from the route
            'student_id' => 2,  // Store the authenticated student's ID
            // 'student_id' => $student->id,  // Store the authenticated student's ID
            'documents' => json_encode($documents),  // Store the filenames as a JSON array
        ]);

        // Redirect back to the job application list page with success message
        return redirect()->route('job-vacancies.index')->with('success', 'Application submitted successfully!');
    }


    public function show(JobApplication $application)
{
    // Load the related job and student details
    $application->load(['student', 'jobVacancy']);

    return view('job-applications.show', compact('application'));
}

}
