<?php
session_start();
if (isset($_SESSION["name"]) && $_SESSION["name"] === "admin") {
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="../imagenes/favicon.png" type="image/png">
<title>TuBiblioWeb/ADMIN</title>
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
<div class="menu">
<ul class="menumovil">
<li><a href="#" ><i class="fa-solid fa-user fa-3x"></i></a>

    <ul>
    <li><a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarusuario")); ?>">Insertar</a></li>
      <li><a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("actualizarusuario")); ?>">Actualizar</a></li>
    </ul>
  </li>
  <li><a href="#" ><i class="fa-solid fa-book fa-3x"></i></a>
    <ul>
      <li><a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarlibro")); ?>">Insertar</a></li>
      <li><a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("actualizarlibro")); ?>">Actualizar</a></li>
    </ul>
  </li>
  <li><a href="#"><i class="fa-solid fa-pencil fa-3x"></i></a>
    <ul>

      <li><a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarautor")); ?>">Insertar</a></li>
      <li><a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("actualizarautor")); ?>">Actualizar</a></li>
      
    </ul>
  </li> 
   <li> <a href="#" ><i class="fa-solid fa-calendar-check fa-3x"></i></a>

    <ul>
      <li><a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrarreserva")); ?>">Borrar</a></li>
    </ul>
  </li>
  <li><a href="#" ><i class="fa-solid fa-magnifying-glass fa-3x"></i></a>

    <ul>
      <li><a href="excelautor.php">Ver Tabla Autor</a></li>
      <li><a href="excelusuario.php">Ver Tabla Autor</a></li>
      <li><a href="excellibro.php">Ver Tabla Autor</a></li>
    </ul>
  </li>
  <li><a href="../registroinicio/cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket fa-3x"></i></a>  </li>
    <li><a href="../principal/index.php"><i class="fa-solid fa-house  fa-3x"></i></a></li>
</ul>
</div>
<div id="izq">
            <div id="menulateralB">
                <a href="#" id="masGrande"><i class="fa-solid fa-bars fa-3x"></i></a>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarusuario")); ?>"><i class="fa-regular fa-user fa-3x"></i></a>
                <br>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarlibro")); ?>"><i class="fa-solid fa-book fa-3x"></i></a>
                <br>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarautor")); ?>"><i class="fa-solid fa-pencil fa-3x"></i></a>
                <br>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrarreserva")); ?>"> <i class="fa-solid fa-calendar-check fa-3x"></i></a> 
                <br>
                <a href="#"> <i class="fa-solid fa-magnifying-glass fa-3x"></i></a>
                <br>
                <a href="../registroinicio/cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket fa-3x"></i></a>
                <br>
                <a href="../principal/index.php"><i class="fa-solid fa-house  fa-3x"></i></a>
            </div>
        <div id="menulateralA">
            
        <a href="#" id="maspequeño"><i class="fa-solid fa-bars fa-3x"></i></a>
            <a href="#" id="pulsarusuario"><i class="fa-regular fa-user fa-3x"></i> Usuario<a>
            <div id="submenuUsuario">
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarusuario")); ?>">Insertar</a>   
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("actualizarusuario")); ?>">Actualizar</a>
          
            </div>
            <br>
            <a href="#" id="pulsarlibro"><i class="fa-solid fa-book fa-3x"></i> Libros</a>
            <div id="submenuLibro">
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarlibro")); ?>">Crear</a>
            <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("actualizarlibro")); ?>">Actualizar</a>
            </div>
            <br>
            <a href="#" id="pulsarautor"><i class="fa-solid fa-pencil fa-3x"></i>Autores</a>
            <div id="submenuAutor">
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("insertarautor")); ?>">Crear</a>
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("actualizarautor")); ?>">Actualizar</a>
            </div>
            <br>
            <a href="#" id="pulsarreserva"><i class="fa-solid fa-calendar-check fa-3x"></i>Reservas</a>
            <div id="submenuReserva">
                <a href="formulariosadmin.php?q=<?php echo urlencode(base64_encode("borrarreserva")); ?>">Borrar</a>
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
                <a href="../principal/index.php"><i class="fa-solid fa-house  fa-3x"></i></a>
        </div>
    </div>

    <div id="der">
