<?php

namespace App\Actions\Auth;

use App\Data\UserApiAuthData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class GetUserTokenAction
{
    const DEFAULT_TOKEN_NAME = 'default';

    /**
     * Get All users registered.
     *
     * @param UserApiAuthData $userApiAuthData
     * @return array
     * @throws ValidationException
     */
    public function execute(UserApiAuthData $userApiAuthData): array
    {
        $user = $this->getUserAndCheckLoginData($userApiAuthData);
        $token = $user->createToken(self::DEFAULT_TOKEN_NAME);
        return ['token' => $token->plainTextToken];
    }

    /**
     * Validate user login data and return user if is valid.
     *
     * @param UserApiAuthData $userApiAuthData
     * @return User
     * @throws ValidationException
     */
    private function getUserAndCheckLoginData(UserApiAuthData $userApiAuthData): User
    {
        $user = User::where('email', $userApiAuthData->email)->first();

        if (!$user || !Hash::check($userApiAuthData->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }

        return $user;
    }
}
