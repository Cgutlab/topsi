@extends('layouts.front')

@section('title','Empresa')
 
@section('main')
        <div class="carousel carousel-slider">
            @foreach($sliders as $slider)
            <div class="carousel-item" style="background-image: url('{{'img/sliders/'.$slider->imagen}}');">
                <div class="caption">
                    {!!$slider->titulo!!}
                    {!!$slider->subtitulo!!}
                    <div class="linea-inferior hide-on-med-and-down"></div>
                </div>
            </div>
            @endforeach
        </div>
        <main class="empresa">
            <div class="container">
                <div class="row">
                    <div class="col l6">
                        <img class="responsive-img" src="{{'img/items/'.$texto->imagen}}">
                    </div>
                    <div class="col l6">
                        <h4 class="titulo">{{ $texto->titulo }}</h4>
                        {!! $texto->texto !!}
                    </div>
                </div>
            </div>
        </main>
        <div class="marcas">
            <div class="container">
                <div class="row">
                    <div class="col l6">
                        <h5>Nuestras Marcas</h5>
                        <p>Nuestras marcas son sinónimo de la mejor ecuación existente entre un muy buen precio y una gran calidad; conocemos a la perfección lo que el consumidor busca y necesita. Es por esto que todos los procesos, tanto productivos como de logística y distribución, apuntan a la total satisfacción de quien los elija.</p>
                    </div>
                    <div class="col l6">
                        <img class="responsive-img" src="{{'img/marcas.png'}}">
                    </div>
                </div>
            </div>
        </div>
@endsection