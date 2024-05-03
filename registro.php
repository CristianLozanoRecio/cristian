<!DOCTYPE html>
<html>
<head>
    <title>Registrar usuario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estiloregistro.css">
</head>
<body>
    <form id="formulario" method="post">
        <h1>REGISTRO</h1>
        <input type="text" name="name" placeholder="Nombre de usuario">
        <input type="password" name="passw" placeholder="Contraseña">
        <center>
        <input type="submit" name="register" id="enviar">
        </center>
        <br><br>
    </form>
        <?php
        include("registrar.php");
        ?>
</body>
</html>