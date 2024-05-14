<?php
include("meterlibro.php");
if (isset($_SESSION["name"]) && $_SESSION["name"] === "admin") {
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>MENÚ PÁGINA</title>
<link rel="stylesheet" href="../estilos/estiloformadmin.css"/>
</head>
<body>
<h1>INSERTAR DATOS</h1>
<form id="formulario"method="POST" enctype="multipart/form-data">
    <div class="contenedorform">
        <div class="row">
            <div class="input">
                <label for="titulo">Título: </label>
                <input type="text" id="titulo" name="titulo">
            </div>
            <div class="input">
                <label for="isbn">ISBN: </label>
                <input type="number" id="isbn" name="isbn" required>
            </div>
        </div>
        <div class="row">
            <div class="input">
                <label for="editorial">Editorial: </label>
                <input type="text" id="editorial" name="editorial">
            </div>
            <div class="input">
                <label for="ano_publicacion">Año publicación: </label>
                <input type="number" id="ano_publicacion" name="ano_publicacion">
            </div>
        </div>
        <div class="row">
            <div class="input">
                <label for="autor">Autor: </label>
                <input type="text" id="autor" name="autor">
            </div>
            <div class="input">
                <label for="portada_libro">Portada del libro: </label>
                <input type="file" id="portada_libro" name="portada_libro" accept="image/*">
            </div>
        </div>
        <div class="row">
            <div class="input">
                <label for="idioma">Idioma: </label>
                <input type="text" id="idioma" name="idioma">
            </div>
            <div class="input">
                <label for="tipo">Tipo: </label>
                <input type="text" id="tipo" name="tipo">
            </div>
        </div>
        <label for="publico">Publico: </label>
        <input type="text" id="publico" name="publico">
        <label for="sinopsis">Sinopsis: </label>
        <textarea class="cuadrotext" name="sinopsis"></textarea>
        <center>
        <input type="submit" name="datos" id="enviar">
        </center>
</div>
</form>
<?php
}
else{
    echo "ERROR, NO TIENES PERMISOS";
}
        ?>
</body>
</html>