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
            'nombre'  => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'mensaje' => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.v3_secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $result = $response->json();

        if (!($result['success'] ?? false) || ($result['score'] ?? 0) < 0.5) {
            return back()->withErrors(['captcha' => 'reCAPTCHA no pudo verificar que eres humano.']);
        }

        $contenido = "Nuevo mensaje de contacto:\n\n";
        $contenido .= "Nombre: " . $validated['nombre'] . "\n";
        $contenido .= "Email: "  . $validated['email'] . "\n";
        $contenido .= "Mensaje:\n" . $validated['mensaje'] . "\n";

        Mail::raw($contenido, function ($message) {
            $message->from('1912454@alu.murciaeduca.es', 'Arturo');
            $message->to('1912454@alu.murciaeduca.es');
            $message->subject('Nuevo mensaje de contacto');
        });

        return back()->with('success', '¡Mensaje enviado correctamente!');
    }
}