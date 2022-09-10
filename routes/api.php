<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/email/find/{word}',[UserController::class,'findEmail']);

Route::get('/post/find/{keywords}',[PostController::class, 'findPost']);

Route::get('/find/{id}',[UserController::class, 'findPostByUser']);
/*



Route::post('/post/create',[PostController::class,'storeByApi']);*/


Route::apiResources([
    'posts' => PostController::class,
    'users' => UserController::class,
]);
