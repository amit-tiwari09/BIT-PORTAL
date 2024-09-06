<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Staff;
use App\Student;

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
                             ->with('staff', $staff);

                        case 'principal':
                            return redirect()->route('principal.dashboard')
                                ->with('staff', $staff);

                        case 'teacher':
                            return redirect()->route('teacher.dashboard')
                                ->with('staff', $staff);

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



    public function logout(Request $request)
    {

        Auth::guard('staff')->logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();


        return redirect()->route('login');
    }
}
