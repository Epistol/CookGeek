<?php

namespace App\Policies;

use App\Recipe;
use App\Traits\SuperAdminPolicy;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class RecipePolicy
{
    use HandlesAuthorization, SuperAdminPolicy;

    private $policyName = "recipes";

    /**
     * @param User|null $user
     * @param Recipe    $recipe
     * @return bool
     */
    public function index(?User $user, Recipe $recipe)
    {
        return ($user->can('browse-'.$this->policyName));
    }

    /**
     * Determine whether the user can view the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function view(?User $user, Recipe $recipe)
    {
        if (Auth::user()->id === $recipe->id_user) {
            return true;
        }
        return !$recipe->isValid() ? false : ($user->can('read-' . $this->policyName));
    }

    /**
     * Determine whether the user can create recipes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->can('add-'.$this->policyName));
    }

    /**
     * Determine whether the user can update the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function update(User $user, Recipe $recipe)
    {
        if (Auth::user()->id === $recipe->creator->id) {
            return true;
        }

        return ($user->can('edit-'.$this->policyName));
    }

    /**
     * Determine whether the user can delete the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function delete(User $user, Recipe $recipe)
    {
        return ($user->can('delete-'.$this->policyName));
    }

    /**
     * Determine whether the user can restore the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function restore(User $user, Recipe $recipe)
    {
        return ($user->can('edit-'.$this->policyName));
    }

    /**
     * Determine whether the user can permanently delete the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function forceDelete(User $user, Recipe $recipe)
    {
        return ($user->can('delete-'.$this->policyName));
    }
}