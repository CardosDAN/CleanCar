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
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::resource('offer', \App\Http\Controllers\OfferController::class);
    Route::get('offer.accept/{id}', [\App\Http\Controllers\ActionController::class, 'accepted'])->name('offer.accept');
    Route::get('offer.delete/{id}', [\App\Http\Controllers\ActionController::class, 'deleted'])->name('offer.delete');
    Route::get('layout.navbar', [\App\Http\Controllers\HomeController::class, 'notification']);
    Route::get('offer.user', [\App\Http\Controllers\ShowController::class, 'offer'])->name('offer.user');

    Route::get('api/fetch-posts', [\App\Http\Controllers\HomeController::class, 'fetchPosts']);
    Route::post('api/fetch-states', [\App\Http\Controllers\HomeController::class, 'fetchState']);
    Route::post('api/fetch-cities', [\App\Http\Controllers\HomeController::class, 'fetchCity']);

});


Auth::routes(['verify' => true]);


