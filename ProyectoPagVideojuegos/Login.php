<?php

include 'Conexion.php';

$correo = $_POST['correo'];
$contrasenia = $_POST['contrasenia'];

$consu = mysqli_query($connect, "SELECT * FROM registro WHERE correo = '$correo' && contrasenia = '$contrasenia'");

if (mysqli_num_rows($consu) == 1) {
  $usuario = mysqli_fetch_assoc($consu);
  session_start();
  $_SESSION['id'] = $usuario['id'];
  $_SESSION['nombre'] = $usuario['nombre'];
  $_SESSION['correo'] = $usuario['correo'];
  $_SESSION['Tipo'] = $usuario['Tipo'];
  mysqli_close($connect);
  if ($_SESSION['Tipo'] == '1') {
    header("location: TiendaA.html");
    exit();
  } else {
    header("location: Tienda.html");
    exit();
  }
} else {
  mysqli_close($connect);
  header("location: Login.html");
  exit();
}