<?php
if(isset($_GET["q"])){
    //COMIENZA INSERTAR LIBRO
    if($_GET["q"] === base64_encode("insertarlibro")){
?>        
<div id="formuLARGO">
    <form class="formularioLARGO" method="POST"  enctype="multipart/form-data">
    <div class="contenedorformLARGO">
    <h1>INSERTAR LIBRO</h1>
        <div class="rowLARGO">
            <div class="inputLARGO">
                <label for="titulo">Título: </label>
                <input type="text" id="titulo" name="titulo">
            </div>
            <div class="inputLARGO">
                <label for="isbnMETERLIBRO">ISBN: </label>
                <input type="number" id="isbnMETERLIBRO" name="isbnMETERLIBRO" required>
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
                <select class="autor" name="autor">
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
    //EMPIEZA CREAR AUTOR
    if($_GET["q"] === base64_encode("insertarautor")){
?>
<div id="formuCORTO">
    <form class="formularioCORTO" method="post" >
        <h1>Insertar Autor</h1>
        <input type="text" name="nameMETERAUTOR" placeholder="Nombre autor" required>
        <label for="biografia">Biografía: </label>
        <textarea class="cuadrotext" name="biografia"></textarea>
        <center>
        <input type="submit" name="iniciarMETERAUTOR" id="enviar" value="enviar">
        </center>
        <br><br>
    </form>
</div>
<?php
    //FINALIZA CREAR AUTOR
    }   
    //EMPIEZA BORRAR AUTOR
    if($_GET["q"] === base64_encode("actualizarautor")){
?>
    <?php
$inc = include("../con_db.php");
if ($inc) {
    $orden_sentido = "ASC";
    $filtro = "";
    if (isset($_POST['buscarnombre'])) {
        $nombrebuscar = $_POST['nombreBuscar'];
        $filtro = "WHERE nombre LIKE '%" . $nombrebuscar . "%'";
            }

    $orden = ""; 
    if (isset($_GET['orden'])) {
        $orden_columna = $_GET['orden'];
        if($_GET['sentido'] === "DESC"){
        $orden_sentido = "ASC";
        }else{
            $orden_sentido = "DESC";
        }
        $orden = "ORDER BY $orden_columna $orden_sentido";
    }

    $consulta = "SELECT * FROM autor $filtro $orden";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
?>
        <form method="POST">
            <label for="nombreBuscar">Buscar por Nombre de Autor:</label>
            <input type="text" name="nombreBuscar" id="nombreBuscar" />
            <button type="submit" name="buscarnombre" value="buscar"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <table>
            <thead>
        <tr>
                <td><a href="?q=<?php echo urlencode(base64_encode("actualizarautor"));?>&orden=id_autor&sentido=<?php echo $orden_sentido?>"><b>ID</b></a></td>
                <td><b>Nombre</b></td>
                <td><b>Biografía</b></td>
                <td><b>Acciones</b></td>
            </tr>
    </thead>
    <tbody>
<?php

        while($row = $resultado->fetch_array()){
            $nombre=$row['nombre'];
            $biografia=$row['biografia'];
            $id_autro=$row['id_autor'];
                ?>
                <tr>
        <td data-label="ID"><input type="number" class="id_autor" name="id_autor" value="<?php echo $id_autro; ?>" disabled></td>
        <td data-label="Nombre"><input type="text" class="nombre_autor" name="nombre_autor" value="<?php echo $nombre; ?>"></td>
        <td data-label="Biografía"><textarea class="biografia" name="biografia"><?php echo $biografia; ?></textarea></td>
        <td data-label="Acciones">
            <button class="borrar" data-id="<?php echo $id_autro; ?>" data-tipo="id_autor"><i class="fa-solid fa-square-minus fa-2x"></i></button>
            <button class="actualizar" data-id="<?php echo $id_autro; ?>" data-tipo="id_autor"><i class="fa-solid fa-wrench fa-2x"></i></button>
        </td>
    </tr>
                <?php
                        }
                ?>
                </tbody>
            </table>
            <?php
    }
}
mysqli_close($conex);
?>
<?php 
//FINALIZA BORRAR AUTOR
    } 
    //EMPIEZA CREAR USUARIO
    if($_GET["q"] === base64_encode("insertarusuario")){
?>
<div id="formuCORTO">
    <form class="formularioCORTO" method="post" action="generarqr.php">
        <h1>CREAR USUARIO</h1>
        <input type="email" name="correo" placeholder="Nombre de usuario" maxlength = "7">
        <input type="text" name="nameMETERUSUARIO" placeholder="Nombre de usuario" maxlength = "7">
        <input type="password" name="passwMETERUSUARIO" placeholder="Contraseña"  maxlength = "7">
        <center>
        <input type="submit" name="register" id="enviar" value="register">
        </center>
    </form>
</div>
<?php 
//FINALIZA CREAR USUARIO
    }
    //EMPIEZA BORRAR USUARIO
    if($_GET["q"] === base64_encode("actualizarusuario")){
?>    <?php
$inc = include("../con_db.php");
if ($inc) {
    $filtro = "";
    if (isset($_POST['buscarnombre'])) {
        $nombrebuscar = $_POST['nombreBuscar'];
        $filtro = "WHERE nombre LIKE '%" . $nombrebuscar . "%'";
            }

    $consulta = "SELECT * FROM usuario $filtro";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
?>
        <form method="POST">
            <label for="nombreBuscar">Buscar por Usuario:</label>
            <input type="text" name="nombreBuscar" id="nombreBuscar" />
            <button type="submit" name="buscarnombre" value="buscar"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <table>
    <thead>
        <tr>
                <td><b>Correo</b></td>
                <td><b>Usuario</b></td>
                <td><b>Passw</b></td>
                <td><b>Acciones</b></td>
            </tr>
    </thead>
    <tbdoy>
<?php

        while($row = $resultado->fetch_array()){
            $correo = $row['correo'];
            $usuario=$row['nombre'];
            $passw=$row['passw'];
                ?>
                <tr>
        <td data-label="Correo"><input type="email" class="correo" name="correo" value="<?php echo $correo; ?>"></td>
        <td data-label="Usuario"><input type="text" class="usuario" name="usuario" value="<?php echo $usuario; ?>"></td>
        <td data-label="Passw"><input type="text" class="passw" name="passw" value="<?php echo $passw; ?>"></td>        
        <td data-label="Acciones">
            <button class="borrar" data-id="<?php echo $usuario; ?>" data-tipo="usuario"><i class="fa-solid fa-square-minus fa-2x"></i></button>
            <button class="actualizar" data-id="<?php echo $usuario; ?>" data-tipo="usuario"><i class="fa-solid fa-wrench fa-2x"></i></button>
        </td>
    </tr>
                <?php
                        }
                ?>
                </tbody>
            </table>
            <?php
    }
}
mysqli_close($conex);
?>
<?php 
//FINALIZA BORRAR USUARIO
    }
    //EMPIEZA MODIFICAR LIBRO
    if($_GET["q"] === base64_encode("actualizarlibro")){
    
?>
<?php
$inc = include("../con_db.php");
if ($inc) {
    $filtro = "";
    if (isset($_POST['buscarnombre'])) {
        $nombrebuscar = $_POST['nombreBuscar'];
        $filtro = "WHERE titulo LIKE '%" . $nombrebuscar . "%'";
            }

    $consulta = "SELECT * FROM libro $filtro";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
?>
        <form method="POST">
            <label for="nombreBuscar">Buscar por Título:</label>
            <input type="text" name="nombreBuscar" id="nombreBuscar" />
            <button type="submit" name="buscarnombre" value="buscar"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <table class="grande">
            <thead>
        <tr>
                <td><b>Isbn</b></td>
                <td><b>Título</b></td>
                <td><b>Editorial</b></td>
                <td><b>Publicación</b></td>
                <td><b>Seleccionar</b></td>
                <td><b>Portada</b></td>
                <td><b>Sinopsis</b></td>
                <td><b>Stock</b></td>
                <td><b>Acciones</b></td>

            </tr>
    </thead>
    <tbody>
<?php

        while($row = $resultado->fetch_array()){
            $isbn=$row['isbn'];
            $titulo=$row['titulo'];
            $editorial=$row['editorial'];
            $ano_publicacion=$row['ano_publicacion'];
            $id_autor2=$row['id_autor'];
            $portada_libro=$row['portada_libro'];
            $sinopsis=$row['sinopsis'];
            $publico=$row['publico'];
            $disponible=$row['disponible'];
            $tipo=$row['tipo'];
            $idioma=$row['idioma'];

                ?>
                <tr>
        <td data-label="Isbn"><input type="number" class="isbn" name="isbn" value="<?php echo $isbn; ?>" maxlength="9999999999999"></td>
        <td data-label="Título"><input type="text" class="titulo" name="titulo" value="<?php echo $titulo; ?>"></td>
        <td data-label="Editorial"><input type="text" class="editorial" name="editorial" value="<?php echo $editorial; ?>"></td>
        <td data-label="Publicación"><input type="number" class="ano_publicacion" name="ano_publicacion" value="<?php echo $ano_publicacion; ?>" maxlength="9999"></td>
        <td data-label="Seleccionar"> Autor<select class="autor" name="autor"  >
        <option value="<?php echo $id_autor2; ?>" selected disabled><?php echo $id_autor2; ?></option>
        <?php 
                        $consulta_autor = "SELECT * FROM autor";
                        $resultado_autor = mysqli_query($conex, $consulta_autor);
                        if($resultado_autor) {
                            while($row_autor = $resultado_autor->fetch_array()){
                                $id_autor = $row_autor["id_autor"];
                                $nombre = $row_autor["nombre"];
                                $selected = ($id_autor == $id_autor2) ? "selected" : "";
                                echo "<option value='".$id_autor."' ".$selected.">".$id_autor." ".$nombre."</option>";
                            }
                        }
                        ?>
                </select>
            <br>   Género <select name="tipo" class="tipo">
                    <option value="<?php echo $tipo; ?>" selected ><?php echo $tipo; ?></option>
                    <option value="Arte">Arte</option>
                    <option value="Ciencia">Ciencia</option>
                    <option value="Ficción">Ficción</option>
                    <option value="Historia">Historia</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Religión">Religión</option>
                    <option value="Medicina">Medicina</option>
                </select>
              <br> Idioma <select name="idioma" class="idioma">
                     <option value="<?php echo $idioma; ?>" selected ><?php echo $idioma; ?></option>
                    <option value="Castellano">Castellano</option>
                    <option value="Inglés">Inglés</option>
                    <option value="Francés">Francés</option>
                </select>
               <br>Público <select name="publico" class="publico">
                    <option value="<?php echo $publico; ?>" selected ><?php echo $publico; ?></option>
                    <option value="Infantil">Infantil</option>
                    <option value="Adulto">Adulto</option>
                </select>
            </td>
            <td  data-label="Portada"><input type="file" class="portada_libro" name="portada_libro" accept="image/*" required>
            archivo actual <?php echo $portada_libro;?></td>
            <td class="elmasgrande"  data-label="Sinopsis"><textarea class="sinopsis" name="sinopsis"><?php echo $sinopsis; ?></textarea></td>
            <td data-label="Stock"><input type="number" class="disponible" name="disponible" value="<?php echo $disponible; ?>"></td>

                <td data-label="acciones">
        <button class="borrar" data-id="<?php echo $isbn; ?>" data-tipo="isbn"><i class="fa-solid fa-square-minus fa-2x"></i></button>
        <button class="actualizar" data-id="<?php echo $isbn; ?>" data-tipo="isbn"><i class="fa-solid fa-wrench fa-2x"></i></button>
        </td>
    </tr>
                <?php
                        }
                ?>
                </tbody>
            </table>
            <?php
    }
}
mysqli_close($conex);
} //FINALIZA EDITAR LIBRO
?>
        <?php 
