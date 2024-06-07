<?php
session_start();
$_SESSION['sitio'] = 'reservas';

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
    <link rel="stylesheet" href="../estilos/estilolibros.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="cerebro">
        <div class="header-contenido">
            <div class="logo">
                <a href="../principal.php" style="color: inherit; text-decoration: none;">
                    <h1>TuBiblio<b>Web</b></h1>
                </a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="../principal.php" id="inicio">Inicio</a></li>
                        <li><a href="VERreservas.php" id="reserva">Reservas</a></li>
                        <li><a href="/info.php" id="informacion">Información</a></li>
                        <li><a href="libros.php" id="libros">Libros</a></li>
                        <li id="cambio"></li>
                        <li>
                            <div class="busqueda2">
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
                <div class="busqueda">
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
                        <li><a href="#" class="icon-button" id="menumovil"><i class="fa-solid fa-bars fa-2x"></i></a></li>
                        <div class="busqueda" id="buscar2">
                            <form method="get" action="libros.php">
                                <div class="buscar">
                                    <input type="text" placeholder="Búsqueda por título" name="titulo" required />
                                    <div class="btn">
                                        <button class="pulsarbuscar"><i class="fas fa-search icon fa-2x"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div id="menulateralmovil">
            <nav>
                <ul>
                    <li><a href="../principal.php"><i class="fa-solid fa-house"></i>Inicio</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="VERreservas.php"><i class="fa-solid fa-calendar-check"></i>Reservas</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="info.php"><i class="fa-solid fa-info"></i>Información</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="libros.php" id="libros2"><i class="fa-solid fa-book"></i>Libros</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li id="cambio2"><a href="../registroinicio/iniciar_sesion.php"><i class="fa-solid fa-door-open"></i>Iniciar Sesión</a></li>
                </ul>
            </nav>
        </div>
        <?php
        if (isset($_SESSION["isbn"])) {
            include("../con_db.php");

            $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE isbn = '" . $_SESSION["isbn"] . "'";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado) {
                echo '<center>';
                while ($row = $resultado->fetch_array()) {
                    $imagen_url = $row["portada_libro"];
                    $autor = $row["nombre"];
                    $titulo = $row["titulo"];
                    $tipo = $row["tipo"];
                    echo '<img src=' . $imagen_url . ' width="300vw"/>';
                    echo '<h3>RESERVA COMPLETA!!!</h3><br>';
                    echo '<p>Tienes hasta ' . $_SESSION["fecha_fin"] . ' para recoger el libro</p>';
                }
                echo '</center>';
            }

            $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '" . $tipo . "' ORDER BY RAND() LIMIT 3";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado) {
                echo '<h2 style="margin-top:20vh;">Nuestras Recomendaciones Por Género</h2>';
                echo '<table>';
                $libros = [];
                while ($row = $resultado->fetch_assoc()) {
                    $libros[] = $row;
                }

                if (count($libros) > 0) {
                    echo '<table style="width: 100%; text-align: center;">';
                    echo '<tr>';
                    foreach ($libros as $libro) {
                        echo '<td><img src="' . $libro["portada_libro"] . '" width="200vw" /></td>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    foreach ($libros as $libro) {
                        echo '<td>' . $libro["titulo"] . '<br><a href="detalles_libro.php?isbn=' . urlencode(base64_encode($libro["isbn"])) . '">Ver detalles</a></td>';
                    }
                    echo '</tr>';
                    echo '</table>';
                }
                mysqli_close($conex);
            }
        }
        ?>
        <br><br><br>
    </main>
    <div class="pie">
        <table class="tablapie">
            <tr>
                <td><h3>Contacto</h3></td>
                <td><h3>Redes</h3></td>
                <td><h3>Políticas</h3></td>
            </tr>
            <tr>
                <td><img src="../imagenes/tlf.png" width="40px"> TLF: 666 666 666</td>
                <td><img src="../imagenes/facebook.png" width="40px"> Facebook</td>
                <td><a href="../pie/avisolegal.php">Aviso legal</a></td>
            </tr>
            <tr>
                <td>Dirección: C/XXXX</td>
                <td><img src="../imagenes/Insta.png" width="40px"> Instagram</td>
                <td><a href="../pie/politicacookies.php">Política de Cookies</a></td>
            </tr>
            <tr>
                <td>CP: 112XX</td>
                <td><img src="../imagenes/yt.png" width="40px"> YT</td>
                <td><a href="../pie/protecciondedatos.php">Protección de datos</a></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="#">Mapa web</a></td>
            </tr>
        </table>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if ($_SESSION['sitio'] == 'reservas') { ?>
            document.getElementById("reserva").style.color = 'orange';
        <?php } ?>
    });

    var linkcambio = '<?php echo $link; ?>';
    var link2cambio = '<?php echo $link2; ?>';
    </script>
    <script src="../javascript/menumovil.js"></script>
    <script src="../javascript/cambio.js"></script>
</body>
</html>
