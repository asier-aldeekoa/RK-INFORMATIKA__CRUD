<?php

require_once '../../Model/Database/ConnectBD.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);
class UsuarioModelo{
    private $mysqli;
    /* Conexion a la Base De Datos */
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
    public function balioztatzea($user, $pass ) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $consultaprep = $this->mysqli->prepare($sql);
        $consultaprep->bind_param("s", $user);
        $consultaprep->execute();
        $result = $consultaprep->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $storedHash = $row['password'];
            if (password_verify($pass, $storedHash)) {
                return $row['idUser'];
            } else {
                return null;
            }
        } else {
            return null; // Cambiado de FALSE a NULL
        }
    }
    public function getMysqli() {
        return $this->mysqli;
    }
}