<?php

include 'Conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];

$sql = "UPDATE productem set nombre='$nombre', categoria='$categoria', descripcion='$descripcion', 
precio='$precio', imagen='$imagen' where id like $id";
$rta = mysqli_query($connect, $sql);
if(!$rta){
    echo "No se Actualizo";
}else{
    header("Location: AyBG.php");
}

?>