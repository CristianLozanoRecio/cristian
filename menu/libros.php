<?php
session_start();
$_SESSION['sitio'] = 'libros';
if(isset($_SESSION["name"])){
    if ($_SESSION["name"] === "admin") {
        $link = '<a href="adminpag/formulariosadmin.php">PAG ADMIN</a>';
        $link2 = '<a href="adminpag/formulariosadmin.php"><i class="fa-solid fa-hat-cowboy"></i>PAG ADMIN</a>';

    } else {
        $link = '<a href="registroinicio/cerrar_sesion.php">Cerrar sesión</a>';
        $link2 = '<a href="registroinicio/cerrar_sesion.php"><i class="fa-solid fa-door-closed"></i>Cerrar sesión</a>';
    }
}else{
    $link = '<a href="registroinicio/iniciar_sesion.php">Iniciar Sesión</a>';
    $link2 = '<a href="registroinicio/iniciar_sesion.php"><i class="fa-solid fa-door-open"></i>Iniciar Sesión</a>';

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
                                <input type="text" placeholder="Búsqueda por título" name="buscar" required />
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
                                <input type="text" placeholder="Búsqueda por título" name="buscar" required />
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
                                <input type="text" placeholder="Búsqueda por título" name="buscar" required />
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
        <div id="filtrosmovil" style="display: none;">
        <center>
        <div id="menuhorizontal">
<hr>
<br>

<h3><p align="center">Género</p></h3>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("ciencia")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("ciencia"));
} 
?>">Ciencia</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("arte")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("arte"));
} 
?>">Arte</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("medicina")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("medicina"));
} 
?>">Medicina</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("deporte")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("deporte"));
} 
?>">Deporte</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("ficcion")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("ficcion"));
} 
?>">Ficcion</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("aventura")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("aventura"));
} 
?>">Aventura</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("religion")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("religion"));
} 
?>">Religion</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("historia")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("historia"));
} 
?>">Historia</a><br>
</div>
<br>
<hr>
<br>
<h3><p align="center">Público</p></h3>
<div id="menuhorizontal">
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['idioma']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "publico=".urlencode(base64_encode("adulto")).$enlace;
}else{
    echo"publico=".urlencode(base64_encode("adulto"));
} 
?>">Adulto</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['idioma']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "publico=".urlencode(base64_encode("infantil")).$enlace;
}else{
    echo"publico=".urlencode(base64_encode("infantil"));
} 
?>">Infantil</a><br>
</div>
<br>
<hr>
<br>
<h3><p align="center">Idioma</p></h3>
<div id="menuhorizontal">
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "idioma=".urlencode(base64_encode("castellano")).$enlace;
}else{
    echo"idioma=".urlencode(base64_encode("castellano"));
} 
?>">Castellano</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "idioma=".urlencode(base64_encode("ingles")).$enlace;
}else{
    echo"idioma=".urlencode(base64_encode("ingles"));
} 
?>">Inglés</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "idioma=".urlencode(base64_encode("frances")).$enlace;
}else{
    echo"idioma=".urlencode(base64_encode("frances"));
} 
?>">Francés</a><br>
</div>
<br>
<hr>
<br>
<h3><p align="center">Fecha publicación</p></h3>
<div id="menuhorizontal">
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['idioma']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    echo "ano=".urlencode(base64_encode("10")).$enlace;
}else{
    echo"ano=".urlencode(base64_encode("10"));
} 
?>">Menos de 10 años</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['idioma']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    echo "ano=".urlencode(base64_encode("20")).$enlace;
}else{
    echo"ano=".urlencode(base64_encode("20"));
} 
?>">Menos de 20 años</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['idioma']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    echo "ano=".urlencode(base64_encode("30")).$enlace;
}else{
    echo"ano=".urlencode(base64_encode("30"));
} 
?>">Menos de 30 años</a><br>
</div>
<br>
<hr>
<br>
<h3><p align="center">Borrar filtros</p></h3>
<a href="libros.php">Borrar filtros</a>
</div>
</center>
        </div>
    </div>

    <div class="general">
    <div class="izquierda">
    <div id="menupc">
