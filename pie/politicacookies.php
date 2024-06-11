<?php
session_start();
$_SESSION['sitio'] = '';
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
    <br><br><br>
    <div style="margin: 20px;">
<p>
<h1>Política de Cookies</h1>
<br>
Esta página web utiliza cookies para mejorar la experiencia del usuario y proporcionar funcionalidades adicionales. Al utilizar este sitio web, usted acepta el uso de cookies de acuerdo con esta política. Si no está de acuerdo con el uso de cookies, por favor absténgase de utilizar este sitio.
<br><br>
<h2>¿Qué son las cookies?</h2>
<br>
Las cookies son pequeños archivos de texto que se almacenan en su dispositivo cuando visita un sitio web. Estos archivos contienen información que puede ser útil para personalizar la experiencia de navegación, como preferencias de idioma y otras configuraciones.
<br><br>
<h2>Tipos de Cookies Utilizadas</h2>
<br>
Cookies Esenciales: Estas cookies son esenciales para el funcionamiento básico del sitio web. Nos permiten autenticar usuarios, mantener sesiones de usuario y garantizar la seguridad del sitio.
<br>
Cookies de Funcionalidad: Estas cookies se utilizan para recordar las preferencias del usuario y mejorar la funcionalidad del sitio web. Por ejemplo, pueden recordar el nombre de usuario en el inicio de sesión o la configuración de idioma preferida.
<br>
Cookies de Rendimiento: Estas cookies recopilan información sobre cómo los visitantes utilizan el sitio web, como qué páginas visitan con más frecuencia y si encuentran algún error. Estos datos nos ayudan a mejorar el rendimiento y la usabilidad del sitio.
<br>
Cookies de Publicidad: Esta web no utiliza cookies de publicidad.
<br><br>
<h2>Control de Cookies</h2>
<br>
Usted puede controlar y gestionar las cookies de diversas maneras. La mayoría de los navegadores web permiten aceptar o rechazar cookies, así como eliminar las ya existentes. Tenga en cuenta que la desactivación de cookies puede afectar la funcionalidad de ciertas partes del sitio web.
<br>
<h2>Cambios en la Política de Cookies</h2>
<br>
Nos reservamos el derecho de modificar esta política de cookies en cualquier momento. Cualquier cambio significativo será notificado a través de nuestra página web. Se recomienda revisar periódicamente esta política para estar informado sobre cómo utilizamos las cookies.
<br><br>
<h2>Contacto</h2>
<br>
Si tiene alguna pregunta o inquietud sobre nuestra política de cookies, no dude en ponerse en contacto con nosotros a través de la información proporcionada en la sección de contacto de este sitio web.</p>
</div>      
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
                    <td><a href="avisolegal.php">Aviso legal</a></td>
                </tr>
                <tr>
                    <td>Dirección: Av. <br>Virgen de Europa, 4</td>
                    <td><a href="https://www.youtube.com/channel/UCj7am8zL4_-yEIvjWPSl1_A" target="_blank"><i class="fa-brands fa-youtube fa-2x"></i></td>
                    <td><a href="politicacookies.php">Política de Cookies</a></td>
                </tr>
                <tr>
                    <td>CP: 11202</td>
                    <td><a href="https://www.instagram.com/ieskursaal/?hl=es" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i></td>
                    <td><a href="protecciondedatos.php">Protección de datos</a></td>
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
<script src="../javascript/borrarrservaajax.js"></script>
<script src="../javascript/cookie.js"></script>
</body>
</html>
<?php
$_SESSION['sitio'] = '';
?>

