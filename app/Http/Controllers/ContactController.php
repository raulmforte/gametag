<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


class ContactController extends Controller
{
    public function enviar(Request $request)
    {
        $validated = $request->validate([
            'nombre'  => 'required|string|max:255', // valida que el nombre sea requerido y no exceda 255 caracteres
            'email'   => 'required|email|max:255', // valida que el email sea requerido y tenga formato correcto
            'mensaje' => 'required|string', // valida que el mensaje sea requerido
            'g-recaptcha-response' => 'required', // valida que el captcha sea requerido
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.v3_secret'), // usa la clave secreta de reCAPTCHA desde la configuración
            'response' => $request->input('g-recaptcha-response'), // envía la respuesta del captcha
            'remoteip' => $request->ip(), // incluye la IP del cliente
        ]);

        $result = $response->json();

        if (!($result['success'] ?? false) || ($result['score'] ?? 0) < 0.5) {
            return back()->withErrors(['captcha' => 'reCAPTCHA no pudo verificar que eres humano.']); // muestra error si el captcha falla
        }

        $contenido = "Nuevo mensaje de contacto:\n\n";
        $contenido .= "Nombre: " . $validated['nombre'] . "\n"; // agrega el nombre al contenido del mensaje
        $contenido .= "Email: "  . $validated['email'] . "\n"; // agrega el email al contenido del mensaje
        $contenido .= "Mensaje:\n" . $validated['mensaje'] . "\n"; // agrega el mensaje al contenido

        Mail::raw($contenido, function ($message) {
            $message->from('1912454@alu.murciaeduca.es', 'Arturo'); // establece el remitente del correo
            $message->to('1912454@alu.murciaeduca.es'); // establece el destinatario del correo
            $message->subject('Nuevo mensaje de contacto'); // establece el asunto del correo
        });

        return back()->with('success', '¡Mensaje enviado correctamente!'); // redirige con un mensaje de éxito
    }
}