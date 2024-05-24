<?php

include("../con_db.php");

if(isset($_POST["iniciarBORRARLIBRO"])) {
    if($_POST["isbn"] >=0) {
        $isbn = trim($_POST["isbn"]);
        $consulta ="DELETE FROM libro WHERE isbn = '$isbn'";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado) {
            ?>
            <script>
                alert("Borrado Correctamente");
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("¡upss ha ocurrido un error!");
            </script>
            <h3 class="bad"></h3>
            <?php
        }
    }    else {
            ?>
            <script>
                alert("¡Por favor completa la ISBN!");
            </script>
            <?php
    }
}
?>