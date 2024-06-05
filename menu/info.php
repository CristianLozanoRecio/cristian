<?php
session_start();
$_SESSION['sitio'] = 'info';
if(isset($_SESSION["name"])){
    if ($_SESSION["name"] === "admin") {
        $link = '<a href="adminpag/formulariosadmin.php">PAG ADMIN</a>';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <li><a href="../principal.php" id="inicio">Inicio</a></li>
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
    <main>
<br><br><br>
    <div class="row">                     
        <div class="txt" style="width: 35%;">
        <h2>Tu Biblioteca de apoyo a la física</h2>
        <p>
        En está página web encontrarás de manera rápida los libros que buscas desesperadamente en la biblioteca física, todos los libros y de búsqueda rápida y sencilla.
        </p>
        <button> Catálogo</button>
        </div>
        <div class="img" style="width: 30%;">
            <img src="../imagenes/librofeliz.png" style="width: 60%;"/>
        </div>
    </div>   
    <div class="row">     
         <div class="img" style="width: 30%;">
            <img src="../imagenes/librofeliz.png" style="width: 60%;"/>
        </div>                
        <div class="txt" style="width: 35%;">
        <h2>Accede a todo</h2>
        <p>
        Para acceder a todas las funcionalidades deberás registrarte físicamente en la biblioteca, asi podras reservar libros!
        </p>
        <button>Reserva</button>
        </div>

    </div>
    <center>
    <h2>¡Recuerda nuestro horario!</h2>
    </center>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3222.351686793864!2d-5.454407399597181!3d36.13364937006811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0c94ceaad65e99%3A0x7897e0a967658cc8!2sIES%20Kursaal!5e0!3m2!1ses!2ses!4v1717514128509!5m2!1ses!2ses" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
</main>
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
                <tr>
                    <td></td> <td></td>
                    <td><a href="#">Mapa web</a></td>
                </tr>
            </table>
        </div>
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
    if($_SESSION['sitio'] == 'info'){
    ?>
    document.getElementById("informacion").style.color = 'orange';
    document.getElementById("informacion2").style.color = 'aliceblue';
    <?php }?>
});
</script>
<script>
document.getElementById("desplegar").addEventListener("click", function() {
            var filtros = document.getElementById("filtrosmovil");
            if (filtros.style.display === "none") {
                filtros.style.display = "block";
            } else {
                filtros.style.display = "none";
            }
        });
    </script>
</body>
</html>
<?php
$_SESSION['sitio'] = '';
?>

