<?php 
session_start();
include("../con_db.php");

$isbn = mysqli_real_escape_string($conex, $_POST['id']);
$usuario = mysqli_real_escape_string($conex, $_SESSION['name']);

$comprobar = mysqli_query($conex, "SELECT * FROM like_libro WHERE isbn_libro = '$isbn' AND nombre_usuario = '$usuario'");
$count = mysqli_num_rows($comprobar);

if ($count == 0) {
  
    $insert = mysqli_query($conex, "INSERT INTO like_libro (isbn_libro, nombre_usuario) VALUES ('$isbn', '$usuario')");
    $update = mysqli_query($conex, "UPDATE libro SET num_like = num_like + 1 WHERE isbn = '$isbn'");
} else {
   
    $delete = mysqli_query($conex, "DELETE FROM like_libro WHERE isbn_libro = '$isbn' AND nombre_usuario = '$usuario'");
    $update = mysqli_query($conex, "UPDATE libro SET num_like = num_like - 1 WHERE isbn = '$isbn'");
}

$contar = mysqli_query($conex, "SELECT num_like FROM libro WHERE isbn = '$isbn'");
$cont = mysqli_fetch_array($contar);
$likes = $cont['num_like'];

if ($count == 0) { 
    $megusta = "<i class='fa-solid fa-thumbs-up fa-2x'></i>"; 
} else { 
    $megusta = "<i class='fa-regular fa-thumbs-up fa-2x'></i>"; 
}

$datos = array('likes' => $likes, 'text' => $megusta);

echo json_encode($datos);
mysqli_close($conex);
?>
