<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;

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

Route::resource('article', ArticleController::class)->middleware('auth:sanctum');


Route::get('/auth/signup', [AuthController::class, 'create'])->name('signup');
Route::post('/auth/signup', [AuthController::class, 'signup']);

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/signin', [AuthController::class, 'customLogin']);
Route::get('/auth/logout', [AuthController::class, 'logout']);
