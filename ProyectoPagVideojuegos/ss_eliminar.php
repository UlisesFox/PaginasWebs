<?php

include 'Conexion.php';
$id = $_GET['id'];

$sql = "DELETE FROM registro where id like $id";
$rta = mysqli_query($connect, $sql);
if (!$rta){
    echo "No se Elimino!";
}else{
    header("Location: eliminar.php");
}

?>