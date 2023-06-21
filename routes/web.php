<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,RegisterController,AdminController,ProfileController,HeaderController};
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/backend',[RegisterController::class,'index'])->name('index');
Route::get('/admin',[AdminController::class,'adminLogin']);
Route::post('authenticate',[AdminController::class,'authenticate'])->name('authenticate');
Route::post('logout', [AdminController::class, 'logout'])->name('logout');
Route::post('content', [AdminController::class, 'adminContent'])->name('content');
Route::get('users',[AdminController::class,'userDetails'])->name('users');
Route::get('users/edit/{id}',[AdminController::class,'userEdit'])->name('user.edit');
Route::post('users/edit/{id}',[AdminController::class,'userEditForm'])->name('user.edit.form');
Route::get('users/delete/{id}',[AdminController::class,'userDelete'])->name('user.delete');

Route::get('/register',[RegisterController::class,'form'])->name('user.register');

Route::post('/login',[RegisterController::class,'loginForm'])->name('user.login.form');
Route::post('/register',[RegisterController::class,'registerForm'])->name('user.register.form');

Route::get('/profile/{id}',[ProfileController::class,'index'])->name('user.profile');
Route::post('/profile/update/{id}',[ProfileController::class,'update'])->name('user.profile.update');
Route::get('/home',[ProfileController::class,'home'])->name('user.home');
Route::get('/no-payment',[PaymentController::class,'NoPayment'])->name('user.error');
Route::match(['get', 'post'],'/success',[PaymentController::class,'success'])->name('user.success');

Route::get('/orders',[ProfileController::class,'orders'])->name('user.orders');

Route::post('/checkout',[PaymentController::class,'ordersData'])->name('checkout');
Route::get('/checkout/{id}',[PaymentController::class,'checkoutShow'])->name('checkout.show');
Route::get('/coinbase',[PaymentController::class,'coinbaseShow'])->name('coinbase.show');
Route::post('/coinbase/payment',[PaymentController::class,'process'])->name('user.coinbase.payment');

Route::get('/payment',[PaymentController::class,'payment'])->name('user.payment');

Route::get('/',[HomeController::class,'index'])->name('user.home');
Route::get('/gmail',[HeaderController::class,'gmail'])->name('gmail');
Route::get('/aged',[HeaderController::class,'aged'])->name('aged');
Route::get('/newgmail',[HeaderController::class,'newGmail'])->name('newgmail');
Route::get('/linkedin',[HeaderController::class,'linkedin'])->name('linkedin');
Route::get('/social',[HeaderController::class,'social'])->name('social');
Route::get('/otheremail',[HeaderController::class,'otheremail'])->name('otheremail');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');



