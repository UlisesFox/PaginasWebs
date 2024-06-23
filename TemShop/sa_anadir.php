<?php

include 'Conexion.php';

$nombre = $_POST["nombre"];
$categoria = $_POST["categoria"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$imagen = $_POST["imagen"];

$inser = "INSERT INTO productem (id, nombre, categoria, descripcion, precio, imagen) values 
('0', '$nombre', '$categoria', '$descripcion', '$precio', '$imagen')";

$con = mysqli_query($connect, $inser);

if ($con){
    header('location: RegistroP.php');
}else{
    header('location: RegistroP.php');

}

mysqli_close($connect);

?>