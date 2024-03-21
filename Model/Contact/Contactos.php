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
    public function getMysqli() {
        return $this->mysqli;
    }
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