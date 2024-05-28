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
</head>
<body>
<div id="general">
    <div id="izq">
            <div id="menulateralB">
                <a href="#" id="masGrande"><img src="../imagenes/menus.png" width="80%"></a>
                <a href="#"><img src="../imagenes/usuario.png" width="80%"></a>
                <br>
                <a href="#"><img src="../imagenes/libro.png" width="80%"></a>
                <br>
                <a href="#"><img src="../imagenes/lapiz.png" width="80%"></a>
                <br>
                <a href="#"> <img src="../imagenes/consulta.png" width="80%" ></a>
                <br><br>
                <a href="../registroinicio/cerrar_sesion.php">CERRAR SESIÓN</a>
                <br>
                <a href="../principal.php">VOLVER</a>
            </div>
        <div id="menulateralA">
            
        <a href="#" id="maspequeño"><img src="../imagenes/menus.png" width="40%"></a>
            <a href="#" id="pulsarusuario"><img src="../imagenes/usuario.png" width="40%"><span>Usuario</span></a>
            <div id="submenuUsuario">
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrarusuario")); ?>">Borrar</a>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarusuario")); ?>">Crear</a>
                <a href="#">Modificar</a>
            </div>
            <br>
            <a href="#" id="pulsarlibro"><img src="../imagenes/libro.png" width="40%" ><span>Libro</span></a>
            <div id="submenuLibro">
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrarlibro")); ?>">Borrar</a>
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarlibro")); ?>">Crear</a>
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("actualizarlibro")); ?>">Modificar</a>
            </div>
            <br>
            <a href="#" id="pulsarautor"><img src="../imagenes/lapiz.png" width="40%" ><span>Autores</span></a>
            <div id="submenuAutor">
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrarautor")); ?>">Borrar</a>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarautor")); ?>">Crear</a>
                <a href="#">Modificar</a>
            </div>
            <br>
            <a href="#" id="pulsarconsulta"><img src="../imagenes/consulta.png" width="40%"><span>Consulta</span></a>
            <div id="submenuConsulta">
                <a href="excelautor.php">Ver BD Autor</a>
                <a href="excellibros.php">Ver BD libros</a>
                <a href="excelusuario.php">Ver BD usuarios</a>
            </div>
            <br>
            <a href="../registroinicio/cerrar_sesion.php">CERRAR SESIÓN</a>
                <br>
                <a href="../principal.php">VOLVER</a>
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
                <input type="number" id="ano_publicacion" name="ano_publicacion">
            </div>
        </div>
        <div class="rowLARGO">
            <div class="inputLARGO">
                <label for="autor">Autor: </label>
                <input type="number" id="autor" name="autor">
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
                    <option value="Castellano">Castellano</option>
                    <option value="Inglés">Inglés</option>
                    <option value="Francés">Francés</option>
                </select>
            </div>
            <div class="inputLARGO">
            <label for="tipo">Selecciona un género:</label>
                <select name="tipo" id="tipo">
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
        <div class="inputLARGO">
            <label for="publico">Selecciona un publico:</label>
                <select name="publico" id="idioma">
                    <option value="Infantil">Infantil</option>
                    <option value="Adulto">Adulto</option>
                </select>
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
        <input type="number" name="id" placeholder="ID autor" required>
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
    <form id="formularioCORTO" method="post">
        <h1>CREAR USUARIO</h1>
        <input type="text" name="name" placeholder="Nombre de usuario">
        <input type="password" name="passw" placeholder="Contraseña">
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
                <input type="number" id="ano_publicacion" name="ano_publicacion">
            </div>
        </div>
        <div class="rowLARGO">
            <div class="inputLARGO">
                <label for="autor">Autor: </label>
                <input type="number" id="autor" name="autor">
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
                    <option value="Castellano">Castellano</option>
                    <option value="Inglés">Inglés</option>
                    <option value="Francés">Francés</option>
                </select>
            </div>
            <div class="inputLARGO">
            <label for="tipo">Selecciona un género:</label>
                <select name="tipo" id="tipo">
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
        <div class="inputLARGO">
            <label for="publico">Selecciona un publico:</label>
                <select name="publico" id="idioma">
                    <option value="Infantil">Infantil</option>
                    <option value="Adulto">Adulto</option>
                </select>
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
}
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
</body>
</html>