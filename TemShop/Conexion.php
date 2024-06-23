<?php

$db_host="localhost";
$db_user="root";
$db_name="seguridad";
$db_password="";
//limpiar id a 1, ALTER TABLE `registros` AUTO_INCREMENT=1

$connect = mysqli_connect($db_host,$db_user,$db_password,$db_name);

if(!$connect){
}else{
}

?>