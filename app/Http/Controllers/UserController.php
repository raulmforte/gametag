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
        // Recupera todos los usuarios
        $users = User::all();                                   
        return view('admin.users', compact('users'));
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // 2) Elimina el usuario
        $user->delete();                                     

        // 3) Redirige con mensaje de éxito
        return redirect()->route('users')
                         ->with('status', 'usuario eliminado correctamente');
    }
  
 
}