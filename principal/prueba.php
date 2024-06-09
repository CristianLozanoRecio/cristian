<?php
session_start();
$_SESSION['sitio'] = 'inicio';
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
    <link rel="stylesheet" href="../estilos/estiloprincipal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 50px;
      margin-top: 50px;
    }

    .list-container img{
        width: 100%;
        height: 230px;

    }

    .list-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      width: 80vw; 
      overflow: hidden;
      transition: all 300ms;
    }

    .list-container  ul {
      list-style-type: none;
      padding: 0;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      width: 100%;
    }

    .lislider {
        position: relative;
    display: inline-block;
      width: 15.66%;
      text-align: center;
      opacity: 0;
      transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .lislider.visible {
      opacity: 1;
    }

    .lislider.slide-in-right {
      transform: translateX(10%);
    }

    .lislider.slide-in-left {
      transform: translateX(-10%);
    }

    .botonquieto {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    #menos {
      margin-right: 10px;
    }

    #mas {
      margin-left: 10px;
    }
    .hover-fondo {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 25%;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    text-align: center;
    padding: 10px;
    box-sizing: border-box;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.lislider:hover .hover-fondo {
  opacity: 1;
}
.hover-fondo a{
    text-decoration :none;
    color:white;
}

h2 {
    font-family: 'Arial', sans-serif; 
    color: #333;
    font-size: 2em; 
    margin-bottom: 20px;
    position: relative; 
    padding: 10px 0; 
    text-align: center; 
}
h2:hover{
    color:orange;
}

.swiper {
    max-width: 1000px;
      height: 20vh;
      border: 1px solid black;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color:orangered;
    }

    .swiper-slide .imagenportada {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .swiper-slide .librodestacado {
        width: 20%;
        max-height: 700px;
    }
.text-overlay {
  position: absolute;
  top: 50%;
  left: 80%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 24px;
  font-weight: bold;
  background-color: orange;
  padding: 10px;
  border-radius: 5px;
}
.text-overlay2 {
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 24px;
  font-weight: bold;
  background-color: orange;
  padding: 10px;
  border-radius: 5px;
}
.text-overlay3 {
  position: absolute;
  top: 20%; 
  left: 10%; 
  color: white;
  font-size: 18px;
  font-weight: bold;
  background-color: orange;
  padding: 5px 10px; 
  border-radius: 5px;
}

.text-overlay4 {
  position: absolute;
  top: 20%;
  right: 10%; 
  color: white;
  font-size: 18px;
  font-weight: bold;
  background-color: orange;
  padding: 5px 10px; 
  border-radius: 5px;
}

@media (max-width: 768px) {
    .text-overlay2 ,.text-overlay{
    font-size: 14px; 
  }
  .text-overlay3 {
    top: 0; 
    left: 0px; 
    font-size: 12px; 
  }
  
  .text-overlay4 {
    top: 0;
    right: 0; 
    font-size: 12px; 
}

}


@media (max-width: 480px) {


.lislider{
    width: 45%;
    
}

}

@media (min-width:481px) and (max-width: 630px) {


.lislider{
    width: 30.3333333%;
    
}
}
@media (min-width:631px) and (max-width: 1035px) {


        .lislider{
            width: 23%;
            
        }
    }

  </style>
</head>
<body>
    <header>
        <div class="header-contenido">
            <div class="logo">
                <a href="#" style="color: inherit; text-decoration: none;"><h1>TuBiblio<b>Web</b></h1></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="#" id="inicio">Inicio</a></li>
                        <li><a href="../menu/VERreservas.php" id="reserva">Reservas</a></li>
                        <li><a href="#" id="informacion">Información</a></li>
                        <li><a href="../menu/libros.php" id="libros">Libros</a></li>
                        <li id="cambio"></li>
                        <li ><div class="busqueda2">
            <form method="get" action="../menu/libros.php"> 
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
            <form method="get" action="../menu/libros.php"> 
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
            <form method="get" action="../menu/libros.php"> 
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
                    <li><a href="../menu/VERreservas.php"><i class="fa-solid fa-calendar-check"></i>Reservas</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="#"><i class="fa-solid fa-info"></i>Información</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li><a href="../menu/libros.php"><i class="fa-solid fa-book"></i>Libros</a></li>
                    <br>
                    <hr style="border: 1px solid black;">
                    <li id="cambio2"><a href="../registroinicio/iniciar_sesion.php"><i class="fa-solid fa-door-open"></i>Iniciar Sesión</a></li>
                </ul>
            </nav>
        </div>
<br><br>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="slide-content">
        <img src="../imagenes/portada.png" alt="Portada" class="imagenportada">
        <a  href="https://maps.app.goo.gl/j6xot1WuF4E9KL8U7" class="text-overlay" target="_blank">VISÍTANOS</a>
      </div>
    </div>
      <div class="swiper-slide">
        <div class="slide-content">
        <img src="../imagenes/slider2.png" alt="Portada2" class="imagenportada">
        <a  href="../menu/libros.php" class="text-overlay2" target="_blank">LO QUE BUSCAS</a>
      </div>
    </div>
      <div class="swiper-slide">
      <div class="slide-content">
        <?php 
        include("../con_db.php");
            $consulta = "SELECT *, count(isbn_libro) as total_likes FROM LIBRO INNER JOIN LIKE_LIBRO ON LIBRO.isbn = like_libro.isbn_libro INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE like_libro.fecha_like >= DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY LIBRO.isbn, LIBRO.titulo ORDER BY total_likes ASC LIMIT 1";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $fila = mysqli_fetch_assoc($resultado);
                echo   '<a href="../menu/detalles_libro.php?isbn='. urlencode(base64_encode($fila["isbn"])).'"><img src="' . $fila["portada_libro"] . '" title="' . htmlspecialchars($fila["titulo"]) . '" class="librodestacado"></a>';            
                echo   '<p class="text-overlay4">Autor:<br>' . $fila["nombre"] .'</p>';   
            }
        ?>
        <p class="text-overlay3">Libro destacado <br>de la semana</p>
      </div>
      </div>
    </div>
    <br><br>
    <div class="swiper-pagination"></div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
            delay: 5000,
        },
    });
  </script>
