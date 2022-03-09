<?php

namespace App\Actions\Users;

use App\Models\User;

class RemoveUserAction
{
    /**
     * Remove a given existing user.
     *
     * @param User $user
     * @return void
     */
    public function execute(User $user): void
    {
        $user->delete();
    }
}
