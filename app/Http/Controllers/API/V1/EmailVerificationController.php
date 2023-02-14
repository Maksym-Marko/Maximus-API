<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Auth\Events\Verified;

class EmailVerificationController extends Controller
{

    public function send( Request $request )
    {

        $app_url = config('app.url');

        if( isset( $request['verificationUrl'] ) ) $app_url = $request['verificationUrl'];
        
        if ($request->user()->hasVerifiedEmail()) {
            return 'verified';
        }

        $url = $app_url . '?id='  . $request->user()->id . '&hash=' . Hash::make( $request->user()->email );

        Mail::to( $request->user()->email )
            ->send( new VerificationMail( [
                'url' => $url
            ] ) );

        return response( [
            'message' => 'success'
        ] );

    }

    public function check( Request $request )
    {

        if( $request->id == '' || $request->hash == '' ) return 0;

        $user = User::find( intval( $request->id ) );

        if( ! $user ) return 0;

        $verified = Hash::check( $user->email, $request->hash );

        if( $verified AND ! $user->hasVerifiedEmail() ) {

            $user->markEmailAsVerified();

            return [
                'message' => 'success',
                'verified_at' => $user->email_verified_at
            ];

        }

        return 0;

    }

}
