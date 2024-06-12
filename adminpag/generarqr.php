<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["name"]) && $_SESSION["name"] === "admin") {
include("../con_db.php");
if(isset($_POST["register"])) {
    if(strlen($_POST["nameMETERUSUARIO"]) >= 1 && strlen($_POST["passwMETERUSUARIO"]) >= 1) {
        $email = trim($_POST["correo"]);
        $name = trim($_POST["nameMETERUSUARIO"]);
        $passw = trim($_POST["passwMETERUSUARIO"]);
        $comprobar = "SELECT nombre FROM usuario WHERE nombre = '$name'";
        $resultado_comprobar = mysqli_query($conex, $comprobar);

        if(mysqli_num_rows($resultado_comprobar) > 0) {
            echo '<script>alert("Nombre de usuario ya existe")</script>';

        } else {
            $consulta = "INSERT INTO Usuario(correo,nombre, passw) VALUES ('$email','$name', '$passw')";
            $resultado = mysqli_query($conex, $consulta);

            require('phpqrcode/qrlib.php');
            require('fpdf/fpdf.php');
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
                $name = trim($_POST['nameMETERUSUARIO']);
                $passw = trim($_POST['passwMETERUSUARIO']);
            
                $url = "http://ipv4//registroinicio/iniciar_sesion.php?name=".urlencode(base64_encode($name))."&passw=".urlencode(base64_encode($passw));
                
                ob_start();
            
                QRcode::png($url, null, QR_ECLEVEL_L, 4);
                
                $imageString = ob_get_contents();
                
                ob_end_clean();
                
                $qrTempFile = tempnam(sys_get_temp_dir(), 'qr_') . '.png';
                file_put_contents($qrTempFile, $imageString);
                
                $pdf = new FPDF('L', 'mm', array(85, 54));
                $pdf->AddPage();
                $pdf ->SetAutoPageBreak(false);
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(40, 10, utf8_decode('Inicio Sesión TuBiblioWeb'));
                
                $pdf->Image($qrTempFile, 7, 20, 25, 25);
            
                $pdf->SetXY(30, 20);
                $pdf->Cell(0, 10, "Usuario: " . urldecode($name));
                $pdf->SetXY(30, 28);
                $pdf->Cell(0, 10, "Clave: " . urldecode($passw));
                
                $outputFilename = 'QRusuarios/' . $name . '.pdf';
            
            
                $pdf->Output($outputFilename, 'F');
            
                $pdf->Output($name . '.pdf', 'D');
            
                unlink($qrTempFile);
            }
            if ($resultado) {
               
            } else {
                echo '<script>alert("Error en el registro")</script>';
            }
        }
    } else {
        echo '<script>alert("Completa los campos")</script>';
    }
}
}else{
    header("Location: ../error.php");
 }
?>
