<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeMail;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' =>'required|min:6'
        ]);

        //check if user exists

        $user = User::where('email', $request->email)->first();
        if($user){
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('product.index');
            }
            $request->session()->flash('error', 'Check your email and passowrd');
            return redirect()->back();

        }

        $request->session()->flash('error', 'Check your email and passowrd');
        return redirect()->back();
    }

    public function register(Request $request){

        $request->validate([
            'name' =>'required',
            'username'=>'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' =>'required|min:6|confirmed'
        ]);

        $data = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
       $isdone =  User::insert($data);
       if($isdone){
        Mail::to($request->email)->send(new welcomeMail($request->username, $request->name));
       }
        $request->session()->flash('success', 'Created Successfully');
        return redirect()->route('login');
        // dd($request->all());



    }
}

