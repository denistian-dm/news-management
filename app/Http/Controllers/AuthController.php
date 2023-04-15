<?php

namespace App\Http\Controllers;

use App\Actions\Auth\LoginUser;
use App\Actions\Auth\StoreUser;
use App\Http\Requests\Auth\LoginPostRequest;
use App\Http\Requests\Auth\RegisterPostRequest;
use App\Http\Resources\Auth\RegisterResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterPostRequest $request, StoreUser $action)
    {
        return new RegisterResource('Register Success', $action->handle($request));
    }

    public function login(LoginPostRequest $request, LoginUser $action)
    {
        try {
            $user = $action->handle($request);
            return new UserResource(true, 'Logged In', $user);
        } 
        catch (\Exception $ex) {

            dd($ex);
            
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], $ex->getCode());
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Logged Out'
        ]);
    }
}
