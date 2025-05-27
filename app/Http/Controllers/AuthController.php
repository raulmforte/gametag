<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // ← Esta es la línea que faltaba


class AuthController extends Controller
{
    //saca el formulario del login
    public function showLoginForm()
    {
        return view('auth.login'); // apunta a resources/views/auth/login.blade.php
    }
 
    //valida las credenciales
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        $user = User::where('email', $credentials['email'])->first();
        Session::put('usuario_id', $user->id);

        return redirect()->intended('/admin');
    }

    return back()
        ->withErrors(['email' => 'Credenciales incorrectas.'])
        ->withInput(['email' => $request->email]);
}

     
    //muestra el formulario de registro
public function showRegistrationForm()
{
    // Solo retorna la vista, no valida roles
    return view('auth.register');
}



    // Manejar el registro de usuario
   public function register(Request $request)
{
    $data = $request->validate([
        'name'                  => 'required|string|max:255',
        'email'                 => 'required|string|email|max:255|unique:users',
        'password'              => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name'      => $data['name'],
        'email'     => $data['email'],
        'password'  => Hash::make($data['password']),
    ]);

    Auth::login($user);

    return redirect()->route('admin.index');
}

}