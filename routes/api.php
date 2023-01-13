<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthenticatedSessionController;
use App\Http\Controllers\API\Auth\RegisteredUserController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\EmailVerificationController;
use App\Http\Controllers\API\V1\ForgotPasswordController;

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

// guest
Route::middleware('guest')->group(function () {
    
    // Login/Registration
    Route::post('/login', [AuthenticatedSessionController::class, 'login']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Forgo/Reset Password
    Route::post( '/forgot-password', [ForgotPasswordController::class, 'send'] );
    Route::post( '/reset-password', [ForgotPasswordController::class, 'reset'] );

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

// Email Verification check
Route::post('/send-email-verification-check', [EmailVerificationController::class, 'check']);

// Auth and Verified
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    // ...

} );