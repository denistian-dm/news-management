<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\RegisterPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreUser {

    public function handle(RegisterPostRequest $request): User
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    } 
}