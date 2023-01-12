<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPA_Auth\AuthenticatedSessionController;
use App\Http\Controllers\SPA_Auth\RegisteredUserController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\EmailVerificationController;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get( '/test-route', function() {
//     return [
//         'hash' => Hash::make( 'test@mail.com' ),
//         'check' => Hash::check( 'test@mail.com', '$2y$10$hKBXpo1rYd61lghiu7mdY.6zxCu6RjdnGpJk6y6ftFo1zvDbBiSsq' )
//     ];
// } );

// guest
Route::middleware('guest')->group(function () {
    
    Route::post('/login', [AuthenticatedSessionController::class, 'login']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

} );

// Auth
Route::middleware('auth:sanctum')->group(function () {

    // Get Auth User
    Route::get('/user', [UserController::class, 'show']);

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);

    // Email Verification send
    Route::post('/send-email-verification-url', [EmailVerificationController::class, 'send']);

});

// Auth and Verified
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    // ...

} );

// Email Verification check
Route::post('/send-email-verification-check', [EmailVerificationController::class, 'check']);