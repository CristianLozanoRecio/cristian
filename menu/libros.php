<?php
session_start();
$_SESSION['sitio'] = 'libros';
if(isset($_SESSION["name"])){
    if ($_SESSION["name"] === "admin") {
        $link = '<a href="../adminpag/formulariosadmin.php">PAG ADMIN</a>';
        $link2 = '<a href="../adminpag/formulariosadmin.php"><i class="fa-solid fa-hat-cowboy"></i>PAG ADMIN</a>';

    } else {
        $link = '<a href="../registroinicio/cerrar_sesion.php">Cerrar sesión</a>';
        $link2 = '<a href="../registroinicio/cerrar_sesion.php"><i class="fa-solid fa-door-closed"></i>Cerrar sesión</a>';
    }
}else{
    $link = '<a href="../registroinicio/iniciar_sesion.php">Iniciar Sesión</a>';
    $link2 = '<a href="../registroinicio/iniciar_sesion.php"><i class="fa-solid fa-door-open"></i>Iniciar Sesión</a>';

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuBiblioWeb</title>
    <link rel="stylesheet" href="../estilos/estilolibros.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="cerebro">
        <div class="header-contenido">
            <div class="logo">
            <a href="../principal.php" style="color: inherit; text-decoration: none;"><h1>TuBiblio<b>Web</b></h1></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="../principal.php" id="inicio">Inicio</a></li>
                        <li><a href="VERreservas.php" id="reserva">Reservas</a></li>
                        <li><a href="/info.php" id="informacion">Información</a></li>
                        <li><a href="libros.php" id="libros">Libros</a></li>
                        <li id="cambio"></li>
                        <li ><div class="busqueda2">
            <form method="get" action="libros.php"> 
                     <div class="buscar">
                                <input type="text" placeholder="Búsqueda por título" name="titulo" required />
                                <div class="btn">
                                    <button class="pulsarbuscar"><i class="fas fa-search icon fa-2x"></i></button>
                               </div>
                                </div>
                        </form>
            </div>
        </li>
                    </ul>
                </nav>
                <div class="busqueda" >
            <form method="get" action="libros.php"> 
                     <div class="buscar">
                                <input type="text" placeholder="Búsqueda por título" name="titulo" required />
                                <div class="btn">
                                    <button class="pulsarbuscar"><i class="fas fa-search icon fa-2x"></i></button>
                               </div>
                                </div>
                        </form>
                        </div>
                        </div>
            <div class="menu2">
                <nav>
                    <ul>
                            <li><a href="#" class="icon-button" id="menumovil">
                            <i class="fa-solid fa-bars fa-2x"></i>
                            </a></li>
                            <div class="busqueda" id="buscar2">
            <form method="get" action="libros.php"> 
                     <div class="buscar">
                                <input type="text" placeholder="Búsqueda por título" name="titulo" required />
                                <div class="btn">
                                    <button class="pulsarbuscar"><i class="fas fa-search icon fa-2x"></i></button>
                               </div>
                                </div>
                        </form>
                    </ul>
                </nav>
            </div>

    </header>
    <main>
        <div id="menulateralmovil">
            <nav>
                <ul>
                    <li><a href="../principal.php" ><i class="fa-solid fa-house"></i>Inicio</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="VERreservas.php" ><i class="fa-solid fa-calendar-check"></i>Reservas</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="info.php" ><i class="fa-solid fa-info"></i>Información</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="libros.php" id="libros2"><i class="fa-solid fa-book"></i>Libros</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li id="cambio2"><a href="../registroinicio/iniciar_sesion.php"><i class="fa-solid fa-door-open"></i>Iniciar Sesión</a></li>
                </ul>
            </nav>
        </div>

    <br><br><br><br>
    <br>


    <div id="menumovil">
    <button id="desplegar" >FILTROS</button>
    <div id="filtrosmovil">
    <a href="#" id="cerrar"><i class="fa-solid fa-x fa-3x"></i></a>b
<br>
<?php
$filtrartipo = ["publico", "ano_publicacion", "idioma","titulo","nombre"];
$filtrarpublico = ["tipo", "ano_publicacion", "idioma","titulo","nombre"];
$filtrarano = ["tipo", "publico", "idioma","titulo","nombre"];
$filtraridioma = ["tipo", "publico", "ano_publicacion","titulo","nombre"];

$enlacetipo = "";
$enlacepublico = "";
$enlaceano = "";
$enlaceidioma = "";

$totaltipo = "";
$totalpublico = "";
$totalano = "";
$totalidioma = "";
$anoactual = date('Y');


for($i = 0; $i<5; $i++){
    if(isset($_GET[$filtrartipo[$i]])){
        $enlacetipo .= "&".$filtrartipo[$i]."=".$_GET[$filtrartipo[$i]];
        if($filtrartipo[$i] === "ano_publicacion"){
            $anoinicio = $anoactual - base64_decode($_GET[$filtrartipo[$i]]);
            $totaltipo.= " AND ano_publicacion BETWEEN '$anoinicio' AND '".$anoactual."'";
        } else if($filtrartipo[$i] === "titulo"){
            $totaltipo.= " AND titulo LIKE '%".$_GET[$filtrartipo[$i]]."%'";
        } else {
            $totaltipo .= " AND $filtrartipo[$i] = '" . base64_decode($_GET[$filtrartipo[$i]]) . "'";
        }
    }
    if(isset($_GET[$filtrarpublico[$i]])){
        $enlacepublico .= "&".$filtrarpublico[$i]."=".$_GET[$filtrarpublico[$i]];
        if($filtrarpublico[$i] === "ano_publicacion"){
            $anoinicio = $anoactual - base64_decode($_GET[$filtrarpublico[$i]]);
            $totalpublico.= " AND ano_publicacion BETWEEN '$anoinicio' AND '".$anoactual."'";
        } else if($filtrarpublico[$i] === "titulo"){
            $totalpublico.= " AND titulo LIKE '%".$_GET[$filtrarpublico[$i]]."%'";
        } else {
            $totalpublico .= " AND $filtrarpublico[$i] = '" . base64_decode($_GET[$filtrarpublico[$i]]) . "'";
        }
    }
    if(isset($_GET[$filtrarano[$i]])){
        $enlaceano .= "&".$filtrarano[$i]."=".$_GET[$filtrarano[$i]];
        if($filtrarano[$i] === "titulo"){
            $totalano.= " AND titulo LIKE '%".$_GET[$filtrarano[$i]]."%'";
        } else {
            $totalano .= " AND $filtrarano[$i] = '" . base64_decode($_GET[$filtrarano[$i]]) . "'";
        }
    }
    if(isset($_GET[$filtraridioma[$i]])){
        $enlaceidioma .= "&".$filtraridioma[$i]."=".$_GET[$filtraridioma[$i]];
        if($filtraridioma[$i] === "ano_publicacion"){
            $anoinicio = $anoactual - base64_decode($_GET[$filtraridioma[$i]]);
            $totalidioma.= " AND ano_publicacion BETWEEN '$anoinicio' AND '".$anoactual."'";
        } else if($filtraridioma[$i] === "titulo"){
            $totalidioma.= " AND titulo LIKE '%".$_GET[$filtraridioma[$i]]."%'";
        } else {
            $totalidioma .= " AND $filtraridioma[$i] = '" . base64_decode($_GET[$filtraridioma[$i]]) . "'";
        }
    }
}
?>

<h2>Filtrar por</h2>
<br>
<div id="menuhorizontal">
<h3><p align="center">Género</p></h3>
<br>
<?php 
include("../con_db.php");

$tipo = ["ciencia","arte","medicina","deporte","ficción","aventura","religión","historia"];

for($i = 0; $i < count($tipo); $i++) {
    $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '".$tipo[$i]."'";
    if(isset($_GET["tipo"]) && base64_decode($_GET['tipo'])=== $tipo[$i] ){
        $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '".base64_decode($_GET['tipo'])."'";
    }
    if(isset($_GET["tipo"]) && base64_decode($_GET['tipo']) != $tipo[$i] ){
        $consulta = "SELECT 0 AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '".base64_decode($_GET['tipo'])."'";
    }
    $consulta = $consulta. " ".$totaltipo;
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila !== null) {
            $total = $fila['total'];
        } else {
            $total = 0;
        }
        if($total != 0){
        echo '<a href="libros.php?tipo=' . urlencode(base64_encode($tipo[$i])) .  $enlacetipo . '" id="' . htmlspecialchars($tipo[$i]) . '">' . ucfirst(htmlspecialchars($tipo[$i])) . ' (' . $total . ')</a>';
        }
    }
}

