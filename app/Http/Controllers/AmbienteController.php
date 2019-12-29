<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Texto;
use App\Slider;

class AmbienteController extends Controller
{
    function front()
    {
        $sliders = Slider::where('seccion',4)->orderBy('orden', 'desc')->get();
        $texto = Texto::find(2);
        
        return view('calidad',compact('texto','sliders'));
    }

    function crearSlider()
    {
        $section = 4;

        return view('adm.ambiente.slider.create',compact('section'));
    }

    function listarSliders()
    {
        $sliders = Slider::where('seccion',4)->get();

        return view('adm.ambiente.slider.list',  compact('sliders'));
    }

    function editarSlider($id)
    {
        $slider = Slider::find($id);
        $section = 4;

        return view('adm.ambiente.slider.edit', compact('slider', 'section'));
    }

    function editarTexto($id)
    {
        $texto = Texto::find($id);
        return view('adm.ambiente.texto.edit', compact('texto'));
    }
}
