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

    public function login(Request $req)
    {
        $validation = $req->validate([
            "email" => "required|email",
            "pass" => "required|min:6",
        ]);

        $staff = Staff::where("email", $req->email)->first();
        if ($staff && Hash::check($req->pass, $staff->password)) {
            if (Auth::guard('staff')->attempt(['email' => $req->email, 'password' => $req->pass])) {
                $req->session()->regenerate();
                return redirect()->route('staffdashboard');
            } else {
                return back()->withErrors(['login' => 'Unable to log in.']);
            }
        } else {

            return back()->withErrors(['login' => 'Invalid email or password.']);
        }
    }



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
                            $staff = Auth::guard('staff')->user();
                            $staffInfo = [
                                'staffcount' => $staffcount,
                                'studentcount' => $studentcount,
                                'dashname' => "HOD",
                                'staff' => $staff
                            ];
                            session(['staffInfo' => $staffInfo]);
                            return redirect()->route('staffdashboard');


                        case 'principal':
                            $staffcount = Staff::count();
                            $studentcount = Student::count();
                            $staff = Auth::guard('staff')->user();  // Assuming you're getting the logged-in staff info

                            // Create an array to hold all the data for Principal
                            $staffInfo = [
                                'staffcount' => $staffcount,
                                'studentcount' => $studentcount,
                                'dashname' => "Principal",  // Updated role name
                                'staff' => $staff
                            ];

                            // Store the array in the session
                            session(['staffInfo' => $staffInfo]);

                            return redirect()->route('staffdashboard');


                        case 'teacher':
                            $staff = Auth::guard('staff')->user();  // Assuming you're getting the logged-in staff info

                            // Create an array to hold all the data for teacher, principal, or HOD
                            $staffInfo = [
                                'dashname' => "Teacher",  // Changed role to "Teacher"
                                'staff' => $staff
                            ];

                            // Store the array in the session
                            session(['staffInfo' => $staffInfo]);
                            return redirect()->route('staffdashboard');


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


    public function show()
    {
        $staff = Auth::guard('staff')->user();
    
        return view('backend.StaffDashboard.profile', compact('staff'));
       
    }
    


    public function edit()
    {
        $staff = auth()->guard('staff')->user(); // Get the authenticated staff
        return view('backend.StaffDashboard.edit', compact('staff'));
    }


    public function update(Request $request)
    {
        // Fetch the authenticated staff member
        $staff = Auth::guard('staff')->user();

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
        return redirect()->route('staff.edit')->with('success', 'Profile updated successfully.');
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

        $applicant = Applicant::findOrFail($id);
        $password = Str::random(8);

        if ($applicant->applicant_type === 'student') {
            // Generate registration number using helper
            $registrationNo = RegistrationHelper::generateRegistrationNumber($applicant->department);

            try {

                if (Student::where('email', $applicant->email)->exists()) {
                    return redirect()->back()->with("message1", "Email already exists for a student.");
                }
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
            } catch (\Exception $e) {
                return redirect()->route('applicants.details')->with("message3", $e->getMessage());
            }
        } elseif ($applicant->applicant_type === 'staff') {
            // Move the data to the staff table
            try {
                if (Staff::where('email', $applicant->email)->exists()) {
                    return redirect()->back()->with("message2", "Email already exists for a staff member.");
                }

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
            } catch (\Exception $e) {
                return redirect()->route('applicants.details')->with('message4', $e->getMessage());
            }
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
        session()->forget('staffInfo');


        return redirect()->route('login');
    }



    public function deleteApplicant($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return redirect()->route('applicants.details')->with('success', 'Applicant deleted successfully.');
    }
}
