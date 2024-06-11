<?php
session_start();?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="../estilos/estiloregistro.css">
</head>
<body>
    <form id="formulario" method="post">
        <h1>Registrarse</h1>
        <input type="email" name="correo" placeholder="Gmail" required>
        <input type="text" name="name" minlength="4" placeholder="Nombre de usuario" required>
        <input type="password" name="passw" minlength="6" placeholder="Contraseña" required>
        <center>
        <input type="submit" name="iniciar" id="enviar">
        </center>
        <br><br>
    </form>
    <script src="../javascript/ajaxconfirmar.js"></script>
</body>
</html>