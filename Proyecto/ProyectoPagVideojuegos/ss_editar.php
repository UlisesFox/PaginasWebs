<?php

include 'Conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contrasenia = $_POST['contrasenia'];
$Tipo = $_POST['Tipo'];

$sql = "UPDATE registro set nombre='$nombre', correo='$correo', telefono='$telefono', 
contrasenia='$contrasenia', Tipo='$Tipo' where id like $id";
$rta = mysqli_query($connect, $sql);
if(!$rta){
    echo "No se Actualizo";
}else{
    header("Location: editar.php");
}

?>