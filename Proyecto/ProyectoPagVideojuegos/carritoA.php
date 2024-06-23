<?php

session_start();

include("Conexion.php");

$car = array(
    'Producto' => array(),
    'Subtotal' => 0,
    'Total' => 0
);

if(isset($_SESSION["carrito"])){
    $car = $_SESSION["carrito"];
}

$carritosGuardados = [];
if(isset($_SESSION["carritos"])){
    $carritosGuardados = $_SESSION["carritos"];
}

calcular($car, $carritosGuardados);

if(isset($_GET["carrito"])){
    print $_SESSION["carrito"]['total'];
    $id = $_GET["carrito"];
    if($id){
        add($id, $car, $connect, $carritosGuardados);
    }
}

if(isset($_GET["remove"])){
    $id = $_GET["remove"];
    if(isset($id) || $id == 0){
        remove($id, $car, $carritosGuardados);
    }
}

function add($p = [], &$car, &$connect, &$carritosGuardados){
    $sql = mysqli_query($connect, "SELECT * FROM producto WHERE id = '$p' ");
    $resul = mysqli_fetch_array($sql);
    $resul['cantidad'] = 1;
    array_push($car['Producto'], $resul);
    $_SESSION["carrito"] = $car;
    calcular($car, $carritosGuardados);
}

function calcular(&$car, &$carritosGuardados){
    $car['subtotal'] = 0;
    $car['total'] = 0;
    foreach($car['Producto'] as &$p){
        $car['subtotal'] += $p['precio'] * $p['cantidad'];
    }
    $car['total'] = $car['subtotal'];
    $_SESSION["carrito"] = $car;
    $carritosGuardados[$car['index']] = $car;
    $_SESSION["carritos"] = $carritosGuardados;
}

function remove($index = 0, &$car, &$carritosGuardados){
    array_splice($car['Producto'], $index, 1);
    echo sizeof($car['Producto']);
    calcular($car, $carritosGuardados);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="BarraDesplegable.css">
    <link rel="stylesheet" href="carrito.css">
    <link rel="icon" href="./Imagenes/Logo.png" type="image/x-con">
    <title>Carrito</title>
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
                <a href="buscarTA.php">Buscar</a>
                <a href="MostrarTA.php">Mostrar</a>
                <a href="ProductoA.php">Producto</a>
            </nav>
        </div>
    </header>

    <h1 style="margin-right: 20px; margin-top: 55px; margin-left: 20px;">Carrito Total: <?php echo $car['total']?></h1>

<div style="margin-right: 20px;">
    <form action = "ProductoA.php" methot="get">
        <button type="submit" name="p" value="p">Seguir comprando</botton>
    <form action = "TiendaA.html" methot="get">
        <button type="submit" name="comprar" value="comprar">Comprar</botton>
    <form action = "TiendaA.html" methot="get">
        <button type="submit" name="cancelar" value="cancelar">Cancelar</botton>
    </form>
    </form>
    </form>
</div>

    <div>
        <?php
        include("Conexion.php");
        foreach($car['Producto'] as $key => &$row){
        ?>

        <div>
            <img style="width: 35%; height: 100%; margin-top: 20px;" src="<?php echo $row['imagen']?>">
            <h4>Nombre: <?php echo $row['nombreP']?></h4>
            <p>Precio: <?php echo $row['precio']?></p>
            <p>Cantidad: <?php echo $row['cantidad']?></p>
            <form action="carritoA.php" method="get">
            <button type="submit" name="remove" value="<?php echo $key?>">Eliminar</button>        
            </form>
        </div>

        <?php
        }
        ?>

    </div>
</body>
</html>