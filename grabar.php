<?php
    require "conexion.php";
    $g_descripcion=$_POST['nombre'];
    $g_monto=$_POST['monto'];
    $t_tipo=$_POST['tipo'];
    $g_fecha=date("Y-m-d");
    $sqlG="INSERT INTO t_gasto(t_id, g_descripcion, g_monto, g_fecha) VALUES ('$t_tipo','$g_descripcion','$g_monto','$g_fecha')";
    $resultadoG=$mysqli->query($sqlG);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gastos</title>
</head>
<body>
    <?php   if ($resultadoG) {
        echo "<p>bien</p>";
        echo "<a href='index.php'>volver</a>";
    }else {
        echo "<p>mal</p>";
        echo "<a href='index.php'>volver</a>";
    } ?>
</body>
</html>