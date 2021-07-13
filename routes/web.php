<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\BigStoreController;

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


Route::get('/', [BigStoreController::class, 'index'] )->name('home');
Route::get('equipments', [BigStoreController::class, 'equipments'])->name('equipments');
Route::get('fertilizers', [BigStoreController::class, 'fertilizers'])->name('fertilizers');
Route::get('foodStuffs', [BigStoreController::class, 'foodStuffs'])->name('foodStuffs');
Route::get('contact', [BigStoreController::class, 'contact'])->name('contact');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
