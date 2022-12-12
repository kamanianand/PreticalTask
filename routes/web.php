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

Route::resource('product', App\Http\Controllers\ProductController::class);
Route::resource('shop', App\Http\Controllers\ShopController::class);

Route::get('/importView',[App\Http\Controllers\ProductController::class,'importView'])->name('importView');
Route::post('/importProduct',[App\Http\Controllers\ProductController::class,'importProduct'])->name('importProduct');
Route::get('/exportProduct',[App\Http\Controllers\ProductController::class,'exportProduct'])->name('exportProduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
