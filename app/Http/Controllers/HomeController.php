<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icono;
use App\Destacado;
use App\Item;
use App\Slider;

class HomeController extends Controller
{

    function front()
    {
        $sliders = Slider::where('seccion',1)->orderBy('orden', 'desc')->get();
        $destacados = Destacado::orderBy('orden', 'desc')->get();
        $texto = Item::find(1);
        $iconos = Icono::all();
        
        return view('index',compact('texto','sliders', 'destacados', 'iconos'));
    }

    function crearSlider()
    {
        $section = 1;

        return view('adm.home.slider.create',compact('section'));
    }

    function listarSliders()
    {
        $sliders = Slider::where('seccion',1)->get();

        return view('adm.home.slider.list',  compact('sliders'));
    }

    function editarSlider($id)
    {
        $slider = Slider::find($id);
        $section = 1;

        return view('adm.home.slider.edit', compact('slider', 'section'));
    }

    function listarDestacados()
    {
        $destacados = Destacado::all();

        return view('adm.home.destacado.list',  compact('destacados'));
    }

    function editarDestacado($id)
    {
        $destacado = Destacado::find($id);

        return view('adm.home.destacado.edit', compact('destacado', 'section'));
    }

    function editarItem($id)
    {
        $item = Item::find($id);
        return view('adm.home.item.edit', compact('item'));
    }

    function crearIcono()
    {

        return view('adm.home.icono.create');
    }

    function listarIconos()
    {
        $iconos = Icono::all();

        return view('adm.home.icono.list',  compact('iconos'));
    }

    function editarIcono($id)
    {
        $icono = Icono::find($id);

        return view('adm.home.icono.edit', compact('icono'));
    }
}