mysqli_close($conex);
?>

<h3><p align="center">Idioma</p></h3>
<br>
<?php 
include("../con_db.php");

$idioma = ["castellano","inglés","francés"];

for($i = 0; $i<count($idioma); $i++){
    $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE idioma = '".$idioma[$i]."'";
    if(isset($_GET["idioma"]) && base64_decode($_GET['idioma'])=== $idioma[$i] ){
        $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE idioma = '".base64_decode($_GET['idioma'])."'";
    }
    if(isset($_GET["idioma"]) && base64_decode($_GET['idioma']) != $idioma[$i] ){
        $consulta = "SELECT 0 AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE idioma = '".base64_decode($_GET['idioma'])."'";
    }
    $consulta = $consulta. " ".$totalidioma;
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila !== null) {
            $total = $fila['total'];
        } else {
            $total = 0;
        }
        if($total != 0){
        echo '<a href="libros.php?idioma=' . urlencode(base64_encode($idioma[$i])) . $enlaceidioma . '" id = "'.htmlspecialchars($idioma[$i]).'">' .  ucfirst(htmlspecialchars($idioma[$i])) . ' (' . $total . ')</a>';
        }
    }
}

mysqli_close($conex);
?>

<h3><p align="center">Público</p></h3>
<br>
<?php 
include("../con_db.php");

