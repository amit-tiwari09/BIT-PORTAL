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
    }else{
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
    Route::post('blog/{id}', 'BlogController@update')->name('blog.update'); // Route for updating a post


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
    Route::view('/studentdashboard', "backend.StudentDashboard.index")->name('StudentDashboard');  ///student dashboard
});



// show a particular blog content 
Route::get('blog/show/{id}', 'blogController@show')->name('blog.show');
Route::get('blog', 'blogController@index2')->name('blog.index2');

// Event calendar

Route::get('events/all', "EventController@indexfront")->name('frontevents.index');
Route::get('/home/gallery', 'GalleryController@index2')->name('frontgallery');






// Gallery












// Fee structure and payment 




// Fee Structure Routes
// Route::get('fee_structures', 'FeeStructureController@index')->name('fee_structures.index');
// Route::get('fee_structures/create', 'FeeStructureController@create')->name('fee_structures.create');
// Route::post('fee_structures', 'FeeStructureController@store')->name('fee_structures.store');
// Route::get('fee_structures/{id}', 'FeeStructureController@show')->name('fee_structures.show');
Route::get('/fee-structures/{id}/edit', 'FeeStructureController@edit')->name('fee_structures.edit');
Route::put('/fee-structures/{id}', 'FeeStructureController@update')->name('fee_structures.update');

// Route::delete('fee_structures/{id}', 'FeeStructureController@destroy')->name('fee_structures.destroy');

// Payment Routes
// Route::get('payments', 'PaymentController@index')->name('payments.index');
// Route::get('payments/create', 'PaymentController@create')->name('payments.create');
// Route::post('payments', 'PaymentController@store')->name('payments.store');
// Route::get('payments/{id}', 'PaymentController@show')->name('payments.show');
// Route::get('payments/{id}/edit', 'PaymentController@edit')->name('payments.edit');
// Route::put('payments/{id}', 'PaymentController@update')->name('payments.update');
// Route::delete('payments/{id}', 'PaymentController@destroy')->name('payments.destroy');







// Route::post('/payments/{semester}', 'PaymentController@pay')->name('payments.pay');

// Route::get('/payments/status', 'PaymentController@paymentStatus')->name('payments.status');
// Route::get('/payments/status', 'PaymentController@status')->name('payments.status');


// Route::get('/payments/create/{semester}', 'PaymentController@create')->name('payments.create');
// Route::post('/payments/store', 'PaymentController@store')->name('payments.store');




Route::get('payments/create/{semester}', 'PaymentController@create')->name('payments.create');
Route::post('payments/store', 'PaymentController@store')->name('payments.store');
Route::get('payments/status', 'PaymentController@status')->name('payments.status');
