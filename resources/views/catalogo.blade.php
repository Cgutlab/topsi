@extends('layouts.front')

@section('title','Catalogo')
 
@section('main')
        <main class="descarga">
            <div class="container">
                <div class="row">
                    <div class="col l4 offset-l4 center-align">
                        <img class="responsive-img" src="{{'img/descargas/'.$descarga->imagen}}">
                        <a href="{{ url('catalogos/Catalogo_digital_topsi.pdf') }}" download>
                            <i class="material-icons">file_download</i>Descargar Catálogo
                        </a>
                    </div>
                </div>
            </div>
        </main>
@endsection