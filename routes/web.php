<?php

use App\Http\Controllers\ProfileController;
// use App\Mail\VerificationMail;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get( '/mail-test', function() {
//     Mail::to( 'email2@localhost' )
//         ->send( new VerificationMail( [
//             'url' => 'http://127.0.0.1:8000/f(#5ht89wa8hf'
//         ] ) );
//     return new VerificationMail( [
//         'url' => 'http://127.0.0.1:8000/f(#5ht89wa8hf'
//     ] );
// } );

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
