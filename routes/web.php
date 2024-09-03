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

Route::get('/students','StudentsController@index')->name('students.index')->middleware('auth');
Route::get('/students/create','StudentsController@create')->name('students.create');
Route::post('/students/store','StudentsController@store')->name('students.store');
Route::get('/students/delete/{id}','StudentsController@delete')->name('students.delete');
Route::get('/students/edit/{id}','StudentsController@edit')->name('students.edit');
Route::post('/students/update/{id}','StudentsController@update')->name('students.update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/login', 'customeauth.login')->name('login');
Route::post('/login/check', 'AuthController@login')->name('login.check');
Route::view('/register', 'customeauth.register')->name('register');
Route::post('/register/store', 'AuthController@register')->name('register.store');

