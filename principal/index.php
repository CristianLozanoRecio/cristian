<?php
session_start();
$_SESSION['sitio'] = 'inicio';
include("../especial.php");
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
    <link rel="stylesheet" href="../estilos/estiloprincipal.css">
    <link rel="stylesheet" href="../estilos/estilogeneral.css">
    <link rel="icon" href="../imagenes/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
                <a href="#" style="color: inherit; text-decoration: none;"><h1>TuBiblio<b>Web</b></h1></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="#" id="inicio">Inicio</a></li>
                        <li><a href="../menu/VERreservas.php" id="reserva">Reservas</a></li>
                        <li><a href="../menu/info.php" id="informacion">Información</a></li>
                        <li><a href="../menu/libros.php" id="libros">Libros</a></li>
                        <li id="cambio"></li>
                        <li ><div class="busqueda2">
            <form method="get" action="../menu/libros.php"> 
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
            <form method="get" action="../menu/libros.php"> 
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
            <form method="get" action="../menu/libros.php"> 
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
        <center>
            <nav>
                <ul>
                    <li><a href="#" id="inicio2"><i class="fa-solid fa-house"></i>Inicio</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="../menu/VERreservas.php"><i class="fa-solid fa-calendar-check"></i>Reservas</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="../menu/info.php"><i class="fa-solid fa-info"></i>Información</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="../menu/libros.php"><i class="fa-solid fa-book"></i>Libros</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li id="cambio2"><a href="../registroinicio/iniciar_sesion.php"><i class="fa-solid fa-door-open"></i>Iniciar Sesión</a></li>
                </ul>
            </nav>
</center>
        </div>
<br><br>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="slide-content">
        <a  href="https://maps.app.goo.gl/j6xot1WuF4E9KL8U7"  target="_blank">
        <img src="../imagenes/portada.png" alt="Portada" class="imagenportada">
       <p class="text-overlay"> VISÍTANOS</p></a>
      </div>
    </div>
      <div class="swiper-slide">
        <div class="slide-content">
        <a  href="../menu/libros.php"  target="_blank">
        <img src="../imagenes/slider2.png" alt="Portada2" class="imagenportada">
       <p class="text-overlay2"> LO QUE BUSCAS</p></a>
      </div>
    </div>
      <div class="swiper-slide">
      <div class="slide-content">
        <?php 
        include("../con_db.php");
            $consulta = "SELECT *, count(isbn_libro) as total_likes FROM LIBRO INNER JOIN LIKE_LIBRO ON LIBRO.isbn = like_libro.isbn_libro INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE like_libro.fecha_like >= DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY LIBRO.isbn, LIBRO.titulo ORDER BY total_likes DESC LIMIT 1";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $fila = mysqli_fetch_assoc($resultado);
                echo   '<a href="../menu/detalles_libro.php?isbn='. urlencode(base64_encode($fila["isbn"])).'"><img src="' . cambio($fila["portada_libro"]) . '" title="' . htmlspecialchars($fila["titulo"]) . '" class="librodestacado"></a>';            
                echo   '<p class="text-overlay4">Autor:<br>' . $fila["nombre"] .'</p>';   
            }
        ?>
        <p class="text-overlay3">Libro destacado <br>de la semana</p>
      </div>
      </div>
    </div>
    <br><br>
    <div class="swiper-pagination"></div>
  </div>

