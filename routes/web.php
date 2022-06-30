<?php

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
Route::view('/','index')->name('home');

Route::get('/posts',[\App\Http\Controllers\HomeController::class, 'index'])->name('posts');
Route::get('post/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
