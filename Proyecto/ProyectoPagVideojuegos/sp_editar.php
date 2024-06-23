<?php

include 'Conexion.php';

$id = $_POST['id'];
$nombreP = $_POST['nombreP'];
$precio = $_POST['precio'];
$fecha = $_POST['fecha'];
$descripccion = $_POST['descripccion'];
$estado = $_POST['estado'];

$sql = "UPDATE producto set nombreP='$nombreP', precio='$precio', fecha='$fecha', 
descripccion='$descripccion', estado='$estado' where id like $id";
$rta = mysqli_query($connect, $sql);
if(!$rta){
    echo "No se Actualizo";
}else{
    header("Location: editar.php");
}

?>