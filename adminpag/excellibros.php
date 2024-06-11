<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename= libros.xls");
session_start();
if (isset($_SESSION["name"]) && $_SESSION["name"] === "admin") {
?>
<head>
    <meta charset="UTF-8">
</head>
<?php
$inc = include("../con_db.php");
if($inc) {
    $consulta="SELECT * FROM libro";
    $resultado = mysqli_query($conex,$consulta);
    if($resultado) {
        ?>
        <table>
                <tr>
                    <td><b>Isbn</b></td>
                    <td><b>Titulo</b></td>
                    <td><b>Editorial</b></td>
                    <td><b>Año publicación</b></td>
                    <td><b>Id autor</b></td>
                    <td><b>Portada Libro</b></td>
                    <td><b>Sinopsis</b></td>
                    <td><b>Idioma</b></td>
                    <td><b>Tipo</b></td>
                    <td><b>Publico</b></td>
                    <td><b>Stock</b></td>
                    <td><b>Likes</b></td>
                </tr>
                <?php
        while($row = $resultado->fetch_array()){
            $isbn=$row['isbn'];
            $titulo=$row['titulo'];
            $editorial=$row['editorial'];
            $ano_publicacion=$row['ano_publicacion'];
            $id_autor=$row['id_autor'];
            $portada_libro=$row['portada_libro'];
            $sinopsis=$row['sinopsis'];
            $idioma=$row['idioma'];
            $tipo=$row['tipo'];
            $publico=$row['publico'];
            $like = $row['num_like'];
            $disponilbe = $row['disponible']
                ?>
                <tr>
                    <td><?php echo $isbn;?></td>
                    <td><?php echo $titulo;?></td>
                    <td><?php echo $editorial;?></td>
                    <td><?php echo $ano_publicacion;?></td>
                    <td><?php echo $id_autor;?></td>
                    <td><?php echo $portada_libro;?></td>
                    <td><?php echo $sinopsis;?></td>
                    <td><?php echo $idioma;?></td>
                    <td><?php echo $tipo;?></td>
                    <td><?php echo $publico;?></td>
                    <td><?php echo $like;?></td>
                    <td><?php echo $disponible;?></td>

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
header("Location: ../error.php");}
?>