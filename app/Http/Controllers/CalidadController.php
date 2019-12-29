<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Texto;
use App\Slider;

class CalidadController extends Controller
{
    function front()
    {
        $sliders = Slider::where('seccion',3)->orderBy('orden', 'desc')->get();
        $texto = Texto::find(1);
        
        return view('calidad',compact('texto','sliders'));
    }

    function crearSlider()
    {
        $section = 3;

        return view('adm.calidad.slider.create',compact('section'));
    }

    function listarSliders()
    {
        $sliders = Slider::where('seccion',3)->get();

        return view('adm.calidad.slider.list',  compact('sliders'));
    }

    function editarSlider($id)
    {
        $slider = Slider::find($id);
        $section = 3;

        return view('adm.calidad.slider.edit', compact('slider', 'section'));
    }

    function editarTexto($id)
    {
        $texto = Texto::find($id);
        return view('adm.calidad.texto.edit', compact('texto'));
    }
}
