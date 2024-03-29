<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ModelController;
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

Route::get('/', [ProductController::class, 'showHomePageProducts'])->name('home');


Auth::routes();

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.admin');
Route::resource('users', UserController::class);
Route::get('/admin/userlist', [UserController::class, 'index'])->name('admin.userlist');
Route::resource('products', ProductController::class);
Route::get('/admin/productlist', [ProductController::class, 'index'])->name('admin.productlist');
Route::resource('brands', CarController::class);
Route::get('/admin/brands', [CarController::class, 'index'])->name('admin.brand');
Route::resource('models', ModelController::class);
Route::get('/admin/models', [ModelController::class, 'index'])->name('admin.modellist');
Route::get('/tum-araclar', [ProductController::class, 'showAllProducts'])->name('allcars');
Route::get('/arac-detaylari/{id}', [ProductController::class, 'showProductDetails'])->name('detail');
