<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\LoginAction;
use App\Actions\Auth\SignupAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\SignupResource;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
	 * Register new user
     *
	*/
	public function signup(SignupRequest $signupRequest, SignupAction $signupAction): SignupResource
    {
        $userCreated = $signupAction->exec($signupRequest);

        return new SignupResource($userCreated);
	}

    /**
     * Generate sanctum token on successful login
     * @throws ValidationException
     */
	public function login(LoginRequest $loginRequest, LoginAction $loginAction): LoginResource
    {
        $user = $loginAction->exec($loginRequest);

        return (new LoginResource($user))->additional([
            'token' => $user->createToken($loginRequest->input("device_name"))->plainTextToken,
        ]);
	}
}
