<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function enviar(Request $request)
    {
        $validated = $request->validate([
            'nombre'  => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        $cuerpoCorreo  = "Nuevo mensaje de contacto:\n\n";
        $cuerpoCorreo .= "Nombre: " . $validated['nombre'] . "\n";
        $cuerpoCorreo .= "Email: " . $validated['email'] . "\n";
        $cuerpoCorreo .= "Mensaje: " . $validated['mensaje'] . "\n";

        Mail::raw($cuerpoCorreo, function ($message) {
            $message->from('1912454@alu.murciaeduca.es');
            $message->to('1912454@alu.murciaeduca.es');
            $message->subject('Nuevo mensaje de contacto');

        });

        return back()->with('success', '¡Mensaje enviado con éxito!');
    }
}
