<?php
require_once '../../Model/Database/ConnectBD.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);
class UsuarioModelo{
    private $mysqli;
/**
 * Con esta funcion lo que hacemos es poder conectarnos a la Base De Datos
 * Aqui  salen ni el "Nombre Del Host","Nombre De Usuario","Nombre De Base De Datos" y "Contraseña" porque estan definidos en otro fichero
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
 * Con esta funcion lo que hacemos es poder comprobar el Login
 * Lo que hacemos es buscar si el usuario que hemos metido existe en la base de datos y luego si la contraseña que hemos metido despues de deshashear si es igual que la que hemos puesto
 */
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
            return null;
        }
    }
/**
 * Con esta funcion lo que hacemos es poder comprobar es el Registro
 * Aqui lo que hacemos es meter un usuario y contraseña y ello lo que hace es añadirlo a la base de datos HASHEANDO la contaseña
 */
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
/**
 * Con esta funcion lo que hacemos es poder comprobar si el usuario que hemos añadido en el Registro existe
 * Esto lo que hace es antes de que el usuario se añada a la BD mira si existe uno con el mismo nombre de usuario
 * Y si ya existe no te deja añadirlo a la Base de Datos
 */
    public function usuarioExiste($username) {
        $stmt = $this->mysqli->prepare("SELECT idUser FROM users WHERE username = ?");
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
/**
 * Con esta funcion lo que hacemos es comprobar cual es la ultima idUser que esta en la BD antes de añadir
 */
    public function getLastInsertedUserId() {
        return mysqli_insert_id($this->getMysqli());
    }
}