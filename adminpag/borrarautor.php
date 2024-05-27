<?php

include("../con_db.php");

if(isset($_POST["iniciarBORRARAUTOR"])) {
    if($_POST["id"] >= 0) {
        $isbn = trim($_POST["id"]);
        $consulta = "DELETE FROM autor WHERE id_autor = '$id'";
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
                    alert("No se encontró el autor con ese ID.");
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
            alert("¡Por favor completa la ID!");
        </script>
        <?php
    }
}
?>
