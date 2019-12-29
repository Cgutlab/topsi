<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Slider;

class EmpresaController extends Controller
{
    function front()
    {
        $sliders = Slider::where('seccion',2)->orderBy('orden', 'desc')->get();
        $texto = Item::find(2);
        
        return view('empresa',compact('texto','sliders'));
    }

    function crearSlider()
    {
        $section = 2;

        return view('adm.empresa.slider.create',compact('section'));
    }

    function listarSliders()
    {
        $sliders = Slider::where('seccion',2)->get();

        return view('adm.empresa.slider.list',  compact('sliders'));
    }

    function editarSlider($id)
    {
        $slider = Slider::find($id);
        $section = 2;

        return view('adm.empresa.slider.edit', compact('slider', 'section'));
    }

    function editarItem($id)
    {
        $item = Item::find($id);
        return view('adm.empresa.item.edit', compact('item'));
    }
}
