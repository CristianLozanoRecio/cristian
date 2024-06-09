<?php
include("../con_db.php");
$mensaje = "";

//BORRARAUTOR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST["id_autor"])) {
        $id =  mysqli_real_escape_string($conex,trim($_POST["id_autor"]));
        $consulta = "DELETE FROM autor WHERE id_autor = '$id'";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            // Verifica el número de filas afectadas
            if (mysqli_affected_rows($conex) > 0) {
               
                
                    $mensaje = "OK";
             
            } else {
            
                
                    $mensaje = "No se encontró el autor con ese ID.";
                
                
            }
        } else {
        
            
                $mensaje = "¡Ups, ha ocurrido un error!";
            
        
        }
}
    if(isset($_POST["isbn"])) {
        $isbn =  mysqli_real_escape_string($conex,trim($_POST["isbn"]));
        $consulta = "DELETE FROM libro WHERE isbn = '$isbn'";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            // Verifica el número de filas afectadas
            if (mysqli_affected_rows($conex) > 0) {
                
                
                    $mensaje = "OK";
                
              
            } else {
              
                
                    $mensaje = "No se encontró el libro con ese ISBN.";
                
              
            }
        } else {
          
            
                $mensaje = "¡Ups, ha ocurrido un error!";
            
    
        }
    }
    if(isset($_POST["usuario"]) >0) {
        $usuario = mysqli_real_escape_string($conex, trim($_POST["usuario"]));
        $consulta = "DELETE FROM usuario WHERE nombre = '$usuario'";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            // Verifica el número de filas afectadas
            if (mysqli_affected_rows($conex) > 0) {
                
                
                    $mensaje = "OK";
            } else {
                    $mensaje = "MAL";
                
                
            }
        } else {
            
            
                $mensaje = "¡Ups, ha ocurrido un error!";
            
            
        }
    }
    
if(isset($_POST["iniciarMETERAUTOR"])) {
    $mensaje = "Completa nombre";
    if (strlen($_POST["nameMETERAUTOR"]) >0){ 
        $nombre = mysqli_real_escape_string($conex, trim($_POST["nameMETERAUTOR"])); 
        $biografia =  mysqli_real_escape_string($conex, nl2br($_POST["biografia"]));       
        $consulta = "INSERT INTO autor(nombre,biografia) VALUES ('$nombre', '$biografia')";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            $mensaje = "EXITO";
        } else {
       $mensaje = "ERROR EN METER DATOS";
        }
    } else{
        $mensaje = "Completa nombre";
    }
} 

