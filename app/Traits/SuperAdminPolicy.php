<?php

namespace App\Traits;

use App\User;

trait SuperAdminPolicy
{
    /**
     * Authorize action before intended policy
     *
     * @param User $user
     *
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }
}
