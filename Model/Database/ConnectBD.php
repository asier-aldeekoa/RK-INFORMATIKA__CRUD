<?php
    /**
     * Con esta funcion lo que hacemos es poder conectarnos a la Base De Datos
     * Aqui lo que tenemos es la siguiente INFORMACION
     * DB_HOST-->El nombre del HOST
     * DB_USER-->El nombre del USUARIO
     * DB_PASSWORD-->LA contraseña del USUARIO, si es root no tiene
     * DB_NAME-->El nombre de la Base De Datos
     */
?>
<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'crud');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }