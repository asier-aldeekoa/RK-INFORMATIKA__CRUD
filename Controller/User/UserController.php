<?php
include_once '../Model/Database/Database.php';
include_once '../Model/contactModel.php';
include_once "../View/User/Registro.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['Register'])) {
    header("Location: /View/User/Registro.php");
    exit();
}