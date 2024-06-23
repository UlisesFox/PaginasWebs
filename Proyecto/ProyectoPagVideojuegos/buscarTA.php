<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="es" style="background-color: rgb(35, 0, 83); color: orange;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="superior.css">
	<link rel="stylesheet" href="BarraDesplegable.css">
	<link rel="icon" href="./Imagenes/Logo.png" type="image/x-con">
    <title>Buscar</title>
</head>
<body>

	<header>
        <div class="pagina">
            <img src="Imagenes/Logo.png" alt="Imagen logo">
            <h1 class="">Fox's Den</h1>
            <input type="checkbox" id="menubarra">
            <label class="icon-menu" for="menubarra"></label>
            <nav class="barra">
                <a href="TiendaA.html">Tienda</a>
                <a href="Admin.html">Admin</a>
                <a href="#">Buscar</a>
                <a href="MostrarTA.php">Mostrar</a>
                <a href="ProductoA.php">Productos</a>
                <a href="index.php">Cerrar sesion</a>
            </nav>
        </div>
    </header>

<seccionn style="text-align: center;">
<form action="buscarT.php" method="POST" class="form" style="margin-bottom: 20px;">
		<h2 style="margin-top: 10px; margin-bottom: 10px; font-size: 40px;">Productos</h2>
        <label for = "nombreP">Nombre del Producto:</label>
            <input type="text" name = "nombreP" id = "nombreP" style="background-color: rgb(35, 0, 115); color: orange;"/>
            <button type="submit" name = "buscar" id = "buscar" style="background-color: rgb(35, 0, 115); color: orange; cursor: pointer;">
            Buscar</button>
    </form>

    <?php
    $nombreP = $_POST["nombreP"];
    include ('Conexion.php');
    $consulta = "SELECT * FROM producto where nombreP = '$nombreP'";
    $resultado = mysqli_query($connect,$consulta);
    $filas = mysqli_num_rows($resultado);
    $mostrar = mysqli_fetch_array($resultado);
    if($filas){
    ?><table border="1" style="margin: auto;">
			<tr>
				<td>Nombre</td>
				<td>ID</td>
				<td>Precio</td>
				<td>Fecha</td>
				<td>Descripccion</td>
				<td>Estado</td>
				<td>Imagen</td>
			</tr>
            <tr>
                <td><?php echo $mostrar['nombreP']?></td>
                <td><?php echo $mostrar['id']?></td>
                <td><?php echo $mostrar['precio']?></td>
                <td><?php echo $mostrar['fecha']?></td>
                <td><?php echo $mostrar['descripccion']?></td>
				<td><?php echo $mostrar['estado']?></td>
				<td></td>
            </tr>
        </table><?php
    }else{
        ?><h2 class = "bad">Producto no encontrado</h2><?php
    }
    mysqli_free_result($resultado);
    mysqli_close($connect);?>
</seccionn>
</body>
</html>