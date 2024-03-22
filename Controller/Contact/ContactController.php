<?php
session_start();

include_once '../../Model/Contact/Contactos.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$ContactoModelo = new ContactoModelo();
$ContactoModelo->konektatu();
/**
 * Con eso lo que hacemos es que cuando le des al boton de AÑADIR te lleve a la pantalla correspondiente
 */
if (isset($_POST['Añadir'])) {
    header("Location: ../../View/Contact/Añadir.php");
}
/**
 * Con eso lo que hacemos es que cuando le des al boton de VOLVER te lleve a la pagina principal tambien conocida como la pagina del SELECT
 */
if (isset($_POST['Volver'])) {
    header("Location: ../../View/Contact/Select.php");
}
/**
 * Con eso lo que hacemos es que cuando le des al boton de LOGOUT te lleve al LOGIN de nuevp
 */
if (isset($_POST['logout'])) {
    header("Location: ../../index.php");
}
/**
 * Con esto lo que hacemos es hacer que la informacion que estaba en el formulario se añada a la BASE DE DATOS
 */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['AñadirC'])) {
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $CorreoElectronico = $_POST['CorreoElectronico'];
    $NumeroDeTelefono = $_POST['NumeroDeTelefono'];
    $idUser = $_SESSION['idUser'];
    
    $resultado = $ContactoModelo->insertarContacto($Nombre, $Apellido, $CorreoElectronico, $NumeroDeTelefono, $idUser);

    if($resultado) {
        $_SESSION['error_message'] = "Contacto añadido correctamente.";
        header("Location: ../../View/Contact/Select.php");
    }
}
/*
 *
 */
if(isset($_POST['actualizarContacto'])) {
    $idContacto = $_POST['idContacto1'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    
    // Suponiendo que tienes una instancia de $modeloContact previamente creada
    
    $resultado = $ContactoModelo->actualizarContacto($idContacto, $nombre, $apellidos, $telefono, $correo);
    
    if($resultado) {
        $_SESSION['error_message'] = "Contacto actualizado correctamente.";
        header("Location: ../../View/Contact/Select.php");
    }
}
/**
 * Con esto lo que hacemos es que el contacto seleccionado se Borre
 */
if(isset($_POST['idContacto'])) {
    $idContacto = $_POST['idContacto'];
    $resultado = $ContactoModelo->borrarContacto($idContacto);
    
    if($resultado) {
        $_SESSION['error_message'] = "Contacto borrado correctamente.";
        header("Location: ../../View/Contact/Select.php"); // Redirige al usuario de vuelta a la página de inicio de sesión
    } else {
        echo 'Error al borrar el contacto.';
    }
}

