@extends('layouts.front')

@section('title','Solicitud de presupuesto')
 
@section('main')
        <main>
            <div class="container solicitud">
                <div class="row iconos">
                    <div class="horizontal"></div>
                    <div class="col s6 lado" id="datos">
                        <img src="img/cuaderno.png">
                        <div class="vertical"></div>
                        <div class="circulo"></div>
                        <label>TUS<br class="show-on-small"> DATOS</label>
                        <div class="linea-inferior"></div>
                    </div>
                    <div class="col s6 lado gris" id="presupuesto">
                        <img src="img/casa.png">
                        <div class="vertical"></div>
                        <div class="circulo"></div>
                        <label>TUS PRESUPUESTO</label>
                        <div class="linea-inferior"></div>
                    </div>
                </div>
                <form method="post" action="{{ url('enviar-presupuesto') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col s12">
                        <div class="row" id="estado1">
                            @if(session('success'))
                            <div class="col s12 m6 offset-m3 card-panel green lighten-4 green-text text-darken-4" style="padding-top: 15px; padding-bottom: 15px;">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="col m6 s12 input-field">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required>
                            </div>
                            <div class="col m6 s12 input-field">
                                <label for="localidad">Localidad</label>
                                <input type="text" name="localidad" required>
                            </div>
                            <div class="col m6 s12 input-field">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" required>
                            </div>
                            <div class="col m6 s12 input-field">
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" required>
                            </div>
                            <div class="col s12">
                                <button type="button" class="waves-effect waves-light btn right" id="siguiente">SIGUIENTE</button>
                            </div>
                        </div>
                        <div class="row" id="estado2" style="display: none;">
                            <div class="col m6 s12 input-field">
                                <label for="detalle">Detalle</label>
                                <textarea style="height: 6rem" name="detalle" class="materialize-textarea" required></textarea>
                            </div>
                            <div class="col m6 s12 input-field">
                                <label for="email">Archivo</label>
                                <input type="text" name="plano" >
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
                            <div class="col m6 offset-m6 s12">
                                <button type="button" class="waves-effect waves-light btn left" id="atras">ATRAS</button>
                                <button class="waves-effect waves-light btn right">ENVIAR</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </main>
        <script>
            $('#siguiente').click(function(event) {
                if($('input[name=nombre]').val()!=''&&$('input[name=localidad]').val()!=''&&$('input[name=telefono]').val()!=''&&$('input[name=email]').val()!='')
                {
                    document.getElementById("estado1").className = "animated bounceOutLeft";
                    setTimeout(function(){ 
                        $("#estado1").hide('fast', function() {});
                        $("#estado2").show('fast', function() {});
                        document.getElementById("estado2").className = "animated bounceInRight";
                    }, 1000);
                    $('#presupuesto').removeClass('gris');
                    $('#datos').addClass('gris');
                }
            });

            $('#atras').click(function(event) {
                document.getElementById("estado2").className = "animated bounceOutLeft";
                
                setTimeout(function(){ 
                    $("#estado2").hide('fast', function() {}); 
                    $("#estado1").show('fast', function() {});
                    document.getElementById("estado1").className = "animated bounceInRight";
                }, 1000);
                
                $('#datos').removeClass('gris');
                $('#presupuesto').addClass('gris');
            });

            function animacion(id, clase) {
                $(id).removeClass("animated "+clase).addClass(clase + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                  $(this).removeClass("animated "+clase);
                });
            };
        </script>
@endsection