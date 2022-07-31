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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products', App\Http\Controllers\ProductController::class);
Route::get('addToCart/{product}', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('shop-cart', [App\Http\Controllers\CartController::class, 'shop_cart']);
Route::get('check-out/{amount}', [App\Http\Controllers\CartController::class, 'check_out'])->middleware('auth');
Route::post('charge', [App\Http\Controllers\CartController::class, 'charge']);