<?php        
include("../con_db.php");
    $consulta = "SELECT *, count(isbn_libro) as total_likes FROM LIBRO INNER JOIN LIKE_LIBRO ON LIBRO.isbn = like_libro.isbn_libro INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE like_libro.fecha_like >= DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY LIBRO.isbn, LIBRO.titulo ORDER BY total_likes ASC LIMIT 15";
    $resultado = mysqli_query($conex, $consulta);

    echo '<div class="container" id="container100">';

    ?>
    
    <div class="botonquieto">
        <button class="menos"><i class="fa-solid fa-arrow-left"></i></button>
    </div>
    <div class="list-container">
        <?php    
        echo '<h2>Libros destacados de la semana 😲 </h2>';?>
        <ul>
        <?php
        if ($resultado && $resultado->num_rows > 0) {
            while ($row = $resultado->fetch_array()) {
                $portada = $row["portada_libro"];
                $titulo = $row["titulo"];
                $isbn = $row['isbn'];
                $autor = $row['nombre'];
                echo '<li class="lislider" style="display: none">';
                echo '<a href="../menu/detalles_libro.php?isbn='. urlencode(base64_encode($isbn)).'"><img src="' . $portada . '" title="' . htmlspecialchars($titulo) . '" class="imagen"></a>';
                echo '<div class="hover-fondo"><p style="color: white;">' . $autor . '</p></div>'; 
                echo '</li>';
            }
        }
        ?>
        </ul>
    </div>
    <div class="botonquieto">
        <button class="mas"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
    </div>
    <hr>
    <?php
?>
    <?php        
