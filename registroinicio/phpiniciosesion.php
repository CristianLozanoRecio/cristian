<?php
session_start();
include("../con_db.php");

if(isset($_POST["iniciar"])) {
    if(strlen($_POST["name"]) >= 1 && strlen($_POST["passw"]) >= 1) {
        $name =  mysqli_real_escape_string($conex,trim($_POST["name"]));
        $passw =  mysqli_real_escape_string($conex,trim($_POST["passw"]));
        $comprobar = "SELECT nombre,passw FROM usuario WHERE nombre = '$name' and passw = '$passw'";
        $resultado_comprobar = mysqli_query($conex, $comprobar);

        if(mysqli_num_rows($resultado_comprobar) > 0) {
            $_SESSION["name"] = $name;
            if($name == "admin" && $passw == "admin12"){
                header("Location: ../adminpag/formulariosadmin.php");
            }else{
            header("Location: ../principal.php");
            }
        } else {
            echo '<h3>Datos incorrectos</h3>';
        }
    } else {
        echo '<h3>Completa los campos</h3>';
    }
}
mysqli_close($conex);
?>
