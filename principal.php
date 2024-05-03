<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <link rel="stylesheet" href="estiloprincipal.css">
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
                        <li><a href="registro.php">REGISTRATE</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="slider">
        <img src="imagenes/slider1.png"/>
    </div>

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
                    <td><a href="avisolegal.html">Aviso legal</a></td>
                </tr>
                <tr>
                    <td>Dirección: C/XXXX</td>
                    <td><img src="imagenes/Insta.png" width="40px">Instagram</td>
                    <td><a href="politicacookies.html">Política de Cookies</a></td>
                </tr>
                <tr>
                    <td>CP: 112XX</td>
                    <td><img src="imagenes/yt.png" width="40px"> YT</td>
                    <td><a href="protecciondedatos.html">Protección de datos</a></td>
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