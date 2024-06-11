<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="../estilos/estiloregistro.css">
</head>
<body>
    <form id="formulario" method="post">
        <h1>Iniciar Sesión</h1>
        <input type="text" name="name" placeholder="Nombre de usuario" value="<?php if(isset($_GET["name"])){ echo base64_decode($_GET["name"]);}?>" required>
        <input type="password" name="passw" placeholder="Contraseña" value="<?php if(isset($_GET["passw"])){ echo base64_decode($_GET["passw"]);}?>" required>
       <br> <a href="registro.php">¿No tienes cuenta? registrate</a>
        <center>
        <input type="submit" name="iniciar" id="enviar">
        </center>
        <br><br>
    </form>
<script src="../javascript/ajaxiniciosesion.js"></script>
</body>
</html>