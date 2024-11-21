<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;

class applicantController extends Controller
{
    public function studentApllied(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,email',
            'phone_no' => 'required|string|max:27',
            'address' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'applicant_type' => 'required|in:student,staff',
            'department' => 'required_if:applicant_type,student|in:Computer,Mechanical,Electrical,Electronics,Civil',
            'previous_education' => 'required_if:applicant_type,student|string',
            'marks' => 'required_if:applicant_type,student|numeric',
            'graduation_year' => 'required_if:applicant_type,student|digits:4',
            'subject' => 'required_if:applicant_type,staff|string',
            'experience' => 'required_if:applicant_type,staff|integer|min:0',
            'resume' => 'required_if:applicant_type,staff|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'certificate' => 'required_if:applicant_type,student|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'tc' => 'required_if:applicant_type,student|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'cc' => 'required_if:applicant_type,student|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'marksheet' => 'required_if:applicant_type,student|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // Initialize array for storing file paths
        $filePaths = [];

        if ($request->input('applicant_type') === 'student') {
            $fileFields = ['certificate', 'tc', 'cc', 'marksheet'];

            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    // Generate a unique file name
                    $fileName = time() . '-' . $request->file($field)->getClientOriginalName();
                    // Store the file in the public/images folder

                    $path = $request->file($field)->move(public_path('pictures'), $fileName);
                    // Save the file name for the applicant
                    $filePaths[$field . '_path'] = $fileName;
                }
            }
        } elseif ($request->input('applicant_type') === 'staff') {
            if ($request->hasFile('resume')) {
                // Generate a unique file name
                $fileName = time() . '-' . $request->file('resume')->getClientOriginalName();
                // Store the file in the public/pictures folder
                $path = $request->file('resume')->move(public_path('pictures'), $fileName);
                // Save the file name for the applicant
                $filePaths['resume_path'] = $fileName;
            }
        }

        // Create a new Applicant record
        $applicant = Applicant::create(array_merge($request->except(['certificate', 'tc', 'cc', 'marksheet', 'resume']), $filePaths));

        if ($applicant) {
            session()->flash('admitsuccess', 'Your application is submitted. Contact us at 98***** for further inquiry.');
            return redirect()->route('home');
        } else {
            session()->flash('admiterror', 'There was an error submitting your application. Please try again.');
            return redirect()->back();
        }
    }
    // student appicant code end 



    public function staffApplied(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,email',
            'phone_no' => 'required|string|max:27',
            'address' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'department' => 'required|in:Computer,Mechanical,Electrical,Electronics,Civil',
            'subject' => 'required|string',
            'experience' => 'required|integer|min:0',
            'resume' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // Initialize array for storing file paths
        $filePaths = [];

        if ($request->hasFile('resume')) {
            // Generate a unique file name
            $fileName = time() . '-' . $request->file('resume')->getClientOriginalName();
            // Store the file in the public/pictures folder
            $path = $request->file('resume')->move(public_path('pictures'), $fileName);
            // Save the file name for the applicant
            $filePaths['resume_path'] = $fileName;
        }


        // Create a new Applicant record
        $applicant = Applicant::create(array_merge($request->except(['resume']), $filePaths));

        if ($applicant) {
            session()->flash('admitsuccess', 'Your application is submitted. Contact us at 98***** for further inquiry.');
            return redirect()->route('home');
        } else {
            session()->flash('admiterror', 'There was an error submitting your application. Please try again.');
            return redirect()->back();
        }
    }




   
}
