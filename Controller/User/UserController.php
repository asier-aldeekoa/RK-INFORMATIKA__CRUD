<?php
if (isset($_POST['Volver'])) {
    header("Location: http://$_SERVER[HTTP_HOST]/View/User/Login.php");
    exit();
}

// Luego, el resto de tu código continua...
include_once '../Model/Database/Database.php';
include_once '../Model/contactModel.php';
include_once "../View/User/Registro.php";
include_once "../View/User/Login.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['Registro'])) {
    header("Location: http://$_SERVER[HTTP_HOST]/View/User/Registro.php");
    exit();
}
?>
