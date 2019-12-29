<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class Contactar extends Mailable

{
    use Queueable, SerializesModels;

    public function __construct($nombre, $telefono, $empresa, $email, $mensaje)

    {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->empresa = $empresa;
        $this->email = $email;
        $this->mensaje = $mensaje;
    }

    public function build()
    {
        return $this->subject('Contacto')->view('mail')->with([
                        'nombre' => $this->nombre,
                        'telefono' => $this->telefono,
                        'empresa' => $this->empresa,
                        'email' => $this->email,
                        'mensaje' => $this->mensaje    
                        ]);

    }

}
