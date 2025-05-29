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
        'email'    => 'required|email', // valida que el email sea requerido y tenga formato correcto
        'password' => 'required', // valida que la contraseña sea requerida
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate(); // regenera la sesión para mayor seguridad

        $user = User::where('email', $credentials['email'])->first(); // busca el usuario por email
        Session::put('usuario_id', $user->id); // guarda el id del usuario en la sesión

        return redirect()->intended('/admin'); // redirige al panel de administración
    }

    return back()
        ->withErrors(['email' => 'Credenciales incorrectas.']) // muestra error si las credenciales son incorrectas
        ->withInput(['email' => $request->email]); // mantiene el email ingresado en el formulario
}

     
    //muestra el formulario de registro
public function showRegistrationForm()
{
    // Solo retorna la vista, no valida roles
    return view('auth.register'); // devuelve la vista del registro
}



    // Manejar el registro de usuario
   public function register(Request $request)
{
    $data = $request->validate([
        'name'                  => 'required|string|max:255', // valida que el nombre sea requerido y no exceda 255 caracteres
        'email'                 => 'required|string|email|max:255|unique:users', // valida que el email sea único y correcto
        'password'              => 'required|string|min:8|confirmed', // valida que la contraseña tenga mínimo 8 caracteres y sea confirmada
    ]);

    $user = User::create([
        'name'      => $data['name'], // asigna el nombre al usuario
        'email'     => $data['email'], // asigna el email al usuario
        'password'  => Hash::make($data['password']), // encripta la contraseña antes de guardarla
    ]);

    Auth::login($user); // inicia sesión automáticamente después de registrar al usuario

    return redirect()->route('admin.index'); // redirige al panel de administración
}

}