<?php

include 'Conexion.php';

?>

<!DOCTYPE html>
<html lang="en" style="background-color: rgb(35, 0, 83); color: orange;">
<head>
	<link rel="stylesheet" href="superior.css">
	<link rel="stylesheet" href="BarraDesplegable.css">
	<link rel="icon" href="./Imagenes/Logo.png" type="image/x-con">
	<title>Eliminar</title>
</head>
<body>

	<header>
        <div class="pagina">
            <img src="Imagenes/Logo.png" alt="Imagen logo">
            <h1 class="">Fox's Den</h1>
            <input type="checkbox" id="menubarra">
            <label class="icon-menu" for="menubarra"></label>
            <nav class="barra">
				<a href="Admin.html">Admin</a>
                <a href="Mostrar.php">Mostra datos</a>
                <a href="RegistroProducto.html">Registro</a>
                <a href="buscar.php">Buscar</a>
                <a href="editar.php">Modificar</a>
                <a href="#">Eliminar</a>
				<a href="TiendaA.html">Regresar</a>
            </nav>
        </div>
    </header>

	<br>
	<h2 style="margin-bottom: 10px; font-size: 40px; text-align: center;"">Usuarios</h2>
		<table border="1" style="margin: auto;">
			<tr>
				<td>ID</td>
				<td>Nombre</td>
				<td>Correo</td>
				<td>Telefono</td>
				<td>Contraseña</td>
				<td>Tipo</td>
                <td>Eliminar</td>
			</tr>

			<?php
			$sql="SELECT * from registro";
			$result=mysqli_query($connect, $sql);

			while($mostrar=mysqli_fetch_array($result)){
			?>

			<tr>
				<td><?php echo $mostrar['id'] ?></td>
				<td><?php echo $mostrar['nombre'] ?></td>
				<td><?php echo $mostrar['correo'] ?></td>
				<td><?php echo $mostrar['telefono'] ?></td>
				<td><?php echo $mostrar['contrasenia'] ?></td>
				<td><?php echo $mostrar['Tipo'] ?></td>
                <td><a href="ss_eliminar.php? id=<?php echo $mostrar['0'] ?>" style="color: orange;">Eliminar</a></td>
			</tr>

			<?php
			}
			?>

		</table>
		
		<h2 style="margin-top: 10px; margin-bottom: 10px; font-size: 40px; text-align: center;">Productos</h2>
		<table border="1" style="margin: auto;">
			<tr>
				<td>Nombre</td>
				<td>ID</td>
				<td>Precio</td>
				<td>Fecha</td>
				<td>Descripccion</td>
				<td>Estado</td>
				<td>Imagen</td>
                <td>Eliminar</td>
			</tr>

			<?php
			$sql="SELECT * from producto";
			$result=mysqli_query($connect, $sql);
			while($mostrar=mysqli_fetch_array($result)){
			?>

			<tr>
				<td><?php echo $mostrar['nombreP'] ?></td>
				<td><?php echo $mostrar['id'] ?></td>
				<td><?php echo $mostrar['precio'] ?></td>
				<td><?php echo $mostrar['fecha'] ?></td>
				<td><?php echo $mostrar['descripccion'] ?></td>
				<td><?php echo $mostrar['estado'] ?></td>
                <td></td>
				<td><a href="sp_eliminar.php? id=<?php echo $mostrar['0'] ?>" style="color: orange;">Eliminar</a></td>
			</tr>

			<?php
			}
			?>

		</table>
	</br>
</body>
</html>