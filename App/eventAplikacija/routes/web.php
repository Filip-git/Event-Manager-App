<?php

use Illuminate\Support\Facades\Route;
use Admin\UserController;
use Admin\AdminEventController;
use Admin\AdminCategoryController;
use Admin\AdminLocationController;
use Admin\AdminRoleController;
use Organizer\OrganizerEventController;
use User\Profile;
use User\ReservedEventController;

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



Route::get('/', 'EventController@index');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/listing/{id?}', 'EventController@listing')->name('listing');

Route::get('/details/{id}', 'EventController@details')->name('details');

Route::get('/search', 'EventController@search')->name('search');

Route::get('/category', 'EventController@category')->name('category');

Route::prefix('organizer')->middleware(['auth', 'auth.isOrganizer', 'verified'])->name('organizer.')->group(function(){
    Route::resource('/events', OrganizerEventController::class);
});

//User rute
Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function() {
    Route::resource('/events', ReservedEventController::class);
    Route::get('profile', Profile::class)->name('profile');
});

//Admin rute
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'verified'])->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
    Route::resource('/events', AdminEventController::class);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/locations', AdminLocationController::class);
    Route::resource('/roles', AdminRoleController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
