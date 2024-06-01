<?php
include("../con_db.php");
if(isset($_POST["register"])) {
    if(strlen($_POST["name"]) >= 1 && strlen($_POST["passw"]) >= 1) {
        $name = trim($_POST["name"]);
        $passw = trim($_POST["passw"]);
        $comprobar = "SELECT nombre FROM usuario WHERE nombre = '$name'";
        $resultado_comprobar = mysqli_query($conex, $comprobar);

        if(mysqli_num_rows($resultado_comprobar) > 0) {
            echo '<h3>Nombre de usuario ya existe</h3>';
        } else {
            $consulta = "INSERT INTO Usuario(nombre, passw) VALUES ('$name', '$passw')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                $_SESSION["name"] = $name;
            } else {
                echo '<h3>Error en el registro</h3>';
            }
        }
    } else {
        echo '<h3>Completa los campos</h3>';
    }
}

include('phpqrcode/qrlib.php');
require('fpdf/fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $passw = trim($_POST['passw']);

    $url = "http:///cristian/registroinicio/iniciar_sesion.php?name=".urlencode(base64_encode($name))."&passw=".urlencode(base64_encode($passw));
    
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
    $pdf->Cell(40, 10, utf8_decode('Inicio Sesión'));
    
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
?>
