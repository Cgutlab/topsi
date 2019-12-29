<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class Presupuesto extends Mailable

{
    use Queueable, SerializesModels;

    public function __construct($nombre, $localidad, $email, $telefono, $detalle, $plano, $archivo)

    {
        $this->nombre = $nombre;
        $this->localidad = $localidad;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->detalle = $detalle;
        $this->plano = $plano;
        $this->archivo = $archivo;
    }

    public function build()
    {
        return $this->view('presupuesto')->with([
                        'nombre' => $this->nombre,
                        'localidad' => $this->localidad,
                        'telefono' => $this->telefono,
                        'email' => $this->email,
                        'detalle' => $this->detalle,
                        'plano' => $this->plano  
                        ])->attach(public_path().'/img/adjuntos/'.$this->archivo);

    }

}
