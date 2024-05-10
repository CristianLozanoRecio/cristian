<?php
session_start();
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
<form id="formulario"method="POST">
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
                <input type="number" id="ano_publicación" name="ano_publicación">
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
        <label for="sinopsis">Sinopsis: </label>
        <textarea class="cuadrotext"></textarea>
</div>

</form>
</body>
</html>