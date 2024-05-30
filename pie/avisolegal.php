<?php
session_start();
if (isset($_SESSION["name"]) === "admin") {
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var cambio = document.getElementById("cambio");
        if (cambio) {
            cambio.innerHTML = \'<a href="../adminpag/formulariosadmin.php">PAG ADMIN</a>\';
        }
    });
  </script>';

}else if(isset($_SESSION["name"])){
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var cambio = document.getElementById("cambio");
                if (cambio) {
                    cambio.innerHTML = \'<a href="../registroinicio/cerrar_sesion.php">Cerrar sesión</a>\';
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
    <p>En cumplimiento con lo establecido en la Ley de Servicios de la Sociedad de la Información y del Comercio Electrónico (LSSICE), a continuación se indican los datos de información general de este sitio web:</p>

<h2>Titularidad del sitio web</h2>
<p>Este sitio web es propiedad de [Nombre de la Biblioteca], con domicilio en [Dirección], y número de identificación fiscal [CIF].</p>

<h2>Contacto</h2>
<p>Puedes contactar con nosotros a través de:</p>
<ul>
    <li>Teléfono: [Número de Teléfono]</li>
    <li>Correo electrónico: [Correo Electrónico]</li>
    <li>Dirección postal: [Dirección Postal]</li>
</ul>

<h2>Uso del sitio web</h2>
<p>El acceso y uso de este sitio web se rige por las condiciones detalladas en nuestra <a href="/politica-de-privacidad">Política de Privacidad</a> y <a href="/condiciones-de-uso">Condiciones de Uso</a>.</p>

<h2>Propiedad intelectual e industrial</h2>
<p>Los contenidos de este sitio web, incluyendo textos, imágenes, diseños, logotipos, y cualquier otro material, están protegidos por las leyes de propiedad intelectual e industrial.</p>

<h2>Responsabilidad</h2>
<p>Nos esforzamos por ofrecer información precisa y actualizada en este sitio web, pero no podemos garantizar su exactitud en todo momento. No nos hacemos responsables del uso que los usuarios puedan hacer de la información aquí proporcionada.</p>

<h2>Legislación aplicable</h2>
<p>Este aviso legal se rige en todos sus extremos por la legislación española. En caso de controversia, las partes se someterán a los tribunales de [Localidad] (España).</p>

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