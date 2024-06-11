<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename= autor.xls");
session_start();
if (isset($_SESSION["name"]) && $_SESSION["name"] === "admin") {
?>
<head>
<meta charset="UTF-8">
</head>
<?php
$inc = include("../con_db.php");
if($inc) {
    $consulta="SELECT * FROM autor";
    $resultado = mysqli_query($conex,$consulta);
    if($resultado) {
        ?>
        <table>
                <tr>
                    <td><b>Id autor</b></td>
                    <td><b>Nombre</b></td>
                    <td><b>Biografia</b></td>
                </tr>
                <?php
        while($row = $resultado->fetch_array()){
            $nombre=$row['nombre'];
            $id_autor=$row['id_autor'];
            $biografia=$row['biografia'];
                ?>
                <tr>
                    <td><?php echo $id_autor;?></td>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $biografia;?></td>
                </tr>
                <?php
                        }
                ?>
            </table>
            <?php
    }
}
mysqli_close($conex);
}else{
    header("Location: ../error.php");
}
?>