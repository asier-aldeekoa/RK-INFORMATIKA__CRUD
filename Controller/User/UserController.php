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
    echo "Usuario Registrado";
}