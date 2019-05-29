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

    private $policyName = 'recipes';

    /**
     * Determine whether the user can view the recipe.
     *
     * @param User $user
     * @param Recipe $recipe *
     * @return mixed
     */
    public function view(?User $user, Recipe $recipe)
    {
        if (Auth::user()->id === $recipe->id_user) {
            return true;
        }
        return !$recipe->isValid() ? false : ($user->hasPermissionTo('read_' . $this->policyName));
    }

    /**
     * Determine whether the user can create recipes.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('add_recipes')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the recipe.
     *
     * @param User $user
     * @param Recipe $recipe
     *
     * @return mixed
     */
    public function update(User $user, Recipe $recipe)
    {
        if (Auth::user()->id === $recipe->creator->id) {
            return true;
        }

        return ($user->hasPermissionTo('edit_' . $this->policyName));
    }

    /**
     * Determine whether the user can delete the recipe.
     *
     * @param User $user
     * @param Recipe $recipe
     *
     * @return mixed
     */
    public function delete(User $user, Recipe $recipe)
    {
        return ($user->hasPermissionTo('delete_' . $this->policyName));
    }

    /**
     * Determine whether the user can restore the recipe.
     *
     * @param User $user
     * @param Recipe $recipe
     *
     * @return mixed
     */
    public function restore(User $user, Recipe $recipe)
    {
        return ($user->hasPermissionTo('edit_' . $this->policyName));
    }

    /**
     * Determine whether the user can permanently delete the recipe.
     *
     * @param User $user
     * @param Recipe $recipe
     *
     * @return mixed
     */
    public function forceDelete(User $user, Recipe $recipe)
    {
        return ($user->hasPermissionTo('delete_' . $this->policyName));
    }
}
