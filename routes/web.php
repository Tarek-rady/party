<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LoginMediaController;

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



Route::get('language/{locale}', function ($locale) {

    app()->setLocale($locale);

    session()->put('locale', $locale);

    return redirect()->back();
})->name('language');


Route::get('/', [AuthController::class , 'showLoginForm']);

Route::prefix('admin')->middleware('localization')->namespace('Dashboard')->name('admin.')->group(function () {

    /* Auth Routes */
    Route::get('login', [AuthController::class , 'showLoginForm'])->name('login');
    Route::post('login',[AuthController::class , 'login'] )->name('login.post');
    Route::get('logout',[AuthController::class , 'logout'])->name('logout');


    /* Dashboard Routes */
    Route::middleware('auth')->group(function () {

        Route::get('/', [DashboardController::class , 'home'])->name('home');

        // admins
        Route::resource('/admins' , 'AdminController');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('update-profile', 'AdminController@updateProfile')->name('update_profile');



        // products
        Route::resource('/products' , 'ProductController');

        // banners
        Route::resource('/banners' , 'BannerController');

        // services
        Route::resource('/services' , 'ServiceController');

        // partners
        Route::resource('/partners' , 'PartnerController');


        // notifications
        Route::get('/notification/{id}' , 'NotificationController@order_notificication')->name('notification');
        Route::get('/clear-all-notifications' , 'NotificationController@clear_all_notifications')->name('notifications');






    });
});


