<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../Css/Registro.css">
	</head>
	<body>
		<div id="contenedor">
			<div id="contenedorcentrado">
				<div id="registro">
					<form id="registroform" action="../Controller/User/UserController.php" method="post">
						<label for="nombre">Usuario</label>
						<input id="nombre" type="text" name="usuario" placeholder="Usuario" required>
						<label for="password">Contraseña</label>
						<input id="password" type="password" placeholder="Contraseña" name="password" required>
						<button type="submit" title="Registrarse" name="Registrarse">Registrarse</button>
					</form>
				</div>
				<div id="izquierdo">
					<hr>
					<div class="titulo">Registro</div>
					<hr>
				</div>
			</div>
		</div>
	</body>
</html>