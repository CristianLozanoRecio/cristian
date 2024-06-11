<?php
session_start();
include("../especial.php");
$_SESSION['sitio'] = 'reservas';
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
    <link rel="stylesheet" href="../estilos/estilodetallelibros.css">
    <link rel="stylesheet" href="../estilos/estilogeneral.css">
    <link rel="icon" href="../imagenes/favicon.png" type="image/png">
      
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="cookie"><p>
    Utilizamos cookies para mejorar tu experiencia en nuestro sitio web. Al continuar navegando, aceptas nuestra 
    <a href="../pie/politicacookies.php" target="_blank" style="color: #fff; text-decoration: underline;">Política de Privacidad</a> y el uso de cookies.
  </p>
        <button class="cookieboton" id="ok">ACEPTAR</button>
        <button class="cookieboton" id="mal">RECHAZAR</button>
    </div>
    <header class="cerebro">
        <div class="header-contenido">
            <div class="logo">
            <a href="../principal/index.php"  style="color: inherit; text-decoration: none;"><h1>TuBiblio<b>Web</b></h1></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="../principal/index.php"  id="inicio">Inicio</a></li>
                        <li><a href="VERreservas.php" id="reservas">Reservas</a></li>
                        <li><a href="info.php" id="informacion">Información</a></li>
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

    <main style="min-heigth: 100vh;">
        <div id="menulateralmovil">
            <nav>
                <ul>
                    <li><a href="../principal/index.php" ><i class="fa-solid fa-house"></i>Inicio</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="VERreservas.php" id="reservas2"><i class="fa-solid fa-calendar-check"></i>Reservas</a></li>
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
    <br><br><br><br><br><br>
    <?php 
    if(isset($_SESSION["name"])){
include("../con_db.php");
$consulta = "SELECT * FROM reserva INNER JOIN libro ON reserva.isbn_libro = libro.isbn WHERE  correo_usuario = '" . $_SESSION["correo"] . "'";
$resultado = mysqli_query($conex, $consulta);

if ($resultado) {
    if ($resultado->num_rows>0){
    ?>
    <center>
        <caption>TUS RESERVAS</caption>
    <table class="tablaRESERVA">
        <tr>
            <td><strong>TÍTULO</strong></td>
            <td><strong>ISBN LIBRO</strong></td>
            <td><strong>TIEMPO LÍMITE RECOGIDA</strong></td>
        </tr>
        <?php
        while ($row = $resultado->fetch_array()) {
            $id_reserva = cambio($row["id_reserva"]);
            $fecha_fin_str = cambio($row["fecha_fin"]);
            $fecha_inicio = new DateTime();
            $fecha_fin = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_fin_str);
            $isbn_libro = cambio($row["isbn_libro"]);
            $intervalo = $fecha_inicio->diff($fecha_fin);
            $dias = $intervalo->format('%a'); 
            $horas = $intervalo->format('%h');
            $minutos = $intervalo->format('%i');
            $segundos = $intervalo->format('%s');
            $titulo = cambio($row["titulo"]);
            ?>
            <tr>
            <td><?php echo $titulo?></td>
                <td class="isbn"><?php echo $isbn_libro?></td>
                <td style="width: 20vw;">
            <div class="contador" data-dias="<?php echo $dias; ?>" data-horas="<?php echo $horas; ?>" data-minutos="<?php echo $minutos; ?>" data-segundos="<?php echo $segundos; ?>">
                <?php echo "$dias días, $horas horas, $minutos minutos, $segundos segundos"; ?>
            </div></td>
            <td><button class="borrar" data-id="<?php echo $id_reserva; ?>" data-tipo="id_reserva"><i class="fa-solid fa-square-minus fa-2x"></i></button></td>
        <?php } ?> </table>
    </center>

    <script>

        var contadores = document.querySelectorAll('.contador');
        contadores.forEach(function(contador) {
            var dias = parseInt(contador.getAttribute('data-dias'));
            var horas = parseInt(contador.getAttribute('data-horas'));
            var minutos = parseInt(contador.getAttribute('data-minutos'));
            var segundos = parseInt(contador.getAttribute('data-segundos'));
            function actualizarContador() {
                if (segundos > 0) {
                    segundos--;
                } else {
                    segundos = 59;
                    if (minutos > 0) {
                        minutos--;
                    } else {
                        minutos = 59;
                        if (horas > 0) {
                            horas--;
                        } else {
                            horas = 23;
                            if (dias > 0) {
                                dias--;
                            }
                        }
                    }
                }
                contador.innerHTML = dias + " días, " + horas + " horas, " + minutos + " minutos, " + segundos + " segundos";
            }

            setInterval(actualizarContador, 1000);
        });
    </script>

<?php
    }else{
        
        echo "<center><h1>No has realizado ninguna reserva a lo mejor</h1><br>";
        include("../con_db.php");
        $consulta = "SELECT * FROM libro ORDER BY RAND() LIMIT 1";
        $resultado = mysqli_query($conex, $consulta);
        $mostrar = mysqli_fetch_assoc($resultado);
        echo "<img src='".$mostrar["portada_libro"]."' style='width:200px; height:250px;'>";
        echo "<br><h1><a href='detalles_libro.php?isbn=".urlencode(base64_encode($mostrar["isbn"]))."' style='color:blue;'>te interesa</a></h1>";
    }
}
mysqli_close($conex);
    }else{
        echo "<script>window.location.href = '../registroinicio/iniciar_sesion.php';</script>";

    }
?>

                
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
                    <td>TLF:  956 67 07 67</td>
                    <td><a href="https://www.facebook.com/institutokursaal/?locale=es_ES" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a></td>
                    <td><a href="../pie/avisolegal.php">Aviso legal</a></td>
                </tr>
                <tr>
                    <td>Dirección: Av. <br>Virgen de Europa, 4</td>
                    <td><a href="https://www.youtube.com/channel/UCj7am8zL4_-yEIvjWPSl1_A" target="_blank"><i class="fa-brands fa-youtube fa-2x"></i></td>
                    <td><a href="../pie/politicacookies.php">Política de Cookies</a></td>
                </tr>
                <tr>
                    <td>CP: 11202</td>
                    <td><a href="https://www.instagram.com/ieskursaal/?hl=es" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i></td>
                    <td><a href="../pie/protecciondedatos.php">Protección de datos</a></td>
                </tr>
            </table>
        </div>
    </footer>
        <script src="../javascript/menumovil.js"> </script>
    <?php    echo "<script>
    var linkcambio = '$link';
    var link2cambio = '$link2';
</script>";
?>
    <script src="../javascript/cambio.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    <?php 
    if($_SESSION['sitio'] == 'reservas'){
    ?>
    document.getElementById("reservas").style.color = 'orange';
    document.getElementById("reservas2").style.color = 'aliceblue';
    <?php }?>
    });
</script>
<script src="../javascript/borrarrservaajax.js"></script>
<script src="../javascript/cookie.js"></script>
</body>
</html>
<?php
$_SESSION['sitio'] = '';
?>

