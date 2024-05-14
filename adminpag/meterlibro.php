<?php
session_start();
include("../con_db.php");
$tipos_permitido = ["arte", "ciencia", "ficcion", "historia", "deporte","aventura","religion", "medicina"];
$publico_permitido = ["infantil","adulto"];
$idioma_permitido = ["castellano","inglés","francés"];
if(isset($_POST["datos"])) {
    if (
        strlen($_POST["isbn"]) >= 1 && 
        in_array(strtolower($_POST["tipo"]), $tipos_permitido) && 
        in_array(strtolower($_POST["idioma"]), $idioma_permitido) && 
        in_array(strtolower($_POST["publico"]), $publico_permitido)
    ) {        
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
        $consulta = "INSERT INTO libro(isbn, titulo, editorial, ano_publicacion, autor, portada_libro, sinopsis, idioma, tipo, publico) VALUES ('$isbn', '$titulo', '$editorial', '$ano_publicacion', '$autor', '$destino', '$sinopsis', '$idioma', '$tipo' ,'$publico')";
         $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                echo '<h3>Exito</h3>';
            } else {
                echo '<h3>Error en meter datos</h3>';
            }
        } else {
        echo '<h3>Completa correctamente los campos</h3>';
    }
}
?>
