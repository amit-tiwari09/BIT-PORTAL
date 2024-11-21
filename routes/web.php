<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarouselSlideController;
use Carbon\Carbon;

use App\SiteSetting;
use App\SocialMediaLink;
use App\NavLink;
use App\CarouselSlide;
use App\blog;
use App\Promo;
use App\Event;
use App\Gallery;
use App\Category;
use App\Student;


Route::get('/', function () {

    $settings = SiteSetting::getSettings();
    $socialMediaLinks = SocialMediaLink::all();
    $navLinks = NavLink::all();
    $slides = CarouselSlide::all();
    $promos = Promo::all();
    $newsItems = blog::all();
    $galleries = Gallery::with('category')->orderBy('created_at', 'desc')->get();
    $categories = Category::all();

    $events = Event::where('date', '>=', now()->toDateString())
        ->orderBy('date') // First, order by event date
        ->orderBy('start_time') // Then, order by start time
        ->orderBy('created_at', 'desc') // If dates are the same, order by creation date descending
        ->take(4) // Limit to 4 events
        ->get();




    return view('frontend.homepage.index', compact('settings', 'socialMediaLinks', 'navLinks', 'slides', 'promos', 'newsItems', 'events', 'galleries', 'categories'));
})->name('home');




///// login and logout form
Route::get("/login", function () {
    $settings = SiteSetting::getSettings();
    if (!auth()->guard('staff')->check() && !auth()->guard('student')->check()) {
        return view("frontend.forms.login", compact('settings'));
    } else {
        return redirect()->back();
    }
})->name('login');

Route::post('/logout', 'StaffController@logout')->name('logout');
Route::post('/logout/student', 'StudentController@logout')->name('logout.student');

// Authentication request 
Route::post("/staff/login/", "StaffController@authenticate")->name('staff.login');
Route::post("/student/login", "StudentController@authenticate")->name('student.login');
Route::view("/applicant", "frontend.forms.studentAdmission")->name('Applicantsform');
Route::post("/student/applied", "applicantController@studentApllied")->name('student.apply');
Route::post("/staff/applied", "applicantController@staffApplied")->name('staff.apply');

// all the routes for authenticated staffs 
Route::middleware("staff")->group(function () {
    Route::view("/staffdashboard", "backend.StaffDashboard.index")->name('staffdashboard');
    Route::get("/dashboard", "StaffController@ShowProfile")->name("app.profile");
    Route::get("/applicants", "StaffController@apllicantsDetails")->name('applicants.details');
    Route::get('/applicant/view/{id}', 'StaffController@viewApplicant')->name('admin.view');
    Route::delete('applicants/{id}', 'StaffController@deleteApplicant')->name('admin.delete');

    Route::post('/applicant/approve/{id}', 'StaffController@approveApplicant')->name('applicant.approve');
    Route::get('site-settings/edit', 'SiteSettingController@edit')->name('site-settings.edit');
    Route::put('site-settings/update/{key}', 'SiteSettingController@update')->name('site-settings.update');
    Route::view('/setting', "setting.index")->name('settings');


    // nav links 

    Route::resource('nav-links', 'NavLinkController')->names([
        'index' => 'nav.index',
        'create' => 'nav.create',
        'store' => 'nav.store',
        'show' => 'nav.show',
        'edit' => 'nav.edit',
        'update' => 'nav.update',
        'destroy' => 'nav.destroy',
    ]);


// expenditure


Route::view('add/expenses','expenditures.create')->name('expenditures.create');
Route::get('/expenditure/{id}','ExpenditureController@show')->name('expenditure.show');
Route::get('/dashboard/graph','graphController@showgraph')->name('dashboard.graph');



Route::get('/staff/expenditures','ExpenditureController@index')->name('expenditures.index');
Route::post('/staff/expenditures','ExpenditureController@store')->name('expenditures.store');

    // social media links
    Route::get('social_media_links', 'SocialMediaLinkController@index')->name('social_media_links.index');
    Route::get('social_media_links/create', 'SocialMediaLinkController@create')->name('social_media_links.create');
    Route::post('social_media_links', 'SocialMediaLinkController@store')->name('social_media_links.store');
    Route::get('social_media_links/{id}/edit', 'SocialMediaLinkController@edit')->name('social_media_links.edit');
    Route::put('social_media_links/{id}', 'SocialMediaLinkController@update')->name('social_media_links.update');
    Route::delete('social_media_links/{id}', 'SocialMediaLinkController@destroy')->name('social_media_links.destroy');

    // homepage slider 
    Route::get('carousel', 'CarouselSlideController@index')->name('carousel.index');
    Route::get('carousel/create', 'CarouselSlideController@create')->name('carousel.create');
    Route::post('carousel', 'CarouselSlideController@store')->name('carousel.store');
    Route::get('carousel/{id}/edit', 'CarouselSlideController@edit')->name('carousel.edit');
    Route::put('carousel/{id}', 'CarouselSlideController@update')->name('carousel.update');
    Route::delete('carousel/{id}', 'CarouselSlideController@destroy')->name('carousel.destroy');
    Route::get('demo', "CarouselSlideController@index2");
    //  Profile editing 
    Route::get('staff/edit', 'StaffController@edit')->name('staff.edit');
    Route::post('staff/update', 'StaffController@update')->name('staff.update');
    Route::get('staff/show', 'StaffController@show')->name('staff.show');


    // Promos 
    Route::resource('promos', 'PromoController')->names([
        'index' => 'promos.index',
        'create' => 'promos.create',
        'store' => 'promos.store',
        'show' => 'promos.show',
        'edit' => 'promos.edit',
        'update' => 'promos.update',
        'destroy' => 'promos.destroy',
    ]);


    // blogs 

    Route::get('/front/blog', 'blogController@index')->name('blog.index');
    Route::get('blog/create', 'blogController@create')->name('blog.create');
    Route::post('blog/store', 'blogController@store')->name('blog.store');
    Route::get('/blog/{id}/edit', 'blogController@edit')->name('blog.edit');
    Route::delete('/blog/{id}', 'blogController@destroy')->name('blog.destroy');
    Route::post('blog/{id}', 'BlogController@update')->name('blog.update');
    // Route for updating a post


    // fee structure and payment details 
    Route::get('/fee-structures/create', 'FeeStructureController@create')->name('fee_structures.create');
    Route::post('/fee-structures', 'FeeStructureController@store')->name('fee_structures.store');
    Route::get('/fee-structures', 'FeeStructureController@index')->name('fee_structures.index');
    Route::get('students/payment', 'PaymentController@staffStatus')->name('studentpayment.status');
    Route::get('/student/search', 'PaymentController@search')->name('student.search');



    // Events 

    Route::get('events', 'EventController@index')->name('events.index');
    Route::get('events/create', 'EventController@create')->name('events.create');
    Route::post('events', 'EventController@store')->name('events.store');
    Route::get('events/{event}', 'EventController@show')->name('events.show');
    Route::get('events/{event}/edit', 'EventController@edit')->name('events.edit');
    Route::put('events/{event}', 'EventController@update')->name('events.update');
    Route::delete('events/{event}', 'EventController@destroy')->name('events.destroy');



    // gallery 

    Route::get('/gallery', 'GalleryController@index')->name('gallery.index');
    Route::get('/gallery/create', 'GalleryController@create')->name('gallery.create');
    Route::post('/gallery', 'GalleryController@store')->name('gallery.store');
    Route::get('/gallery/edit{id}', 'GalleryController@edit')->name('gallery.edit');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category', 'CategoryController@store')->name('category.store');

    Route::delete('/gallery/{id}', "GalleryController@destroy")->name('gallery.destroy');
    Route::put('gallery/{id}', 'GalleryController@update')->name('gallery.update');
    Route::get('/gallery/my-media', 'GalleryController@myMedia')->name('gallery.myMedia');
    Route::delete('/category/{id}', 'CategoryController@destroy')->name('category.destroy');
});


