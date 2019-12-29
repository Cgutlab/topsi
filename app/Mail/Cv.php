<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class Cv extends Mailable

{
    use Queueable, SerializesModels;

    public function __construct($nombre, $apellido, $email, $telefono, $documento, $domicilio, $archivo)

    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->documento = $documento;
        $this->domicilio = $domicilio;
        $this->archivo = $archivo;
    }

    public function build()
    {
        return $this->subject('Solicitud de Empleo')->view('cv')->with([
                        'nombre' => $this->nombre,
                        'apellido' => $this->apellido,
                        'telefono' => $this->telefono,
                        'email' => $this->email,
                        'documento' => $this->documento,
                        'domicilio' => $this->domicilio  
                        ])->attach(public_path().'/img/adjuntos/'.$this->archivo);

    }

}
