<?php

namespace App\Actions\Auth;

use App\Events\LoginHistory;
use App\Http\Requests\Auth\LoginPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class LoginUser {

    public function handle(LoginPostRequest $request): User
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->token = $user->createToken('authToken')->accessToken;

            LoginHistory::dispatch($user);

            return $user;
        }
        else {
            throw new AccessDeniedException('Unauthorize', 401);
        }
    }
}