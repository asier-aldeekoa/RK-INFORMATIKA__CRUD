<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../../Model/Database/ConnectBD.php';

session_start();

if (isset($_SESSION["idUser"])) {
    echo "Tu Id de Usuario es " . $_SESSION["idUser"];
    $idUser = $_SESSION["idUser"];

    class Contacto {
        public $idContacto;
        public $nombre;
        public $apellido;
        public $numeroTelefono;
        public $correoElectronico;

        function __construct($idContacto, $nombre, $apellido, $numeroTelefono, $correoElectronico) {
            $this->idContacto = $idContacto;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->numeroTelefono = $numeroTelefono;
            $this->correoElectronico = $correoElectronico;
        }
    }

    $sql = "SELECT idContacto, Nombre, Apellido, NumeroDeTelefono, CorreoElectronico FROM contactos WHERE idUser = $idUser";
    $result = $conn->query($sql);

    $contactos = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $contacto = new Contacto($row["idContacto"], $row["Nombre"], $row["Apellido"], $row["NumeroDeTelefono"], $row["CorreoElectronico"]);
            $contactos[] = $contacto;
        }
    } else {
        echo "No se encontraron contactos para este usuario.";
    }

    $conn->close();
} else {
    echo "No has iniciado sesión";
}
