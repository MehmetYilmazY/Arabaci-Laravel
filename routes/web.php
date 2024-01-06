<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.admin');
Route::resource('users', UserController::class);
Route::get('/admin/userlist', [UserController::class, 'index'])->name('admin.userlist');
Route::resource('products', ProductController::class);
Route::get('/admin/productlist', [ProductController::class, 'index'])->name('admin.productlist');