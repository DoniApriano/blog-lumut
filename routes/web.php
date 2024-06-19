<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/login', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::delete('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
});
