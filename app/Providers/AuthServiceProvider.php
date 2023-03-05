<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Levels;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Rating;
use App\Models\User;
use App\Policies\ApplicationPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\OfferPolicy;
use App\Policies\PostPolicy;
use App\Policies\RatingPolicy;
use App\Policies\UserPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class,
        Offer::class => OfferPolicy::class,
        Rating::class => RatingPolicy::class,
        Application::class => ApplicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('offer.accepted', function ($user) {
            return auth()->user()->level_id === Levels::ADMIN || auth()->user()->level_id === Levels::WORKER
                ? Response::allow()
                : Response::deny("You don't have aces to this", '403');
        });
        Gate::define('offer.completed', function ($user) {
            return auth()->user()->level_id === Levels::ADMIN || auth()->user()->level_id === Levels::WORKER
                ? Response::allow()
                : Response::deny("You don't have aces to this", '403');
        });
        Gate::define('manage_posts', function ($user) {
            return auth()->user()->level_id === Levels::ADMIN || auth()->user()->level_id === Levels::MANAGER
                ? Response::allow()
                : Response::deny("You don't have aces to this", '403');
        });
    }
}
