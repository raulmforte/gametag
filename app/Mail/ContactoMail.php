<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable
{
    use SerializesModels;

    public $nombre;
    public $email;
    public $mensaje;

    public function __construct($nombre, $email, $mensaje)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->mensaje = $mensaje;
    }

    public function build()
    {
        return $this->subject('Nuevo mensaje de contacto')
                    ->from($this->email, $this->nombre)
                    ->text('emails.contacto-text')
                    ->with([
                        'nombre' => $this->nombre,
                        'email' => $this->email,
                        'mensaje' => $this->mensaje,
                    ]);
    }
}
