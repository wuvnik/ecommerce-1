<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CART
Route::get('/add-to-cart/{product}', [CartController::class, 'add'])->name('cart.add')->middleware('role:user'); 
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('role:user'); 
Route::get('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove')->middleware('role:user'); 
Route::get('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update')->middleware('role:user');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('role:user'); 
// Route::resource('/cart', CartController::class);

//ORDER
Route::resource('orders', OrderController::class)->middleware('role:user'); 

//VENDOR
Route::resource('/vendor', VendorController::class)->middleware('role:vendor'); 

