<?php
session_start();
include("BDinsertar.php");
if (isset($_SESSION["name"]) && $_SESSION["name"] === "admin") {
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-16">
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>MENÚ PÁGINA</title>
<link rel="stylesheet" href="../estilos/estiloformadmin.css"/>
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</head>
<body>
<div id="general">
    <div id="izq">
            <div id="menulateralB">
                <a href="#" id="masGrande"><i class="fa-solid fa-bars fa-3x"></i></a>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarusuario")); ?>"><i class="fa-regular fa-user fa-3x"></i></a>
                <br>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarlibro")); ?>"><i class="fa-solid fa-book fa-3x"></i></a>
                <br>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarautor")); ?>"><i class="fa-solid fa-pencil fa-3x"></i></a>
                <br>
                <a href="#"> <i class="fa-solid fa-calendar-check fa-3x"></i></a> 
                <br>
                <a href="#"> <i class="fa-solid fa-magnifying-glass fa-3x"></i></a>
                <br>
                <a href="../registroinicio/cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket fa-3x"></i></a>
                <br>
                <a href="../principal.php"><i class="fa-solid fa-house  fa-3x"></i></a>
            </div>
        <div id="menulateralA">
            
        <a href="#" id="maspequeño"><i class="fa-solid fa-bars fa-3x"></i></a>
            <a href="#" id="pulsarusuario"><i class="fa-regular fa-user fa-3x"></i> Usuario<a>
            <div id="submenuUsuario">
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrarusuario")); ?>">Borrar</a>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarusuario")); ?>">Crear</a>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("editarusuario")); ?>">Modificar</a>     
            </div>
            <br>
            <a href="#" id="pulsarlibro"><i class="fa-solid fa-book fa-3x"></i> Libros</a>
            <div id="submenuLibro">
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrarlibro")); ?>">Borrar</a>
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarlibro")); ?>">Crear</a>
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("actualizarlibro")); ?>">Modificar</a>
            </div>
            <br>
            <a href="#" id="pulsarautor"><i class="fa-solid fa-pencil fa-3x"></i>Autores</a>
            <div id="submenuAutor">
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrarautor")); ?>">Borrar</a>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarautor")); ?>">Crear</a>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("editarautor")); ?>">Modificar</a>
            </div>
            <br>
            <a href="#" id="pulsarreserva"><i class="fa-solid fa-calendar-check fa-3x"></i>Reservas</a>
            <div id="submenuReserva">
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrareserva")); ?>">Borrar</a>
            </div>
            <br>
            <a href="#" id="pulsarconsulta"><i class="fa-solid fa-magnifying-glass fa-3x"></i>Consulta</a>
            <div id="submenuConsulta">
                <a href="excelautor.php">Ver Tabla Autor</a>
                <a href="excellibros.php">Ver Tabla libros</a>
                <a href="excelusuario.php">Ver Tabla usuarios</a>
            </div>
            <br>
                <a href="../registroinicio/cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket fa-3x"></i></a>
                <br>
                <a href="../principal.php"><i class="fa-solid fa-house  fa-3x"></i></a>
        </div>
    </div>

    <div id="der">
