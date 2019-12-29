@extends('layouts.front')

@section('title','Inicio')
 
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
		<main class="presentacion">
			<div class="container">
				<div class="row">
					<div class="col l6 mb15">
						<h4 class="titulo">{{ $texto->titulo }}</h4>
						{!! $texto->texto !!}
						<a href="{{ url('empresa') }}">
							<button>CONOCÉ MÁS</button>
						</a>
					</div>
					<div class="col l6">
						<img class="responsive-img" src="{{'img/items/'.$texto->imagen}}">
					</div>
				</div>
			</div>
		</main>
		<div class="destacados container">
			<div class="row">
				<div class="col s12 center-align">
					<h3>Nuestros productos</h3>
					<div class="linea-inferior"></div>
				</div>
			</div>
			<div class="row">
				@foreach($destacados as $destacado)
				<div class="col l6">
					<a href="{{ $destacado->vinculo }}">
						<div class="card destacado">
							<div class="imagen">
								<img class="responsive-img" src="{{'img/destacados/'.$destacado->imagen}}">
							</div>
							<div class="pie">
								{!! $destacado->titulo !!}
							</div>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
		<div class="logos">
			<div class="container">
				<div class="row">
					@foreach($iconos as $icono)
					<div class="col l4 icono">
						<img src="{{'img/iconos/'.$icono->imagen}}">
						{!! $icono->texto !!}
					</div>
					@endforeach
				</div>
			</div>
		</div>
@endsection