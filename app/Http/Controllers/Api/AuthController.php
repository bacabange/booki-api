<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\LoginSocialRequest;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * @resource Auth
 *
 * Auth resource
 */
class AuthController extends Controller
{
    /**
     * Register new user
     * @param RegisterRequest $request
     * @return UserResource
     */
    public function register(RegisterRequest $request)
    {
        $dataUser = $this->createUser($request->only('first_name', 'last_name', 'email', 'password'));

        return new UserResource($dataUser['user'], $dataUser['token']);
    }

    /**
     * User Auth
     * @param LoginRequest $request
     * @return UserResource
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token =  $user->createToken('BookiApp')->accessToken;

            return new UserResource($user, $token);
        } else {
            return response()->json([
                'message' => 'Unauthorised'
            ], 401);
        }
    }

    public function loginSocial(LoginSocialRequest $request, $provider)
    {
        $user = User::where('email', 'LIKE', $request->email)->first();

        if (is_null($user)) {
            $dataUser = $this->createUser($request->only('first_name', 'last_name', 'email', 'password'));

            $user = $dataUser['user'];
            $token = $dataUser['token'];
        }

        if (Auth::loginUsingId($user->id)) {
            $user = Auth::user();
            $token =  $user->createToken('BookiApp')->accessToken;

            return new UserResource($user, $token);
        } else {
            return response()->json([
                'message' => 'Unauthorised'
            ], 401);
        }
    }

    public function createUser($user_data)
    {
        $user = User::create($user_data);
        $token =  $user->createToken('BookiApp')->accessToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