<h2><p align="center">FILTROS</p></h2>
<br>
<div id="menuhorizontal">
<hr>
<br>
<h3><p align="center">Género</p></h3>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("ciencia")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("ciencia"));
} 
?>">Ciencia</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("arte")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("arte"));
} 
?>">Arte</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("medicina")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("medicina"));
} 
?>">Medicina</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("deporte")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("deporte"));
} 
?>">Deporte</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("ficcion")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("ficcion"));
} 
?>">Ficcion</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("aventura")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("aventura"));
} 
?>">Aventura</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("religion")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("religion"));
} 
?>">Religion</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=".urlencode(base64_encode("historia")).$enlace;
}else{
    echo"tipo=".urlencode(base64_encode("historia"));
} 
?>">Historia</a><br>
</div>
<br>
<hr>
<br>
<h3><p align="center">Público</p></h3>
<div id="menuhorizontal">
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['idioma']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "publico=".urlencode(base64_encode("adulto")).$enlace;
}else{
    echo"publico=".urlencode(base64_encode("adulto"));
} 
?>">Adulto</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['idioma']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "publico=".urlencode(base64_encode("infantil")).$enlace;
}else{
    echo"publico=".urlencode(base64_encode("infantil"));
} 
?>">Infantil</a><br>
</div>
<br>
<hr>
<br>
<h3><p align="center">Idioma</p></h3>
<div id="menuhorizontal">
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "idioma=".urlencode(base64_encode("castellano")).$enlace;
}else{
    echo"idioma=".urlencode(base64_encode("castellano"));
} 
?>">Castellano</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "idioma=".urlencode(base64_encode("ingles")).$enlace;
}else{
    echo"idioma=".urlencode(base64_encode("ingles"));
} 
?>">Inglés</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['ano']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "idioma=".urlencode(base64_encode("frances")).$enlace;
}else{
    echo"idioma=".urlencode(base64_encode("frances"));
} 
?>">Francés</a><br>
</div>
<br>
<hr>
<br>
<h3><p align="center">Fecha publicación</p></h3>
<div id="menuhorizontal">
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['idioma']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    echo "ano=".urlencode(base64_encode("10")).$enlace;
}else{
    echo"ano=".urlencode(base64_encode("10"));
} 
?>">Menos de 10 años</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['idioma']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    echo "ano=".urlencode(base64_encode("20")).$enlace;
}else{
    echo"ano=".urlencode(base64_encode("20"));
} 
?>">Menos de 20 años</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['idioma']) || isset($_GET['buscar']))
{
    if(isset($_GET['buscar'])){
        $enlace = "&buscar=".$_GET['buscar'].$enlace; 
    }
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    echo "ano=".urlencode(base64_encode("30")).$enlace;
}else{
    echo"ano=".urlencode(base64_encode("30"));
} 
?>">Menos de 30 años</a><br>
</div>
<br>
<hr>
<br>
<h3><p align="center">Borrar filtros</p></h3>
<a href="libros.php">Borrar filtros</a>
</div>
</div>
<?php
$inc = include("../con_db.php");
if($inc) {
    $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE 1";
    if (isset($_GET['buscar'])) {
        $buscar =  $_GET['buscar'];
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
        $ano =  base64_decode($_GET['ano']);
        $anoactual = date('Y');
        $anoinicio = $anoactual - $ano;
        $consultatipo = "AND ano_publicacion BETWEEN '$anoinicio' AND '$anoactual'";
     $consulta = $consulta. " ".$consultatipo;
    }
    if(!isset($_GET['tipo']) && !isset($_GET['publico']) && !isset($_GET['idioma']) && !isset($_GET['ano']) && !isset($_GET['buscar']))
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
        while($row = $resultado->fetch_array()){
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
                            <p><b>Autor: </b><?php echo $autor;?></p>
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
<script src="../javascript/libros.js"></script>
<script>
        $(document).ready(function(){
            $('#menumovil').click(function(){
                $('#buscar2').toggle(); 
                var $menu = $('#menulateralmovil');
                if ($menu.width() === 0) {
                    $menu.animate({
                        width: '100%', 
                        right: '0'
                    }, 'slow');
                } else {
                    $menu.animate({
                        width: '0', 
                    }, 'slow');
                }
            });
        });

    </script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var cambio = document.getElementById("cambio");
    if (cambio) {
        cambio.innerHTML = '<?php echo $link; ?>';
    }

    var cambio2 = document.getElementById("cambio2");
    if (cambio2) {
        cambio2.innerHTML = '<?php echo $link2; ?>';
    }
    <?php 
    if($_SESSION['sitio'] == 'libros'){
    ?>
    document.getElementById("libros").style.color = 'orange';
    document.getElementById("libros2").style.color = 'aliceblue';
    <?php }?>
});
</script>
<script>
document.getElementById("desplegar").addEventListener("click", function() {
            var filtros = document.getElementById("filtrosmovil");
            if (filtros.style.display === "none") {
                filtros.style.display = "block";
            } else {
                filtros.style.display = "none";
            }
        });
    </script>
</body>
</html>
<?php
$_SESSION['sitio'] = '';
?>