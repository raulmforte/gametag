<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // permite manejar autorizaciones
use Illuminate\Foundation\Validation\ValidatesRequests; // permite validar solicitudes
use Illuminate\Routing\Controller as BaseController; // extiende la funcionalidad del controlador base

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests; // incluye las funcionalidades de autorización y validación
}