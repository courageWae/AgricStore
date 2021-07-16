<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\BigStoreController;
use App\Http\Controllers\FertilizerController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\FoodStuffController;
use App\Http\Controllers\UserController;



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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [BigStoreController::class, 'index'] )->name('index');
Route::get('equipments', [EquipmentController::class, 'index'])->name('equipments');
Route::get('fertilizers', [FertilizerController::class, 'index'])->name('fertilizers');
Route::get('foodStuffs', [FoodStuffController::class, 'index'])->name('foodStuffs');
Route::get('contact', [BigStoreController::class, 'contact'])->name('contact');

Route::name('user.')->group( function () {
    Route::get('user-section', [UserController::class, 'index'])->name('dashboard');
    Route::get('profile',[UserController::class ,'profile'])->name('profile');
	Route::get('profile/edit',[UserController::class ,'edit_profile'])->name('profile.edit');
	Route::patch('profile/{alias}/edit',[UserController::class ,'update_profile'])->name('profile.update');
	Route::get('profile/edit/password',[UserController::class ,'edit_password'])->name('password.edit');
	Route::patch('profile/edit/password/{alias}',[UserController::class ,'update_profile'])->name('password.update');
	Route::get('profile/edit/email',[UserController::class ,'edit_email'])->name('email.edit');
	Route::patch('profile/edit/email/{alias}',[UserController::class ,'update_email'])->name('email.update');
	Route::get('profile/activate/email',[UserController::class ,'activate_email'])->name('email.activate');
	Route::patch('profile/activate/email/{alias}',[UserController::class ,'activation_email'])->name('email.activation');
    
	// Route::get('plan/purchase/invoice/{category_alias}','InvoiceController@index')->name('user.invoice');
	// Route::get('appointments','UserController@appointments')->name('user.appointments');
	// Route::get('package/{category_alias}','UserController@package_details')->name('user.viewPackage');
	// Route::get('appointments/{booking}','UserController@view_appointment')->name('user.viewAppointment');


    
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
