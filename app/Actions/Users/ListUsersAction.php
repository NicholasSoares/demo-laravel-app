<?php

namespace App\Actions\Users;

use App\Models\User;

class ListUsersAction
{
    /**
     * Get All users registered.
     *
     * @return mixed
     */
    public function execute(): mixed
    {
        return User::paginate(15);
    }
}
