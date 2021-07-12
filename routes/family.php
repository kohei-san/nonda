<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Family\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Family\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Family\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Family\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Family\Auth\NewPasswordController;
use App\Http\Controllers\Family\Auth\PasswordResetLinkController;
use App\Http\Controllers\Family\Auth\RegisteredUserController;
use App\Http\Controllers\Family\Auth\VerifyEmailController;

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

Route::get('/', function () {
    return view('family.welcome');
});

Route::get('/dashboard', function () {
    return view('family.dashboard');
})->middleware(['auth:families'])->name('dashboard');

// auth.php

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth:families')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:families', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth:families')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth:families');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:families')
                ->name('logout');