Route::middleware("student")->group(function () {
    Route::get('/studentdashboard', function () {
        $settings = SiteSetting::getSettings();
        return view("backend.StudentDashboard.index", compact('settings'));
    })->name('StudentDashboard');  ///student dashboard

    Route::get('student/profile',function(){
        $Student = Student::where('email', Auth::guard('student')->user()->email)->first();
          return view('backend.StudentDashboard.profile',compact('Student'));
         
    })->name('student.profile');


    Route::get('profile/edit', 'StudentController@edit')->name('profile.edit');
    Route::post('profile/update', 'StudentController@update')->name('profile.update');


    // Gallery

    Route::get('/student/gallery','GalleryController@index3')->name('gallery.student');
});



// show a particular blog content 
Route::get('blog/show/{id}', 'blogController@show')->name('blog.show');
Route::get('blog', 'blogController@index2')->name('blog.index2');
Route::get('/students/blog', 'blogController@index3')->name('blog.index3');
Route::get('students/blog/create', 'blogController@create3')->name('blog.create3');
Route::post('students/blog/store', 'blogController@store3')->name('blog.store3');
Route::get('students/blog/{id}/edit', 'blogController@edit3')->name('blog.edit3');
Route::delete('students/blog/{id}', 'blogController@destroy3')->name('blog.destroy3');
Route::post('studentsblog/{id}', 'BlogController@update3')->name('blog.update3');

// Event calendar



Route::get('/front/events',"EventController@index2")->name('events.index2');
Route::get('/students/events',"EventController@index3")->name('events.index3');





// Gallery
Route::get('/home/gallery', 'GalleryController@index2')->name('frontgallery');













// Fee structure and payment 




// Fee Structure Routes
;
Route::get('/fee-structures/{id}/edit', 'FeeStructureController@edit')->name('fee_structures.edit');
Route::put('/fee-structures/{id}', 'FeeStructureController@update')->name('fee_structures.update');













Route::get('payments/create/{semester}', 'PaymentController@create')->name('payments.create');
Route::post('payments/store', 'PaymentController@store')->name('payments.store');
Route::get('payments/status', 'PaymentController@status')->name('payments.status');



// learning portal 
Route::get('/videos/create', 'VideoController@create')->name('videos.create');
Route::post('/videos/store', 'VideoController@store')->name('videos.store');
Route::get('/videos', 'VideoController@index')->name('videos.index');

Route::get('/videos/{id}', 'VideoController@show')->name('videos.show');
Route::get('searched/videos/', 'VideoController@search')->name('videos.search');







Route::get('videos/{id}/edit', 'VideoController@edit')->name('videos.edit');

// Update a specific video
Route::put('videos/{id}', 'VideoController@update')->name('videos.update');

// Delete a specific video
Route::delete('videos/{id}', 'VideoController@destroy')->name('videos.destroy');
