<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\SignupRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class SignupAction
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function exec(SignupRequest $signupRequest) : object
    {
        $requestValidatedData = $signupRequest->validated();

        $requestValidatedData['password'] = Hash::make($requestValidatedData['password']);

        return $this->userRepository->store($requestValidatedData);
    }
}
