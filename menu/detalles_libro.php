<?php
session_start();
$_SESSION['sitio'] = 'libros';
$num_reservas = 0;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
       <link
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
    <script src="../javascript/like.js"></script>
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
                        <li><a href="VERreservas.php" id="reserva">Reservas</a></li>
                        <li><a href="/info.php" id="informacion">Información</a></li>
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
                    <li><a href="../principal.php" ><i class="fa-solid fa-house"></i>Inicio</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="VERreservas.php" ><i class="fa-solid fa-calendar-check"></i>Reservas</a></li>
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

    <br><br><br><br><br><br>
<?php
$inc = include("../con_db.php");
if($inc) {
    if (isset($_GET['isbn'])) {
        $isbn = base64_decode($_GET['isbn']);
        $_SESSION["isbn"] = $isbn;
        $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE isbn = '$isbn'";
    $resultado = mysqli_query($conex,$consulta);
    if($resultado) {
        ?>
        <div class="general">
                <?php
        while($row = $resultado->fetch_array()){
            $imagen_url = $row["portada_libro"];
            $autor = $row["nombre"];
            $biografia = $row["biografia"];
            $titulo = $row["titulo"];
            $sinopsis = $row["sinopsis"];
            $isbn = $row["isbn"];
            $editorial = $row["editorial"];
            $ano_publicacion = $row["ano_publicacion"];
            $disponible = $row["disponible"];

            $idioma = $row["idioma"];
            $tipo = $row["tipo"];
            $publico = $row["publico"];
            $num_likes = $row["num_like"];

                ?>
            <div class="estilo-div">
                <div class="izq">
                    <div style =" width:20vw;">
                    <?php echo '<img src='.$imagen_url .' " class="img"/>';?></div><br>
                    <?php 
                    if ($disponible >= 1) {
                        echo "<button id='buttonclick'>UNIDADES PARA RESERVAR <b>".$disponible."</b></button>";
                    } else {
                        echo "NO TENEMOS UNIDADES PARA RESERVAR";
                    }


    ?>
<br><br>
                    <div class="datos">
                        <div>
                            <dt><b>Editorial</b></dt>
                            <dd><?php echo $editorial;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>Año publicación</b></dt>
                            <dd><?php echo $ano_publicacion;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>ISBN</b></dt>
                            <dd><?php echo $isbn;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>Idioma</b></dt>
                            <dd><?php echo $idioma;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>Género</b></dt>
                            <dd><?php echo $tipo;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>Público</b></dt>
                            <dd><?php echo $publico;?></dd>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="der">
                    <header class="cabeza">
                        <h3><?php echo $titulo;?></h3>
                        <div>
                        <p><b>Autor: </b><a href="libros.php?nombre=<?php echo urlencode(base64_encode($autor)); ?>"><?php echo $autor;?></a></p>
                        </div>
                    </header>
                    <div class="sinopsis">
                        <h3>Sinopsis</h3>
                        <?php echo $sinopsis;?>
                </div>
                <button id="mostrarmas"><i class="fa-solid fa-chevron-down"></i>Leer Más</button>
                <button id="mostrarmenos"><i class="fa-solid fa-chevron-up"></i>Leer Menos</button>
                <br><br>
                <?php
                if(isset($_SESSION["name"])){
                $query = mysqli_query($conex, "SELECT * FROM like_libro WHERE isbn_libro = '" . mysqli_real_escape_string($conex, $isbn) . "' AND nombre_usuario = '" . mysqli_real_escape_string($conex, $_SESSION["name"]) . "'");
                    if (mysqli_num_rows($query) == 0) {
                    echo "<button id='" . $isbn . "' class='like'><i class='fa-regular fa-thumbs-up fa-2x'></i></button><span id='likes_" . $isbn . "'>" . $num_likes . "</span>";
                    }else{
                        echo "<button id='" . $isbn . "' class='like'><i class='fa-solid fa-thumbs-up fa-2x'></i></button><span id='likes_" . $isbn . "'>" . $num_likes . "</span>";

                    }
                }
                    ?>
                    <br><br>
                    <?php if (isset($biografia)){ ?>
                    <h2>Biografía autor</h2>
                    <h3><?php echo $autor?></h3>
                    <p><?php echo $biografia?></p>
                    <?php }?>
                </div>
            </div>
        </li>
                <?php
                        }
                ?>
            </ul>
                    </div>
            <?php
        }
    }
}
?>
<div class="general2">
    <h3 style="font-size: 28px;"><?php echo $titulo;?></h3>
  
    <p  style="font-size: 24px;"><b>Autor: </b><a href="libros.php?nombre=<?php echo urlencode(base64_encode($autor)); ?>"><?php echo $autor;?></a></p>
    <br><br>
    <center>
    <?php