$publico = ["infantil","adulto"];

for($i = 0; $i<count($publico); $i++){
    $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE publico = '".$publico[$i]."'";
    if(isset($_GET["publico"]) && base64_decode($_GET['publico'])=== $publico[$i] ){
        $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE publico = '".base64_decode($_GET['publico'])."'";
    }
    if(isset($_GET["publico"]) && base64_decode($_GET['publico']) != $publico[$i] ){
        $consulta = "SELECT 0 AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE publico = '".base64_decode($_GET['publico'])."'";
    }
    $consulta = $consulta. " ".$totalpublico;
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila !== null) {
            $total = $fila['total'];
        } else {
            $total = 0;
        }
        if($total != 0){
        echo '<a href="libros.php?publico=' . urlencode(base64_encode($publico[$i])) . $enlacepublico . '" id = "'.htmlspecialchars($publico[$i]).'">' .  ucfirst(htmlspecialchars($publico[$i])). ' (' . $total . ')</a>';
        }
    }
}

mysqli_close($conex);
?>

<h3><p align="center">Año publicación</p></h3>
<br>
<?php 
include("../con_db.php");

$ano = ["10","20","30"];

for($i = 0; $i<count($ano); $i++){
    $anoactual = date('Y');
    $anoinicio = $anoactual - $ano[$i];
    $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE ano_publicacion BETWEEN '$anoinicio' AND '$anoactual'";
    if(isset($_GET["ano_publicacion"]) && base64_decode($_GET['ano_publicacion'])=== $ano[$i] ){
        $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE ano_publicacion BETWEEN '$anoinicio' AND '$anoactual'";
    }
    if(isset($_GET["ano_publicacion"]) && base64_decode($_GET['ano_publicacion']) != $ano[$i] ){
        $consulta = "SELECT 0 AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE ano_publicacion BETWEEN '$anoinicio' AND '$anoactual'";
    }
    $consulta = $consulta. " ".$totalano;
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila !== null) {
            $total = $fila['total'];
        } else {
            $total = 0;
        }
        if($total != 0){
        echo '<a href="libros.php?ano_publicacion=' . urlencode(base64_encode($ano[$i])) . $enlaceano. '" id = "'.htmlspecialchars($ano[$i]).'">Menos de ' .  ucfirst(htmlspecialchars($ano[$i])). ' años(' . $total . ')</a>';
        }
    }
}

