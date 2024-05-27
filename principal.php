<?php
session_start();
if (isset($_SESSION["name"]) === "admin") {
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var cambio = document.getElementById("cambio");
                if (cambio) {
                    cambio.innerHTML = \'<a href="registroinicio/cerrar_sesion.php">Cerrar sesión</a>\';
                }
            });
          </script>';
}else if(isset($_SESSION["name"])){
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var cambio = document.getElementById("cambio");
        if (cambio) {
            cambio.innerHTML = \'<a href="adminpag/formulariosadmin.php">PAG ADMIN</a>\';
        }
    });
  </script>';
}
else{
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var cambio = document.getElementById("cambio");
        if (cambio) {
            cambio.innerHTML = \'<a href="registroinicio/registro.php">REGISTRATE</a>\';
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
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Horarios</a></li>
                        <li><a href="menu/libros.php">Libros</a></li>
                        <li id="cambio"><a href="registroinicio/registro.php">REGISTRATE</a></li>
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
    <div class="slider">
        <img src="imagenes/slider1.png"/>
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
    
<script>
        var currentSlide = 0;
var imagenes = [
    "imagenes/slider1.png",/*  imágenes tengo que cambiarlas */
    "imagenes/portada3.png",
    "imagenes/portada.png"
];

var totalSlides = imagenes.length;

function showSlide(index) {
    if (index < 0) {
        currentSlide = totalSlides - 1;
    } else if (index >= totalSlides) {
        currentSlide = 0;
    } else {
        currentSlide = index;
    }

    var imageUrl = imagenes[currentSlide];
    var sliderImg = document.querySelector('.slider img');
    sliderImg.src = imageUrl;
}

function prevSlide() {
    showSlide(currentSlide - 1);
}
function nextSlide() {
    showSlide(currentSlide + 1);
}
showSlide(currentSlide);
function startSlider() {
    setInterval(() => {
        nextSlide();
    }, 3000);
}
startSlider();
</script>
</body>
</html>
