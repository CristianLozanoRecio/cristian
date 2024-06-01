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
                        <li><a href="#">Reservas</a></li>
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
    </header>
    <main style="height: 100vh;">
    <br><br><br><br><br><br>
    <?php 
include("../con_db.php");
$consulta = "SELECT * FROM reserva INNER JOIN libro ON reserva.isbn_libro = libro.isbn WHERE  nombre_usuario = '" . $_SESSION["name"] . "'";
$resultado = mysqli_query($conex, $consulta);

if ($resultado) {
    if ($resultado->num_rows>0){
    ?>
    <center>
        <caption>TUS RESERVAS</caption>
    <table class="tablaRESERVA">
        <tr>
            <td><strong>TÍTULO</strong></td>
            <td><strong>ISBN LIBRO</strong></td>
            <td><strong>TIEMPO LÍMITE RECOGIDA</strong></td>
        </tr>
        <?php
        while ($row = $resultado->fetch_array()) {
            $fecha_fin_str = $row["fecha_fin"];
            $fecha_inicio = new DateTime();
            $fecha_fin = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_fin_str);
            $isbn_libro = $row["isbn_libro"];
            $intervalo = $fecha_inicio->diff($fecha_fin);
            $dias = $intervalo->format('%a'); 
            $horas = $intervalo->format('%h');
            $minutos = $intervalo->format('%i');
            $segundos = $intervalo->format('%s');
            $titulo = $row["titulo"];
            ?>
            <tr>
            <td><?php echo $titulo?></td>
                <td><?php echo $isbn_libro?></td>
                <td style="width: 20vw;">
            <div class="contador" data-dias="<?php echo $dias; ?>" data-horas="<?php echo $horas; ?>" data-minutos="<?php echo $minutos; ?>" data-segundos="<?php echo $segundos; ?>">
                <?php echo "$dias días, $horas horas, $minutos minutos, $segundos segundos"; ?>
            </div></td>
        <?php } ?> </table>
    </center>

    <script>

        var contadores = document.querySelectorAll('.contador');
        contadores.forEach(function(contador) {
            var dias = parseInt(contador.getAttribute('data-dias'));
            var horas = parseInt(contador.getAttribute('data-horas'));
            var minutos = parseInt(contador.getAttribute('data-minutos'));
            var segundos = parseInt(contador.getAttribute('data-segundos'));
            function actualizarContador() {
                if (segundos > 0) {
                    segundos--;
                } else {
                    segundos = 59;
                    if (minutos > 0) {
                        minutos--;
                    } else {
                        minutos = 59;
                        if (horas > 0) {
                            horas--;
                        } else {
                            horas = 23;
                            if (dias > 0) {
                                dias--;
                            } else {
                                alert("¡El tiempo ha terminado!");
                            }
                        }
                    }
                }
                contador.innerHTML = dias + " días, " + horas + " horas, " + minutos + " minutos, " + segundos + " segundos";
            }

            setInterval(actualizarContador, 1000);
        });
    </script>

<?php
    }else{
        echo "<h1>No has realizado ninguna reserva</h1>";
    }
}
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
