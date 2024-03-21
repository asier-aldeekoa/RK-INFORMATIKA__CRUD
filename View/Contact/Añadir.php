<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Añadir Contacto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../../Public/Images/favicon.ico">
    <style>
        /* Estilo adicional para limitar el ancho del contenedor */
        .custom-container {
            max-width: 400px; /* Cambia este valor según tu preferencia */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="custom-container">
            <h1 class="text-center mb-4">Formulario de Añadir Contacto</h1>
            <form action="../../Controller/Contact/ContactController.php" method="POST" id="contactoForm">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Número de Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="9" pattern="[0-9]{9}" placeholder="Número de Teléfono">
                </div>
                <center><button type="submit" name="AñadirC" class="btn btn-primary">Añadir Contacto</button></center>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Js/Script.js"></script>
</body>
</html>
