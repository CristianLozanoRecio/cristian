<?php
session_start();
if(isset($_SESSION["name"])){
    if ($_SESSION["name"] === "admin") {
        $link = '<a href="../adminpag/formulariosadmin.php">PAG ADMIN</a>';
    } else {
        $link = '<a href="../registroinicio/cerrar_sesion.php">Cerrar sesión</a>';
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuBiblioWeb</title>
    <link rel="stylesheet" href="../estilos/estilodetallelibros.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
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
                        <li><a href="../principal.php">Inicio</a></li>
                        <li><a href="VERreservas.php">Reservas</a></li>
                        <li><a href="#">Horarios</a></li>
                        <li><a href="libros.php">Libros</a></li>
                        <li id="cambio"><a href="../registroinicio/iniciar_sesion.php">Iniciar Sesión</a></li>
                        <li><div style="display: flex;">
                            <form method="get" action="libros.php"> 
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
    </header><br><br><br><br>
    <main>
    <?php 
    include("../con_db.php");
        $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE isbn = '" . $_SESSION["isbn"] . "'";
        $resultado = mysqli_query($conex,$consulta);
    if($resultado) {
        ?>
        <center>
                <?php
                $contador = 0;
        while($row = $resultado->fetch_array()){
            $imagen_url = $row["portada_libro"];
            $autor = $row["nombre"];
            $titulo = $row["titulo"];
            $tipo = $row["tipo"];
            echo '<img src='.$imagen_url .' " width=300vw/>';
                ?>
            <h3>RESERVA COMPLETA!!! </h3><br>
            <p>Tienes <?php echo $_SESSION["fecha_fin"]; ?> para recoger el libro</p>
                <?php 
                        }
                    }
                    $consulta = "SELECT * FROM LIBRO INNER JOIN AUTOR ON LIBRO.id_autor = AUTOR.id_autor WHERE tipo = '" . $tipo . "' ORDER BY RAND() 
                    LIMIT 3" ;
                    $resultado = mysqli_query($conex,$consulta);
                if($resultado) {
                    ?>
                    <h2 style="margin-top:20vh;">Nuestras Recomendaciones Por Género</h2>
                    <table >
                            <?php
                     $libros = [];
                    while ($row = $resultado->fetch_assoc()) {
                        $libros[] = $row;
                    }

                    if (count($libros) > 0) {
                        echo '<table style="width: 100%; text-align: center;">';

                        // Imprimir las imágenes en una fila
                        echo '<tr>';
                        foreach ($libros as $libro) {
                            echo '<td><img src="' . $libro["portada_libro"] . '" width="200vw" /></td>';
                        }
                        echo '</tr>';

                        // Imprimir los títulos y autores en otra fila
                        echo '<tr>';
                        foreach ($libros as $libro) {
                            echo '<td>' . $libro["titulo"] . '<br><a href="detalles_libro.php?isbn=' . urlencode(base64_encode($libro["isbn"])) . '">Ver detalles</a></td>';
                        }
                        echo '</tr>';

                        echo '</table>';
                    } 
                                                        
                                }
                    mysqli_close($conex);
                ?>
                <br><br><br>
                
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
            document.getElementById("buttonclick").addEventListener('click', function() {
                <?php if(isset($_SESSION['name'])){?>
                if(confirm("Se realizara la reserva del libro con ISBN <?php echo $isbn;?>")){
                    window.location.href = "formularioreserva.php?isbn=<?php echo urlencode(base64_encode($isbn)); ?>";
                }else{
                    alert("No se realizó ninguna reserva");
                }
                <?php }else{
                   echo "alert('PRIMERO DEBES ESTAR REGISTRADO!!');";
                   }?>
            });
        </script>
        <script>
    document.addEventListener("DOMContentLoaded", function() {
    var cambio = document.getElementById("cambio");
    if (cambio) {
        cambio.innerHTML = '<?php echo $link; ?>';
    }
});
</script>
</body>
</html>
