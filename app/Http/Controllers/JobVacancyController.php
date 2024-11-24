<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobVacancy;
use App\JobApplication;
use App\InterviewInvitation;

class JobVacancyController extends Controller
{
    public function create()
    {
        return view('job-vacancies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'required_documents' => 'required|array',  // Ensure this is an array
            'required_documents.*' => 'required|string',  // Validate that each document is a string
        ]);

        JobVacancy::create([
            'title' => $request->title,
            'description' => $request->description,
            'required_documents' => json_encode($request->required_documents),  // Store as JSON
            // 'created_by' => auth('staff')->id(),  // Get staff user id
            'created_by' => 1,  // Get staff user id

        ]);

        return redirect()->route('job-vacancies.index');
    }

    public function index()
    {
        $vacancies = JobVacancy::all();
        return view('job-vacancies.index', compact('vacancies'));
    }

    public function index2()
    {
        $vacancies = JobVacancy::all();
        return view('job-vacancies.index2', compact('vacancies'));
    }

    public function show(JobVacancy $job)
    {
        return view('job-vacancies.show', compact('job'));
    }

    // app/Http/Controllers/JobVacancyController.php

public function destroy($id)
{
    // Find the job vacancy by ID
    $vacancy = JobVacancy::findOrFail($id);

    $jobapplication = JobVacancy::where('job_vacancy_id',$id);

 

    

    
   
    
    // Delete the job vacancy
    $vacancy->delete();

    // Redirect back with a success message
    return redirect()->route('job-vacancies.index')->with('success', 'Job vacancy deleted successfully.');
}

}
