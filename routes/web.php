<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


///// login and logout form
Route::view("/login","frontend.forms.login")->name('login');
Route::post('/logout','StaffController@logout')->name('logout');

// Authentication request 
Route::post("/staff/login/","StaffController@authenticate")->name('staff.login');

// all the routes for authenticated staffs 
Route::middleware("staff")->group(function(){
    Route::view("/staffdashboard","backend.StaffDashboard.index")->name('staffdashboard');
    Route::get("/dashboard","StaffController@ShowProfile")->name("app.profile");
});