<?php
if(isset($_GET["q"])){
    //COMIENZA INSERTAR LIBRO
    if($_GET["q"] === base64_encode("insertarlibro")){
?>        
<div id="formuLARGO">
    <form id="formularioLARGO" method="POST"  enctype="multipart/form-data">
    <div class="contenedorformLARGO">
    <h1>INSERTAR LIBRO</h1>
        <div class="rowLARGO">
            <div class="inputLARGO">
                <label for="titulo">Título: </label>
                <input type="text" id="titulo" name="titulo">
            </div>
            <div class="inputLARGO">
                <label for="isbn">ISBN: </label>
                <input type="number" id="isbn" name="isbn" required>
            </div>
        </div>
        <div class="rowLARGO">
            <div class="inputLARGO">
                <label for="editorial">Editorial: </label>
                <input type="text" id="editorial" name="editorial">
            </div>
            <div class="inputLARGO">
                <label for="ano_publicacion">Año publicación: </label>
                <input type="number" id="ano_publicacion" name="ano_publicacion"  max="9999">
            </div>
        </div>
        <div class="rowLARGO">
            <div class="inputLARGO">
                <label for="autor">Autor: </label>
                <select id="autor" name="autor">
                    <?php 
                    include("../con_db.php");
                     $consulta = "SELECT * FROM autor";
                     $resultado = mysqli_query($conex,$consulta);
                     if($resultado) {
                        while($row = $resultado->fetch_array()){
                            $id_autor = $row["id_autor"];
                            $nombre = $row["nombre"];
                            echo "<option value='".$id_autor."'>".$id_autor." ".$nombre."</option>";
                        }
                     }
                     mysqli_close($conex);
                    ?>
                </select>
            </div>
            <div class="inputLARGO">
                <label for="portada_libro">Portada del libro: </label>
                <input type="file" id="portada_libro" name="portada_libro" accept="image/*" required>
            </div>
        </div>
        <div class="rowLARGO">
            <div class="inputLARGO">
            <label for="idioma">Selecciona un idioma:</label>
                <select name="idioma" id="idioma">
                     <option value="seleccion" selected disabled> --SELECCIONA--</option>
                    <option value="Castellano">Castellano</option>
                    <option value="Inglés">Inglés</option>
                    <option value="Francés">Francés</option>
                </select>
            </div>
            <div class="inputLARGO">
            <label for="tipo">Selecciona un género:</label>
                <select name="tipo" id="tipo">
                    <option value="seleccion" selected disabled> --SELECCIONA--</option>
                    <option value="Arte">Arte</option>
                    <option value="Ciencia">Ciencia</option>
                    <option value="Ficción">Ficción</option>
                    <option value="Historia">Historia</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Religión">Religión</option>
                    <option value="Medicina">Medicina</option>
                </select>
            </div>
        </div>
        <div class="rowLARGO">
        <div class="inputLARGO">
            <label for="publico">Selecciona un publico:</label>
                <select name="publico" id="idioma">
                    <option value="seleccion" selected disabled> --SELECCIONA--</option>
                    <option value="Infantil">Infantil</option>
                    <option value="Adulto">Adulto</option>
                </select>
            </div>
            <div class="inputLARGO">
                <label for="disponible">Unidades: </label>
                <input type="number" id="disponible" name="disponible">
            </div>
    </div>
        <label for="sinopsis">Sinopsis: </label>
        <textarea class="cuadrotext" name="sinopsis"></textarea>
        <center>
        <input type="submit" name="datos" id="enviar">
        </center>
</div>
</form>
    </div>
<?php
//FINALIZA INSERTAR LIBRO
    }
    //EMPIEZA BORRAR LIBRO
    if($_GET["q"] === base64_encode("borrarlibro")){
?>
<div id="formuCORTO">
    <form id="formularioCORTO" method="post">
        <h1>Borrar Libro</h1>
        <input type="text" name="isbn" placeholder="ISBN">
        <center>
        <input type="submit" name="iniciarBORRARLIBRO" id="enviar">
        </center>
        <br><br>
    </form>
</div>
<?php
    //FINALIZA BORRAR LIBRO
    }
    //EMPIEZA CREAR AUTOR
    if($_GET["q"] === base64_encode("insertarautor")){
?>
<div id="formuCORTO">
    <form id="formularioCORTO" method="post" >
        <h1>Insertar Autor</h1>
        <input type="text" name="name" placeholder="Nombre autor" required>
        <label for="biografia">Biografía: </label>
        <textarea class="cuadrotext" name="biografia"></textarea>
        <center>
        <input type="submit" name="iniciarMETERAUTOR" id="enviar">
        </center>
        <br><br>
    </form>
</div>
<?php
    //FINALIZA CREAR AUTOR
    }   
    //EMPIEZA BORRAR AUTOR
    if($_GET["q"] === base64_encode("borrarautor")){
?>
<div id="formuCORTO">
    <form id="formularioCORTO" method="post" >
        <h1>Borrar Autor</h1>
        <select id="autor" name="id">
                    <?php 
                    include("../con_db.php");
                     $consulta = "SELECT * FROM autor";
                     $resultado = mysqli_query($conex,$consulta);
                     if($resultado) {
                        while($row = $resultado->fetch_array()){
                            $id_autor = $row["id_autor"];
                            $nombre = $row["nombre"];
                            echo "<option value='".$id_autor."'>".$id_autor." ".$nombre."</option>";
                        }
                     }
                     mysqli_close($conex);
                    ?>
                </select>
                <br><br>
        <center>
        <input type="submit" name="iniciarBORRARAUTOR" id="enviar">
        </center>
        <br><br>
    </form>
</div>
<?php 
//FINALIZA BORRAR AUTOR
    } 
    //EMPIEZA CREAR USUARIO
    if($_GET["q"] === base64_encode("insertarusuario")){
?>
<div id="formuCORTO">
    <form id="formularioCORTO" method="post" action="generarqr.php">
        <h1>CREAR USUARIO</h1>
        <input type="text" name="name" placeholder="Nombre de usuario" maxlength = "7">
        <input type="password" name="passw" placeholder="Contraseña"  maxlength = "7">
        <center>
        <input type="submit" name="register" id="enviar">
        </center>
    </form>
</div>
<?php 
//FINALIZA CREAR USUARIO
    }
    //EMPIEZA BORRAR USUARIO
    if($_GET["q"] === base64_encode("borrarusuario")){
?>
<div id="formuCORTO">
    <form id="formularioCORTO" method="post" >
        <h1>Borrar Usuario</h1>
        <input type="text" name="name" placeholder="Nombre Usuario" required>
        <center>
        <input type="submit" name="iniciarBORRARUSUARIO" id="enviar">
        </center>
        <br><br>
    </form>
</div>
<?php 
//FINALIZA BORRAR USUARIO
    }
    //EMPIEZA MODIFICAR LIBRO
    if($_GET["q"] === base64_encode("actualizarlibro")){
    
?>
<div id="formuLARGO">
    <form id="formularioLARGO" method="POST"  enctype="multipart/form-data">
    <div class="contenedorformLARGO">
    <h1>EDITAR LIBRO</h1>
        <div class="rowLARGO">
            <div class="inputLARGO">
                <label for="titulo">Título: </label>
                <input type="text" id="titulo" name="titulo">
            </div>
            <div class="inputLARGO">
                <label for="isbn">ISBN: </label>
                <input type="number" id="isbn" name="isbn" required>
            </div>
        </div>
        <div class="rowLARGO">
            <div class="inputLARGO">
                <label for="editorial">Editorial: </label>
                <input type="text" id="editorial" name="editorial">
            </div>
            <div class="inputLARGO">
                <label for="ano_publicacion">Año publicación: </label>
                <input type="number" id="ano_publicacion" name="ano_publicacion" max="9999">
            </div>
        </div>
        <div class="rowLARGO">
            <div class="inputLARGO">
            <label for="autor">Autor: </label>
                <select id="autor" name="autor">
                <option value="seleccion" selected disabled> --SELECCIONA--</option>
                    <?php 
                    include("../con_db.php");
                     $consulta = "SELECT * FROM autor";
                     $resultado = mysqli_query($conex,$consulta);
                     if($resultado) {
                        while($row = $resultado->fetch_array()){
                            $id_autor = $row["id_autor"];
                            $nombre = $row["nombre"];
                            echo "<option value='".$id_autor."'>".$id_autor." ".$nombre."</option>";
                        }
                     }
                     mysqli_close($conex);
                    ?>
                </select>
            </div>
            <div class="inputLARGO">
                <label for="portada_libro">Portada del libro: </label>
                <input type="file" id="portada_libro" name="portada_libro" accept="image/*">
            </div>
        </div>
        <div class="rowLARGO">
            <div class="inputLARGO">
            <label for="idioma">Selecciona un idioma:</label>
                <select name="idioma" id="idioma">
                    <option value="seleccion" selected disabled> --SELECCIONA--</option>
                    <option value="Castellano">Castellano</option>
                    <option value="Inglés">Inglés</option>
                    <option value="Francés">Francés</option>
                </select>
            </div>
            <div class="inputLARGO">
            <label for="tipo">Selecciona un género:</label>
                <select name="tipo" id="tipo">
                <option value="seleccion" selected disabled> --SELECCIONA--</option>
                    <option value="Arte">Arte</option>
                    <option value="Ciencia">Ciencia</option>
                    <option value="Ficción">Ficción</option>
                    <option value="Historia">Historia</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Religión">Religión</option>
                    <option value="Medicina">Medicina</option>
                </select>
            </div>
        </div>
        <div class="rowLARGO">
        <div class="inputLARGO">
            <label for="publico">Selecciona un publico:</label>
                <select name="publico" id="idioma">
                    <option value="seleccion" selected disabled> --SELECCIONA--</option>
                    <option value="Infantil">Infantil</option>
                    <option value="Adulto">Adulto</option>
                </select>
            </div>
            <div class="inputLARGO">
                <label for="disponible">Unidades: </label>
                <input type="number" id="disponible" name="disponible">
            </div>
    </div>
        <label for="sinopsis">Sinopsis: </label>
        <textarea class="cuadrotext" name="sinopsis"></textarea>
        <center>
        <input type="submit" name="datosEDITAR" id="enviar">
        </center>
</div>
</form>
    </div>
<?php 
} //FINALIZA EDITAR LIBRO
    //EMPIEZA MODIFICAR USUARIO
    if($_GET["q"] === base64_encode("editarusuario")){
?>
<div id="formuCORTO">
    <form id="formularioCORTO" method="post" >
        <h1>Editar Usuario</h1>
        <input type="text" name="nombreEDITAR" placeholder="Nombre A Editar" required>
        <input type="text" name="name" placeholder="Nombre Usuario">
        <input type="password" name="passw" placeholder="Contraseña">
        <center>
        <input type="submit" name="usuarioEDITOR" id="enviar">
        </center>
        <br><br>
    </form>
</div>
<?php 
} //FINALIZA EDITAR LIBRO
    //EMPIEZA EDITAAR AUTOR
if($_GET["q"] === base64_encode("editarautor")){
    ?>
        <div id="formuCORTO">
            <form id="formularioCORTO" method="post" >
                <h1>Editar Autor</h1>
                <label for="autor">Autor: </label><br>
                <select id="autor" name="id_autor">
                    <?php 
                    include("../con_db.php");
                     $consulta = "SELECT * FROM autor";
                     $resultado = mysqli_query($conex,$consulta);
                     if($resultado) {
                        while($row = $resultado->fetch_array()){
                            $id_autor = $row["id_autor"];
                            $nombre = $row["nombre"];
                            echo "<option value='".$id_autor."'>".$id_autor." ".$nombre."</option>";
                        }
                     }
                     mysqli_close($conex);
                    ?>
                </select>
                <br><br>
                <input type="text" name="name" placeholder="Nombre autor">
                <label for="biografia">Biografía: </label>
                <textarea class="cuadrotext" name="biografia"></textarea>
                <center>
                <input type="submit" name="iniciarEDITARAUTOR" id="enviar">
                </center>
                <br><br>
            </form>
        </div>
        <?php 
} //FINALIZA EDITAR AUTOR
if($_GET["q"] === base64_encode("borrarreserva")){
    ?>
        <div id="formuCORTO">
            <form id="formularioCORTO" method="post" >
                <h1>Editar Autor</h1>
                <input type="number" name="id_reserva" placeholder="Id autor">                <center>
                <input type="submit" name="iniciarBORRARRESERVA" id="enviar">
                </center>
                <br><br>
            </form>
        </div>
        <?php 
} //FINALIZA EDITAR AUTOR
    ?>
<?php 
}else{
    ?>
    <h1  style="margin-top:20%;">BIENVENIDO ADMIN</h1>
    <?php
}
?>
</div>
<?php
}
else{
    echo "ERROR, NO TIENES PERMISOS";
}
        ?>