<?php        
include("../con_db.php");
    $consulta = "SELECT *, count(isbn_libro) as total_likes FROM LIBRO INNER JOIN LIKE_LIBRO ON LIBRO.isbn = like_libro.isbn_libro INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE like_libro.fecha_like >= DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY LIBRO.isbn, LIBRO.titulo ORDER BY total_likes ASC LIMIT 15";
    $resultado = mysqli_query($conex, $consulta);

    echo '<div class="container" id="container100">';

    ?>
    
    <div class="botonquieto">
        <button class="menos"><i class="fa-solid fa-arrow-left"></i></button>
    </div>
    <div class="list-container">
        <?php    
        echo '<h2>Libros destacados de la semana 😲 </h2>';?>
        <ul>
        <?php
        if ($resultado && $resultado->num_rows > 0) {
            while ($row = $resultado->fetch_array()) {
                $portada = cambio($row["portada_libro"]);
                $titulo = cambio($row["titulo"]);
                $isbn = cambio($row['isbn']);
                $autor = cambio($row['nombre']);
                echo '<li class="lislider" style="display: none">';
                echo '<a href="../menu/detalles_libro.php?isbn='. urlencode(base64_encode($isbn)).'"><img src="' . $portada . '" title="' . htmlspecialchars($titulo) . '" class="imagen"></a>';
                echo '<div class="hover-fondo"><p style="color: white;">' . $autor . '</p></div>'; 
                echo '</li>';
            }
        }
        ?>
        </ul>
    </div>
    <div class="botonquieto">
        <button class="mas"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
    </div>
    <hr>
    <?php
?>
    <?php        
include("../con_db.php");
$tipo = ["ciencia", "arte", "medicina", "deporte", "ficción", "aventura", "religión", "historia"];
$emojis = [
    "ciencia" => "🔬",
    "arte" => "🎨",
    "medicina" => "💊",
    "deporte" => "⚽",
    "ficción" => "📖",
    "aventura" => "🗺️",
    "religión" => "🙏",
    "historia" => "📜"
];
for ($i = 0; $i < count($tipo); $i++) {
    $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '".$tipo[$i]."'";
    $resultado = mysqli_query($conex, $consulta);

    echo '<div class="container" id="container' . $i . '">';

    ?>
    
    <div class="botonquieto">
        <button class="menos"><i class="fa-solid fa-arrow-left"></i></button>
    </div>
    <div class="list-container">
        <?php    
        $tipo_actual = htmlspecialchars($tipo[$i]);
        $emoji = isset($emojis[$tipo_actual]) ? $emojis[$tipo_actual] : '';
        echo '<a href="../menu/libros.php?tipo=' . urlencode(base64_encode($tipo[$i])) .'"><h2>Sección ' . ucfirst($tipo_actual) . ' ' . $emoji . '</h2></a>';?>
        <ul>
        <?php
        if ($resultado && $resultado->num_rows > 0) {
            while ($row = $resultado->fetch_array()) {
                $portada = cambio($row["portada_libro"]);
                $titulo = cambio($row["titulo"]);
                $isbn = cambio($row['isbn']);
                $autor = cambio($row['nombre']);
                echo '<li class="lislider" style="display: none">';
                echo '<a href="../menu/detalles_libro.php?isbn='. urlencode(base64_encode($isbn)).'"><img src="' . $portada . '" title="' . htmlspecialchars($titulo) . '" class="imagen"></a>';
                echo '<div class="hover-fondo"><p style="color: white;">' . $autor . '</p></div>'; 
                echo '</li>';
            }
        }
        ?>
        </ul>
    </div>
    <div class="botonquieto">
        <button class="mas"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
    </div>
    <hr>
    <?php
}
?>
<center>
<a href="../menu/libros.php" class="vertodo">VER TODO</a>
</center>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../javascript/principal.js">

</script>

<?php
echo "<script>
    var linkcambio = '$link';
    var link2cambio = '$link2';
</script>";
?>
    <script>
document.addEventListener("DOMContentLoaded", function() {

    <?php 

    if($_SESSION['sitio'] == 'inicio'){
    ?>
    document.getElementById("inicio").style.color = 'orange';
    document.getElementById("inicio2").style.color = 'aliceblue';
    <?php }?>
});
</script>   
 <script src="../javascript/menumovil.js"></script>
 <script src="../javascript/cambio.js"></script>
 <script src="../javascript/cookie.js"></script>

</body>
</html>
<?php
$_SESSION['sitio'] = '';
mysqli_close($conex);
?>
