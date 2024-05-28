<?php
session_start();
include("../con_db.php");

if(isset($_POST["register"])) {
    if(strlen($_POST["name"]) >= 1 && strlen($_POST["passw"]) >= 1) {
        $name = trim($_POST["name"]);
        $passw = trim($_POST["passw"]);
        $comprobar = "SELECT nombre FROM usuario WHERE nombre = '$name'";
        $resultado_comprobar = mysqli_query($conex, $comprobar);

        if(mysqli_num_rows($resultado_comprobar) > 0) {
            echo '<h3>Nombre de usuario ya existe</h3>';
        } else {
            $consulta = "INSERT INTO Usuario(nombre, passw) VALUES ('$name', '$passw')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                $_SESSION["name"] = $name;
                header("Location: ../principal.php");
                exit;
            } else {
                echo '<h3>Error en el registro</h3>';
            }
        }
    } else {
        echo '<h3>Completa los campos</h3>';
    }
}
mysqli_close($conex);
?>
