<?php
session_start();
include("../con_db.php");

$mensaje = '';


$comprobarnombre = "SELECT nombre FROM usuario WHERE nombre = '{$_POST['name']}'";
$resultado_comprobarnombre = mysqli_query($conex, $comprobarnombre);

if (mysqli_num_rows($resultado_comprobarnombre) > 0) {
    $mensaje .= "Nombre de usuario ya existe";
} else {
   
    $comprobarcorreo = "SELECT correo FROM usuario WHERE correo = '{$_POST['correo']}'";
    $resultado_comprobarcorreo = mysqli_query($conex, $comprobarcorreo);

    if (mysqli_num_rows($resultado_comprobarcorreo) > 0) {
        $mensaje .= "Correo ya existe";
    } else {
  
        require '../menu/PHPMailer-master/src/PHPMailer.php';
        require '../menu/PHPMailer-master/src/SMTP.php'; 
        require '../menu/PHPMailer-master/src/Exception.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kolapep12@gmail.com';
        $mail->Password = ''; //contraseña de aplicación generada por gmail
        $mail->SMTPSecure = 'tls';  
        $mail->Port = 587;
        
        $mail->setFrom('kolapep12@gmail.com', utf8_decode('TuBlibioWeb'));
        $mail->addAddress($_POST['correo'], utf8_decode('Usuario TuBiblioWeb'));
        
        $mail->isHTML(true);
        $confirmar = rand(100000000, 999999999);
        $_SESSION["numconfirmar"] = $confirmar;
        $mail->Subject = utf8_decode('Confirmación registro');
        $mail->Body = utf8_decode('Tu código de verificación es: ' . $_SESSION["numconfirmar"]);

        if ($mail->send()) {
            $mensaje = "ok";
        } else {
            $mensaje = "Error al enviar el correo: " . $mail->ErrorInfo;
        }
    }
}
$_SESSION['intentos'] = 0;
mysqli_close($conex);
header('Content-Type: application/json');
echo json_encode(array("mensaje" => $mensaje));
?>
