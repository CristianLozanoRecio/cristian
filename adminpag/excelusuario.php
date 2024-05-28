<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename= excelusuario.xls");

?>
<head>
    <meta charset="UTF-8">
</head>
<?php
$inc = include("../con_db.php");
if($inc) {
    $consulta="SELECT * FROM usuario";
    $resultado = mysqli_query($conex,$consulta);
    if($resultado) {
        ?>
        <table>
                <tr>
                    <td><b>Nombre</b></td>
                    <td><b>Contraseña</b></td>
                </tr>
                <?php
        while($row = $resultado->fetch_array()){
            $nombre=$row['nombre'];
            $passw=$row['passw'];
                ?>
                <tr>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $passw;?></td>

                </tr>
                <?php
                        }
                ?>
            </table>
            <?php
    }
}
mysqli_close($conex);
?>