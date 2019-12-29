<?php

namespace App\Http\Controllers;

use App\Destacado;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class DestacadoController extends Controller
{
    public function update(Request $request, Destacado $destacado)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'destacados', $destacado->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $destacado->fill($datos);
        $destacado->save();
        $success = 'Destacado editado correctamente';
        return back()->with('success', $success);
    }
}
