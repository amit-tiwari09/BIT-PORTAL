<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        return view('student.register');
    }

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
    public function showLoginForm()
    {
        return view('student.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

       
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('student.login');
    }

    // Show dashboard with student data
    public function dashboard()
    {
        $student = Auth::user();
        return view('student.dashboard', compact('student'));
    }
}
