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

		<title>Topsi - @yield('title')</title>

		<link rel="icon" type="image/png" href="{{ asset('img/logos/'.$favicon->imagen) }}"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
		<script src="https://use.fontawesome.com/c3d13979f5.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
		<link type="text/css" rel="stylesheet" href="{{ asset('css/estilo.css') }}"  media="screen,projection"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>
		<header>
			<nav id="cabecera" class="hide-on-med-and-down">
				<div class="nav-wrapper container">
					<ul class="left hide-on-med-and-down">
						@foreach($redes as $red)
						<li><a target="_blank" href="{{ $red->vinculo }}"><img src="{{ asset('img/redes/'.$red->imagen) }}"></a></li>
						@endforeach
						<li><i class="fa fa-whatsapp" aria-hidden="true"></i> {{ $whatsapp->dato }}</li>
					</ul>
					<ul class="right hide-on-med-and-down">
						<li><a href="{{ url('solicitud') }}">SOLICITUD DE PRESUPUESTO</a></li>
						<li>|</li>
						<li><a href="{{ url('trabaje') }}">TRABAJE CON NOSOTROS</a></li>
						<li>|</li>
						<li><a href="{{ url('contacto') }}">CONTACTO</a></li>
						<li>
							<div id="buscador">
								{!!Form::open(['route'=>'producto.buscar', 'method'=>'POST'])!!}
									{!!Form::text('busqueda',null,['class'=>'validate', 'Placeholder'=>''])!!}
									<button><i class="material-icons">search</i></button>
								{!!Form::close()!!}
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<nav id="navegador">
				<div class="nav-wrapper container">
					<a href="#" data-activates="slideout" class="button-collapse"><i class="material-icons">menu</i></a>
					<a href="{{ url('/') }}" class="brand-logo hide-on-large-only">
						<img style="width: 100%; float: left;" src="{{ asset('img/logos/'.$principal->imagen) }}">
						<div class="clear"></div>
						<img style="width: 50%; float: left;" src="{{ asset('img/logos/desechin-logo-chico.jpg') }}">
						<img style="width: 50%; float: left;" src="{{ asset('img/logos/peny-logo-chico.jpg') }}">
					</a>
					<a href="{{ url('/') }}" class="brand-logo hide-on-med-and-down">
						<img  src="{{ asset('img/logos/'.$principal->imagen) }}">
					</a>
					<div class="hide-on-med-and-down" style="float: right; position: relative;width: 140px;height: 130px; margin-left: 10px;">
						<img style="position: absolute;top: 50%; left: 0px; max-width: 50%; transform: translateY(-50%);" src="{{ asset('img/logos/desechin-logo-chico.jpg') }}">
						<img style="position: absolute;top: 50%; right: 0px; max-width: 50%; transform: translateY(-50%);" src="{{ asset('img/logos/peny-logo-chico.jpg') }}">
					</div>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="{{ url('empresa') }}">EMPRESA</a></li>
						<li><a href="{{ url('productos/1') }}">BOLSAS</a></li>
						<li><a href="{{ url('productos/2') }}">ARTÍCULOS DE LIMPIEZA</a></li>
						<li><a href="{{ url('calidad') }}">CALIDAD</a></li>
						<li><a href="{{ url('ambiente') }}">MEDIO AMBIENTE</a></li>
						<li><a href="{{ url('catalogo') }}">CATÁLOGO</a></li>
					</ul>
					<ul id="slideout" class="side-nav">
						<li><a href="{{ url('/') }}">INICIO</a></li>
						<li><a href="{{ url('empresa') }}">EMPRESA</a></li>
						<li><a href="{{ url('productos/1') }}">BOLSAS</a></li>
						<li><a href="{{ url('productos/2') }}">ARTÍCULOS DE LIMPIEZA</a></li>
						<li><a href="{{ url('calidad') }}">CALIDAD</a></li>
						<li><a href="{{ url('ambiente') }}">MEDIO AMBIENTE</a></li>
						<li><a href="{{ url('catalogo') }}">CATÁLOGO</a></li>
						<li><a href="{{ url('solicitud') }}">SOLICITUD DE PRESUPUESTO</a></li>
						<li><a href="{{ url('trabaje') }}">TRABAJE CON NOSOTROS</a></li>
						<li><a href="{{ url('contacto') }}">CONTACTO</a></li>
					</ul>
				</div>
			</nav>
		</header>

		@yield('main')

		<footer class="page-footer">
			<!--<img  src="{{ asset('img/logos/'.$footer->imagen) }}" id="logo-footer">-->
			<div class="container">
				<div class="row">
					<div class="col l4 s12">
						<h5 class="white-text">SITEMAP</h5>
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('calidad') }}">Calidad</a></li>
							<li><a href="{{ url('empresa') }}">Empresa</a></li>
							<li><a href="{{ url('ambiente') }}">Medio ambiente</a></li>
							<li><a href="{{ url('productos/1') }}">Bolsas</a></li>
							<li><a href="{{ url('catalogo') }}">Catálogo</a></li>
							<li><a href="{{ url('productos/2') }}">Artículos de limpieza</a></li>
							
							<li><a href="{{ url('contacto') }}">Contacto</a></li>
						</ul>
					</div>
					<div class="col l4 s12 pt15 pb15">
						<img  src="{{ asset('img/logos/'.$footer->imagen) }}" class="responsive-img">
					</div>
					<div class="col l4 s12">
						<h5 class="white-text">CONTACTO</h5>
						<table>
							<tbody>
								<tr>
									<td ><i class="material-icons">location_on</i></td>
									<td>{{ $direccion->dato }}</td>
								</tr>
								<tr>
									<td><i class="material-icons">phone</i></td>
									<td>{{ $telefono->dato }}</td>
								</tr>
								<tr>
									<td><i class="material-icons">mail</i></td>
									<td><a href="{{ 'mailto:'.$email->dato }}">{{ $email->dato }}</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					© 2018
					<a class="grey-text text-lighten-4 right" href="osole.es">by Osole</a>
				</div>
			</div>
        </footer>
        <script type="text/javascript">
		    window.onload = function() {
		        var $recaptcha = document.querySelector('#g-recaptcha-response');

		        if($recaptcha) {
		            $recaptcha.setAttribute("required", "required");
		        }
		    };
			$('.carousel.carousel-slider').carousel({fullWidth: true});
			$(".button-collapse").sideNav();
		</script>
		<!--Start of Tawk.to Script-->
		<script type="text/javascript">
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			(function(){
				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/5bd1b27319b86b5920c0dfbe/default';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
			})();
		</script>
		<!--End of Tawk.to Script-->
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127342348-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-127342348-1');
		</script>
	</body>
</html>
