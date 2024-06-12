<?php
session_start();
include("../con_db.php");
$admin = "";
$mensaje = "";
    if(isset($_POST["name"])  && isset($_POST["passw"]) ) {
        $name =  mysqli_real_escape_string($conex,trim($_POST["name"]));
        $passw =  mysqli_real_escape_string($conex,trim($_POST["passw"]));
        $comprobar = "SELECT * FROM usuario WHERE nombre = '$name' and passw = '$passw'";
        $resultado_comprobar = mysqli_query($conex, $comprobar);

        if(mysqli_num_rows($resultado_comprobar) > 0) {
                $fila = mysqli_fetch_assoc($resultado_comprobar);
               $_SESSION['name'] = $fila["nombre"];
               $_SESSION['correo'] = $fila["correo"];
            if($name == "admin" && $passw == "admin12"){
               $admin = "../adminpag/formulariosadmin.php";
            }else{
            $mensaje = "ok";
            }
        } else {
            $mensaje ="Datos incorrectos";
        }
    } else {
        $mensaje ="Completa los campos";
    }

mysqli_close($conex);
header('Content-Type: application/json');
echo json_encode(array("mensaje" => $mensaje,"admin" => $admin)); ?>