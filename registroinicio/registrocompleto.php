<?php
session_start();
include("../con_db.php");
$mensaje = "";
    if(strlen($_POST["name"]) >= 1 && strlen($_POST["passw"]) >= 1 && strlen($_POST["correo"]) >= 1) {
        $correo = trim($_POST["correo"]);
        $name = trim($_POST["name"]);
        $passw = trim($_POST["passw"]);
        $comprobar = "INSERT INTO usuario(correo,nombre, passw) VALUES ('$correo','$name', '$passw')";
        $resultado = mysqli_query($conex, $comprobar);

            if ($resultado) {
                $mensaje .= "ok";
                $_SESSION["name"] = $name;
                
            } else {
                $mensaje .= "ERROR";
            }
        }else {
            $mensaje .= "COMPLETA LOS CAMPOS";
        }
        header('Content-Type: application/json');
echo json_encode(array("mensaje" => $mensaje)); ?>
        