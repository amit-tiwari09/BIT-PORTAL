<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Staff;
use App\Student;
use App\Applicant;
use Illuminate\Support\Facades\DB;
use App\Helpers\RegistrationHelper;
use App\Mail\ApprovedMail;


 

class StaffController extends Controller
{
    public function authenticate(Request $req)
    {

        $validation = $req->validate([
            "email" => "required|email",
            "pass" => "required|min:6",
        ]);

        $staff = Staff::where("email", $req->email)->first();


        if ($staff) {

            if (Hash::check($req->pass, $staff->password)) {

                if (Auth::guard('staff')->attempt(['email' => $req->email, 'password' => $req->pass])) {

                    $role = $staff->role;
                    switch ($role) {
                        case 'hod':
                            $staffcount = Staff::count();
                            $studentcount = Student::count();
                            return redirect()->route('staffdashboard')
                                ->with('staffcount', $staffcount)
                                ->with('studentcount', $studentcount)
                                ->with('dashname', "HOD ")
                                ->with('staff', $staff);

                        case 'principal':
                            $staffcount = Staff::count();

                            $studentcount = Student::count();
                            return redirect()->route('staffdashboard')
                                ->with('staffcount', $staffcount)
                                ->with('studentcount', $studentcount)
                                ->with('dashname', "Princiapl")
                                ->with('staff', $staff);

                        case 'teacher':
                            return redirect()->route('staffdashboard')
                                ->with('staff', $staff)
                                - with('dashname', 'teacher');

                        default:
                            return redirect()->route('login')->withErrors('Unknown role');
                    }
                } else {
                    return "not able to login";
                }
            } else {
                session()->flash("WrongPass", "The password is not correct");
                return redirect()->back();
            }
        } else {
            session()->flash("UnvalidEmail", "The email is not valid, please register");
            return redirect()->back();
        }
    }



    public function ShowProfile($staff)
    {
        // return view("backend.StaffDashboard.AppProfile",compact('staff'));
        dd(Auth::check());
    }


    public function apllicantsDetails()
    {
        $applicants = Applicant::all();
        return view("backend.StaffDashboard.applicants", compact('applicants'));
    }

    public function viewApplicant($id)
    {
        $applicant = Applicant::findOrFail($id);
        // resources\views\backend\StaffDashboard\applicantView.blade.php
        return view('backend.StaffDashboard.applicantView', compact('applicant'));
    }
   
    
    public function approveApplicant($id)
{
    // Fetch the applicant
    $applicant = Applicant::findOrFail($id);

    // Generate a random password
    $password = Str::random(8);

    if ($applicant->applicant_type === 'student') {
        // Generate registration number using helper
        $registrationNo = RegistrationHelper::generateRegistrationNumber($applicant->department);

        // Move the data to the students table
        Student::create([
            'name' => $applicant->name,
            'email' => $applicant->email,
            'password' => Hash::make($password),
            'phone_no' => $applicant->phone_no,
            'address' => $applicant->address,
            'dob' => $applicant->dob,
            'department' => $applicant->department,
            'previous_education' => $applicant->previous_education,
            'marks' => $applicant->marks,
            'graduation_year' => $applicant->graduation_year,
            'registration_no' => $registrationNo,
            'faculty' => $applicant->department,
            'admission_date' => now(),
            'certificate_path' => $applicant->certificate_path,
            'tc_path' => $applicant->tc_path,
            'cc_path' => $applicant->cc_path,
            'image' => $applicant->image ?? null,
            'marksheet_path' => $applicant->marksheet_path,
        ]);
    } elseif ($applicant->applicant_type === 'staff') {
        // Move the data to the staff table
        Staff::create([
            'name' => $applicant->name,
            'email' => $applicant->email,
            'password' => Hash::make($password),
            'phone_no' => $applicant->phone_no,
            'address' => $applicant->address,
            'dob' => $applicant->dob,
            'subject' => $applicant->subject,
            'experience' => $applicant->experience,
            'resume_path' => $applicant->resume_path, // Resume path
        ]);
    }

    // Delete the applicant from the applicants table
    $applicant->delete();

    // Send email with generated password using ApprovedMail Mailable
    Mail::to($applicant->email)->send(new ApprovedMail($applicant->email, $password));

    // Redirect back to the admin page with a success message
    return redirect()->route('staffdashboard');
}

    


    public function logout(Request $request)
    {

        Auth::guard('staff')->logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();


        return redirect()->route('login');
    }




   
}
