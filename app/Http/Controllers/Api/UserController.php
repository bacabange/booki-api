<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Models\User;

/**
 * @resource User
 *
 * User resource, information about user account
 */
class UserController extends Controller
{
    /**
     * User books list
     * @return App\Http\Resources\BookCollection
     */
    public function listBooks()
    {
        $user = \Auth::user();

        return new BookCollection($user->books()->paginate());
    }

    /**
     * User profile
     * @return App\Http\Resources\User
     */
    public function profile()
    {
        return new UserResource(\Auth::user());
    }

    /**
     * Update user profile
     * @param UpdateProfileRequest $request
     * @return App\Http\Resources\User
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = \Auth::user();
        $user->update($request->only('first_name', 'last_name', 'email', 'password'));

        return new UserResource($user);
    }
}
