<?php
session_start();
include("../con_db.php");
if(isset($_POST["id"])) {
    $id_reserva = mysqli_real_escape_string($conex, trim($_POST["id"]));
    $consulta = "DELETE FROM reserva WHERE id_reserva = '$id_reserva'";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
        if (mysqli_affected_rows($conex) > 0) {
            $isbn = mysqli_real_escape_string($conex, trim($_POST["isbn"]));
            $consulta2 = "UPDATE libro SET disponible = disponible+1 WHERE isbn = '$isbn'";
            $update = mysqli_query($conex, $consulta2);
            $mensaje = "OK";
        } else {
            $mensaje = "MAL";
        }
    } else {
        $mensaje = "MUY MAL";
    }
}
header('Content-Type: application/json');
echo json_encode(array("mensaje" => $mensaje));
mysqli_close($conex);
?>
