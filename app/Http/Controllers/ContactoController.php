<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use Redirect;
use App\Mail\Contactar;
use App\Mail\Presupuesto;
use App\Mail\Cv;
use Illuminate\Support\Facades\Mail;
use App\Extensions\Helpers;

class ContactoController extends Controller
{
    function front()
    {
        $mapa = Contacto::find(4);
        return view('contacto',compact('mapa'));
    }

    function listarContactos()
    {
        $contactos = Contacto::all();
        return view('adm.contactos.contacto.list',  compact('contactos'));
    }

    function editarContacto($id)
    {
        $contacto = Contacto::find($id);
        return view('adm.contactos.contacto.edit', compact('contacto'));
    }

    public function update(Request $request, Contacto $contacto)
    {
        $datos = $request->all();
        
        $contacto->fill($datos);
        $contacto->save();
        $success = 'Contacto editado correctamente';
        return back()->with('success', $success);
    }

    public function enviar(Request $request, Contacto $contacto)
    {
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $empresa = $request->input('empresa');
        $email = $request->input('email');
        $mensaje = $request->input('mensaje');
        Mail::to('info@topsi.com.ar')->send(new Contactar($nombre, $telefono, $empresa, $email, $mensaje));

        if (count(Mail::failures()) > 0)
        {
            $success = 'Ha ocurrido un error al enviar el correo';
        }
        else
        {
            $success = 'Correo enviado correctamente';
        }

        return back()->with('success', $success);
    }

    public function presupuesto(Request $request, Contacto $contacto)
    {
        $nombre = $request->input('nombre');
        $localidad = $request->input('localidad');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $detalle = $request->input('detalle');
        $plano = $request->input('plano');

        $archivo ="";
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $file_save = Helpers::saveImage($request->file('archivo'), 'adjuntos', date('d_m_Y_h_i_s_a', time()));
        $file_save ? $archivo = $file_save : false;

        Mail::to('info@topsi.com.ar')->send(new Presupuesto($nombre, $localidad, $telefono, $email, $detalle, $plano, $archivo));

        if (count(Mail::failures()) > 0)
        {
            $success = 'Ha ocurrido un error al enviar el presupuesto';
        }
        else
        {

            $success = 'Su presupuesto se ha enviado correctamente';
        }

        return back()->with('success', $success);
    }

    public function cv(Request $request, Contacto $contacto)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $documento = $request->input('documento');
        $domicilio = $request->input('domicilio');

        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $file_save = Helpers::saveImage($request->file('archivo'), 'adjuntos', date('d_m_Y_h_i_s_a', time()));
        $file_save ? $archivo = $file_save : false;

        Mail::to('info@topsi.com.ar')->send(new Cv($nombre, $apellido, $telefono, $email, $documento, $domicilio, $archivo));

        if (count(Mail::failures()) > 0)
        {
            $success = 'Ha ocurrido un error al enviar su curriculum';
        }
        else
        {

            $success = 'Su curriculum se ha enviado correctamente';
        }

        return back()->with('success', $success);
    }
}
