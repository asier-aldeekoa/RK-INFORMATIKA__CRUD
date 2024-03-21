<?php
session_start();

include_once '../../Model/Contact/Contactos.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$modeloContact = new ContactoModelo();
$modeloContact->konektatu();



if (isset($_POST['Añadir'])) {
    header("Location: ../../View/Contact/Añadir.php");
}


if (isset($_POST['logout'])) {
    header("Location: ../../index.php");
}

if(isset($_POST['idContacto'])) {
    $idContacto = $_POST['idContacto'];
    $resultado = $modeloContact->borrarContacto($idContacto);
    
    if($resultado) {
        echo 'Contacto borrado correctamente.';
    } else {
        echo 'Error al borrar el contacto.';
    }
}

