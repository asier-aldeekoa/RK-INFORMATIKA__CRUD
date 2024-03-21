<?php
require_once '../../Model/Database/ConnectBD.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);
class ContactoModelo{
    private $mysqli;
    /**
 * Con esta funcion lo que hacemos es poder conectarnos a la Base De Datos
 * Aqui no salen ni el "Nombre Del Host","Nombre De Usuario","Nombre De Base De Datos" y "Contraseña" porque estan definidos en otro fichero
 */
public function konektatu(){
    try {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->mysqli->connect_error) {
            die("Error de conexión: " . $this->mysqli->connect_error);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
    public function Añadir() {
        global $conn; // Se asume que $conn es tu conexión a la base de datos
        // Se obtiene el idUser de la sesión
        $erabID = $_SESSION["idUser"];
        // Se obtienen los datos del contacto a añadir
        $Izena = $this->Nombre;
        $Abizena = $this->Apellido;
        $Telefonoa = $this->NumeroDeTelefono;
        $CorreoElectronico = $this->CorreoElectronico;
        // Verificar si ya existe un contacto con los mismos datos para este usuario
        $checkDuplicate = $conn->prepare("SELECT COUNT(*) FROM `contactos` WHERE `Nombre` = ? AND `Apellido` = ? AND `NumeroDeTelefono` = ? AND `CorreoElectronico` = ? AND `idUser` = ?");
        $checkDuplicate->bind_param("sssss", $Izena, $Abizena, $Telefonoa, $CorreoElectronico, $erabID);
        $checkDuplicate->execute();
        $checkDuplicate->bind_result($count);
        $checkDuplicate->fetch();
        $checkDuplicate->close();
        
        if ($count > 0) {
            return false; // El contacto ya existe para este usuario
        } else {
            // Insertar el nuevo contacto
            $sql = $conn->prepare("INSERT INTO `contactos`(`Nombre`, `Apellido`, `NumeroDeTelefono`, `CorreoElectronico`, `idUser`) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("sssss", $Izena, $Abizena, $Telefonoa, $CorreoElectronico, $erabID);
            $sql->execute();
            // Comprobar si la inserción fue exitosa
            return ($sql->affected_rows == 1);
        }
    }
}