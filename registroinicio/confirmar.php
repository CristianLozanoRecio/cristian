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
        <input type="number" name="confirmar" placeholder="NÚMERO DE 9 DÍGITOS ENVIADO AL CORREO" >
        <center>
        <input type="submit" name="iniciar" id="enviar">
        </center>
        <br><br>
    </form>
    <?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["confirmar"])) {
        if ($_POST["confirmar"] == $_SESSION["numconfirmar"]) {
            $_SESSION['intentos'] = 0;
            echo '<script src="../javascript/completarregistro.js"></script>';
        } else {
            $_SESSION['intentos'] += 1;
            if ($_SESSION['intentos'] >= 5) {
                echo '<script>window.location.href = "registro.php";</script>';
            } else {
                echo '<script>
                    Swal.fire({
                        title: "Error",
                        text: "No es correcto. Intento ' . $_SESSION['intentos'] . ' de 5",
                        icon: "error"
                    });
                </script>';
            }
        }
    }
}
?>
</body>
</html>