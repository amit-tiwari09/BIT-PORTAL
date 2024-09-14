<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Staff;
use App\Student;
use App\Applicant;

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
                                -with('dashname','teacher');

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
    

    public function apllicantsDetails(){
        $applicants = Applicant::all();
        return view("backend.StaffDashboard.applicants",compact('applicants'));
    }

    public function viewApplicant($id) {
        $applicant = Applicant::findOrFail($id);
        // resources\views\backend\StaffDashboard\applicantView.blade.php
        return view('backend.StaffDashboard.applicantView', compact('applicant'));
    }
    
    public function approveApplicant($id) {
        $applicant = Applicant::findOrFail($id);
        
        // Generate a random password
        // $password = Str::random(10);
    
        // Move to staff table
        Staff::create([
            'name' => $applicant->name,
            'email' => $applicant->email,
            // 'password' => Hash::make($password),
            'phone_no' => $applicant->phone_no,
            'address' => $applicant->address,
            'dob' => $applicant->dob,
            'gender' => $applicant->gender,
            'department' => $applicant->department,
            'subject' => $applicant->subject,
            'experience' => $applicant->experience,
            'resume_path' => $applicant->resume_path,
        ]);
    
        // Send email with password
        // Mail::to($applicant->email)->send(new ApplicantApprovedMail($password));
    
        // Delete from applicants table
        $applicant->delete();
    
        return redirect()->route('admin.dashboard')->with('success', 'Applicant approved and moved to staff.');
    }
    


    public function logout(Request $request)
    {

        Auth::guard('staff')->logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();


        return redirect()->route('login');
    }
}
