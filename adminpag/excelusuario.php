<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename= excelusuario.xls");
session_start();
if (isset($_SESSION["name"]) && $_SESSION["name"] === "admin") {
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
                <td><b>GMAIL</b></td>
                    <td><b>Nombre</b></td>
                    <td><b>Contraseña</b></td>
                </tr>
                <?php
        while($row = $resultado->fetch_array()){
            $correo=$row['correo'];
            $nombre=$row['nombre'];
            $passw=$row['passw'];
                ?>
                <tr>
                <td><?php echo $correo;?></td>
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
}else{header("Location: ../error.php");}
?>