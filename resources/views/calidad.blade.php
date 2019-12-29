@extends('layouts.front')

@section('title','Calidad')
 
@section('main')
        <div class="carousel carousel-slider">
            @foreach($sliders as $slider)
            <div class="carousel-item" style="background-image: url('{{'img/sliders/'.$slider->imagen}}');">
                @if($slider->titulo!=''&&$slider->subtitulo!='')
                <div class="caption">
                    {!!$slider->titulo!!}
                    {!!$slider->subtitulo!!}
                    <div class="linea-inferior"></div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <main class="calidad">
            <div class="container">
                <div class="row">
                    <div class="col s12 center-align">
                        <h4 class="titulo">{{ $texto->titulo }}</h4>
                        <div class="linea-inferior"></div>
                    </div>
                    <div class="col s12 columnas">
                        {!! $texto->texto !!}
                    </div>
                </div>
            </div>
        </main>
@endsection