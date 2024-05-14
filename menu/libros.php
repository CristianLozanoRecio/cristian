<?php
session_start();
if (isset($_SESSION["name"])) {
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var cambio = document.getElementById("cambio");
                if (cambio) {
                    cambio.innerHTML = \'<a href="../registroinicio/cerrar_sesion.php">Cerrar sesión</a>\';
                }
            });
          </script>';
}else{
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var cambio = document.getElementById("cambio");
        if (cambio) {
            cambio.innerHTML = \'<a href="../registroinicio/registro.php">REGISTRATE</a>\';
        }
    });
  </script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuBiblioWeb</title>
    <link rel="stylesheet" href="../estilos/estilolibros.css">
</head>
<body>
    <header class="cerebro">
        <div class="header-contenido">
            <div class="logo">
                <a href="pr.html" style="color: inherit; text-decoration: none;"><h1>TuBiblio<b>Web</b></h1></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Horarios</a></li>
                        <li><a href="#">Libros</a></li>
                        <li id="cambio"><a href="../registroinicio/registro.php">REGISTRATE</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
    <br><br><br><br>
    <br>
    <div class="general">
<?php
$inc = include("../con_db.php");
if($inc) {
    $consulta = "SELECT * FROM LIBRO WHERE 1";
    if (isset($_GET['tipo'])) {
       $tipo =  $_GET['tipo'];
       $consultatipo = "AND tipo = '$tipo'";
    $consulta = $consulta. " ".$consultatipo;
    }
    if (isset($_GET['publico'])) {
        $publico =  $_GET['publico'];
        $consultatipo = "AND publico = '$publico'";
     $consulta = $consulta. " ".$consultatipo;
    }
    if (isset($_GET['idioma'])) {
        $idioma =  $_GET['idioma'];
        $consultatipo = "AND idioma = '$idioma'";
     $consulta = $consulta. " ".$consultatipo;
    }
    if (isset($_GET['ano'])) {
        $ano =  $_GET['ano'];
        $anoactual = date('Y');
        $anoinicio = $anoactual - $ano;
        $consultatipo = "AND ano_publicacion BETWEEN '$anoinicio' AND '$anoactual'";
     $consulta = $consulta. " ".$consultatipo;
    }
    if(!isset($_GET['tipo']) && !isset($_GET['publico']) && !isset($_GET['idioma']) && !isset($_GET['ano']))
    {
        $consulta = "SELECT * FROM LIBRO WHERE 1";
    }
    $resultado = mysqli_query($conex,$consulta);
    if($resultado) {
        ?>
        <div class="izquierda">
    <ul class="listalibros">
                <?php
                $contador = 0;
        while($row = $resultado->fetch_array()){
            $contador++;
            $imagen_url = $row["portada_libro"];
            $autor = $row["autor"];
            $titulo = $row["titulo"];
            $sinopsis = $row["sinopsis"];
            $isbn = $row["isbn"];

                ?>

        <li class="estiloli" <?php if ($contador > 3) echo 'style="display: none;"'; ?>>
            <div class="estilo-div">
                <div class="izq">
                    <?php echo '<img src='.$imagen_url .' " class="img"/>';?>
                </div>
                <div class="der">
                    <header class="cabeza">
                        <h3><?php echo $consulta;?></h3>
                        <div>
                            <p><b>Autor: </b><?php echo $autor;?></p>
                        </div>
                    </header>
                    <p class="sinopsis" id="sinopsisTexto">
                    <?php echo $sinopsis;?>
                    </p>
                    <a href="detalles_libro.php?isbn=<?php echo $isbn; ?>">Ver detalles</a>
                    <script>
                    function limitarPalabras(texto) {
                        var palabras = texto.trim().split(" ");

                        if (palabras.length > 20) {
                            palabras = palabras.slice(0, 20);
                            return palabras.join(' ') + '...';
                        } else {
                            return texto;
                        }
                    }
                    var sinopsisElemento = document.getElementById('sinopsisTexto');
                    var sinopsisTexto = sinopsisElemento.textContent;
                    var sinopsisLimitada = limitarPalabras(sinopsisTexto);
                    sinopsisElemento.textContent = sinopsisLimitada;
                    </script>
                </div>
            </div>
        </li>
                <?php
                        }
                ?>
            </ul>
            <button id="mostrar">Mostrar Elementos Ocultos</button>
            <script>
                 var indiceMostrar = 0;
                 var mostrarCantidad = 3;
                document.getElementById("mostrar").addEventListener('click', function() {
                    var elementosOcultos = document.querySelectorAll('.estiloli[style="display: none;"]');

                for (var i = indiceMostrar; i < indiceMostrar + mostrarCantidad && i < elementosOcultos.length; i++) {
                    elementosOcultos[i].style.display = 'list-item';
                }
                indiceMostrar+3;
                if (indiceMostrar >= elementosOcultos.length-3) {
                    document.querySelector('button').style.display = 'none';
                }
                });
                </script>
                    </div>
            <?php
        }
}
?>
<div class="derecha">
<h2><p align="center">FILTROS</p></h2>
<br>
<div id="menuhorizontal">
<h3><p align="center">TIPO</p></h3>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=ciencia".$enlace;
}else{
    echo"tipo=ciencia";
} 
?>">Ciencia</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=arte".$enlace;
}else{
    echo"tipo=arte";
} 
?>">Arte</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=medicina".$enlace;
}else{
    echo"tipo=medicina";
} 
?>">Medicina</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=deporte".$enlace;
}else{
    echo"tipo=deporte";
} 
?>">Deporte</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=ficcion".$enlace;
}else{
    echo"tipo=ficcion";
} 
?>">Ficcion</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=aventura".$enlace;
}else{
    echo"tipo=aventura";
} 
?>">Aventura</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=religion".$enlace;
}else{
    echo"tipo=religion";
} 
?>">Religion</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['idioma']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['idioma'])){
     $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "tipo=historia".$enlace;
}else{
    echo"tipo=historia";
} 
?>">Historia</a><br>
</div>
<br>
<h3><p align="center">Público</p></h3>
<div id="menuhorizontal">
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['idioma']) || isset($_GET['ano']))
{
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "publico=adulto".$enlace;
}else{
    echo"publico=adulto";
} 
?>">Adulto</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['idioma']) || isset($_GET['ano']))
{
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "publico=infantil".$enlace;
}else{
    echo"publico=infantil";
} 
?>">Infantil</a><br>
</div>
<br>
<h3><p align="center">Idioma</p></h3>
<div id="menuhorizontal">
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "idioma=castellano".$enlace;
}else{
    echo"idioma=castellano";
} 
?>">Castellano</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "idioma=ingles".$enlace;
}else{
    echo"idioma=ingles";
} 
?>">Inglés</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['ano']))
{
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['ano'])){
        $enlace = "&ano=".$_GET['ano'].$enlace; 
    }
    echo "idioma=frances".$enlace;
}else{
    echo"idioma=frances";
} 
?>">Francés</a><br>
</div>
<br>
<h3><p align="center">Fecha publicación</p></h3>
<div id="menuhorizontal">
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['idioma']))
{
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    echo "ano=10".$enlace;
}else{
    echo"ano=10";
} 
?>">Menos de 10 años</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['idioma']))
{
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    echo "ano=20".$enlace;
}else{
    echo"ano=20";
} 
?>">Menos de 20 años</a><br>
<a href="libros.php?
<?php
$enlace ="";
if(isset($_GET['tipo']) || isset($_GET['publico']) || isset($_GET['idioma']))
{
    if(isset($_GET['tipo'])){
     $enlace = "&tipo=".$_GET['tipo'].$enlace; 
    }
    if(isset($_GET['publico'])){
        $enlace = "&publico=".$_GET['publico'].$enlace; 
    }
    if(isset($_GET['idioma'])){
        $enlace = "&idioma=".$_GET['idioma'].$enlace; 
    }
    echo "ano=30".$enlace;
}else{
    echo"ano=30";
} 
?>">Menos de 30 años</a><br>
</div>
</div>
</div>
<br><br><br><br><br><br>
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
</body>
</html>