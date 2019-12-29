@extends('layouts.front')

@section('title','Resultados')
 
@section('main')
		<main class="productos">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<h3>Resultados de "{{ $busqueda }}"</h3>
						<div class="linea-inferior"></div>
					</div>
					<div class="col s12">
						<div class="row">
							@foreach($productos as $producto)
							@php
								$imagen = $producto->imagenes()->first();
							@endphp
							<div class="col l4">
								<a href="{{ url('productos/'.$producto->categoria->familia.'/'.$producto->categoria->id.'/'.$producto->id) }}">
									<div class="card">
										<div class="imagen">
												<img src="{{ asset('/img/imagenes/'.$imagen->imagen) }}">
											<div class="capa">
												<label>+<br>Ingresar</label>
											</div>
										</div>
										<div class="titulo">
											<p>{{$producto->nombre}}</p>
										</div>
									</div>
								</a>
							</div>
							@endforeach
						</div>
					</div>
					
				</div>
			</div>
		</main>
@endsection