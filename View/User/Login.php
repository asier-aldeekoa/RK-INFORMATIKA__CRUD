<?php
session_start(); // Inicia la sesión si no está iniciada
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title> L O G I N </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../View/Css/Login.css">
        <link rel="icon" type="image/x-icon" href="../../Public/Images/favicon.ico">
    </head>
    <body>
        <div id="contenedor">
            <div id="contenedorcentrado">
                <div id="login">
                    <?php if(isset($_SESSION['error_message'])): ?>
                        <div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
                        <?php unset($_SESSION['error_message']); // Limpia el mensaje de error después de mostrarlo ?>
                    <?php endif; ?>
                    <?php
                    if (isset($error_message)) {
                        echo $error_message;
                    }
                    ?>
                    <form id="loginform" action="../Controller/User/UserController.php" method="post">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" type="text" name="usuario" placeholder="Usuario">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password">
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                    <form action="../Controller/User/UserController.php" method="post">
                        <button type="submit" name="Registro">¿No tienes Cuenta? Registrate</button>
                    </form>
                </div>
                <div id="derecho">
                    <hr>
                        <div class="titulo">L O G I N</div>
                        <figcaption>Logueate porfavor</figcaption>
                    <hr>
                </div>
            </div>
        </div>
    </body>
</html> 