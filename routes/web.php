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

Route::view("/staffdashboard","backend.StaffDashboard.index");

Route::post("/login/check","StaffController@authenticate")->name('staff.login');

Route::view("/login","frontend.forms.login");
