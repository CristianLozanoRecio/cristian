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
    <link rel="stylesheet" href="../estilos/estiloprincipal.css">
</head>
<body>
    <header>
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
    <div class="slider">
        
    <?php
    include("../con_db.php");
    $libro = "SELECT portada_libro FROM LIBRO WHERE ISBN = '1234567890'";
    $resultado = $conex->query($libro);
   while($row = $resultado->fetch_array()){
    $imagen_url = $row["portada_libro"];
    echo '<img src="data:image/jpeg;base64,'.base64_encode($imagen_url) .' "/>';
                }
?>

    </div>
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
                    <td><img src="imagenes/Insta.png" width="40px">Instagram</td>
                    <td><a href="pie/politicacookies.php">Política de Cookies</a></td>
                </tr>
                <tr>
                    <td>CP: 112XX</td>
                    <td><img src="imagenes/yt.png" width="40px"> YT</td>
                    <td><a href="pie/protecciondedatos.php">Protección de datos</a></td>
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
