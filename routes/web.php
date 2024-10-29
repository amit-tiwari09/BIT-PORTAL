<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarouselSlideController;

use App\SiteSetting;
use App\SocialMediaLink;
use App\NavLink; 
use App\CarouselSlide;
use App\Promo;
Route::get('/', function () {
    // Retrieve site settings
    $settings = SiteSetting::getSettings();

    // Retrieve all social media links
    $socialMediaLinks = SocialMediaLink::all(); 

    // Retrieve all navigation links
    $navLinks = NavLink::all(); 
    $slides = CarouselSlide::all();
    $promos = Promo::all();

    // Pass settings, social media links, and navigation links to the view
    return view('frontend.homepage.index', compact('settings', 'socialMediaLinks', 'navLinks','slides','promos'));
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
    Route::get('site-settings/edit', 'SiteSettingController@edit')->name('site-settings.edit');
    Route::put('site-settings/update/{key}', 'SiteSettingController@update')->name('site-settings.update');


});


Route::middleware("student")->group(function(){
    Route::view('/studentdashboard',"backend.StudentDashboard.index")->name('StudentDashboard');

});


// Import the SocialMediaLinkController at the top of the file
// use App\Http\Controllers\SocialMediaLinkController;

// Define routes for social media links
Route::get('social_media_links', 'SocialMediaLinkController@index')->name('social_media_links.index');
Route::get('social_media_links/create', 'SocialMediaLinkController@create')->name('social_media_links.create');
Route::post('social_media_links', 'SocialMediaLinkController@store')->name('social_media_links.store');
Route::get('social_media_links/{id}/edit', 'SocialMediaLinkController@edit')->name('social_media_links.edit');
Route::put('social_media_links/{id}', 'SocialMediaLinkController@update')->name('social_media_links.update');
Route::delete('social_media_links/{id}', 'SocialMediaLinkController@destroy')->name('social_media_links.destroy');



Route::resource('nav_links', 'NavLinkController');






// Define routes manually for Laravel 5.8
Route::get('carousel', 'CarouselSlideController@index')->name('carousel.index');
Route::get('carousel/create', 'CarouselSlideController@create')->name('carousel.create');
Route::post('carousel', 'CarouselSlideController@store')->name('carousel.store');
Route::get('carousel/{id}/edit', 'CarouselSlideController@edit')->name('carousel.edit');
Route::put('carousel/{id}', 'CarouselSlideController@update')->name('carousel.update');
Route::delete('carousel/{id}', 'CarouselSlideController@destroy')->name('carousel.destroy');

Route::get('demo',"CarouselSlideController@index2");

// Promos 

Route::resource('admin/promos', 'PromoController');



Route::get('blog','blogController@index')->name('blog.index');
Route::get('blog/create','blogController@create')->name('blog.create');
Route::post('blog/store','blogController@store')->name('blog.store');
Route::get('/blog/{id}/edit', 'blogController@edit')->name('blog.edit');
Route::delete('/blog/{id}', 'blogController@destroy')->name('blog.destroy');
Route::post('blog/{id}', 'BlogController@update')->name('blog.update'); // Route for updating a post


Route::get('blog/show/{id}','blogController@show')->name('blog.show');













