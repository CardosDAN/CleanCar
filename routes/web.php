<?php

use Illuminate\Support\Facades\Auth;
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
Route::view('/', 'welcome')->name('landing');

Route::group(['middleware' => ['auth']], function () {
//    Route::get('user.settings', [])
    Route::view('/home', 'index')->name('home');
    Route::get('posts.posts', [\App\Http\Controllers\HomeController::class, 'index'])->name('posts_all');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware('level:2');
    Route::resource('user', \App\Http\Controllers\UserController::class)->middleware('level:2');
    Route::resource('posts', \App\Http\Controllers\PostController::class)->middleware('level:2');
});


Auth::routes(['verify' => true]);


