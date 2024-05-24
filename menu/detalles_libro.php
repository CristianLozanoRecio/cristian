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
    <link rel="stylesheet" href="../estilos/estilodetallelibros.css">
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
    <br><br><br><br><br><br>
<?php
$inc = include("../con_db.php");
if($inc) {
    if (isset($_GET['isbn'])) {
        $isbn = $_GET['isbn'];
        $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE isbn = '$isbn'";
    $resultado = mysqli_query($conex,$consulta);
    if($resultado) {
        ?>
        <div class="general">
                <?php
        while($row = $resultado->fetch_array()){
            $imagen_url = $row["portada_libro"];
            $autor = $row["autor"];
            $titulo = $row["titulo"];
            $sinopsis = $row["sinopsis"];
            $isbn = $row["isbn"];
            $editorial = $row["editorial"];
            $ano_publicacion = $row["ano_publicacion"];

            $idioma = $row["idioma"];
            $tipo = $row["tipo"];
            $publico = $row["publico"];

                ?>
            <div class="estilo-div">
                <div class="izq">
                    <div style ="border: 5px solid red; width:20vw;">
                    <?php echo '<img src='.$imagen_url .' " class="img"/>';?></div><br><br>
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
                            <p><b>Autor: </b><?php echo $autor;?></p>
                        </div>
                    </header>
                    <p class="sinopsis">
                        <?php echo $sinopsis;?>
                    </p>
                    <br>
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
</body>
</html>
