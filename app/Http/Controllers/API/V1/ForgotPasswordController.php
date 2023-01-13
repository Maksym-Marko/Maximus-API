<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Validation\Rules;

class ForgotPasswordController extends Controller
{

    public function send( Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $app_url = config('app.url');

        if( isset( $request['forgotPasswordUrl'] ) ) $app_url = $request['forgotPasswordUrl'];
               
        $url = $app_url . '?token=' . Hash::make( $request->email );
       
        Mail::to( $request->email )
            ->send( new ForgotPasswordMail( [
                'url' => $url
            ] ) );
        
        $user = User::where( 'email', $request['email'] )->first();

        $user->touch();

        return 'success';

    }

    public function reset( Request $request )
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Check email
        $email_valid = Hash::check( $request->email, $request->token );

        if( ! $email_valid ) {
            return response()->json([
                'message' => 'Something wrong with reset password token. Maybe you should try another email.'
            ], 422);
        }

        // Check expiry date
        $user = User::where( 'email', $request['email'] )->first();
        $time_now = time();
        $time_updated_at = strtotime( $user->updated_at );

        if( ( $time_now - $time_updated_at ) / 60 > 60 ) {
            return response()->json([
                'message' => 'Reset password url expired. Please go to Forgot Password page and make another request.'
            ], 422);
        }

        $reset = $user->update( [
            'password' => Hash::make( $request->password )
        ] );

        if( $reset ) {
            $user->touch();
            return 'success';
        }

        return 0;

    }

}
