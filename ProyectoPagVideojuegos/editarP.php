<!DOCTYPE html>
<html lang="en" style="background-color: rgb(35, 0, 83); color: orange;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="superior.css">
	<link rel="stylesheet" href="BarraDesplegable.css">
    <link rel="icon" href="./Imagenes/Logo.png" type="image/x-con">
    <title>Editar Producto</title>
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
                <a href="eliminar.php">Eliminar</a>
            </nav>
        </div>
    </header>

    <?php

    $id = $_GET['id'];
    $nombreP = $_GET['nombreP'];
    $precio = $_GET['precio'];
    $fecha = $_GET['fecha'];
    $descripccion = $_GET['descripccion'];
    $estado = $_GET['estado'];

    ?>

    <div>
        <form action="sp_editar.php" method="post" style="margin-top: 45px;">
            <table border="1" style="margin: auto;">
                <tr>
                    <td>Ingresar datos:</td>
                    <td><input type="text" name="id" id="" style="visibility:hidden" value="<?=$id?>"></td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombreP" id="" style="background-color: rgb(35, 0, 130); color: orange;" value="<?=$nombreP?>"></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><input type="text" name="precio" id="" style="background-color: rgb(35, 0, 130); color: orange;" value="<?=$precio?>"></td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td><input type="text" name="fecha" id="" style="background-color: rgb(35, 0, 130); color: orange;" value="<?=$fecha?>"></td>
                </tr>
                <tr>
                    <td>Descripccion:</td>
                    <td><input type="text" name="descripccion" id="" style="background-color: rgb(35, 0, 130); color: orange;" value="<?=$descripccion?>"></td>
                </tr>
                <tr>
                    <td>Esatdo:</td>
                    <td><input type="text" name="estado" id="" style="background-color: rgb(35, 0, 130); color: orange;" value="<?=$estado?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" style="background-color: rgb(35, 0, 130); color: orange; cursor: pointer;" value="Actualizar"></td>
                    <td><a href="editar.php" style="color: rgb(203, 132, 0); cursor: pointer;">Cancelar</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>