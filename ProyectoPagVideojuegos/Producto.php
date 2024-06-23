<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="superior.css">
    <link rel="stylesheet" href="BarraDesplegable.css">
    <link rel="stylesheet" href="Producto.css">
    <link rel="icon" href="./Imagenes/Logo.png" type="image/x-con">
    <title>Producto</title>
</head>
<body>

    <header>
        <div class="pagina">
            <img src="Imagenes/Logo.png" alt="Imagen logo">
            <h1 class="">Fox's Den</h1>
            <input type="checkbox" id="menubarra">
            <label class="icon-menu" for="menubarra"></label>
            <nav class="barra">
                <a href="Tienda.html">Tienda</a>
                <a href="buscarT.php">Buscar</a>
                <a href="MostrarT.php">Mostrar</a>
                <a href="#">Productos</a>
            </nav>
        </div>
    </header>

    <section>Productos</section>

    <div>

        <?php
            include("Conexion.php");
            $sql = mysqli_query($connect, "SELECT * FROM Producto");
            while($row = mysqli_fetch_array($sql)){
        ?>

        <div class="galeria-port">
            <div class="imagen-port">
                <img src="<?php echo $row['imagen']?>">
                    <div class="hover-galeria">
                        <img src="Imagenes/carritologo.png" alt="">
                    <p><?php echo $row['nombreP']?></p>
                    <p><?php echo $row['estado']?></p>
                    <p><?php echo $row['precio']?></p>
                </div>
            </div>
            <p>Producto: <?php echo $row['nombreP']?></p>
            <p>Estado: <?php echo $row['estado']?></p>
            <p> Precio: <?php echo $row['precio']?></p>
            <p>Descripccion: <?php echo $row['descripccion']?></p>
            <form action="carrito.php" method="get">
            <button type="submit" name="carrito" value="<?php echo $row['id']?>">Agregar</button>
            </form>
        </div>

        <?php
            }
        ?>
    
</body>
</html>