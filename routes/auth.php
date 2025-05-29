<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register'); // Ruta para mostrar el formulario de registro

    Route::post('register', [RegisteredUserController::class, 'store']); // Ruta para procesar el registro

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login'); // Ruta para mostrar el formulario de inicio de sesión

    Route::post('login', [AuthenticatedSessionController::class, 'store']); // Ruta para procesar el inicio de sesión

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request'); // Ruta para mostrar el formulario de recuperación de contraseña

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email'); // Ruta para enviar el enlace de recuperación de contraseña

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset'); // Ruta para mostrar el formulario de restablecimiento de contraseña

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store'); // Ruta para procesar el restablecimiento de contraseña
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice'); // Ruta para mostrar la notificación de verificación de email

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify'); // Ruta para verificar el email

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send'); // Ruta para reenviar la notificación de verificación de email

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm'); // Ruta para mostrar el formulario de confirmación de contraseña

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']); // Ruta para procesar la confirmación de contraseña

    Route::put('password', [PasswordController::class, 'update'])->name('password.update'); // Ruta para actualizar la contraseña

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout'); // Ruta para cerrar sesión
});