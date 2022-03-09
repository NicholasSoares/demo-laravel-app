<?php

namespace App\Actions\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class RevokeCurrentUserTokenAction
{

    /**
     * Revoke an user token.
     *
     * @param Authenticatable $user
     * @return void
     */
    public function execute(Authenticatable $user): void
    {
        $user->currentAccessToken()->delete();
    }
}
