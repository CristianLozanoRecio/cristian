<?php
session_start();
include("../con_db.php");

if(isset($_POST["datos"])) {
    if(strlen($_POST["isbn"]) >= 1){
        $isbn = trim($_POST["isbn"]);
        $autor = trim($_POST["autor"]);
        $titulo = trim($_POST["titulo"]);
        $nombre_archivo = str_replace(' ', '_', $_FILES['portada_libro']['name']);
        $archivo = $_FILES['portada_libro']['tmp_name'];
        $destino = "../subidos/" . $nombre_archivo;
        move_uploaded_file($archivo,$destino);
        $sinopsis = trim($_POST["sinopsis"]);
        $editorial = trim($_POST["editorial"]);
        $ano_publicacion = trim($_POST["ano_publicacion"]);
        $consulta = "INSERT INTO libro(isbn, titulo, editorial, ano_publicacion, autor, portada_libro, sinopsis) VALUES ('$isbn', '$titulo', '$editorial', '$ano_publicacion', '$autor', '$destino', '$sinopsis')";
         $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                echo '<h3>Exito</h3>';
            } else {
                echo '<h3>Error en meter datos</h3>';
            }
        } else {
        echo '<h3>Completa el ISBN</h3>';
    }
}
?>
