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
    Route::get('offer.user', [\App\Http\Controllers\ShowController::class, 'offer'])->name('offer.user');
    Route::post('/notifications/{id}/read', [\App\Http\Controllers\ActionController::class, 'markAsRead']);
    Route::get("api/notifications/read-all", [\App\Http\Controllers\ActionController::class, 'mark_all_as_read'])->name('notifications.read_all');

    Route::get('api/fetch-posts', [\App\Http\Controllers\HomeController::class, 'fetchPosts']);
    Route::post('api/fetch-states', [\App\Http\Controllers\HomeController::class, 'fetchState']);
    Route::post('api/fetch-cities', [\App\Http\Controllers\HomeController::class, 'fetchCity']);
    Route::get('api/fetch-notifications', [\App\Http\Controllers\ActionController::class, 'get_latest_notifications']);
    Route::get('api/fetch-notifications-count', [\App\Http\Controllers\ActionController::class, 'get_notifications_count']);

});


Auth::routes(['verify' => true]);


