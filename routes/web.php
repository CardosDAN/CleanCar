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
Route::view('/home','index')->name('home');
Route::view('/','welcome')->name('home');

Route::get('posts.posts',[\App\Http\Controllers\HomeController::class, 'index'])->name('posts_all');
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('posts', \App\Http\Controllers\PostController::class);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
