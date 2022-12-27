<?php

namespace App\Http\Controllers;

class TokenController extends Controller
{
    public function generateToken($user) {

        $token = $user->createToken('basic-token', ['none'])->plainTextToken;

        // if( $user->isAdmin() ) {
        //    $token = $user->createToken('admin-token', ['create', 'update', 'delete'])->plainTextToken;
        // }

        // return response()->json(['token' => $token], 200);

        return $token;
        
    }
}