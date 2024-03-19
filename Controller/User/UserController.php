<?php
session_start();

include_once '../../Model/User/User.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$modeloUsuario = new UsuarioModelo();
$modeloUsuario->konektatu();

if (isset($_POST['Ingresar'])) {
    $userId = $modeloUsuario->balioztatzea($_POST['usuario'], $_POST['password']);
    if ($userId !== null) {
        $_SESSION['idUser'] = $userId;
        if (isset($_SESSION['idUser'])) {
            echo"User LOGEADO";
            header("Location: ../../View/Contact/Añadir.php");
        }
    } else {
        echo "Saiatu berriro, erabiltzailea edo pasahitza ez dituzu ondo sartu.";
        exit();
    }
}

if (isset($_POST['Registro'])) {
    header("Location: ../../View/User/Registro.php");
    exit();
}

if (isset($_POST["Registrarse"])) {
    if (empty($_POST["usuario"]) || empty($_POST["password"])) {
        // Campos vacíos, muestra un mensaje de error
        echo '<h4 class="error-message1">¡Completa los campos!</h4>';
    } else {
        try {
            // Comprobar si el usuario ya existe
            if ($modeloUsuario->usuarioExiste($_POST["usuario"])) {
                echo '<h4 class="error-message2">¡El usuario ya existe!</h4>';
            } else {
                $modeloUsuario->Alta($_POST["usuario"], $_POST["password"]);
                // Establece la sesión para el nuevo usuario registrado
                $_SESSION['idUser'] = $modeloUsuario->getLastInsertedUserId();
                echo '<h4 style="color: green;">Erabiltzailea sartu da</h4>';
            }
        } catch (Exception $ex) {
            echo '<h4 class="error-message3">Error durante el registro</h4>';
        }
    }
}