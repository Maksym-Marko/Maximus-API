<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPA_Auth\AuthenticatedSessionController;
use App\Http\Controllers\SPA_Auth\RegisteredUserController;

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

Route::get( '/test-route', function() {
    return 'test';
} );

// guest
Route::middleware('guest')->group(function () {
    
    Route::post('/login', [AuthenticatedSessionController::class, 'login']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

} );

// Auth
Route::middleware('auth:sanctum')->group(function () {

    // Get Auth User
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);

});