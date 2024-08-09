<?php
include './code/conecta.php';

// Consultar el valor inicial de la base de datos
$sql = "SELECT imagen FROM carteles WHERE tv = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$valor_inicial = $row['imagen'];

// Cerrar la conexión test
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css">
    <script>
        let valorAnterior = <?php echo json_encode($valor_inicial); ?>;
        function verificarCambio() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', './code/get_value.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    const response = JSON.parse(xhr.responseText);
                    const valorActual = response.valor;
                    if (valorActual !== valorAnterior) {
                        location.reload(); 
                    } 
                }
            };
            xhr.send();
        }
        // Verificar cambios cada 5 segundos
        setInterval(verificarCambio, 5000);
    </script>
</head>
<body>
    <div class="continer">
        
        <img src="./assets/image/<?php echo $valor_inicial; ?>" alt="">
    </div>
</body>
</html>