<?php

namespace App\Policies;

use App\Ingredient;
use App\Traits\SuperAdminPolicy;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IngredientPolicy
{
    use HandlesAuthorization, SuperAdminPolicy;
    private $policyName = 'ingredients';

    /**
     * Determine whether the user can view the recipe.
     *
     * @param User|null $user
     * @param Ingredient $ingredient
     * @return mixed
     */
    public function view(?User $user, Ingredient $ingredient)
    {
        if ($user) {
            if ($user->hasPermissionTo('read_' . $this->policyName)) {
                return true;
            }
            return false;
        }
        return true;
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
        if ($user->hasPermissionTo('add_' . $this->policyName)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the recipe.
     *
     * @param User $user
     *
     * @param Ingredient $ingredient
     * @return mixed
     */
    public function update(User $user, Ingredient $ingredient)
    {
        if ($user->hasPermissionTo('edit_' . $this->policyName)) {
            // if user is author of recipe
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the recipe.
     *
     * @param User $user
     * @param Ingredient $ingredient
     *
     * @return mixed
     */
    public function delete(User $user, Ingredient $ingredient)
    {
        return $user->hasPermissionTo('delete_' . $this->policyName);
    }

    /**
     * Determine whether the user can restore the recipe.
     *
     * @param User $user
     * @param Ingredient $ingredient
     *
     * @return mixed
     */
    public function restore(User $user, Ingredient $ingredient)
    {
        return $user->hasPermissionTo('edit_' . $this->policyName);
    }

    /**
     * Determine whether the user can permanently delete the recipe.
     *
     * @param User $user
     * @param Ingredient $ingredient
     *
     * @return mixed
     */
    public function forceDelete(User $user, Ingredient $ingredient)
    {
        return $user->hasPermissionTo('delete_' . $this->policyName);
    }
}
