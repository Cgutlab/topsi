@extends('layouts.back')

@section('title','Editar producto')
 
@section('main')
		<main>
			<div class="container">
				
				@if(count($errors) > 0)
				<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
			  		<ul>
			  			@foreach($errors->all() as $error)
			  				<li>{!!$error!!}</li>
			  			@endforeach
			  		</ul>
			  	</div>
				@endif

				@if(session('success'))
				<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
					{{ session('success') }}
				</div>
				@endif

				<div class="row">
					<div class="col s12">

						{{Form::model($producto, ['route' => ['producto.update', $producto->id], 'method'=>'PUT', 'files' => true]) }}
							<div class="row">
								<div class="input-field col s6">
									{!!Form::label('Nombre')!!}
									{!!Form::text('nombre',null,['class'=>'validate', 'required'])!!}
								</div>
								<div class="input-field col s6">
									{!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
						          	{!!Form::label('Detalles')!!}
									{!!Form::textarea('detalles',null,['class'=>'validate materialize-textarea', 'required'])!!}
						        </div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									{!!Form::label('Medidas')!!}
									{!!Form::text('medidas',null,['class'=>'validate', 'required'])!!}
								</div>
								<div class="input-field col s6">
									{!!Form::label('Colores')!!}
									{!!Form::text('colores',null,['class'=>'validate', 'required'])!!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									{!!Form::label('Unidades')!!}
									{!!Form::text('unidades',null,['class'=>'validate', 'required'])!!}
								</div>
								<div class="input-field col s6">
									{!!Form::label('Código')!!}
									{!!Form::text('codigo',null,['class'=>'validate', 'required'])!!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									{!!Form::label('Video')!!}
									{!!Form::text('video',null,['class'=>'validate'])!!}
								</div>
								<div class="input-field col s6">
									{!!Form::label('Orden')!!}
									{!!Form::text('orden',null,['class'=>'validate', 'required'])!!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									{!!Form::label('Keyword')!!}
									{!!Form::text('keyword',null,['class'=>'validate'])!!}
								</div>
							</div>
							
							<div class="row">
								<div class="col s12">
									{!!Form::submit('Editar', ['class'=>'waves-effect waves-light btn right'])!!}
								</div>
							</div>
						{{Form::close()}}      
					</div>
				</div>
			</div>
		</main>
@endsection