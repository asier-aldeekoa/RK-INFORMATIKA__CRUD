<!-- Formulario De Añadir Contacto -->


<?php
session_start(); // Asegúrate de iniciar la sesión en todas las páginas donde necesites acceder a la sesión

// Comprueba si la variable de sesión está definida antes de usarla para evitar errores
if (isset($_SESSION["idUser"])) {
    echo "Tu Id de Usuario es " . $_SESSION["idUser"];
} else {
    echo "No has iniciado sesión";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Añadir Contacto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../../Public/Images/favicon.ico">
</head>
<body>
    <div class="container">
        <h1>Formulario de Añadir Contacto</h1>
        <form action="../../Controller/Contact/ContactController.php" method="POST" id="contactoForm">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Número de Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="9" pattern="[0-9]{9}" title="Por favor, ingrese solo números de 9 dígitos">
            </div>
            <button type="submit" class="btn btn-primary">Añadir Contacto</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Js/Script.js"></script>
</body>
</html>
