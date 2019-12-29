@extends('layouts.front')

@section('title','Contacto')
 
@section('main')
        {!!$mapa->dato!!}
        <main class="container" id="contacto">
            <div class="row">
                <div class="col s12">
                    <div class="aviso">
                        <p>Contáctanos y te brindaremos toda la información que necesites</p>
                    </div>
                </div>
                @if(session('success'))
                <div class="col s12 m6 offset-m3 card-panel green lighten-4 green-text text-darken-4" style="padding-top: 15px; padding-bottom: 15px;">
                    {{ session('success') }}
                </div>
                @endif
                <form method="post" action="{{ url('enviar-contacto') }}">
                {{ csrf_field() }}
                <div class="col m6 s12 input-field">
                    <label for="nombre">Nombre y Apellido</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="col m6 s12 input-field">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" required>
                </div>
                <div class="col m6 s12 input-field">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" required>
                </div>
                <div class="col m6 s12 input-field">
                    <label for="empresa">Empresa/Razon Social</label>
                    <input type="text" name="empresa" required>
                </div>
                <div class="col m6 s12 input-field">
                    <label for="mensaje">Mensaje</label>
                    <textarea name="mensaje" rows="7" class="materialize-textarea" required></textarea>
                </div>
                <div class="col m6 s12">
                    <div class="g-recaptcha" data-sitekey="6Le4WT4UAAAAAMsSrRvyvdMGIEyHIXLmuf9EFYPl"></div>
                    <input type="checkbox" name="aceptar" id="aceptar" required>
                    <label for="aceptar">Acepto los términos y condiciones de privacidad</label>
                </div>
                <div class="col s12 center-align">
                    <button>ENVIAR</button>
                </div>
                </form>
            </div>
        </main>
@endsection