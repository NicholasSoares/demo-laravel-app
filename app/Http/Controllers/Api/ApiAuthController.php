<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\GetUserTokenAction;
use App\Actions\Auth\RevokeCurrentUserTokenAction;
use App\Data\UserApiAuthData;
use App\Http\Resources\UserApiAuthResource;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthController
{
    /**
     * Get api token with given credentials
     *
     * @param UserApiAuthData $userApiAuthData
     * @param GetUserTokenAction $action
     * @return UserApiAuthResource|JsonResponse
     */
    public function getUserToken(UserApiAuthData $userApiAuthData, GetUserTokenAction $action): UserApiAuthResource|JsonResponse
    {
        try{
            $userToken = $action->execute($userApiAuthData);
            return new UserApiAuthResource($userToken);
        }
        catch (ValidationException $e){
            return response()->json(
                [
                    'data' => [
                        'message' => 'invalid user data.'
                    ]
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Revoke current logged user api toke
     *
     * @param Authenticatable $user
     * @param RevokeCurrentUserTokenAction $action
     * @return JsonResponse
     */
    public function revokeCurrentUserToken(Authenticatable $user, RevokeCurrentUserTokenAction $action): JsonResponse
    {
        $action->execute($user);

        return response()->json(
            [
                'data' => [
                    'message' => 'User token revoked.'
                ]
            ],
            Response::HTTP_OK
        );
    }
}
