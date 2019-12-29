@extends('layouts.front')

@section('title','Productos')
 
@section('main')
		<main class="productos">
			<div class="container">
				<div class="row">
					<div class="col s12 miga">
						<p><a href="">PRODUCTOS</a> | <a href="">{{ strtoupper($categoria->nombre)}}</a></p>
					</div>
					<div class="col l3">
						<ul class="menu-lateral">
							@foreach($categorias as $item)
							<li class="categoria">
								<a href="{{ url('productos/'.$item->familia.'/'.$item->id) }}">
									<p>{{$item->nombre}}</p>
								</a>
								@if($categoria->id==$item->id)
								<ul class="menu-productos">
									@foreach($item->productos()->orderBy('orden','asc')->get() as $producto)
									<li class="producto">
										<a href="{{ url('productos/'.$item->familia.'/'.$item->id.'/'.$producto->id) }}">
											<p>{{$producto->nombre}}</p>
										</a>
									</li>
									@endforeach
								</ul>
								@endif
							</li>
							@endforeach
						</ul>
					</div>
					<div class="col l9">
						<div class="row">
							@foreach($productos as $producto)
							@php
								$imagen = $producto->imagenes()->first();
							@endphp
							<div class="col l4 m4 s12">
								<a href="{{ url('productos/'.$familia.'/'.$categoria->id.'/'.$producto->id) }}">
									<div class="card">
										<div class="imagen">
											<img class="responsive-img" src="{{ asset('/img/imagenes/'.$imagen->imagen) }}">
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