<?php

use Illuminate\Support\Facades\Route;

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
Route::match(['GET','POST'],'/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::match(['GET','POST'],'/home',[App\Http\Controllers\HomeController::class,'home'])->name('home');
Route::match(['GET','POST'],'/register',[App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');
// category
Route::get('/category',[App\Http\Controllers\CategoryController::class,'category'])->name('category');
Route::match(['GET','POST'],'/category/add',[App\Http\Controllers\CategoryController::class,'add'])->name('route_category_add');
Route::match(['GET','POST'],'/category/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('route_category_edit');
Route::get('/category/delete/{id}',[App\Http\Controllers\CategoryController::class,'delete'])->name('route_category_delete');
//banner
Route::get('/banner',[App\Http\Controllers\BannerController::class,'banner'])->name('banner');
Route::match(['GET','POST'],'/banner/add',[App\Http\Controllers\BannerController::class,'add'])->name('route_banner_add');
Route::match(['GET','POST'],'/banner/edit/{id}',[App\Http\Controllers\BannerController::class,'edit'])->name('route_banner_edit');
Route::get('/banner/delete/{id}',[App\Http\Controllers\BannerController::class,'delete'])->name('route_banner_delete');
