<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/vendor',  [App\Http\Controllers\VendorController::class, 'index'])->name('vendor')->middleware('vendor');
Route::get('/admin',  [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/user',  [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('user');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'index'])->name('test')->middleware('admin');
Route::get('/event', [App\Http\Controllers\HomeController::class, 'event'])->name('event');
Route::get('/mail', [App\Http\Controllers\HomeController::class, 'sendMail'])->name('mail');