echo'<img src='.$imagen_url .' " class="img"/>';
?>
</center>
<br><br>
                    <div class="sinopsismovil">
                        <h3>Sinopsis</h3>
                        <?php echo $sinopsis;?>
                    </div>
                    <button id="mostrarmasmovil"><i class="fa-solid fa-chevron-down"></i>Leer Más</button>
                <button id="mostrarmenosmovil"><i class="fa-solid fa-chevron-up"></i>Leer Menos</button>
                    <br><br>
                    <?php
                                    if(isset($_SESSION["name"])){

                    if (mysqli_num_rows($query) == 0) {
                    echo "<button id='" . $isbn . "' class='like2'><i class='fa-regular fa-thumbs-up fa-2x'></i></button><span id='likes2_" . $isbn . "'>" . $num_likes . "</span>";
                    }else{
                        echo "<button id='" . $isbn . "' class='like2'><i class='fa-solid fa-thumbs-up fa-2x'></i></button><span id='likes2_" . $isbn . "'>" . $num_likes . "</span>";

                    }
                }
                    ?>
                    <br><br>
                    <?php if (isset($biografia)){ ?>
                    <h2>Biografía autor</h2>
                    <h3><?php echo $autor?></h3>
                    <p><?php echo $biografia?></p>
                    
                    <?php }?>

                    <br><br>
                    <h3>Detalles libro</h3>
                    <div class="datos">
                        <div>
                            <dt><b>Editorial</b></dt>
                            <dd><?php echo $editorial;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>Año publicación</b></dt>
                            <dd><?php echo $ano_publicacion;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>ISBN</b></dt>
                            <dd><?php echo $isbn;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>Idioma</b></dt>
                            <dd><?php echo $idioma;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>Género</b></dt>
                            <dd><?php echo $tipo;?></dd>
                            <br>
                        </div>
                        <div>
                            <dt><b>Público</b></dt>
                            <dd><?php echo $publico;?></dd>
                            <br>
                        </div>
                    </div>
                    
</div>
<?php
mysqli_close($conex);
?>

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
        <?php
if(isset($_SESSION['name'])){
    include("../con_db.php");
    $consulta = "SELECT COUNT(*) FROM reserva WHERE nombre_usuario = '" . $_SESSION['name'] . "'";
    $resultado = mysqli_query($conex, $consulta);
    $num_reservas = mysqli_fetch_row($resultado)[0];
}
?>
<script>

</script>
<?php
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
echo "<script>
    var userName = '$name';
    var numReservas = $num_reservas;
    var linkcambio = '$link';
    var link2cambio = '$link2';
</script>";
?>
<script src="../javascript/detalles.js"></script>
<script src="../javascript/cambio.js"></script>

</script>
<script src="../javascript/menumovil.js"></script>
    <script>

    <?php 
    if($_SESSION['sitio'] == 'libros'){
    ?>
    document.getElementById("libros").style.color = 'orange';
    document.getElementById("libros2").style.color = 'aliceblue';
    <?php }?>
</script>
</body>
</html>
<?php
$_SESSION['sitio'] = '';
?>
