<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title> Formulario de Acceso </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../View/Css/Login.css">
	</head>
	<body>
		<div id="contenedor">
			<div id="contenedorcentrado">
				<div id="login">
					<form id="loginform" action="../Controller/User/UserController.php" method="post">
						<label for="usuario">Usuario</label>
						<input id="usuario" type="text" name="usuario" placeholder="Usuario" required>
						<label for="password">Contraseña</label>
						<input id="password" type="password" placeholder="Contraseña" name="password" required>
						<button type="submit" title="Ingresar" name="Ingresar">Login</button>
					</form>
					<form action="../Controller/User/UserController.php" method="post">
						<button type="submit" name="Registro">¿No tienes Cuenta? Registrate</button>
					</form>
				</div>
				<div id="derecho">
					<hr>
					<div class="titulo">Login</div>
					<hr>
				</div>
			</div>
		</div>
	</body>
</html>