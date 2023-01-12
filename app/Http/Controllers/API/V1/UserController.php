<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\UserResource;

class UserController extends Controller
{
    public function show( Request $request )
    {

        return new UserResource( $request->user() );

    }
}
