<?php

$servername = "rx24horasadomicilio.com";
$username = "rxhorasa_carteles";
$password = "rxHorasa_cartel3s!";
$database = "rxhorasa_carteles";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Comprobar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

?>