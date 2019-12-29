<?php

namespace App\Http\Controllers;

use App\Icono;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class IconoController extends Controller
{
    public function update(Request $request, Icono $icono)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'iconos',$icono->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $icono->fill($datos);
        $icono->save();
        $success = 'Icono editado correctamente';
        return back()->with('success', $success);
    }
}
