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
        header("Location: ../../View/Contact/Select.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Saiatu berriro, erabiltzailea edo pasahitza ez dituzu ondo sartu.";
        header("Location: ../../index.php"); // Redirige al usuario de vuelta a la página de inicio de sesión
        exit();
    }
}
if (isset($_POST['Registro'])) {
    header("Location: ../../View/User/Registro.php");
    exit();
}

if (isset($_POST["Registrarse"])) {
    if (empty($_POST["usuario"]) || empty($_POST["password"])) {
        $_SESSION['error_message'] = "¡Completa los campos!";
        header("Location: ../../View/User/Registro.php");
    } else {
        try {
            if ($modeloUsuario->usuarioExiste($_POST["usuario"])) {
                $_SESSION['error_message'] = "¡El usuario ya existe!";
                header("Location: ../../View/User/Registro.php");
            } else {
                $modeloUsuario->Alta($_POST["usuario"], $_POST["password"]);
                $_SESSION['idUser'] = $modeloUsuario->getLastInsertedUserId();
                $_SESSION['error_message'] = "Erabiltzailea sartu da";
                header("Location: ../../View/Contact/Select.php");
            }
        } catch (Exception $ex) {
            echo 'Error durante el registro';
        }
    }
}