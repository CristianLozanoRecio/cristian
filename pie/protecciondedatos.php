<?php
session_start();
if (isset($_SESSION["name"]) === "admin") {
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var cambio = document.getElementById("cambio");
                if (cambio) {
                    cambio.innerHTML = \'<a href="../registroinicio/cerrar_sesion.php">Cerrar sesión</a>\';
                }
            });
          </script>';
}else if(isset($_SESSION["name"])){
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var cambio = document.getElementById("cambio");
        if (cambio) {
            cambio.innerHTML = \'<a href="../adminpag/formulariosadmin.php">PAG ADMIN</a>\';
        }
    });
  </script>';
}
else{
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
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
                        <li><a href="../principal.php">Inicio</a></li>
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Horarios</a></li>
                        <li><a href="#">Libros</a></li>
                        <li id="cambio"><a href="../registroinicio/registro.php">REGISTRATE</a></li>
                        <li><div style="display: flex;">
                            <form method="get" action="../menu/libros.php"> 
                                <div class="buscar">
                                <input type="text" placeholder="Búsqueda por título" name="buscar" required />
                                <div class="btn">
                                    <i class="fas fa-search icon"></i>
                                </div>
                        </form>
                            </li>
                    </ul>
                </nav>
            </div>
        </div>

</div>
    </div>
    </header>
    <main style="margin: 30px; margin-top:100px">
    <p>En cumplimiento con lo establecido en el Reglamento General de Protección de Datos (RGPD), a continuación se detallan las prácticas de protección de datos de este sitio web:</p>

<h2>Responsable del tratamiento de datos</h2>
<p>El responsable del tratamiento de los datos personales recogidos a través de este sitio web es [Nombre de la Biblioteca], con domicilio en [Dirección] y número de identificación fiscal [CIF].</p>

<h2>Finalidad del tratamiento</h2>
<p>Los datos personales que recopilamos a través de este sitio web se utilizan para los siguientes propósitos:</p>
<ul>
    <li>Gestión de préstamos y devoluciones de material bibliográfico.</li>
    <li>Envío de comunicaciones relacionadas con actividades y servicios de la biblioteca.</li>
    <li>Análisis estadístico y mejora de nuestros servicios.</li>
</ul>

<h2>Base legal para el tratamiento</h2>
<p>El tratamiento de datos personales se basa en el consentimiento del usuario o en la necesidad de llevar a cabo medidas contractuales o precontractuales.</p>

<h2>Derechos de los usuarios</h2>
<p>Los usuarios tienen derecho a acceder, rectificar, limitar u oponerse al tratamiento de sus datos personales. Para ejercer estos derechos, pueden ponerse en contacto con nosotros a través de los datos de contacto proporcionados en nuestro <a href="/aviso-legal">Aviso Legal</a>.</p>

<h2>Seguridad de los datos</h2>
<p>Implementamos medidas de seguridad técnicas y organizativas adecuadas para proteger los datos personales contra la pérdida, el acceso no autorizado u otras formas de tratamiento indebido.</p>

<h2>Transferencias internacionales</h2>
<p>En caso de que se realicen transferencias internacionales de datos, se tomarán las medidas necesarias para garantizar un nivel adecuado de protección de acuerdo con la legislación aplicable.</p>

<h2>Modificaciones en la política</h2>
<p>Nos reservamos el derecho de actualizar o modificar esta política de protección de datos en cualquier momento. Se publicará la versión actualizada en nuestro sitio web junto con la fecha de entrada en vigor.</p>

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
            </table>
        </div>
</footer>
<script src="../javascript/libros.js"></script>
</body>
</html>