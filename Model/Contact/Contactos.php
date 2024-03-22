<?php
require_once '../../Model/Database/ConnectBD.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

class ContactoModelo{
    private $mysqli;
    public $Nombre;
    public $Apellido;
    public $CorreoElectronico;
    public $NumeroDeTelefono;
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
    /**
     * Con esta funcion lo que hacemos es Añadir el Contacto
     * Lo que hacemos es cuando tenemos los contactos y le damos al boton de borrar le cojemos el idContacto que tiene asignado. Y despues de eso, si le das a la opcion de borrar te lo borra de la Base De Datos
     */
    public function insertarContacto($Nombre, $Apellido, $CorreoElectronico, $NumeroDeTelefono, $idUser) {
        $sql = "INSERT INTO contactos (Nombre, Apellido, NumeroDeTelefono, CorreoElectronico, idUser) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->mysqli->prepare($sql);

        $stmt->bind_param("ssssi", $Nombre, $Apellido, $NumeroDeTelefono, $CorreoElectronico, $idUser);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Con esta funcion lo que hacemos es borrar el contacto SELECCIONADO
     * Lo que hacemos es cuando tenemos los contactos y le damos al boton de borrar le cojemos el idContacto que tiene asignado. Y despues de eso, si le das a la opcion de borrar te lo borra de la Base De Datos
     */
        public function actualizarContacto($idContacto, $nombre, $apellidos, $telefono, $correo) {
        $sql = "UPDATE contactos SET Nombre = ?, Apellido = ?, NumeroDeTelefono = ?, CorreoElectronico = ? WHERE idContacto = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $apellidos, $telefono, $correo, $idContacto);
        
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Con esta funcion lo que hacemos es borrar el contacto SELECCIONADO
     * Lo que hacemos es cuando tenemos los contactos y le damos al boton de borrar le cojemos el idContacto que tiene asignado. Y despues de eso, si le das a la opcion de borrar te lo borra de la Base De Datos
     */
    public function getMysqli() {
        return $this->mysqli;
    }
    /**
     * Con esta funcion lo que hacemos es borrar el contacto SELECCIONADO
     * Lo que hacemos es cuando tenemos los contactos y le damos al boton de borrar le cojemos el idContacto que tiene asignado. Y despues de eso, si le das a la opcion de borrar te lo borra de la Base De Datos
     */
    public function borrarContacto($idContacto) {
        $sql = "DELETE FROM contactos WHERE idContacto = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $idContacto);
    
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}