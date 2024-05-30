<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../estilos/estiloregistro.css">
</head>
<body>
    <form id="formulario" method="post">
        <h1>Iniciar Sesión</h1>
        <input type="text" name="name" placeholder="Nombre de usuario" value="<?php if(isset($_GET["name"])){ echo base64_decode($_GET["name"]);}?>">
        <input type="password" name="passw" placeholder="Contraseña" value="<?php if(isset($_GET["passw"])){ echo base64_decode($_GET["passw"]);}?>">
        <center>
        <input type="submit" name="iniciar" id="enviar">
        </center>
        <br><br>
    </form>
        <?php
        include("phpiniciosesion.php");
        ?>
</body>
</html>