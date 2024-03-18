<?php
session_start();

include_once '../Model/Database/Database.php';
include_once '../Model/contactModel.php';
include_once "../View/User/Registro.php";
include_once "../View/User/Login.php";


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['Registro'])) {
    header("Location: ../../View/User/Registro.php");
    exit();
}

if (isset($_POST['Ingresar'])) {
    echo"Usuario Logueado";
    header("Location: ../../View/Contact/Select.php");
    exit();
}

if (isset($_POST["Registrarse"])) {
    echo "Usuario Registrado";
}