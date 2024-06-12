<?php
session_start();
include("../especial.php");
include("../con_db.php");
if(isset($_SESSION['name'])){
    include("../con_db.php");
    $consulta = "SELECT COUNT(*) FROM reserva WHERE correo_usuario = '" . $_SESSION['correo'] . "'";
    $resultado = mysqli_query($conex, $consulta);
    $num_reservas = mysqli_fetch_row($resultado)[0];
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../estilos/estilocalenda.css">
    <link rel="icon" href="../imagenes/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <center><h1>FECHAS DISPONIBLES</h1></center>
    <div class="pop">
        <h2>Horas disponible</h2>
    <?php
    $horaInicio = strtotime("09:00");
    $horaFin = strtotime("14:00");

    $intervalo = 10 * 60;

    $horas = array();

    for ($hora = $horaInicio; $hora <= $horaFin; $hora += $intervalo) {
        $horas[] = date("H:i", $hora);
    }

    
    if (isset($_GET['fecha_seleccionada'])) {
        $fecha_seleccionada = cambioSQL($_GET['fecha_seleccionada']);

        $consulta_contador = "SELECT COUNT(*) AS total_filas FROM reserva WHERE dia = '" . mysqli_real_escape_string($conex, $fecha_seleccionada) . "'";
        $resultado_contador = mysqli_query($conex, $consulta_contador);
        $fila_contador = mysqli_fetch_assoc($resultado_contador);
        $total_filas = $fila_contador['total_filas'];
    
        if ($total_filas === '31') {
            echo "<p>Día completo</p>";
        } else {
            echo $fecha_seleccionada . "<br>";
            foreach ($horas as $hora) {
                $consulta_hora = "SELECT * FROM reserva WHERE dia = '" . mysqli_real_escape_string($conex, $fecha_seleccionada) . "' AND hora = '$hora'";
                $resultado_hora = mysqli_query($conex, $consulta_hora);
                if (mysqli_num_rows($resultado_hora) === 0) {
    ?>
                    <button class="hora-btn" data-id="<?php echo $hora; ?>" data-fecha="<?php echo $fecha_seleccionada; ?>"><?php echo $hora; ?></button>
    <?php
                } 
            }
        }
    }
    ?>
    <br>
    <button id="cerrarPop">Cerrar</button>
</div>
    <div style="max-width: 1000px; margin: auto" id='calendar'></div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('cerrarPop').addEventListener('click', function() {
        $('.pop').hide();
    });
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            events: [],
            dayCellDidMount: function (arg) {
                var date = arg.date;
                var day = date.getDay();
                var today = new Date();
                if (today > date) {
                    arg.el.style.backgroundColor = 'red'; 
                } else {
                    arg.el.style.backgroundColor = 'green'; 
                }
                if (day === 0 || day === 6) {
                    arg.el.style.backgroundColor = 'red';
                }

                <?php 
                $consulta_contador = "SELECT dia FROM reserva GROUP BY dia HAVING COUNT(*) = 31";
                $resultado = mysqli_query($conex, $consulta_contador);
                if(mysqli_num_rows($resultado) > 0) {
                    while($row = $resultado->fetch_array()){
                        $fecha = $row['dia'];
                        echo "var diarojo = new Date('$fecha');";?>
                if (date.getFullYear() === diarojo.getFullYear() &&
                date.getMonth() === diarojo.getMonth() &&
                date.getDate() === diarojo.getDate()) {
                arg.el.style.backgroundColor = 'red';}<?php
                }
            }
                ?>


               },
            
            dateClick: function(info) {
                if (info.dayEl.style.backgroundColor === 'green') {
                    $('.pop p').text(info.dateStr);
                    <?php if(isset($_GET['fecha_seleccionada'])){ ?>
                        if ('<?php echo base64_decode($_GET['fecha_seleccionada']); ?>' != info.dateStr) {
                        window.location.href = 'calendario.php?fecha_seleccionada=' + encodeURIComponent(btoa(info.dateStr));
                    }
                        <?php }
                        else if(!isset($_GET['fecha_seleccionada'])){
                            ?>                        window.location.href = 'calendario.php?fecha_seleccionada=' + encodeURIComponent(btoa(info.dateStr));
<?php
                        }?>
                         <?php if(isset($_GET['fecha_seleccionada'])){ ?>
                        if ('<?php echo base64_decode($_GET['fecha_seleccionada']); ?>' == info.dateStr){
                            $('.pop').show();
                        }<?php }?>
                }
            }
           
        });

        calendar.render();
    });
</script>
<?php
$correo = isset($_SESSION['correo']) ? $_SESSION['correo'] : '';
echo "<script>
    var correo = '$correo';
    var numReservas = $num_reservas;
</script>";
?>
<script src="../javascript/ajaxreserva22.js"></script>
</body>
</html>
<?php
mysqli_close($conex);
?>