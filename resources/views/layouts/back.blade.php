@php
	$rutas = explode("/", $_SERVER['REQUEST_URI']);
	if(isset($rutas[3]))
	{
		$seccion = $rutas[3];
		$subseccion = str_replace('/'.$rutas[0].'/'.$rutas[1].'/'.$rutas[2].'/'.$rutas[3].'/', "", $_SERVER['REQUEST_URI']);
	}
	else
	{
		$seccion="";
		$subseccion="";
	}
@endphp
<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Panel de administraci&oacuten - @yield('title')</title>

		<link rel="icon" type="image/png" href="{{ asset('img/logos/'.$favicon->imagen) }}"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
		<link type="text/css" rel="stylesheet" href="{{ asset('css/admin.css') }}"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
	</head>

	<body>
		<!-- CABECERA -->
		<header>
			<nav class="top-nav">
				<div class="container">
					<div class="nav-wrapper">
						<a class="page-title">@yield('title')</a>
						<a class="right" href="{{ url('adm/logout') }}">Cerrar sesi&oacuten</a>
					</div>
				</div>
			</nav>

		  <!-- MENÚ -->

			<div class="container">
				<a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
			</div>
			<ul id="nav-mobile" class="side-nav fixed">
				<div class="logo">
					<a id="logo-container" href="{{ url('adm') }}" class="brand-logo">
						<img class="responsive-img" src="{{ asset('img/logos/'.$principal->imagen) }}" alt="">
					</a>
				</div>
				<li class="no-padding">

					<ul class="collapsible collapsible-accordion">

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="home") active @endif"><i class="material-icons">home</i>Home</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="destacado/edit") active @endif"><a href="{{ url('adm/home/destacado/edit') }}">Editar destacados</a></li>
									<li class="@if($subseccion=="slider/create") active @endif"><a href="{{ url('adm/home/slider/create') }}">Crear slider</a></li>
									<li class="@if($subseccion=="slider/edit") active @endif"><a href="{{ url('adm/home/slider/edit') }}">Editar slider</a></li>
									<li class="@if($subseccion=="item/edit/1") active @endif"><a href="{{ url('adm/home/item/edit/1') }}">Editar texto</a></li>
									<li class="@if($subseccion=="icono/create") active @endif"><a href="{{ url('adm/home/icono/create') }}">Crear icono</a></li>
									<li class="@if($subseccion=="icono/edit") active @endif"><a href="{{ url('adm/home/icono/edit') }}">Editar icono</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="empresa") active @endif"><i class="material-icons">work</i>Empresa</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="slider/create") active @endif"><a href="{{ url('adm/empresa/slider/create') }}">Crear slider</a></li>
									<li class="@if($subseccion=="slider/edit") active @endif"><a href="{{ url('adm/empresa/slider/edit') }}">Editar slider</a></li>
									<li class="@if($subseccion=="slider/edit/2") active @endif"><a href="{{ url('adm/empresa/item/edit/2') }}">Editar texto</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="productos") active @endif"><i class="material-icons">delete</i>Bolsas</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="categoria/create/1") active @endif"><a href="{{ url('adm/productos/categoria/create/1') }}">Crear categoria</a></li>
									<li class="@if($subseccion=="categoria/edit/1") active @endif"><a href="{{ url('adm/productos/categoria/edit/1') }}">Editar categorias</a></li>
									<li class="@if($subseccion=="producto/create/1") active @endif"><a href="{{ url('adm/productos/producto/create/1') }}">Crear producto</a></li>
									<li class="@if($subseccion=="producto/edit/1") active @endif"><a href="{{ url('adm/productos/producto/edit/1') }}">Editar productos</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="productos") active @endif"><i class="material-icons">brush</i>Limpieza</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="categoria/create/2") active @endif"><a href="{{ url('adm/productos/categoria/create/2') }}">Crear categoria</a></li>
									<li class="@if($subseccion=="categoria/edit/2") active @endif"><a href="{{ url('adm/productos/categoria/edit/2') }}">Editar categorias</a></li>
									<li class="@if($subseccion=="producto/create/2") active @endif"><a href="{{ url('adm/productos/producto/create/2') }}">Crear producto</a></li>
									<li class="@if($subseccion=="producto/edit/2") active @endif"><a href="{{ url('adm/productos/producto/edit/2') }}">Editar productos</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="calidad") active @endif"><i class="material-icons">star</i>Calidad</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="slider/create") active @endif"><a href="{{ url('adm/calidad/slider/create') }}">Crear slider</a></li>
									<li class="@if($subseccion=="slider/edit") active @endif"><a href="{{ url('adm/calidad/slider/edit') }}">Editar slider</a></li>
									<li class="@if($subseccion=="slider/edit/3") active @endif"><a href="{{ url('adm/calidad/texto/edit/1') }}">Editar texto</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="ambiente") active @endif"><i class="material-icons">local_florist</i>Medio ambiente</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="slider/create") active @endif"><a href="{{ url('adm/ambiente/slider/create') }}">Crear slider</a></li>
									<li class="@if($subseccion=="slider/edit") active @endif"><a href="{{ url('adm/ambiente/slider/edit') }}">Editar slider</a></li>
									<li class="@if($subseccion=="slider/edit/4") active @endif"><a href="{{ url('adm/ambiente/texto/edit/2') }}">Editar texto</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="catalogo") active @endif"><i class="material-icons">archive</i>Catálogo</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="catalogo/edit/1") active @endif"><a href="{{ url('adm/catalogo/descarga/edit/1') }}">Editar catálogo</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="contactos") active @endif"><i class="material-icons">event_note</i>Contacto</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="contacto/edit") active @endif"><a href="{{ url('adm/contactos/contacto/edit') }}">Editar contactos</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="logos") active @endif"><i class="material-icons">crop_original</i>Logos</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="logo/edit") active @endif"><a href="{{ url('adm/logos/logo/edit') }}">Editar logos</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="redes") active @endif"><i class="material-icons">thumb_up</i>Redes sociales</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="social/create") active @endif"><a href="{{ url('adm/redes/social/create') }}">Crear red social</a></li>
									<li class="@if($subseccion=="social/edit") active @endif"><a href="{{ url('adm/redes/social/edit') }}">Editar red social</a></li>
								</ul>
							</div>
						</li>

						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="metadatos") active @endif"><i class="material-icons">link</i>Metadatos</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="metadato/edit") active @endif"><a href="{{ url('adm/metadatos/metadato/edit') }}">Editar metadatos</a></li>
								</ul>
							</div>
						</li>
						
						<li class="bold"><a class="collapsible-header waves-effect waves-admin @if($seccion=="usuarios") active @endif"><i class="material-icons">account_box</i>Usuarios</a>
							<div class="collapsible-body">
								<ul>
									<li class="@if($subseccion=="usuario/create") active @endif"><a href="{{ url('adm/usuarios/usuario/create') }}">Crear usuario</a></li>
									<li class="@if($subseccion=="usuario/edit") active @endif"><a href="{{ url('adm/usuarios/usuario/edit') }}">Editar usuarios</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</header>

		@yield('main')

		<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
		<script>
			$(document).ready(function() {
			  $('select').material_select();
			});
		</script>

	</body>
</html>