include("../con_db.php");
$tipo = ["ciencia", "arte", "medicina", "deporte", "ficción", "aventura", "religión", "historia"];
$emojis = [
    "ciencia" => "🔬",
    "arte" => "🎨",
    "medicina" => "💊",
    "deporte" => "⚽",
    "ficción" => "📖",
    "aventura" => "🗺️",
    "religión" => "🙏",
    "historia" => "📜"
];
for ($i = 0; $i < count($tipo); $i++) {
    $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '".$tipo[$i]."'";
    $resultado = mysqli_query($conex, $consulta);

    echo '<div class="container" id="container' . $i . '">';

    ?>
    
    <div class="botonquieto">
        <button class="menos"><i class="fa-solid fa-arrow-left"></i></button>
    </div>
    <div class="list-container">
        <?php    
        $tipo_actual = htmlspecialchars($tipo[$i]);
        $emoji = isset($emojis[$tipo_actual]) ? $emojis[$tipo_actual] : '';
        echo '<a href="../menu/libros.php?tipo=' . urlencode(base64_encode($tipo[$i])) .'"><h2>Sección ' . ucfirst($tipo_actual) . ' ' . $emoji . '</h2></a>';?>
        <ul>
        <?php
        if ($resultado && $resultado->num_rows > 0) {
            while ($row = $resultado->fetch_array()) {
                $portada = $row["portada_libro"];
                $titulo = $row["titulo"];
                $isbn = $row['isbn'];
                $autor = $row['nombre'];
                echo '<li class="lislider" style="display: none">';
                echo '<a href="../menu/detalles_libro.php?isbn='. urlencode(base64_encode($isbn)).'"><img src="' . $portada . '" title="' . htmlspecialchars($titulo) . '" class="imagen"></a>';
                echo '<div class="hover-fondo"><p style="color: white;">' . $autor . '</p></div>'; 
                echo '</li>';
            }
        }
        ?>
        </ul>
    </div>
    <div class="botonquieto">
        <button class="mas"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
    </div>
    <hr>
    <?php
}
?>
<center>
<a href="../menu/libros.php">VER TODO</a>
</center>
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
document.addEventListener('DOMContentLoaded', function() {
    var containers = document.querySelectorAll('.container');

    containers.forEach(function(container) {
        var lista = container.querySelectorAll('.lislider');
        var menos = container.querySelector('.menos');
        var mas = container.querySelector('.mas');
        var inicio = 0;
        var visible;

        function actualizar(direccion) {

            lista.forEach(item => {
                item.classList.remove('visible', 'slide-in-right', 'slide-in-left');
                item.style.display = 'none';
            });

            for (var i = inicio; i < inicio + visible && i < lista.length; i++) {
                lista[i].style.display = '';
                (function(item) {
                    setTimeout(function() {
                        item.classList.add('visible');
                        if (direccion === 'right') {
                            item.classList.add('slide-in-right');
                        } else if (direccion === 'left') {
                            item.classList.add('slide-in-left');
                        }
                        setTimeout(function() {
                            item.classList.remove('slide-in-right', 'slide-in-left');
                        }, 500);
                    }, 0);
                })(lista[i]);
            }
        }

        mas.addEventListener('click', function() {
            inicio += visible;
            if (inicio >= lista.length) {
                inicio = 0;
            }
            actualizar('right');
        });

        menos.addEventListener('click', function() {
            var inicioarray = inicio === 0;
            if (inicioarray) {
                return;
            }

            inicio -= visible;
            if (inicio < 0) {
                inicio = Math.max(0, lista.length - visible);
            }
            actualizar('left');
        });

        function ver() {
            var width = window.innerWidth;

            if (width >= 631 && width < 1035) {
                visible = 4;
            } else if (width >= 481 && width < 630) {
                visible = 3;
            } else if (width < 480) {
                visible = 2;
            }else{
                visible = 6;
            }
        }

        ver();

        window.addEventListener('resize', function() {
            ver();
            actualizar();
        });

        actualizar();
    });
});
</script>


    <script src="../javascript/menumovil.js"></script>
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
