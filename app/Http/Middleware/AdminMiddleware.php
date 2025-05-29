<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
    * Maneja la solicitud entrante y verifica si el usuario es administrador.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->is_admin) { // verifica si el usuario está autenticado y es administrador
            return $next($request); // permite continuar con la solicitud
        }

        abort(403, 'No tienes permiso para acceder a esta página.'); // muestra error 403 si no tiene permisos
    }
} 