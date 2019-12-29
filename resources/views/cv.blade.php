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
		<h3>Solicitud de presupuesto</h3> 

		<p>Enviado desde la web </p>

		<br>
		<br>

		<h3>Datos del contacto</h3>

		<ul>
			<li><strong>Nombre:</strong> {{$nombre}}</li>
			<li><strong>Apellido:</strong> {{$apellido}}</li>
			<li><strong>Telefono:</strong> {{$telefono}}</li>
			<li><strong>Email:</strong> {{$email}}</li>
			<li><strong>Nº DNI:</strong> {{$documento}}</li>
			<li><strong>Domicilio:</strong> {{$domicilio}}</li>
		</ul>
	</body>
</html>