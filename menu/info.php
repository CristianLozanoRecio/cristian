<?php
session_start();
$_SESSION['sitio'] = 'info';
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
    <link rel="stylesheet" href="../estilos/estiloinfo.css">
    <link rel="stylesheet" href="../estilos/estilogeneral.css">
    <link rel="stylesheet" href="../estilos/estilocookie.css">
    <link rel="icon" href="../imagenes/favicon.png" type="image/png">   <link
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
                        <li><a href="VERreservas.php" id="reserva">Reservas</a></li>
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
    <main>
        <div id="menulateralmovil">
            <nav>
                <ul>
                    <li><a href="../principal/index.php"  ><i class="fa-solid fa-house"></i>Inicio</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="VERreservas.php" ><i class="fa-solid fa-calendar-check"></i>Reservas</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="info.php" id="informacion2"><i class="fa-solid fa-info"></i>Información</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="libros.php" id="libros2"><i class="fa-solid fa-book"></i>Libros</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li id="cambio2"><a href="../registroinicio/iniciar_sesion.php"><i class="fa-solid fa-door-open"></i>Iniciar Sesión</a></li>
                </ul>
            </nav>
        </div>
<br><br><br>
    <div class="row">                     
        <div class="txt">
        <h2>Tu Biblioteca de apoyo a la física</h2>
        <p>
        En está página web encontrarás de manera rápida los libros que buscas desesperadamente en la biblioteca física, todos los libros y de búsqueda rápida y sencilla.
        </p>

        <a href="libros.php" style="color: orange;">VER</a>
        </div>
        <div class="img" >
            <img src="../imagenes/bibliotecainfo.png" style="width: 100%;"/>
        </div>
    </div>   
    <div class="row">     
         <div class="img">
            <img src="../imagenes/candadopng.png" style="width: 60%;"/>
        </div>                
        <div class="txt">
        <h2>Accede a todo</h2>
        <p>
        Para acceder a todas las funcionalidades deberás registrarte mediante tu correo electrónico para poder hacer reservas y dar likes a los libros.
        </p>
        <a href="../registroinicio/iniciar_sesion.php" style="color: orange;">VER</a>
        </div>
    </div>
    <div class="row">                     
        <div class="txt">
        <h2>Reservas</h2>
        <p>
            Las reservas se realizarán al pulsar al botón de unidades disponibles y a partir del momento de realizar la reserva , dispondrás de una semana para recoger el libro, recuerda el horario para asistir físicamente.
        </p>
        <a href="VERreservas.php" style="color: orange;">VER</a>
        </div>
        <div class="img">
            <img src="../imagenes/libro.png" style="width: 60%;"/>
        </div>  
    </div>   
    <center>
    <h2>Horario</h2><br>
    <table class="horario">
                <thead>
                    <tr>
                        <td></td>
                        <td>Lunes</td>
                        <td>Martes</td>
                        <td>Miércoles</td>
                        <td>Jueves</td>
                        <td>Viernes</td>
                        <td>Sábado</td>
                        <td>domingo</td>
                    </tr>   
                </thead>
                <tbody>
                    <tr>
                    <td>MAÑANA<br>9:00-14:00</td>
                        <td class="green" data-label="Lunes"></td>
                        <td class="green"  data-label="Lunes"></td>
                        <td class="green" data-label="Lunes"></td>
                        <td class="green"></td>
                        <td class="green"></td>
                        <td class="green"></td>
                        <td class="red"></td>
                    </tr>
                    <tr>
                    <td>TARDE<br>16:00-20:00</td>
                        <td class="green"></td>
                        <td class="green"></td>
                        <td class="green"></td>
                        <td class="green"></td>
                        <td class="red"></td>
                        <td class="red"></td>
                        <td class="red"></td>
                    </tr>
                </tbody>
            </table>
            <table class="horariomovil">
                <thead>
                    <tr>
                        <td></td>
                    <td>MAÑANA<br>9:00-14:00</td>
                    <td>TARDE<br>16:00-20:00</td>
                    </tr>
                </thead>
                <tbdoy>
                    <tr>                    
                        <td>Lunes</td>
                        <td class="green"></td>
                        <td  class="green"></td>
                    </tr>
                    <tr>                    
                        <td>Martes</td>
                        <td class="green"></td>
                        <td  class="green"></td>
                    </tr>
                    <tr>                    
                        <td>Miércoles</td>
                        <td class="green"></td>
                        <td  class="green"></td>
                    </tr>
                    <tr>                    
                        <td>Jueves</td>
                        <td class="green"></td>
                        <td  class="green"></td>
                    </tr>
                    <tr>                    
                        <td>Viernes</td>
                        <td class="green"></td>
                        <td  class="red"></td>
                    </tr>
                    <tr>                    
                        <td>Sábado</td>
                        <td class="green"></td>
                        <td  class="red"></td>
                    </tr>
                    <tr>                    
                        <td>Domingo</td>
                        <td class="red"></td>
                        <td  class="red"></td>
                    </tr>
                </tbody>
        </table>

    <h2>Puedes encontrarnos en </h2>
    </center>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3222.351686793864!2d-5.454407399597181!3d36.13364937006811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0c94ceaad65e99%3A0x7897e0a967658cc8!2sIES%20Kursaal!5e0!3m2!1ses!2ses!4v1717514128509!5m2!1ses!2ses" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
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
        <script src="../javascript/menumovil.js"></script>
     <?php   echo "<script>
    var linkcambio = '$link';
    var link2cambio = '$link2';
</script>";
?>
<script src="../javascript/cambio.js"></script>
<script src="../javascript/cookie.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    <?php 
    if($_SESSION['sitio'] == 'info'){
    ?>
    document.getElementById("informacion").style.color = 'orange';
    document.getElementById("informacion2").style.color = 'aliceblue';
    <?php }?>
});
</script>
</body>
</html>
<?php
$_SESSION['sitio'] = '';
?>

