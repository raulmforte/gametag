<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::all(); // recupera todos los usuarios
        return view('admin.users', compact('users')); // pasa los usuarios a la vista 'admin.users'
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id); // busca el usuario por ID o lanza un error si no se encuentra

        $user->delete(); // elimina el usuario de la base de datos

        return redirect()->route('users') // redirige a la lista de usuarios
                         ->with('status', 'usuario eliminado correctamente'); // muestra mensaje de éxito
    }
}