mysqli_close($conex);
?>
<h3><p align="center">Borrar filtros</p></h3>
<a href="libros.php">Borrar filtros</a>
    </div>
    </div>
    </div>

    <div class="general">
    <div class="izquierda">
    <div id="menupc">
<h2>Filtrar por</h2>
<br>
<div id="menuhorizontal">
<h3><p align="center">Género</p></h3>
<br>
<?php 
include("../con_db.php");

$tipo = ["ciencia","arte","medicina","deporte","ficción","aventura","religión","historia"];

for($i = 0; $i < count($tipo); $i++) {
    $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '".$tipo[$i]."'";
    if(isset($_GET["tipo"]) && base64_decode($_GET['tipo'])=== $tipo[$i] ){
        $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '".base64_decode($_GET['tipo'])."'";
    }
    if(isset($_GET["tipo"]) && base64_decode($_GET['tipo']) != $tipo[$i] ){
        $consulta = "SELECT 0 AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '".base64_decode($_GET['tipo'])."'";
    }
    $consulta = $consulta. " ".$totaltipo;
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila !== null) {
            $total = $fila['total'];
        } else {
            $total = 0;
        }
        if($total != 0){
        echo '<a href="libros.php?tipo=' . urlencode(base64_encode($tipo[$i])) .  $enlacetipo . '" id="' . htmlspecialchars($tipo[$i]) . '">' . ucfirst(htmlspecialchars($tipo[$i])) . ' (' . $total . ')</a>';
        }
    }
}

mysqli_close($conex);
?>

<h3><p align="center">Idioma</p></h3>
<br>
<?php 
include("../con_db.php");

$idioma = ["castellano","inglés","francés"];

for($i = 0; $i<count($idioma); $i++){
    $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE idioma = '".$idioma[$i]."'";
    if(isset($_GET["idioma"]) && base64_decode($_GET['idioma'])=== $idioma[$i] ){
        $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE idioma = '".base64_decode($_GET['idioma'])."'";
    }
    if(isset($_GET["idioma"]) && base64_decode($_GET['idioma']) != $idioma[$i] ){
        $consulta = "SELECT 0 AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE idioma = '".base64_decode($_GET['idioma'])."'";
    }
    $consulta = $consulta. " ".$totalidioma;
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila !== null) {
            $total = $fila['total'];
        } else {
            $total = 0;
        }
        if($total != 0){
        echo '<a href="libros.php?idioma=' . urlencode(base64_encode($idioma[$i])) . $enlaceidioma . '" id = "'.htmlspecialchars($idioma[$i]).'">' .  ucfirst(htmlspecialchars($idioma[$i])) . ' (' . $total . ')</a>';
        }
    }
}

mysqli_close($conex);
?>

<h3><p align="center">Público</p></h3>
<br>
<?php 
include("../con_db.php");

$publico = ["infantil","adulto"];

for($i = 0; $i<count($publico); $i++){
    $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE publico = '".$publico[$i]."'";
    if(isset($_GET["publico"]) && base64_decode($_GET['publico'])=== $publico[$i] ){
        $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE publico = '".base64_decode($_GET['publico'])."'";
    }
    if(isset($_GET["publico"]) && base64_decode($_GET['publico']) != $publico[$i] ){
        $consulta = "SELECT 0 AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE publico = '".base64_decode($_GET['publico'])."'";
    }
    $consulta = $consulta. " ".$totalpublico;
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila !== null) {
            $total = $fila['total'];
        } else {
            $total = 0;
        }
        if($total != 0){
        echo '<a href="libros.php?publico=' . urlencode(base64_encode($publico[$i])) . $enlacepublico . '" id = "'.htmlspecialchars($publico[$i]).'">' .  ucfirst(htmlspecialchars($publico[$i])). ' (' . $total . ')</a>';
        }
    }
}

