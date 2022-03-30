<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SajalController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
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

Route::get('/',[PageController::class,'home']);

Route::get('/about',[PageController::class,'about']);

Route::get('/contact',[PageController::class,'contact']);

Route::get('/blog',[PageController::class,'blog']);
Route::get('/products/{id}',[PageController::class,'product']);
Route::get('/category/{id}',[PageController::class,'category']);
Route::post('/cart',[PageController::class,'cart']);
Route::get('/cart',[PageController::class,'cartItems']);
Route::delete('/cart/{id}',[PageController::class,'cartDelete']);
Route::resource('order',OrderController::class);

//Admin
Route::resource('setting',SettingController::class);
Route::resource('category',CategoryController::class);
Route::resource('product',ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
