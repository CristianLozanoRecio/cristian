<?php
session_start();
if (isset($_SESSION["name"]) && $_SESSION["name"] === "admin") {
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>MENÚ PÁGINA</title>
<link rel="stylesheet" href="estilos/estiloadmin.css"/>
</head>
<body>
<nav>
<ul>
<a href="#"><li><h1>Consulta</h1></li></a>
<a href="adminpag/insertarlibros.php" target="_blank"><li><h1>Insertar Libros</h1></li></a>
<a href="BORRADO/borrar.php" target="_blank"><li><h1>Borrar</h1></li></a>
</ul>
</nav>
</body>
</html>
<?php 
}else{
    echo "ERROR, NO TIENES PERMISOS";
}?>