mysqli_close($conex);
?>

<h3><p align="center">Año publicación</p></h3>
<br>
<?php 
include("../con_db.php");

$ano = ["10","20","30"];

for($i = 0; $i<count($ano); $i++){
    $anoactual = date('Y');
    $anoinicio = $anoactual - $ano[$i];
    $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE ano_publicacion BETWEEN '$anoinicio' AND '$anoactual'";
    if(isset($_GET["ano_publicacion"]) && base64_decode($_GET['ano_publicacion'])=== $ano[$i] ){
        $consulta = "SELECT COUNT(*) AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE ano_publicacion BETWEEN '$anoinicio' AND '$anoactual'";
    }
    if(isset($_GET["ano_publicacion"]) && base64_decode($_GET['ano_publicacion']) != $ano[$i] ){
        $consulta = "SELECT 0 AS total FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE ano_publicacion BETWEEN '$anoinicio' AND '$anoactual'";
    }
    $consulta = $consulta. " ".$totalano;
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila !== null) {
            $total = $fila['total'];
        } else {
            $total = 0;
        }
        if($total != 0){
        echo '<a href="libros.php?ano_publicacion=' . urlencode(base64_encode($ano[$i])) . $enlaceano. '" id = "'.htmlspecialchars($ano[$i]).'">Menos de ' .  ucfirst(htmlspecialchars($ano[$i])). ' años(' . $total . ')</a>';
        }
    }
}

