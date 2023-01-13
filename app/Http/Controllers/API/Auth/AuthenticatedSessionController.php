<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\V1\UserResource;

class AuthenticatedSessionController extends Controller
{
    
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => [
                'required',
            ],
            'remember' => 'boolean'
        ]);

        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'error' => 'The Provided credentials are not correct'
            ], 422);
        }
        
        $user = Auth::user();
        $token = $user->createToken('basic-token', ['none'])->plainTextToken;

        return response( [
            'user' => new UserResource( $user ),
            'token' => $token
        ] );
    }

    public function logout(Request $request)
    {

        $user = Auth::user();
        
        $deleted = $user->currentAccessToken()->delete();

        return response( [
            'success' => $deleted
        ] );

    }

}
