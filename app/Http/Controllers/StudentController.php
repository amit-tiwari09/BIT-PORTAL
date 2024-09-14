<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Student;

class StudentController extends Controller
{
    public function authenticate(Request $req)
    {
        // Validate input fields
        $validation = $req->validate([
            "email" => "required|email",
            "pass" => "required|min:6",
        ]);

        // Find the student by email
        $student = Student::where("email", $req->email)->first();

        // Check if the student exists
        if ($student) {
            // Verify the password
            if (Hash::check($req->pass, $student->password)) {
                // Attempt to log in the student using the 'student' guard
                if (Auth::guard('student')->attempt(['email' => $req->email, 'password' => $req->pass])) {
                    // Redirect to student dashboard on successful login
                    return redirect()->route('StudentDashboard')
                        ->with('student', $student);
                } else {
                    // If unable to log in for some reason
                    return "Unable to log in. Please try again.";
                }
            } else {
                // If the password is incorrect, flash an error and redirect back
                session()->flash("WrongPass", "The password is not correct.");
                return redirect()->back();
            }
        } else {
            // If the email is not valid, flash an error and redirect back
            session()->flash("UnvalidEmail", "The email is not registered. Please sign up.");
            return redirect()->back();
        }
    }



    public function logout(Request $request)
    {

        Auth::guard('staff')->logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();


        return redirect()->route('login');
    }
}
