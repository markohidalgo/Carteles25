<?php
include 'conecta.php';

// Consultar el valor de la base de datos
$sql = "select imagen FROM carteles WHERE tv = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$valor = $row['imagen'];

// Devolver el valor en formato JSON
echo json_encode(['valor' => $valor]);

// Cerrar la conexión
mysqli_close($conn);
?>