mysqli_close($conex);
?>
<h3><p align="center">Borrar filtros</p></h3>
<a href="libros.php">Borrar filtros</a>
</div>
</div>
</div>
<?php
$inc = include("../con_db.php");
if($inc) {
    $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE 1";
    if (isset($_GET['nombre'])) {
        $autor =  base64_decode($_GET['nombre']);
        $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE 1 AND AUTOR.nombre = '$autor'";
    }
    if (isset($_GET['titulo'])) {
        $buscar =  $_GET['titulo'];
        $consultatipo = "AND titulo LIKE '%$buscar%'";
     $consulta = $consulta. " ".$consultatipo;
     }
    if (isset($_GET['tipo'])) {
       $tipo =  base64_decode($_GET['tipo']);
       $consultatipo = "AND tipo = '$tipo'";
    $consulta = $consulta. " ".$consultatipo;
    }
    if (isset($_GET['publico'])) {
        $publico =  base64_decode($_GET['publico']);
        $consultatipo = "AND publico = '$publico'";
     $consulta = $consulta. " ".$consultatipo;
    }
    if (isset($_GET['idioma'])) {
        $idioma =  base64_decode($_GET['idioma']);
        $consultatipo = "AND idioma = '$idioma'";
     $consulta = $consulta. " ".$consultatipo;
    }
    if (isset($_GET['ano'])) {
        $ano =  base64_decode($_GET['ano_publicacion']);
        $anoactual = date('Y');
        $anoinicio = $anoactual - $ano;
        $consultatipo = "AND ano_publicacion BETWEEN '$anoinicio' AND '$anoactual'";
     $consulta = $consulta. " ".$consultatipo;
    }

    
    if(!isset($_GET['tipo']) && !isset($_GET['publico']) && !isset($_GET['idioma']) && !isset($_GET['ano']) && !isset($_GET['titulo']) && !isset($_GET['nombre']))
    {
        $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE 1";
    } 
    $resultado = mysqli_query($conex,$consulta);
    if($resultado) {
        ?>
        <div class="derecha">
    <ul class="listalibros">
                <?php
                $contador = 0;
                $resultadoVER = false;
        while($row = $resultado->fetch_array()){
            $resultadoVER = true;
            $contador++;
            $imagen_url = $row["portada_libro"];
            $autor = $row["nombre"];
            $titulo = $row["titulo"];
            $sinopsis = $row["sinopsis"];
            $isbn = $row["isbn"];
            $disponible = $row["disponible"];

                ?>

        <li class="estiloli" <?php
         if ($contador > 3){ echo 'style="display: none;"'; }
         ?>>
            <div class="estilo-div">
                <div class="izq">
                <a href="detalles_libro.php?isbn=<?php echo urlencode(base64_encode($isbn)); ?>" title="<?php echo $titulo;?> (Ver detalles)"><img src="<?php echo $imagen_url;?>" class="img"/></a>
                </div>
                <div class="der">
                    <header class="cabeza">
                        <h3><?php echo $titulo;?></h3>
                        <div>
                            
                            <p><b>Autor: </b><a href="libros.php?nombre=<?php echo urlencode(base64_encode($autor)); ?>"><?php echo $autor;?></a></p>
                            <p><b>Disponible: </b><?php if($disponible >= 1){echo "SI";}else{echo "NO";}?></p>
                        </div>
                    </header>
                    <p class="sinopsis" id="sinopsisTexto">
                    <?php echo $sinopsis;?>
                    </p>
                    <a href="detalles_libro.php?isbn=<?php echo urlencode(base64_encode($isbn)); ?>">Ver detalles</a>
                </div>
            </div>
            <br><br><br>
        </li>
                <?php
                        }            if (!$resultadoVER) {
                            echo '<p>No se encontraron libros.</p>';
                        }
                ?>
                
            </ul>

            <button id="mostrar">Mostrar Elementos Ocultos</button>
                    </div>
            <?php
        }
}
mysqli_close($conex);
?>
</div>
<br><br>
</main>
<footer>
        <div class="pie">
            <table class="tablapie">
                <tr>
                    <td><h3>Contacto</h3></td>
                    <td><h3>Redes</h3><br>
                    <td><h3>Políticas</h3></td>
                </tr>
                <tr>
                    <td><img src="../imagenes/tlf.png" width="40px">TLF: 666 666 666</td>
                    <td><img src="../imagenes/facebook.png" width="40px">facebook</td>
                    <td><a href="../pie/avisolegal.php">Aviso legal</a></td>
                </tr>
                <tr>
                    <td>Dirección: C/XXXX</td>
                    <td><img src="../imagenes/Insta.png" width="40px">Instagram</td>
                    <td><a href="../pie/politicacookies.php">Política de Cookies</a></td>
                </tr>
                <tr>
                    <td>CP: 112XX</td>
                    <td><img src="../imagenes/yt.png" width="40px"> YT</td>
                    <td><a href="../pie/protecciondedatos.php">Protección de datos</a></td>
                </tr>
                <tr>
                    <td></td> <td></td>
                    <td><a href="#">Mapa web</a></td>
                </tr>
            </table>
        </div>
</footer>
    <script>
document.addEventListener("DOMContentLoaded", function() {

    <?php 
    if($_SESSION['sitio'] == 'libros'){
    ?>
    document.getElementById("libros").style.color = 'orange';
    document.getElementById("libros2").style.color = 'aliceblue';
    <?php }?>
});
</script>
<script src="../javascript/despleagarmenu.js"></script>
    <?php
$arrayGET = array("tipo", "ano_publicacion", "publico", "idioma");
$arraydecodificar = array();
for($i = 0; $i < count($arrayGET); $i++){
    if(isset($_GET[$arrayGET[$i]])){
        $arraydecodificar[] = base64_decode($_GET[$arrayGET[$i]]);
    }
}
echo "<script>
    var linkcambio = '$link';
    var link2cambio = '$link2';
    var arraydecodificar = ".json_encode($arraydecodificar)."
</script>";
?>
<script src="../javascript/libros.js"></script>

</body>
</html>
<?php
$_SESSION['sitio'] = '';
?>