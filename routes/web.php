<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\BigStoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\InvoiceController;





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
Route::get('equipments', [ProductController::class, 'equipment'])->name('equipments');
Route::get('fertilizers', [ProductController::class, 'fertilizer'])->name('fertilizers');
Route::get('foodStuffs', [ProductController::class, 'foodStuff'])->name('foodStuffs');
Route::get('contact', [BigStoreController::class, 'contact'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('store');

/* User Route */
Route::name('user.')->prefix('user-section')->group( function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('profile',[UserController::class ,'profile'])->name('profile');
	Route::get('profile/edit',[UserController::class ,'edit_profile'])->name('profile.edit');
	Route::patch('profile/{client}/edit',[UserController::class ,'update_profile'])->name('profile.update');
	Route::get('profile/edit/password',[UserController::class ,'edit_password'])->name('password.edit');
	Route::patch('profile/edit/{client}/password',[UserController::class ,'update_password'])->name('password.update');
	Route::get('profile/edit/email',[UserController::class ,'edit_email'])->name('email.edit');
	Route::patch('profile/{client}/edit/email}',[UserController::class ,'update_email'])->name('email.update');
	Route::get('profile/activate/email',[UserController::class ,'activate_email'])->name('email.activate');
	Route::patch('profile/{client}/activate/email',[UserController::class ,'activation_email'])->name('email.activation');
	Route::get('add_product', [UserProductController::class, 'store'])->name('add_to_cart');
	Route::get('my_orders', [UserController::class, 'client_orders'])->name('orders');
	Route::get('delete/my_orders/{user_product}', [UserProductController::class, 'destroy'])->name('product.delete');
	Route::post('product/{user_product}/checkout', [UserController::class, 'product_checkout'])->name('checkout');  
	//Route::get('plan/purchase/invoice/{category_alias}',[InvoiceController::class, 'show')->name('user.invoice');
	// Route::get('appointments','UserController@appointments')->name('user.appointments');
	// Route::get('package/{category_alias}','UserController@package_details')->name('user.viewPackage');
	// Route::get('appointments/{booking}','UserController@view_appointment')->name('user.viewAppointment'); 
});


/* ADMIN ROUTES */
Route::name('admin.')->prefix('admin-section')->group(function(){
	Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
	Route::get('profile', [AdminController::class, 'profile'])->name('profile');
	Route::patch('profile/{admin}', [AdminController::class, 'update_profile'])->name('profile.update');
    Route::match(['get','post'], 'add/new_admin',[AdminController::class, 'add_admin'])->name('add');
	Route::match(['get','post'], 'add/new/product', [ProductController::class, 'add_product'])->name('product.add');
	// Route::match(['get','post'],'add/new/insurer','AdminController@add_insurer')->name('insurer.add');
	// Route::get('create/project','ProjectController@showProjectForm')->name('project.show');
	// Route::post('create/project','ProjectController@create_project')->name('project.create');
	// Route::get('upload/photo','PhotoController@showPhotoUploadForm')->name('photo.show');
	// Route::post('create/album','PhotoController@createAlbum')->name('create.album');
	// Route::post('upload/photo','PhotoController@uploadPhoto')->name('photo.upload');
	// Route::get('album/{album_alias}/view','PhotoController@albumPhotos')->name('view.album.photos');
	// Route::get('photos/list','PhotoController@list_photo')->name('admin.list.photo');
    // Route::get('photos/delete/{photo}','PhotoController@delete_photo')->name('admin.delete.photo');


	Route::get('list/of/administrators', [AdminController::class, 'admin_list'])->name('list');
	Route::get('delete/admin/{admin}',[AdminController::class, 'admin_delete'])->name('delete');
	Route::get('view/admin/{admin}',[AdminController::class, 'admin_view'])->name('view');
	Route::get('delete/{message}/message',[ContactController::class, 'delete'])->name('message.delete');
	Route::get('list/of/clients',[AdminController::class, 'user_list'])->name('user.list');
	Route::get('view/user/{client}',[AdminController::class, 'view_user'])->name('user.view');
	Route::get('delete/user/{client}',[AdminController::class, 'delete_user'])->name('user.delete');
	// Route::match(['get','post'],'add/type/of/lawyer','AdminController@type_of_lawyer_add')->name('type.lawyer.add');
	// Route::get('delete/type/of/lawyer/{typeOfLawyer}','AdminController@delete_typeOfLawyer')->name('typeOfLawyer.delete');
	Route::get('list/invoice',[InvoiceController::class, 'index'])->name('list.invoices');
	Route::get('view/{invoice}/invoice',[InvoiceController::class, 'view'])->name('view.invoices');
	Route::get('delete/{invoice}/invoice',[InvoiceController::class, 'delete'])->name('delete.invoices');

	Route::get('list/product',[ProductController::class, 'product_list'])->name('list.product');
	Route::get('product/{product}/edit',[ProductController::class, 'product_edit'])->name('edit.product');
	Route::patch('product/{product}/update', [ProductController::class, 'product_update'])->name('update.project');
	Route::get('product/{product}/delete', [ProductController::class, 'product_delete'])->name('delete.project');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
