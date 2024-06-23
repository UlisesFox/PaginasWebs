<?php

include 'Conexion.php';

$nombreP = $_POST["nombreP"];
$precio = $_POST["precio"];
$fecha = $_POST["fecha"];
$descripccion = $_POST["descripccion"];
$estado = $_POST["estado"];
$imagen = $_POST["imagen"];

$inser = "INSERT INTO producto (id, nombreP, precio, fecha, descripccion, estado, imagen) values 
('0', '$nombreP', '$precio', '$fecha', '$descripccion', '$estado', '$imagen')";

$con = mysqli_query($connect, $inser);

if ($con){
    header('location: Admin.html');
}else{
    header('location: RegistroProducto.html');

}

mysqli_close($connect);

?>