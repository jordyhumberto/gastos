<?php
    require "conexion.php";
    $monto=0;
    $sqlG="SELECT t.t_descripcion as tipo, g.g_descripcion as nombre, g.g_monto as monto, g.g_fecha as fecha FROM t_gasto AS g INNER JOIN t_tipo AS t ON g.t_id=t.t_id";
    $resultadoG=$mysqli->query($sqlG);
    $sqlT="SELECT * FROM t_tipo";
    $resultadoT=$mysqli->query($sqlT);
    /* $sqlt="SELECT * FROM t_tipo";
    $resultadot=$$mysqli->query($sqlt);
    while ($rowt=$resultadot->fetch_array(MYSQLI_ASSOC)) {
        $t_id=$rowt['t_id'];
        $t_descripcion=$rowt['t_descripcion'];
        $sqlg="SELECT * FROM t_gasto WHERE t_id='$t_id'";
        $resultadog=$mysqli->query($sqlg);
        while ($rowg=$resultadog->fetch_array(MYSQLI_ASSOC)) {
            
        }
    } */
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
    <form action="grabar.php" method="post" autocomplete="off">
        descripcion:<br>
        <input type="text" name="nombre" id="nombre"><br>
        monto:<br>
        <input type="number" name="monto" id="monto" step="any"><br>
        <select name="tipo" id="tipo">
            <option value="">tipo de gasto</option>
            <?php   while ($rowT=$resultadoT->fetch_array(MYSQLI_ASSOC)) { ?>
                <option value="<?php echo $rowT['t_id']?>"><?php echo $rowT['t_descripcion']?></option>
            <?php }?>
        </select><br>
        <input type="submit" value="Guardar">
    </form>
    <table>
    <thead>
        <tr>
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Tipo</th>
            <th>Fecha</th>
        </tr>        
    </thead>
    <tbody>
            <?php while ($rowG=$resultadoG->fetch_array(MYSQLI_ASSOC)) {?>
                <tr>
                    <td><?php echo $rowG['nombre'];?></td>
                    <td><?php $monto=$monto+$rowG['monto'];echo $rowG['monto'];?></td>
                    <td><?php echo $rowG['tipo'];?></td>
                    <td><?php echo $rowG['fecha'];?></td>
                </tr>
            <?php }?>
    </tbody>
    </table>
    <br>
    <?php 
        echo "Gaste: ".$monto;
    ?>
</body>
</html>