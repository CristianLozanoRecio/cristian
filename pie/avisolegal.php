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
<h1>Aviso Legal</h1>

Bienvenido/a a la biblioteca virtual de apoyo a la física. Este sitio web es proporcionado como un recurso educativo para estudiantes, profesores e investigadores interesados en la física y disciplinas afines. Antes de utilizar este sitio, por favor, lee detenidamente los siguientes términos y condiciones que rigen su uso.
<br><br>
<h2>1. Propiedad Intelectual</h2>
<br>
Todos los derechos de propiedad intelectual sobre los materiales, recursos y contenido proporcionados en este sitio web son propiedad de la biblioteca de apoyo a la física o de terceros con licencia. Estos materiales están protegidos por leyes de propiedad intelectual y tratados internacionales. Queda estrictamente prohibida la reproducción, distribución, modificación o cualquier otro uso no autorizado de dichos materiales sin el consentimiento previo y por escrito de los propietarios de los derechos.
<br><br>
<h2>2. Uso del Sitio</h2>
<br>
El acceso y uso de este sitio web se rigen por los siguientes términos y condiciones:
<br>
El usuario acepta utilizar este sitio únicamente con fines legales y de acuerdo con estos términos y condiciones.
El usuario acepta no utilizar este sitio de ninguna manera que pueda dañar, sobrecargar o perjudicar su disponibilidad o acceso.
La biblioteca de apoyo a la física se reserva el derecho de modificar, suspender o discontinuar cualquier aspecto del sitio en cualquier momento y sin previo aviso.
<br><br>
<h2>3. Enlaces a Terceros</h2>
<br>
Este sitio web puede contener enlaces a sitios web de terceros para proporcionar recursos adicionales y referencias útiles. La inclusión de estos enlaces no implica necesariamente una aprobación por parte de la biblioteca de apoyo a la física. La biblioteca no se hace responsable de la disponibilidad o del contenido de estos sitios web de terceros.
<br><br>
<h2>4. Limitación de Responsabilidad</h2>
<br>
El usuario utiliza este sitio bajo su propio riesgo. La biblioteca de apoyo a la física no será responsable de ningún daño directo, indirecto, incidental, especial, emergente o punitivo que resulte del uso o la imposibilidad de usar este sitio web, incluyendo, entre otros, daños por pérdida de beneficios, datos o uso.
<br><br>
<h2>5. Ley Aplicable</h2>
<br>
Estos términos y condiciones se regirán e interpretarán de acuerdo con las leyes del lugar de residencia de la biblioteca de apoyo a la física, sin tener en cuenta sus disposiciones sobre conflicto de leyes.
<br><br>
<h2>6. Contacto</h2>
<br>
Si tiene alguna pregunta sobre estos términos y condiciones, por favor póngase en contacto con nosotros a través de la información proporcionada en la sección de contacto de este sitio web.
<br>
Al utilizar este sitio web, usted acepta y está de acuerdo con todos los términos y condiciones establecidos en este aviso legal. Si no está de acuerdo con estos términos, por favor absténgase de utilizar este sitio.
</p>
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

