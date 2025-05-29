<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(), // pasa el usuario autenticado a la vista 'profile.edit'
        ]);
    }

   
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated()); // llena los datos del usuario con los valores validados

        if ($request->user()->isDirty('email')) { // verifica si el email fue modificado
            $request->user()->email_verified_at = null; // reinicia la verificación del email
        }

        $request->user()->save(); // guarda los cambios en la base de datos

        return Redirect::route('profile.edit')->with('status', 'profile-updated'); // redirige con un mensaje de éxito
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'], // valida que la contraseña actual sea correcta
        ]);

        $user = $request->user(); // obtiene el usuario autenticado

        Auth::logout(); // cierra la sesión del usuario

        $user->delete(); // elimina el usuario de la base de datos

        $request->session()->invalidate(); // invalida la sesión actual
        $request->session()->regenerateToken(); // regenera el token de la sesión

        return Redirect::to('/'); // redirige a la página principal
    }
}