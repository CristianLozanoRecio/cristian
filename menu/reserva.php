<?php
include("../con_db.php");

$consulta = "INSERT INTO reserva (isbn_libro, nombre_usuario) VALUES ('" . $_SESSION["isbn"] . "', '" . $_SESSION["name"] . "')";
$resultado = mysqli_query($conex, $consulta);

if ($resultado) {
    $_SESSION["reserva"] = mysqli_insert_id($conex);

    
    $consulta2 = "UPDATE libro SET disponible = 0 WHERE isbn = '" . $_SESSION['isbn'] . "'";
    mysqli_query($conex, $consulta2);

    echo "La reserva se realizó con éxito. ID de la reserva: " . $id_reserva;
} else {
    echo "Error al realizar la reserva.";
}

mysqli_close($conex);
?>
