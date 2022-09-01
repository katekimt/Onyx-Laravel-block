<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [PostController::class, 'show']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/add/page', function () {
    return view('addPage');
})->middleware('auth');;

Route::post('/add/page/submit', [PostController::class, 'store'])->name('addPage-form');

Route::get('/ok', function () {
    return view('success');
})->name('ok');

//Route::get('/profile', [UserController::class, 'index'])->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/post/{id}', [PostController::class, 'showOnePost'])->name('post-data-one');

Route::get('/post/{id}/update', [PostController::class, 'update'])->name('post-update');

Route::post('/post/{id}/update', [PostController::class, 'updatePost'])->name('post-update-data');
