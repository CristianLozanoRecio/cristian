<?php

include("../con_db.php");

if(isset($_POST["iniciarBORRARLIBRO"])) {
    if($_POST["isbn"] >= 0) {
        $isbn = trim($_POST["isbn"]);
        $consulta = "DELETE FROM libro WHERE isbn = '$isbn'";
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
                    alert("No se encontró el libro con ese ISBN.");
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
            alert("¡Por favor completa la ISBN!");
        </script>
        <?php
    }
}
?>
