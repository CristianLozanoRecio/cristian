<?php
session_start();
include("../con_db.php");
$fechaActual = new DateTime();
$fechaActual->modify('+7 days');
$fechaActual->setTime(11, 0);
$fechaFinal = $fechaActual->format('Y-m-d H:i:s');

$_SESSION["fecha_fin"] = $fechaFinal;

$consulta = "INSERT INTO reserva (isbn_libro, correo_usuario,fecha_fin) VALUES ('" . $_SESSION["isbn"] . "', '" . $_SESSION["correo"] . "', '" . $fechaFinal . "')";
$resultado = mysqli_query($conex, $consulta);

if ($resultado) {
    $_SESSION["reserva"] = mysqli_insert_id($conex);

    
    $consulta2 = "UPDATE libro SET disponible = disponible-1 WHERE isbn = '" . $_SESSION['isbn'] . "'";
    mysqli_query($conex, $consulta2);

    require 'PHPMailer-master\src\PHPMailer.php';
    require 'PHPMailer-master\src\SMTP.php'; 
    require 'PHPMailer-master\src\Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kolapep12@gmail.com';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';  
    $mail->Port = 587;
    
    $mail->setFrom('kolapep12@gmail.com', utf8_decode('TuBiblioWeb'));
    $mail->addAddress('kolapep12@gmail.com', utf8_decode('TuBlioWeb'));
    
    $mail->isHTML(true);
    $mail->Subject = utf8_decode($_SESSION['name'] . ' Realizó una reserva');
    $mail->Body = utf8_decode("Se realizo una reserva para el libro con ISBN ".$_SESSION["isbn"].", con id de reserva ". $_SESSION["reserva"]);

    if ($mail->send()) {
      echo "formularioreserva.php";
    } else {
        echo "libros.php";
    }

} else {
    echo "Location: libros.php";
}

mysqli_close($conex);
?>
