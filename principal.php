<?php
session_start();
if(isset($_SESSION["name"])){
    if ($_SESSION["name"] === "admin") {
        $link = '<a href="adminpag/formulariosadmin.php">PAG ADMIN</a>';
    } else {
        $link = '<a href="registroinicio/cerrar_sesion.php">Cerrar sesión</a>';
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuBiblioWeb</title>
    <link rel="stylesheet" href="estilos/estiloprincipal.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
    <header>
        <div class="header-contenido">
            <div class="logo">
                <a href="principal.php" style="color: inherit; text-decoration: none;"><h1>TuBiblio<b>Web</b></h1></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="menu/VERreservas.php">Reservas</a></li>
                        <li><a href="#">Horarios</a></li>
                        <li><a href="menu/libros.php">Libros</a></li>
                        <li id="cambio"><a href="registroinicio/iniciar_sesion.php">Iniciar Sesión</a></li>
                        <li><div style="display: flex;">
                            <form method="get" action="menu/libros.php"> 
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
    </header>
    <main>
        <h1 style="Font-Family: Cambria Bold;">Los libros que necesitas en TuBiblioWeb</h1>
        <h3>Registrate en nuestra biblioteca física y accede a todas la funcionalidades de la web</h3>
        <br><br>
        <button>Información</button>
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
                    <td><img src="imagenes/tlf.png" width="40px">TLF: 666 666 666</td>
                    <td><img src="imagenes/facebook.png" width="40px">facebook</td>
                    <td><a href="pie/avisolegal.php">Aviso legal</a></td>
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
            </table>
        </div>
    </footer>
</body>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var cambio = document.getElementById("cambio");
    if (cambio) {
        cambio.innerHTML = '<?php echo $link; ?>';
    }
});
</script>
</html>
