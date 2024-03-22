<?php
session_start(); // Inicia la sesión si no está iniciada
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title> R E G I S T R O </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../Css/Registro.css">
		<link rel="icon" type="image/x-icon" href="../../Public/Images/favicon.ico">
	</head>
	<body>
		<div id="contenedor">
			<div id="contenedorcentrado">
				<div id="registro">
					<?php if(isset($_SESSION['error_message'])): ?>
						<div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
						<?php unset($_SESSION['error_message']);?>
					<?php endif; ?>
					<?php
					if (isset($error_message)) {
						echo $error_message;
					}
					?>
					<form id="registroform" action="../../Controller/User/UserController.php" method="post">
						<label for="nombre">Usuario</label>
						<input id="nombre" type="text" name="usuario" placeholder="Usuario">
						<label for="password">Contraseña</label>
						<input id="password" type="password" placeholder="Contraseña" name="password">
						<button type="submit" title="Registrarse" name="Registrarse">Registrarse</button>
					</form>
					<form id="registroform1" action="../../index.php" method="post">
						<button type="submit" title="Volver" name="Volver"><-- Volver</button>
					</form>
				</div>
				<div id="izquierdo">
					<hr>
					<div class="titulo">R E G I S T R O</div>
					<hr>
				</div>
			</div>
		</div>
	</body>
</html>