<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Staff;

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

                Auth::login($staff);
                $role = $staff->role;
                switch ($role) {
                    case 'hod':
                        dd("welcome to hod");
                        break;
                    case 'principal':
                        dd("welcome to Principal");
                        break;
                    case 'teacher':
                        dd("welcome to teacher");
                        break;
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
}
