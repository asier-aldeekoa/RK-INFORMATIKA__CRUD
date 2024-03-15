/* FORMULARIO DE REGISTRO */

<!doctype html>
<html lang="es">
	<head>
		<title>Registro</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../View/Css/Registro.css">
		<link rel="icon" type="image/x-icon" href="../Public/Images/Logo.jpg">
		<meta charset="UTF-8">
	</head>
	<body>
		<div class="contenedor-registro">
			<h2>Registro</h2>
			<form class="formulario-registro" action="../Controller/User/UserController.php" method="POST">
				<div class="grupo-formulario">
					<input type="text" name="usuario" class="form-control" placeholder="Usuario">
				</div>
				<div class="grupo-formulario">
					<input type="password" name="contraseña" class="form-control" placeholder="Contraseña">
				</div>
				<div class="row">
					<div class="col-6">
						<button type="submit" name="Registrar" class="btn btn-primary btn-block">Registrar</button>
					</div>
				</div>
			</form>
			<div class="col-6">
				<form class="formulario-volver" action="../index.php" method="POST">
					<button type="submit" name="Volver" class="btn btn-secondary btn-block">Volver</button>
				</form>
			</div>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</html>

/* FORMULARIO DE AÑADIR CONTACTO */

<!doctype html>
<html lang="es">
	<head>
		<title>Añadir Contacto</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../View/Css/Añadir.css">
		<link rel="icon" type="image/x-icon" href="../Public/Images/Logo.jpg">
		<meta charset="UTF-8">
	</head>
	<body>
		<div class="contenedor-agregar-contacto">
			<h2>Añadir Contacto</h2>
			<form class="formulario-agregar-contacto" action="contactController.php" method="POST">
				<input type="hidden" name="idUsuario" value="<?php echo isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : ''; ?>">
				<input type="text" name="nombre" placeholder="Nombre">
				<input type="text" name="apellido" placeholder="Apellido">
				<input type="tel" name="telefono" placeholder="Número de Teléfono">
				<input type="email" name="correo" placeholder="Correo Electrónico">
				<div class="contenedor-botones">
					<button type="submit" name="AgregarContacto">Agregar Contacto</button>
				</div>
			</form>
			<form class="formulario-agregar-contacto" action="contactController.php" method="POST">
				<div class="contenedor-botones">
					<button type="submit" name="Volver">Volver</button>
				</div>
			</form>
		</div>
	</body>
</html>