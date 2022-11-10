<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\Levels;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return auth()->user()->level_id === Levels::ADMIN || auth()->user()->level_id === Levels::MANAGER
            ? Response::allow()
            : Response::deny("You don't have aces to this", '403');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Category $category)
    {
        return auth()->user()->level_id === Levels::ADMIN || auth()->user()->level_id === Levels::MANAGER
            ? Response::allow()
            : Response::deny("You don't have aces to this", '403');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return auth()->user()->level_id === Levels::ADMIN || auth()->user()->level_id === Levels::MANAGER
            ? Response::allow()
            : Response::deny("You don't have aces to this", '403');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Category $category)
    {
        return auth()->user()->level_id === Levels::ADMIN || auth()->user()->level_id === Levels::MANAGER
            ? Response::allow()
            : Response::deny("You don't have aces to this", '403');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Category $category)
    {
        return auth()->user()->level_id === Levels::ADMIN || auth()->user()->level_id === Levels::MANAGER
            ? Response::allow()
            : Response::deny("You don't have aces to this", '403');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Category $category)
    {
        return auth()->user()->level_id === Levels::ADMIN
            ? Response::allow()
            : Response::deny("You don't have aces to this", '403');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Category $category)
    {
        return auth()->user()->level_id === Levels::ADMIN
            ? Response::allow()
            : Response::deny("You don't have aces to this", '403');
    }
}
