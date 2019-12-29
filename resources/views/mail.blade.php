<!DOCTYPE html>

<head>
	<style type="text/css">
		body
		{
			font-family: 'arial';
		}
	</style>
</head>
<html>

	<body>

		<h2>Topsi</h2>
		<h3>Contacto</h3> 

		<p>Enviado desde la web </p>

		<br>
		<br>

		<h3>Datos del contacto</h3>

		<ul>
			<li><strong>Nombre:</strong> {{$nombre}}</li>
			<li><strong>Empresa:</strong> {{$empresa}}</li>
			<li><strong>Telefono:</strong> {{$telefono}}</li>
			<li><strong>Email:</strong> {{$email}}</li>
		</ul>
		<br>
		<br>
		<h4>Mensaje:</h4>
		<p>{{$mensaje}}</p>
	</body>
</html>