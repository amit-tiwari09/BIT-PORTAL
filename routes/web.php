<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post("/login/check","StaffController@authenticate")->name('staff.login');

Route::view("/login","frontend.forms.login");
// Registration routes
Route::get('student/register', 'StudentController@showRegistrationForm')->name('student.register');
Route::post('student/register', 'StudentController@register');

// Login routes
Route::get('student/login', 'StudentController@showLoginForm')->name('student.login');
Route::post('student/login', 'StudentController@login');

// Logout route
Route::post('student/logout', 'StudentController@logout')->name('student.logout');


