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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["AñadirC"])) {
    // Verifica si el usuario ha iniciado sesión
    if (isset($_SESSION["idUser"])) {
        // Incluye el archivo que contiene la definición de la clase Contacto y la función Añadir
        require_once '../../Model/Contact/Contactos.php'; // Reemplaza 'ruta_al_archivo_con_la_definicion_de_la_clase.php' con la ruta real

        // Crea una instancia de la clase Contacto con los datos recibidos del formulario
        $modeloContact = new ContactoModelo(null, $_POST["nombre"], $_POST["apellidos"],  $_POST["correo"], $_POST["telefono"]);

        // Intenta agregar el nuevo contacto
        if ($nuevoContacto->Añadir()) {
            echo "Contacto agregado correctamente.";
        } else {
            echo "Error al agregar el contacto.";
        }
    } else {
        echo "No has iniciado sesión.";
    }
}

if (isset($_POST['logout'])) {
    header("Location: ../../index.php");
}