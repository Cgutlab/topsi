@extends('layouts.back')

@section('title','Crear producto')
 
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

						{!!Form::open(['route'=>'producto.store', 'method'=>'POST', 'files' => true])!!}
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
						          	<textarea name="detalles" id="detalles" class="materialize-textarea"></textarea>
						          	<label for="detalles">Detalles</label>
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
								<div class="file-field input-field col s6">
									<div class="btn">
									    <span>Imagen</span>
									    {!! Form::file('imagen') !!}
									</div>
									<div class="file-path-wrapper">
									    {!! Form::text('',null, ['class'=>'file-path validate']) !!}
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col s12">
									{!!Form::submit('Crear', ['class'=>'waves-effect waves-light btn right'])!!}
								</div>
							</div>
						{!!Form::close()!!}         
					</div>
				</div>
			</div>
		</main>
@endsection