<?php
session_start();

include_once '../../Model/User/User.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$modeloUsuario = new UsuarioModelo();
$modeloUsuario->konektatu();



if (isset($_POST['Añadir'])) {
    header("Location: ../../View/Contact/Añadir.php");
}

if (isset($_POST['logout'])) {
    header("Location: ../../View/User/Login.php");
}
