<!DOCTYPE html>
<html>
<head>
    <title>Registrar usuario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../estilos/estiloregistro.css">
</head>
<body>
    <form id="formulario" method="post">
        <h1>REGISTRO</h1>
        <input type="text" name="name" placeholder="Nombre de usuario">
        <input type="password" name="passw" placeholder="Contraseña">
        <center>
        <a href="iniciar_sesion.php">¿Tienes cuenta? Inicia Sesión</a>
        <input type="submit" name="register" id="enviar">
        </center>
        <br><br>
    </form>
        <?php
        include("phpregistrar.php");
        ?>
</body>
</html>