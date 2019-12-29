<?php

namespace App\Http\Controllers;

use App\Descarga;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class DescargaController extends Controller
{
    public function front()
    {
        $descarga = Descarga::find(1);
        return view('catalogo', compact('descarga'));
    }
    
    public function update(Request $request, Descarga $descarga)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'descargas',$descarga->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('archivo'), 'descargas',$descarga->id.'_'.$descarga->id);
        $file_save ? $datos['archivo'] = $file_save : false;

        $descarga->fill($datos);
        $descarga->save();
        $success = 'Descarga editada correctamente';
        return back()->with('success', $success);
    }
}
