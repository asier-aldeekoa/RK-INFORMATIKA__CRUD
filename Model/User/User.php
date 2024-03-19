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
    public function Alta($Erabiltzailea, $Pasahitza) {
        try {
            $this->konektatu();
            $hashedPassword = password_hash($Pasahitza, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(username, password) VALUES (?, ?);";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("ss", $Erabiltzailea, $hashedPassword);
            $stmt->execute();
            
            if ($stmt->affected_rows == 1) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    /* Comprobar si el Usuario ya existe */
    public function usuarioExiste($username) {
        $stmt = $this->mysqli->prepare("SELECT idUser FROM users WHERE username = ?");
        // Cambié "usuario" por "username" en la consulta preparada
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $exists = $stmt->num_rows > 0;
        $stmt->close();
        return $exists;
    }
    public function getMysqli() {
        return $this->mysqli;
    }
    public function getLastInsertedUserId() {
        // Asumiendo que $mysqli es tu conexión a la base de datos
        return mysqli_insert_id($this->getMysqli());
    }
}