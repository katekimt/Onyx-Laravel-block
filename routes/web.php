<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact/submit', [UserController::class, 'store'])->name('contact-form');

Route::get('/add/page', function () {
    return view('addPage');
});

Route::post('/add/page/submit', [UserController::class, 'addPage'])->name('addPage-form');

Route::get('/ok', function () {
    return view('success');
})->name('ok');

Route::get('/profile', [UserController::class, 'index'])->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/update', [UserController::class, 'update']);

Route::resource('/post', PostController::class);
