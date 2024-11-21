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
                    $student = Auth::guard('student')->user();
                    session(['student' => $student]);
                    // dd(session('student')->name);
                    return redirect()->route('StudentDashboard');
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


    public function edit()
    {
        
        $student = Auth::guard('student')->user(); // Assuming the user is authenticated
        return view('backend.StudentDashboard.edit', compact('student'));
    }


    public function update(Request $request)
    {
        // Fetch the authenticated staff member
        $staff = Auth::guard('student')->user();
    
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staffs,email,' . $staff->id,
            'password' => 'nullable|min:6|confirmed', // Optional password update
            'phone_no' => 'required|string|max:15',
            'address' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'image' => 'nullable', // Max 2MB image size
        ]);
    
        // Prepare data for update (excluding the password field unless it's provided)
        $data = $request->only(['name', 'email', 'phone_no', 'address', 'dob', 'gender']);
    
        // Handle password update if provided
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password); // Hash password
        }
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Generate a unique name for the image
            $imageName = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
    
            // Move the image to the 'public/pictures' directory
            $path = $request->file('image')->move(public_path('pictures'), $imageName);
    
            // Save the image name in the database
            $data['image'] = $imageName;
    
            // Optional: Delete the old image if it exists
            if ($staff->image) {
                $oldImagePath = public_path('pictures/' . $staff->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image from the 'public/pictures' directory
                }
            }
        }
    
        // Update the staff's information
        $staff->update($data);
    
        // Store the updated staff data in session
        session(['staff' => $staff]);

       
    
        // Redirect back to the profile edit page with success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
    



    public function logout(Request $request)
    {

        Auth::guard('staff')->logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();
        session()->forget('student');



        return redirect()->route('login');
    }
}
