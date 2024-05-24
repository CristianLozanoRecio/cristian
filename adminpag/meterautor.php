<?php
include("../con_db.php");
if(isset($_POST["iniciarMETERAUTOR"])) {
    if (strlen($_POST["name"]) >= 1 ) { 
        $nombre = trim($_POST["name"]); 
        $biografia = trim($_POST["biografia"]);       
        $consulta = "INSERT INTO autor(nombre,biografia) VALUES ('$nombre', '$biografia')";
         $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                echo '<script>alert("EXITO");</script>';
            } else {
                echo '<script>alert("ERROR EN METER DATOS");</script>';
            }
        } else {
        echo '<script>alert("COMPLETA CORRECTAMENTE LOS DATOS");</script>';
    }
}
?>
