<?php
session_start();
include("../con_db.php");
$mensaje = "";
    if(strlen($_POST["name"]) >= 1 && strlen($_POST["passw"]) >= 1 && strlen($_POST["correo"]) >= 1) {
        $correo = mysqli_real_escape_string($conex,trim($_POST["correo"]));
        $name = mysqli_real_escape_string($conex,trim($_POST["name"]));
        $passw = mysqli_real_escape_string($conex,trim($_POST["passw"]));
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
        mysqli_close($conex);
        header('Content-Type: application/json');
echo json_encode(array("mensaje" => $mensaje)); ?>
        