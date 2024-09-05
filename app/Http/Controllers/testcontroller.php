<!-- It is of student controller just for checking it is over here -->

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
   
    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:6|confirmed',
            
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('student.login')->with('success', 'Registration successful! Please log in.');
    }

    // Show login form
   

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
         $student = student::where("email", $req->email)->first();


        if ($student) {

            if (Hash::check($req->pass, $student->password)) {

                Auth::login($student);
                
               
            } else {
                session()->flash("WrongPass", "The password is not correct");
                return redirect()->back();
            }
        } else {
            session()->flash("UnvalidEmail", "The email is not valid, please register");
            return redirect()->back();

      
    }}

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('student.login');
    }
   
}

