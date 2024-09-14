<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.homepage.index');
})->name('home');



///// login and logout form
Route::view("/login","frontend.forms.login")->name('login');
Route::post('/logout','StaffController@logout')->name('logout');
Route::post('/logout/student','StudentController@logout')->name('logout.student');

// Authentication request 
Route::post("/staff/login/","StaffController@authenticate")->name('staff.login');
Route::post("/student/login","StudentController@authenticate")->name('student.login');
Route::view("/student/admission","frontend.forms.studentAdmission")->name('admmisionStudent');
Route::post("/student/applied","applicantController@studentApllied")->name('student.apply');
Route::post("/staff/applied","applicantController@staffApplied")->name('staff.apply');

// all the routes for authenticated staffs 
Route::middleware("staff")->group(function(){
    Route::view("/staffdashboard","backend.StaffDashboard.index")->name('staffdashboard');
    Route::get("/dashboard","StaffController@ShowProfile")->name("app.profile");
    Route::post("/applicants","StaffController@apllicantsDetails")->name('applicants.details');
    Route::get('/admin/view/{id}','StaffController@viewApplicant')->name('admin.view');
    Route::post('/applicant/approve/{id}','StaffController@approveApplicant')->name('applicant.approve');


});


Route::middleware("student")->group(function(){
    Route::view('/studentdashboard',"backend.StudentDashboard.index")->name('StudentDashboard');

});





