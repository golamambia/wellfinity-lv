<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Auth::routes(['verify' => true]);

/***************** Clear Cache *****************/
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

/*Admin Route Start*/
/*Authentication*/

Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'showLogin']);
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'doLogin']);
Route::get('/admin/logout', [App\Http\Controllers\AdminController::class, 'doLogout']);
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);


Route::group(['middleware' => ['auth']], function () {
/*Settings*/
Route::get('/admin/settings', [App\Http\Controllers\SettingsController::class, 'settings']);
Route::post('/admin/settings', [App\Http\Controllers\SettingsController::class, 'update']);
Route::get('/admin/settings/delete/{key}', [App\Http\Controllers\SettingsController::class, 'delete']);

/*Emailtemplate*/
Route::get('/admin/emailtemplate', [App\Http\Controllers\EmailtemplateController::class, 'emailtemplate']);
Route::post('/admin/emailtemplate', [App\Http\Controllers\EmailtemplateController::class, 'update']);

/*User*/
Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/admin/user/customer', [App\Http\Controllers\UserController::class, 'customer']);
Route::get('/admin/user/add', [App\Http\Controllers\UserController::class, 'add']);
Route::post('/admin/user/add', [App\Http\Controllers\UserController::class, 'insert']);
Route::get('/admin/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/admin/user/update', [App\Http\Controllers\UserController::class, 'update']);
Route::get('/admin/user/view/{id}', [App\Http\Controllers\UserController::class, 'view']);
Route::get('/admin/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);
Route::get('/admin/user/status/{id}/{status}', [App\Http\Controllers\UserController::class, 'status']);

/*Page*/
Route::get('/admin/page', [App\Http\Controllers\PageController::class, 'index']);
Route::get('/admin/page/add', [App\Http\Controllers\PageController::class, 'add']);
Route::post('/admin/page/add', [App\Http\Controllers\PageController::class, 'insert']);
Route::get('/admin/page/edit/{id}', [App\Http\Controllers\PageController::class, 'edit']);
Route::post('/admin/page/update', [App\Http\Controllers\PageController::class, 'update']);
Route::get('/admin/page-extra/delete/{id}', [App\Http\Controllers\PageController::class, 'page_extra_remove_image']);
Route::get('/admin/page-extra/content-delete/{id}', [App\Http\Controllers\PageController::class, 'page_extra_remove']);
Route::get('/admin/page/delete/{id}', [App\Http\Controllers\PageController::class, 'delete']);
/*Location*/
Route::get('/admin/location', [App\Http\Controllers\ServiceController::class, 'index']);
Route::get('/admin/location/add', [App\Http\Controllers\ServiceController::class, 'add']);
Route::post('/admin/location/add', [App\Http\Controllers\ServiceController::class, 'insert']);
Route::get('/admin/location/edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit']);
Route::post('/admin/location/update', [App\Http\Controllers\ServiceController::class, 'update']);
Route::get('/admin/location-extra/delete/{id}', [App\Http\Controllers\ServiceController::class, 'page_extra_remove_image']);
Route::get('/admin/location-extra/content-delete/{id}', [App\Http\Controllers\ServiceController::class, 'page_extra_remove']);
Route::get('/admin/location/delete/{id}', [App\Http\Controllers\ServiceController::class, 'delete']);

/*Where to begin*/
Route::get('/admin/where_begin', [App\Http\Controllers\WhereBeginController::class, 'index']);
Route::get('/admin/where_begin/add', [App\Http\Controllers\WhereBeginController::class, 'add']);
Route::post('/admin/where_begin/add', [App\Http\Controllers\WhereBeginController::class, 'insert']);
Route::get('/admin/where_begin/edit/{id}', [App\Http\Controllers\WhereBeginController::class, 'edit']);
Route::post('/admin/where_begin/update', [App\Http\Controllers\WhereBeginController::class, 'update']);
Route::get('/admin/where_begin-extra/delete/{id}', [App\Http\Controllers\WhereBeginController::class, 'page_extra_remove_image']);
Route::get('/admin/where_begin-extra/content-delete/{id}', [App\Http\Controllers\WhereBeginController::class, 'page_extra_remove']);
Route::get('/admin/where_begin/delete/{id}', [App\Http\Controllers\WhereBeginController::class, 'delete']);
/*service offer*/
Route::get('/admin/service_offer', [App\Http\Controllers\ServiceOfferedController::class, 'index']);
Route::get('/admin/service_offer/add', [App\Http\Controllers\ServiceOfferedController::class, 'add']);
Route::post('/admin/service_offer/add', [App\Http\Controllers\ServiceOfferedController::class, 'insert']);
Route::get('/admin/service_offer/edit/{id}', [App\Http\Controllers\ServiceOfferedController::class, 'edit']);
Route::post('/admin/service_offer/update', [App\Http\Controllers\ServiceOfferedController::class, 'update']);
Route::get('/admin/service-offer-extra/delete/{id}', [App\Http\Controllers\ServiceOfferedController::class, 'page_extra_remove_image']);
Route::get('/admin/service-offer-extra/content-delete/{id}', [App\Http\Controllers\ServiceOfferedController::class, 'page_extra_remove']);
Route::get('/admin/service_offer/delete/{id}', [App\Http\Controllers\ServiceOfferedController::class, 'delete']);
/*Service*/
/*Country page*/
Route::get('/admin/jobpage', [App\Http\Controllers\PageController::class, 'jobpage']);
Route::get('/admin/jobpage/add', [App\Http\Controllers\PageController::class, 'jobpageadd']);
Route::post('/admin/jobpage/add', [App\Http\Controllers\PageController::class, 'jobpageinsert']);
Route::get('/admin/jobpage/edit/{id}', [App\Http\Controllers\PageController::class, 'jobpageedit']);
Route::post('/admin/jobpage/update', [App\Http\Controllers\PageController::class, 'jobpageupdate']);

/*Country*/
Route::get('/admin/country', [App\Http\Controllers\CountryController::class, 'index']);
Route::get('/admin/country/add', [App\Http\Controllers\CountryController::class, 'add']);
Route::post('/admin/country/add', [App\Http\Controllers\CountryController::class, 'insert']);
Route::get('/admin/country/edit/{id}', [App\Http\Controllers\CountryController::class, 'edit']);
Route::post('/admin/country/update', [App\Http\Controllers\CountryController::class, 'update']);
Route::get('/admin/country/delete/{id}', [App\Http\Controllers\CountryController::class, 'delete']);
Route::get('/admin/country/status/{id}/{status}', [App\Http\Controllers\CountryController::class, 'status']);
Route::get('/admin/country/file-destroy/{id}', [App\Http\Controllers\CountryController::class, 'file_destroy']);

/*Service*/
Route::get('/admin/post', [App\Http\Controllers\PageController::class, 'post']);
Route::get('/admin/post/add', [App\Http\Controllers\PageController::class, 'postadd']);
Route::post('/admin/post/add', [App\Http\Controllers\PageController::class, 'insert']);
Route::get('/admin/post/edit/{id}', [App\Http\Controllers\PageController::class, 'postedit']);
Route::post('/admin/post/update', [App\Http\Controllers\PageController::class, 'update']);
//Route::get('/admin/service/delete/{id}', [App\Http\Controllers\PageController::class, 'delete']);
//Route::get('/admin/service/status/{id}/{status}', [App\Http\Controllers\PageController::class, 'status']);
//Route::get('/admin/service/file-destroy/{id}', [App\Http\Controllers\PageController::class, 'file_destroy']);

/*Service category*/
Route::get('/admin/service_category', [App\Http\Controllers\Service_categoryController::class, 'index']);
Route::get('/admin/service_category/add', [App\Http\Controllers\Service_categoryController::class, 'add']);
Route::post('/admin/service_category/add', [App\Http\Controllers\Service_categoryController::class, 'insert']);
Route::get('/admin/service_category/edit/{id}', [App\Http\Controllers\Service_categoryController::class, 'edit']);
Route::post('/admin/service_category/update', [App\Http\Controllers\Service_categoryController::class, 'update']);
Route::get('/admin/service_category/delete/{id}', [App\Http\Controllers\Service_categoryController::class, 'delete']);
Route::get('/admin/service_category/status/{id}/{status}', [App\Http\Controllers\Service_categoryController::class, 'status']);
Route::get('/admin/service_category/file-destroy/{id}', [App\Http\Controllers\Service_categoryController::class, 'file_destroy']);
/*Service work*/
Route::get('/admin/service_work', [App\Http\Controllers\Service_workController::class, 'index']);
Route::get('/admin/service_work/add', [App\Http\Controllers\Service_workController::class, 'add']);
Route::post('/admin/service_work/add', [App\Http\Controllers\Service_workController::class, 'insert']);
Route::get('/admin/service_work/edit/{id}', [App\Http\Controllers\Service_workController::class, 'edit']);
Route::post('/admin/service_work/update', [App\Http\Controllers\Service_workController::class, 'update']);
Route::get('/admin/service_work/delete/{id}', [App\Http\Controllers\Service_workController::class, 'delete']);
Route::get('/admin/service_work/status/{id}/{status}', [App\Http\Controllers\Service_workController::class, 'status']);
Route::get('/admin/service_work/file-destroy/{id}', [App\Http\Controllers\Service_workController::class, 'file_destroy']);
/*Testimonial*/
Route::get('/admin/testimonial', [App\Http\Controllers\TestimonialController::class, 'index']);
Route::get('/admin/testimonial/add', [App\Http\Controllers\TestimonialController::class, 'add']);
Route::post('/admin/testimonial/add', [App\Http\Controllers\TestimonialController::class, 'insert']);
Route::get('/admin/testimonial/edit/{id}', [App\Http\Controllers\TestimonialController::class, 'edit']);
Route::post('/admin/testimonial/update', [App\Http\Controllers\TestimonialController::class, 'update']);
Route::get('/admin/testimonial/delete/{id}', [App\Http\Controllers\TestimonialController::class, 'delete']);
Route::get('/admin/testimonial/status/{id}/{status}', [App\Http\Controllers\TestimonialController::class, 'status']);
Route::get('/admin/testimonial/file-destroy/{id}', [App\Http\Controllers\TestimonialController::class, 'file_destroy']);
/*Testimonial Logo*/
Route::get('/admin/testimonial_logo', [App\Http\Controllers\Testimonial_logoController::class, 'index']);
Route::get('/admin/testimonial_logo/add', [App\Http\Controllers\Testimonial_logoController::class, 'add']);
Route::post('/admin/testimonial_logo/add', [App\Http\Controllers\Testimonial_logoController::class, 'insert']);
Route::get('/admin/testimonial_logo/edit/{id}', [App\Http\Controllers\Testimonial_logoController::class, 'edit']);
Route::post('/admin/testimonial_logo/update', [App\Http\Controllers\Testimonial_logoController::class, 'update']);
Route::get('/admin/testimonial_logo/delete/{id}', [App\Http\Controllers\Testimonial_logoController::class, 'delete']);
Route::get('/admin/testimonial_logo/status/{id}/{status}', [App\Http\Controllers\Testimonial_logoController::class, 'status']);
Route::get('/admin/testimonial_logo/file-destroy/{id}', [App\Http\Controllers\Testimonial_logoController::class, 'file_destroy']);


/*Team*/
Route::get('/admin/team', [App\Http\Controllers\TeamController::class, 'index']);
Route::get('/admin/team/add', [App\Http\Controllers\TeamController::class, 'add']);
Route::post('/admin/team/add', [App\Http\Controllers\TeamController::class, 'insert']);
Route::get('/admin/team/edit/{id}', [App\Http\Controllers\TeamController::class, 'edit']);
Route::post('/admin/team/update', [App\Http\Controllers\TeamController::class, 'update']);
Route::get('/admin/team/delete/{id}', [App\Http\Controllers\TeamController::class, 'delete']);
Route::get('/admin/team/status/{id}/{status}', [App\Http\Controllers\TeamController::class, 'status']);
Route::get('/admin/team/file-destroy/{id}', [App\Http\Controllers\TeamController::class, 'file_destroy']);
/*Team Category*/
Route::get('/admin/team_category', [App\Http\Controllers\Team_categoryController::class, 'index']);
Route::get('/admin/team_category/add', [App\Http\Controllers\Team_categoryController::class, 'add']);
Route::post('/admin/team_category/add', [App\Http\Controllers\Team_categoryController::class, 'insert']);
Route::get('/admin/team_category/edit/{id}', [App\Http\Controllers\Team_categoryController::class, 'edit']);
Route::post('/admin/team_category/update', [App\Http\Controllers\Team_categoryController::class, 'update']);
Route::get('/admin/team_category/delete/{id}', [App\Http\Controllers\Team_categoryController::class, 'delete']);
Route::get('/admin/team_category/status/{id}/{status}', [App\Http\Controllers\Team_categoryController::class, 'status']);
Route::get('/admin/team_category/file-destroy/{id}', [App\Http\Controllers\Team_categoryController::class, 'file_destroy']);
/*Forms*/
Route::get('/admin/forms', [App\Http\Controllers\FormController::class, 'index']);
Route::get('/admin/forms/view/{id}', [App\Http\Controllers\FormController::class, 'view']);
Route::get('/admin/forms/delete/{id}', [App\Http\Controllers\FormController::class, 'delete']);
Route::get('/admin/forms/export/{type}', [App\Http\Controllers\FormController::class, 'export']);
});



/*Front-End Route Start*/

Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']);
// Route::get('/online-user', [App\Http\Controllers\UserController::class, 'onlineUser']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


Route::get('/404', [App\Http\Controllers\PageController::class, 'not_found']);
Route::post('/contact', [App\Http\Controllers\PageController::class, 'contactform']);
Route::post('/paymentform', [App\Http\Controllers\PageController::class, 'paymentform']);
Route::post('/homeform', [App\Http\Controllers\PageController::class, 'homeform']);
Route::post('/careerform', [App\Http\Controllers\PageController::class, 'careerform']);
Route::post('/book_appoinment', [App\Http\Controllers\PageController::class, 'book_appoinment']);

Route::get('/{slug}', [App\Http\Controllers\PageController::class, 'ShowPage']);
Route::get('/service/{id}', [App\Http\Controllers\PageController::class, 'ShowPageService']);

