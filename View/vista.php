<!-- FORMULARIO DE REGISTRO -->
<html lang="es">
	<head>
		<title>Registro</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="../View/Css/Registro.css">
		<link rel="icon" type="image/x-icon" href="../Public/Images/Logo.jpg">
		<meta charset="UTF-8">
	</head>
	<body>
		<div class="container">
			<div class="contenedor-registro">
				<center><h2>Formulario De Registro</h2></center>
				<form class="formulario-registro" action="../Controller/User/UserController.php" method="POST">
					<div class="form-group">
						<input type="text" name="usuario" class="form-control" placeholder="Usuario">
					</div>
					<div class="form-group">
						<input type="password" name="contraseña" class="form-control" placeholder="Contraseña">
					</div>
					<div class="row">
						<div class="col-6">
							<button type="submit" name="Registrar" class="btn btn-primary btn-block">Registrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
zz</html>
