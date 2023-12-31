<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Session;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/session',[ Session::class, 'index']);

Route::get('/session/{id}',[ Session::class, 'show']);

Route::get('/search/{id}',[ Session::class, 'search']);

Route::put('/update/{id}',[ Session::class, 'update']);