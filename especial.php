<?php
include("con_db.php");
function cambio($text) {
    $cuidao = str_replace('<br />', 'BR_TEMPORAL', $text);
    $texto_specialchar = htmlspecialchars($cuidao, ENT_QUOTES, 'UTF-8');
    return str_replace('BR_TEMPORAL', '<br />', $texto_specialchar);
}

function cambioSQL($text2) {
    $cuidao2 = base64_decode($text2);
    global $conex;
    return mysqli_real_escape_string($conex, $cuidao2);
    
}
?>