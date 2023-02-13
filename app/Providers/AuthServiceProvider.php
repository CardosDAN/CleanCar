<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Rating;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\OfferPolicy;
use App\Policies\PostPolicy;
use App\Policies\RatingPolicy;
use App\Policies\UserPolicy;
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

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