if($_GET["q"] === base64_encode("borrarreserva")){
    ?>
    <?php
$inc = include("../con_db.php");
if ($inc) {
    $orden_sentido = "ASC";
    $filtro = ""; 
    if (isset($_POST['buscar'])) {
        $id_reserva_buscada = $_POST['id_reserva'];
        $filtro = "WHERE id_reserva = '$id_reserva_buscada'";
    }

    $orden = ""; 
    if (isset($_GET['orden'])) {
        $orden_columna = $_GET['orden'];
        if($_GET['sentido'] === "DESC"){
        $orden_sentido = "ASC";
        }else{
            $orden_sentido = "DESC";
        }
        $orden = "ORDER BY $orden_columna $orden_sentido";
    }


    $consulta = "SELECT * FROM reserva $filtro $orden";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
?>
        <form method="POST">
            <label for="id_reserva">Buscar por ID de reserva:</label>
            <input type="text" name="id_reserva" id="id_reserva" />
            <button type="submit" name="buscar" value="buscar">><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <table>
            <thead>
        <tr>
                <td><a href="?q=<?php echo urlencode(base64_encode("borrarreserva"));?>&orden=id_reserva&sentido=<?php echo $orden_sentido?>"><b>ID</b></a></td>
                <td><b>ISBN</b></td>
                <td><b>Usuario</b></td>
                <td><a href="?q=<?php echo urlencode(base64_encode("borrarreserva"));?>&orden=fecha_inicio&sentido=DESC"><b>Fecha inicio</b></a></td>
                <td><a href="?q=<?php echo urlencode(base64_encode("borrarreserva"));?>&orden=fecha_fin&sentido=DESC"><b>Fecha fin</b></a></td>
                <td><b>Acciones</b></td>
            </tr>
    </thead>
    <tbody>
<?php
        while($row = $resultado->fetch_array()){
            $id_reserva=$row['id_reserva'];
            $isbn_libro=$row['isbn_libro'];
            $usuario=$row['correo_usuario'];
            $fecha_inicio=$row['fecha_inicio'];
            $fecha_fin=$row['fecha_fin'];
                ?>
                <tr>
                    <td data-label="ID"><?php echo $id_reserva;?></td>
                    <td data-label="ISBN"><?php echo $isbn_libro;?></td>
                    <td data-label="Usuario"><?php echo $usuario;?></td>
                    <td data-label="Fecha inicio"><?php echo $fecha_inicio;?></td>
                    <td data-label="fecha fin"><?php echo $fecha_fin;?></td>
                    <td data-label="Acciones"><button class="borrar" data-id="<?php echo $id_reserva; ?>" data-tipo="id_reserva"><i class="fa-solid fa-square-minus fa-2x"></i></button></td>

                </tr>
                <?php
                        }
                ?>
                </tbody>
            </table>
            <?php
    }
}
mysqli_close($conex);
?>
        <?php 
} //FINALIZA RESERVA
    ?>
<?php 
}else{
    ?>
    <h1  style="margin-top:20%;">BIENVENIDO ADMIN</h1>
    <?php
}
?>
</div>
</div>
<?php
}
else{
   header("Location: ../error.php");
}
        ?>
<script src="../javascript/admin.js">s</script>
<script src="../javascript/ajaxadmin.js"></script>
</body>
</html>