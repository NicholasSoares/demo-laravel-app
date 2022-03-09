<?php

namespace App\Http\Controllers\Api;

use App\Actions\Users\ListUsersAction;
use App\Actions\Users\RemoveUserAction;
use App\Actions\Users\UpdateUserAction;
use App\Data\UserUpdateData;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    /**
     * List all users currently registered.
     *
     * @param ListUsersAction $action
     * @return AnonymousResourceCollection
     */
    public function listUsers(ListUsersAction $action): AnonymousResourceCollection
    {
        $usersList = $action->execute();
        return UserResource::collection($usersList);
    }

    /**
     * Get a given user details.
     *
     * @param User $user
     * @return UserResource
     */
    public function getUser(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update an existing new user, it won't update its password.
     *
     * @param User $user
     * @param UserUpdateData $userUpdateData
     * @param UpdateUserAction $action
     * @return UserResource
     */
    public function updateUserDetails(User $user, UserUpdateData $userUpdateData, UpdateUserAction $action): UserResource
    {
        $user = $action->execute($user, $userUpdateData);
        return new UserResource($user);
    }

    /**
     * Remove an existing user.
     *
     * @param User $user
     * @param RemoveUserAction $action
     * @return JsonResponse
     */
    public function removeUser(User $user, RemoveUserAction $action): JsonResponse
    {
        $action->execute($user);

        return response()->json(
            [
                'data' => [
                    'message' => 'User removed.'
                ]
            ],
            Response::HTTP_OK
        );
    }
}
