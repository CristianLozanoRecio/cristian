<?php
include("../con_db.php");
if(isset($_POST["datos"])) {
    if (strlen($_POST["isbn"]) >= 1 ) {        
        $isbn = trim($_POST["isbn"]);
        $autor = trim($_POST["autor"]);
        $titulo = trim($_POST["titulo"]);
        $nombre_archivo = str_replace(' ', '_', $_FILES['portada_libro']['name']);
        $archivo = $_FILES['portada_libro']['tmp_name'];
        $destino = "../subidos/" . $nombre_archivo;
        move_uploaded_file($archivo,$destino);
        $sinopsis = trim($_POST["sinopsis"]);
        $editorial = trim($_POST["editorial"]);
        $tipo = trim($_POST["tipo"]);
        $idioma = trim($_POST["idioma"]);
        $publico = trim($_POST["publico"]);
        $ano_publicacion = trim($_POST["ano_publicacion"]);
        $consulta = "INSERT INTO libro(isbn, titulo, editorial, ano_publicacion, id_autor, portada_libro, sinopsis, idioma, tipo, publico) VALUES ('$isbn', '$titulo', '$editorial', '$ano_publicacion', '$autor', '$destino', '$sinopsis', '$idioma', '$tipo' ,'$publico')";
         $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                echo '<script>alert("EXITO");</script>';
            } else {
                echo '<script>alert("ERROR EN METER DATOS");</script>';
            }
        } else {
        echo '<script>alert("COMPLETA CORRECTAMENTE LOS DATOS");</script>';
    }
}
?>
