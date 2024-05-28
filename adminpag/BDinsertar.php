<?php

include("../con_db.php");
//BORRARAUTOR
if(isset($_POST["iniciarBORRARAUTOR"])) {
    if($_POST["id"] >= 0) {
        $isbn = trim($_POST["id"]);
        $consulta = "DELETE FROM autor WHERE id_autor = '$id'";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            // Verifica el número de filas afectadas
            if (mysqli_affected_rows($conex) > 0) {
                ?>
                <script>
                    alert("Borrado Correctamente");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("No se encontró el autor con ese ID.");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("¡Ups, ha ocurrido un error!");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("¡Por favor completa la ID!");
        </script>
        <?php
    }
}

//BORRARLIBRO
if(isset($_POST["iniciarBORRARLIBRO"])) {
    if($_POST["isbn"] >= 0) {
        $isbn = trim($_POST["isbn"]);
        $consulta = "DELETE FROM libro WHERE isbn = '$isbn'";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            // Verifica el número de filas afectadas
            if (mysqli_affected_rows($conex) > 0) {
                ?>
                <script>
                    alert("Borrado Correctamente");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("No se encontró el libro con ese ISBN.");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("¡Ups, ha ocurrido un error!");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("¡Por favor completa la ISBN!");
        </script>
        <?php
    }
}
//BORRARUSUARIO
if(isset($_POST["iniciarBORRARUSUARIO"])) {
    if($_POST["name"] >= 1) {
        $usuario = trim($_POST["name"]);
        $consulta = "DELETE FROM usuario WHERE nombre = '$usuario'";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            // Verifica el número de filas afectadas
            if (mysqli_affected_rows($conex) > 0) {
                ?>
                <script>
                    alert("Borrado Correctamente");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("No se encontró el usuario con ese nombre.");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("¡Ups, ha ocurrido un error!");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("¡Por favor completa el Usuario!");
        </script>
        <?php
    }
}

//METER AUTOR
if(isset($_POST["iniciarMETERAUTOR"])) {
    if (strlen($_POST["name"]) >= 1 ) { 
        $nombre = trim($_POST["name"]); 
        $biografia = trim($_POST["biografia"]);       
        $consulta = "INSERT INTO autor(nombre,biografia) VALUES ('$nombre', '$biografia')";
         $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                echo '<script>alert("EXITO");</script>';
            } else {
                echo '<script>alert("ERROR EN METER DATOS");</script>';
            }
        } else {
        echo '<script>alert("COMPLETA CORRECTAMENTE LOS DATOS");</script>';
    }
}

//METER LIBRO
if(isset($_POST["datos"])) {
    if (strlen($_POST["isbn"]) >= 1 ) {        
        $isbn = trim($_POST["isbn"]);
        $autor = trim($_POST["autor"]);
        $titulo = trim($_POST["titulo"]);
        $nombre_archivo = str_replace(' ', '_', $_FILES['portada_libro']['name']);
        $archivo = $_FILES['portada_libro']['tmp_name'];
        $destino = "../subidos/" . $nombre_archivo;
        move_uploaded_file($archivo,$destino);
        $sinopsis = trim($_POST["sinopsis"]);
        $editorial = trim($_POST["editorial"]);
        $tipo = trim($_POST["tipo"]);
        $idioma = trim($_POST["idioma"]);
        $publico = trim($_POST["publico"]);
        $ano_publicacion = trim($_POST["ano_publicacion"]);
        $consulta = "INSERT INTO libro(isbn, titulo, editorial, ano_publicacion, id_autor, portada_libro, sinopsis, idioma, tipo, publico) VALUES ('$isbn', '$titulo', '$editorial', '$ano_publicacion', '$autor', '$destino', '$sinopsis', '$idioma', '$tipo' ,'$publico')";
         $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                echo '<script>alert("EXITO");</script>';
            } else {
                echo '<script>alert("ERROR EN METER DATOS");</script>';
            }
        } else {
        echo '<script>alert("COMPLETA CORRECTAMENTE LOS DATOS");</script>';
    }
}

if(isset($_POST["register"])) {
    if(strlen($_POST["name"]) >= 1 && strlen($_POST["passw"]) >= 1) {
        $name = trim($_POST["name"]);
        $passw = trim($_POST["passw"]);
        $comprobar = "SELECT nombre FROM usuario WHERE nombre = '$name'";
        $resultado_comprobar = mysqli_query($conex, $comprobar);

        if(mysqli_num_rows($resultado_comprobar) > 0) {
            echo '<h3>Nombre de usuario ya existe</h3>';
        } else {
            $consulta = "INSERT INTO Usuario(nombre, passw) VALUES ('$name', '$passw')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                $_SESSION["name"] = $name;
            } else {
                echo '<h3>Error en el registro</h3>';
            }
        }
    } else {
        echo '<h3>Completa los campos</h3>';
    }
}
//EDITARLIBRO
if(isset($_POST["datosEDITAR"])) {
    if (strlen($_POST["isbn"]) >= 1 ) {
        $consultaUPDATE = '';     
        $isbn = trim($_POST["isbn"]);

        if(strlen($_POST["autor"]) >=1){
        $autor = trim($_POST["autor"]);
        $consultaUPDATE .= ", id_autor = '$autor'";
        }

        if(strlen($_POST["titulo"])>=1){
        $titulo = trim($_POST["titulo"]);
        $consultaUPDATE .= ", titulo = '$titulo'";
        }

        if (isset($_FILES['portada_libro']) && $_FILES['portada_libro']['size'] > 0) {        
        $nombre_archivo = str_replace(' ', '_', $_FILES['portada_libro']['name']);
        $archivo = $_FILES['portada_libro']['tmp_name'];
        $destino = "../subidos/" . $nombre_archivo;
        move_uploaded_file($archivo,$destino);
        $consultaUPDATE .= ", portada_libro = '$destino'";
        }

        if(strlen($_POST["sinopsis"])>=1){
        $sinopsis = trim($_POST["sinopsis"]);
        $consultaUPDATE .= ", sinopsis = '$sinopsis'";
        }

        if(strlen($_POST["editorial"])>=1){
        $editorial = trim($_POST["editorial"]);
        $consultaUPDATE .= ", editorial = '$editorial'";

        }

        if(strlen($_POST["tipo"])>=1){
        $tipo = trim($_POST["tipo"]);
        $consultaUPDATE .= ", tipo = '$tipo'";

        }

        if(strlen($_POST["idioma"])>=1){
        $idioma = trim($_POST["idioma"]);
        $consultaUPDATE .= ", idioma = '$idioma'";

        }

        if(strlen($_POST["publico"])>=1){
        $publico = trim($_POST["publico"]);
        $consultaUPDATE .= ", publico = '$publico'";

        }
        
        if(strlen($_POST["ano_publicacion"])>=1){
        $ano_publicacion = trim($_POST["ano_publicacion"]);
        $consultaUPDATE .= ", ano_publicacion = '$ano_publicacion'";
        }
        $consulta = "UPDATE libro SET isbn = $isbn $consultaUPDATE where isbn = '$isbn'";
         $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                echo '<script>alert("EXITO");</script>';
            } else {
                echo '<script>alert("ERROR EN METER DATOS");</script>';
            }
        } else {
        echo '<script>alert("COMPLETA CORRECTAMENTE LOS DATOS");</script>';
    }
}

mysqli_close($conex);
?>
