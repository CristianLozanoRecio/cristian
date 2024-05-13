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
    <link rel="stylesheet" href="../estilos/estilolibros.css">
</head>
<body>
    <header class="cerebro">
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
    <main>
    <br><br><br><br>
    <br>
<?php
$inc = include("../con_db.php");
if($inc) {
    $consulta= "SELECT * FROM LIBRO";
    $resultado = mysqli_query($conex,$consulta);
    if($resultado) {
        ?>
        <center>
        <div class="general">
    <ul class="listalibros">
                <?php
                $contador = 0;
        while($row = $resultado->fetch_array()){
            $contador++;
            $imagen_url = $row["portada_libro"];
            $autor = $row["autor"];
            $titulo = $row["titulo"];
            $sinopsis = $row["sinopsis"];
            $isbn = $row["isbn"];
                ?>
        <li class="estiloli" <?php if ($contador > 3) echo 'style="display: none;"'; ?>>
            <div class="estilo-div">
                <div class="izq">
                    <?php echo '<img src='.$imagen_url .' " class="img"/>';?>
                </div>
                <div class="der">
                    <header class="cabeza">
                        <h3><?php echo $titulo;?></h3>
                        <div>
                            <p><b>Autor: </b><?php echo $autor;?></p>
                        </div>
                    </header>
                    <p class="sinopsis" id="sinopsisTexto">
                    <?php echo $sinopsis;?>
                    </p>
                    <script>
                    function limitarPalabras(texto) {
                        var palabras = texto.trim().split(" ");

                        if (palabras.length > 20) {
                            palabras = palabras.slice(0, 20);
                            return palabras.join(' ') + '...';
                        } else {
                            return texto;
                        }
                    }
                    var sinopsisElemento = document.getElementById('sinopsisTexto');
                    var sinopsisTexto = sinopsisElemento.textContent;
                    var sinopsisLimitada = limitarPalabras(sinopsisTexto);
                    sinopsisElemento.textContent = sinopsisLimitada;
                    </script>
                    <a href="detalles_libro.php?isbn=<?php echo $isbn; ?>">Ver detalles</a>
                </div>
            </div>
        </li>
                <?php
                        }
                ?>
            </ul>
            <button id="mostrar">Mostrar Elementos Ocultos</button>
            <script>
                 var indiceMostrar = 0;
                 var mostrarCantidad = 3;
                document.getElementById("mostrar").addEventListener('click', function() {
                    var elementosOcultos = document.querySelectorAll('.estiloli[style="display: none;"]');

                for (var i = indiceMostrar; i < indiceMostrar + mostrarCantidad && i < elementosOcultos.length; i++) {
                    elementosOcultos[i].style.display = 'list-item';
                }
                indiceMostrar+3;
                if (indiceMostrar >= elementosOcultos.length-3) {
                    document.querySelector('button').style.display = 'none';
                }
                });
                </script>
                    </div>
                    </center>
            <?php
        }
}
?>
<br><br><br><br><br><br>
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
                <tr>
                    <td></td> <td></td>
                    <td><a href="#">Mapa web</a></td>
                </tr>
            </table>
        </div>
</footer>
</body>
</html>
