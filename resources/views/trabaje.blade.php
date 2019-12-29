@extends('layouts.front')

@section('title','Trabaje con nosotros')
 
@section('main')
        <main class="container" id="trabaje">
            <div class="row">
                <div class="col s12 center-align titulo">
                    <h3>Trabaje con nosotros</h3>
                    <div class="linea-inferior"></div>
                </div>
                @if(session('success'))
                <div class="col s12 card-panel green lighten-4 green-text text-darken-4" style="padding-top: 15px; padding-bottom: 15px;">
                    {{ session('success') }}
                </div>
                @endif
                <div class="col s12 leyenda">
                    Complete el siguiente formulario, adjunte el CV y nos contactaremos a la brevedad
                </div>
                <form method="post" action="{{ url('enviar-cv') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-field col m6 s12">
                    <input name="nombre" id="nombre" type="text" class="validate">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col m6 s12">
                    <input name="apellido" id="apellido" type="text" class="validate">
                    <label for="apellido">Apellido</label>
                </div>
                <div class="input-field col m6 s12">
                    <input name="telefono" id="telefono" type="text" class="validate">
                    <label for="telefono">Telefono</label>
                </div>
                <div class="input-field col m6 s12">
                    <input name="email" id="email" type="text" class="validate">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col m6 s12">
                    <input name="documento" id="documento" type="text" class="validate">
                    <label for="documento">Nº de Documento</label>
                </div>
                <div class="input-field col m6 s12">
                    <input name="domicilio" id="domicilio" type="text" class="validate">
                    <label for="domicilio">Domicilio</label>
                </div>
                <div class="col m6 s12 input-field file-field">
                    <div class="btn">
                        <span>Examinar</span>
                        <input type="file" name="archivo">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col s6">
                    <div class="g-recaptcha" data-sitekey="6Le4WT4UAAAAAMsSrRvyvdMGIEyHIXLmuf9EFYPl"></div>
                </div>
                <div class="input-field col s12 center-align">
                    <input type="submit" value="ENVIAR">
                </div>
                </form>
            </div>
        </main>
@endsection