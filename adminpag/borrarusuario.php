<?php

include("../con_db.php");

if(isset($_POST["iniciarBORRARUSUARIO"])) {
    if($_POST["name"] >= 1) {
        $usuario = trim($_POST["name"]);
        $consulta = "DELETE FROM usuario WHERE nombre = '$usuario'";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            // Verifica el número de filas afectadas
            if (mysqli_affected_rows($conex) > 0) {
                ?>
                <script>
                    alert("Borrado Correctamente");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("No se encontró el usuario con ese nombre.");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("¡Ups, ha ocurrido un error!");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("¡Por favor completa el Usuario!");
        </script>
        <?php
    }
}
?>
