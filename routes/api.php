<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('users')
    ->name('users.')
    ->group(
        function () {
            Route::get('/', [UserController::class, 'listUsers'])->name('listUsers');
            Route::get('/{user}', [UserController::class, 'getUser'])->name('getUser');
            Route::put('/{user}', [UserController::class, 'updateUserDetails'])->name('updateUserDetails');
            Route::delete('/{user}', [UserController::class, 'removeUser'])->name('removeUser');
        }
    );

Route::prefix('auth')
    ->name('auth.')
    ->group(
        function () {
            Route::delete('/token', [ApiAuthController::class, 'revokeCurrentUserToken'])->name('revokeCurrentUserToken');
        }
    );
