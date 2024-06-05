<?php
session_start();
$_SESSION['sitio'] = 'inicio';
if(isset($_SESSION["name"])){
    if ($_SESSION["name"] === "admin") {
        $link = '<a href="adminpag/formulariosadmin.php">PAG ADMIN</a>';
        $link2 = '<a href="adminpag/formulariosadmin.php"><i class="fa-solid fa-hat-cowboy"></i>PAG ADMIN</a>';

    } else {
        $link = '<a href="registroinicio/cerrar_sesion.php">Cerrar sesión</a>';
        $link2 = '<a href="registroinicio/cerrar_sesion.php"><i class="fa-solid fa-door-closed"></i>Cerrar sesión</a>';
    }
}else{
    $link = '<a href="registroinicio/iniciar_sesion.php">Iniciar Sesión</a>';
    $link2 = '<a href="registroinicio/iniciar_sesion.php"><i class="fa-solid fa-door-open"></i>Iniciar Sesión</a>';

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <li><a href="#" id="inicio">Inicio</a></li>
                        <li><a href="menu/VERreservas.php" id="reserva">Reservas</a></li>
                        <li><a href="#" id="informacion">Información</a></li>
                        <li><a href="menu/libros.php" id="libros">Libros</a></li>
                        <li id="cambio"></li>
                        <li ><div class="busqueda2">
            <form method="get" action="menu/libros.php"> 
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
            <form method="get" action="menu/libros.php"> 
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
            <form method="get" action="menu/libros.php"> 
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
                    <li><a href="#" id="inicio2"><i class="fa-solid fa-house"></i>Inicio</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="menu/VERreservas.php"><i class="fa-solid fa-calendar-check"></i>Reservas</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="#"><i class="fa-solid fa-info"></i>Información</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="menu/libros.php"><i class="fa-solid fa-book"></i>Libros</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li id="cambio2"><a href="registroinicio/iniciar_sesion.php"><i class="fa-solid fa-door-open"></i>Iniciar Sesión</a></li>
                </ul>
            </nav>
        </div>
        <h1 style="font-family: 'Open Sans', sans-serif; color: white;">LOS LIBROS QUE NECESITAS</h1>
        <h3 style="color: white;">Registrate físicamente y accede a todos </h3>
        <br><br>
        <button class="info" style="color: black;">Información</button>
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
                    <td><img src="imagenes/facebook.png" width="40px"></td>
                    <td><a href="pie/avisolegal.php">Aviso legal</a></td>
                </tr>
                <tr>
                    <td>Dirección: C/XXXX</td>
                    <td><img src="imagenes/Insta.png" width="40px"></td>
                    <td><a href="pie/politicacookies.php">Política de Cookies</a></td>
                </tr>
                <tr>
                    <td>CP: 112XX</td>
                    <td><img src="imagenes/yt.png" width="40px"></td>
                    <td><a href="pie/protecciondedatos.php">Protección de datos</a></td>
                </tr>
            </table>
        </div>
    </footer>
    <script>
        $(document).ready(function(){
            $('#menumovil').click(function(){
                $('#buscar2').toggle(); 
                var $menu = $('#menulateralmovil');
                if ($menu.width() === 0) {
                    $menu.animate({
                        width: '100%', 
                        right: '0' 
                    }, 'slow');
                } else {
                    $menu.animate({
                        width: '0', 
                    }, 'slow');
                }
            });
        });

    </script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var cambio = document.getElementById("cambio");
    if (cambio) {
        cambio.innerHTML = '<?php echo $link; ?>';
    }

    var cambio2 = document.getElementById("cambio2");
    if (cambio2) {
        cambio2.innerHTML = '<?php echo $link2; ?>';
    }
    <?php 
    if($_SESSION['sitio'] == 'inicio'){
    ?>
    document.getElementById("inicio").style.color = 'orange';
    document.getElementById("inicio2").style.color = 'aliceblue';
    <?php }?>
});
</script>
</body>
</html>
<?php
$_SESSION['sitio'] = '';
?>
