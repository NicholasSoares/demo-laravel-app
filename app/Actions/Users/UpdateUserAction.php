<?php

namespace App\Actions\Users;

use App\Data\UserUpdateData;
use App\Models\User;

class UpdateUserAction
{
    /**
     * Get All users registered.
     *
     * @param User $user
     * @param UserUpdateData $userUpdateData
     * @return User
     */
    public function execute(User $user, UserUpdateData $userUpdateData): User
    {
        $user->name = $userUpdateData->name;
        $user->email = $userUpdateData->email;
        $user->save();

        return $user;
    }
}
