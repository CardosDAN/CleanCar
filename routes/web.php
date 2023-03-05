<?php

use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\Auth\GoogleSocialiteController;
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
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);
Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('callback/github', [GitHubController::class, 'gitCallback']);
Route::get('auth/facebook', [\App\Http\Controllers\Auth\FacebookController::class, 'facebookRedirect']);
Route::get('callback/facebook', [\App\Http\Controllers\Auth\FacebookController::class, 'loginWithFacebook']);


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [\App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::get('/reports/active-users',[ \App\Http\Controllers\DashboardController::class,'activeUsers']);

    Route::get('posts.posts', [\App\Http\Controllers\HomeController::class, 'index'])->name('posts_all');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::resource('offer', \App\Http\Controllers\OfferController::class);
    Route::resource('rating', \App\Http\Controllers\RatingController::class);
    Route::resource('application', \App\Http\Controllers\ApplicationController::class);
    Route::get('offer.accept/{id}', [\App\Http\Controllers\ActionController::class, 'accepted'])->name('offer.accept');
    Route::get('offer.delete/{id}', [\App\Http\Controllers\ActionController::class, 'deleted'])->name('offer.delete');
    Route::get('posts.active/{id}', [\App\Http\Controllers\ActionController::class, 'post_accepted'])->name('posts.active');

    Route::get('offer.user', [\App\Http\Controllers\ShowController::class, 'offer'])->name('offer.user');
    Route::get('rating.worker_rating/{user_id}', [\App\Http\Controllers\ShowController::class, 'ratings_user'])->name('rating.worker_rating');
    Route::get('offer.accepted', [\App\Http\Controllers\HomeController::class, 'getAcceptedOffers'])->name('offer.accepted');
    Route::get('offer.completed', [\App\Http\Controllers\ShowController::class, 'completed_offers'])->name('offer.completed');
    Route::get('posts.user', [\App\Http\Controllers\ShowController::class, 'user_posts'])->name('posts.user');

    Route::get('user.connections/{user_id}', [\App\Http\Controllers\ShowController::class, 'connections'])->name('user.connections');
    Route::post('disconnect.google/{id}', [\App\Http\Controllers\ActionController::class, 'disconnect_google'])->name('disconnect.google');
    Route::post('disconnect.github/{id}', [\App\Http\Controllers\ActionController::class, 'disconnect_github'])->name('disconnect.github');
    Route::post('disconnect.facebook/{id}', [\App\Http\Controllers\ActionController::class, 'disconnect_facebook'])->name('disconnect.facebook');
    Route::post('posts.share/{id}', [\App\Http\Controllers\ActionController::class, 'shareOnFacebook'])->name('posts.share');


    Route::post('/notifications/{id}/read', [\App\Http\Controllers\ActionController::class, 'markAsRead']);
    Route::get("api/notifications/read-all", [\App\Http\Controllers\ActionController::class, 'mark_all_as_read'])->name('notifications.read_all');
    Route::get('api/fetch-posts', [\App\Http\Controllers\HomeController::class, 'fetchPosts']);
    Route::post('api/fetch-states', [\App\Http\Controllers\HomeController::class, 'fetchState']);
    Route::post('api/fetch-cities', [\App\Http\Controllers\HomeController::class, 'fetchCity']);
    Route::get('api/fetch-notifications', [\App\Http\Controllers\ActionController::class, 'get_latest_notifications']);
    Route::get('api/fetch-notifications-count', [\App\Http\Controllers\ActionController::class, 'get_notifications_count']);
    Route::post('/check-offer',[\App\Http\Controllers\ShowController::class, 'checkOffer'])->name('check-offer');
    Route::get('manage_posts', [\App\Http\Controllers\ShowController::class, 'manage_posts'])->name('manage_posts');
});


Auth::routes(['verify' => true]);