if(isset($_POST["datos"])) {
    if ($_POST["isbnMETERLIBRO"]>0) {        
        $isbn = mysqli_real_escape_string($conex, trim($_POST["isbnMETERLIBRO"]));
        $autor = mysqli_real_escape_string($conex, trim($_POST["autor"]));
        $titulo = mysqli_real_escape_string($conex, trim($_POST["titulo"]));
        $nombre_archivo = str_replace(' ', '_', $_FILES['portada_libro']['name']);
        $archivo = $_FILES['portada_libro']['tmp_name'];
        $destino = "../subidos/" . $nombre_archivo;
        move_uploaded_file($archivo,$destino);
        $sinopsis =  mysqli_real_escape_string($conex, nl2br($_POST["sinopsis"]));
        $editorial = mysqli_real_escape_string($conex, trim($_POST["editorial"]));
        $disponible =  mysqli_real_escape_string($conex, trim($_POST["disponible"]));
        $publico = "";
        $tipo = "";
        $idioma = "";
        if(isset($_POST["tipo"])){
            $tipo = mysqli_real_escape_string($conex, trim($_POST["tipo"]));
        }
        if(isset($_POST["idioma"])){
            $idioma = mysqli_real_escape_string($conex, trim($_POST["idioma"]));
        }
        if(isset($_POST["publico"])){
            $publico = mysqli_real_escape_string($conex, trim($_POST["publico"]));
        }
        $ano_publicacion = mysqli_real_escape_string($conex, trim($_POST["ano_publicacion"]));
        $consulta = "INSERT INTO libro(isbn, titulo, editorial, ano_publicacion, id_autor, portada_libro, sinopsis, idioma, tipo, publico, disponible) VALUES ('$isbn', '$titulo', '$editorial', '$ano_publicacion', '$autor', '$destino', '$sinopsis', '$idioma', '$tipo' ,'$publico','$disponible')";
         $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
           $mensaje = "EXITO";
        } else {
            $mensaje = "ERROR EN METER DATOS";
        }
    } else{
        $mensaje = "HOLA";
    }
}
    if (isset($_POST["isbn_editar"])) {
        $consultaUPDATE = '';     
        $isbn = mysqli_real_escape_string($conex, trim($_POST["isbn_editar"]));
        $isbnANT = mysqli_real_escape_string($conex, trim($_POST["isbnANT"]));

        if(isset($_POST["autor"]) >=1){
            $autor = mysqli_real_escape_string($conex, trim($_POST["autor"]));
            $consultaUPDATE .= ", id_autor = '$autor'";
        }

        if(strlen($_POST["titulo"])>=1){
            $titulo = mysqli_real_escape_string($conex, trim($_POST["titulo"]));
            $consultaUPDATE .= ", titulo = '$titulo'";
        }

        if (isset($_FILES['portada_libro']) && $_FILES['portada_libro']['size'] > 0) {        
            $nombre_archivo = str_replace(' ', '_', $_FILES['portada_libro']['name']);
            $archivo = $_FILES['portada_libro']['tmp_name'];
            $destino = "../subidos/" . $nombre_archivo;
            move_uploaded_file($archivo,$destino);
            $destino = mysqli_real_escape_string($conex, $destino);
            $consultaUPDATE .= ", portada_libro = '$destino'";
        }

        if(strlen($_POST["sinopsis"])>=1){
            $sinopsis = mysqli_real_escape_string($conex, nl2br($_POST["sinopsis"]));
            $consultaUPDATE .= ", sinopsis = '$sinopsis'";
        }

        if(strlen($_POST["editorial"])>=1){
            $editorial = mysqli_real_escape_string($conex, trim($_POST["editorial"]));
            $consultaUPDATE .= ", editorial = '$editorial'";
        }

        if(isset($_POST["tipolibro"])){
            $tipo = mysqli_real_escape_string($conex, trim($_POST["tipolibro"]));
            $consultaUPDATE .= ", tipo = '$tipo'";
        }

        if(isset($_POST["idioma"])){
            $idioma = mysqli_real_escape_string($conex, trim($_POST["idioma"]));
            $consultaUPDATE .= ", idioma = '$idioma'";
        }

        if(isset($_POST["publico"])){
            $publico = mysqli_real_escape_string($conex, trim($_POST["publico"]));
            $consultaUPDATE .= ", publico = '$publico'";
        }
        
        if(strlen($_POST["ano_publicacion"])>=1){
            $ano_publicacion = mysqli_real_escape_string($conex, trim($_POST["ano_publicacion"]));
            $consultaUPDATE .= ", ano_publicacion = '$ano_publicacion'";
        }
        if(strlen($_POST["disponible"])>=1){
            $disponible = mysqli_real_escape_string($conex, trim($_POST["disponible"]));
            $consultaUPDATE .= ", disponible = '$disponible'";
        }
        $consulta = "UPDATE libro SET isbn = '$isbn' $consultaUPDATE where isbn = '$isbnANT'";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            $mensaje = $consulta;
        } else {
  $mensaje = "ERROR EN METER DATOS";
        }
    }

if(isset($_POST["usuario_act"]) && isset($_POST["passw_act"])){
    if (strlen($_POST["usuario_act"])>0 && strlen($_POST["passw_act"])>4) {   
        $usuario_act = mysqli_real_escape_string($conex, trim($_POST["usuario_act"]));
        $passw_act = mysqli_real_escape_string($conex, trim($_POST["passw_act"]));
        $usuarioANT = mysqli_real_escape_string($conex, trim($_POST["usuarioANT"]));    
            $consulta = "UPDATE usuario SET  nombre =  '$usuario_act' , passw='$passw_act' where nombre = '$usuarioANT'";
            $resultado = mysqli_query($conex, $consulta);
             if ($resultado) {
              $mensaje = "EXITO";
            } else {
              $mensaje = "ERROR EN METER DATOS";
            }
        }else{
            $mensaje  = "Pocos carácteres";
        }
    }

    if (isset($_POST["id_autor_act"])) {   
        $id_autor = mysqli_real_escape_string($conex, trim($_POST["id_autor_act"]));
        $nombre = mysqli_real_escape_string($conex, trim($_POST["nombre_autor"])); 
        $biografia =  mysqli_real_escape_string($conex, nl2br($_POST["biografia"]));  
        $consulta = "UPDATE autor SET  id_autor =  '$id_autor', nombre = '$nombre', biografia='$biografia'  where id_autor = '$id_autor'";
        $resultado = mysqli_query($conex, $consulta);
            if ($resultado) {
                $mensaje = "PERFE";
            } else {
                $mensaje = "ERROR EN METER DATOS";
            }
        }

//BORRARRESERVA
if(isset($_POST["id_reserva"])) {
    // Recibe la clave correcta que estás enviando desde JavaScript
    $id_reserva = mysqli_real_escape_string($conex, trim($_POST["id_reserva"]));
    $consulta = "DELETE FROM reserva WHERE id_reserva = '$id_reserva'";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
        // Verifica el número de filas afectadas
        if (mysqli_affected_rows($conex) > 0) {
            $mensaje = "OK";
        } else {
            $mensaje = "MAL";
        }
    } else {
        $mensaje = "MAL";
    }
}


    header('Content-Type: application/json');
echo json_encode(array("mensaje" => $mensaje));

    mysqli_close($conex);
}
?>
