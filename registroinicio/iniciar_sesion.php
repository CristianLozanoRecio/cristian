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
        <input type="text" name="name" placeholder="Nombre de usuario">
        <input type="password" name="passw" placeholder="Contraseña">
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