<script>
document.getElementById('masGrande').addEventListener('click', function(){
    menu('menulateralA', 'menulateralB');
});
document.getElementById('maspequeño').addEventListener('click', function(){
    menu('menulateralB', 'menulateralA');
});

function menu(mostrarId, ocultarId){
    var mostrar = document.getElementById(mostrarId);
    var ocultar = document.getElementById(ocultarId);

    ocultar.style.display = "none";
    mostrar.style.display = "block";
}
document.getElementById('pulsarreserva').addEventListener('click', function(){
        mostar('submenuReserva');
    });
    document.getElementById('pulsarusuario').addEventListener('click', function(){
        mostar('submenuUsuario');
    });
    document.getElementById('pulsarconsulta').addEventListener('click', function(){
        mostar('submenuConsulta');
    });
    document.getElementById('pulsarlibro').addEventListener('click', function(){
        mostar('submenuLibro');
    });
    document.getElementById('pulsarautor').addEventListener('click', function(){
        mostar('submenuAutor');
    });
    function mostar(idSubmenu){
        var submenu = document.getElementById(idSubmenu);
        if(window.getComputedStyle(submenu).display === "none"){
            submenu.style.display = "block";
        } else {
            submenu.style.display = "none";
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#autor').select2({
            placeholder: 'Selecciona un autor',
            allowClear: true
        });
    });
</script>
</body>
</html>