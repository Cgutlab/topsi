<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descarga;

class CatalogoController extends Controller
{
	function editarDescarga($id)
	{
		$descarga = Descarga::find($id);
		return view('adm.catalogo.descarga.edit', compact('descarga'));
	}
}
