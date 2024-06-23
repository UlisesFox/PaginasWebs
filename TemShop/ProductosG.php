<?php 
error_reporting(0);
session_start();
?>

<!doctype html>
<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tem Shop</title>  
    <link href="css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="icon" href="assets/images/tem.png" type="image/x-con">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>

  <body>
    <main>
      <div class="container mb-5">

        <header class="d-flex flex-wrap py-3 mb-5 border-bottom">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container" style="flex-direction: row-reverse;">
            <img src="assets/images/tem2.png" alt="Imagen logo">
              <a class="navbar-brand">Tem Shop</a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="PagPrincipalG.php">Home</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Productos</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="AyBG.php">Actualizar y Borrar</a>                    
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header> 

        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 mt-5">
            <div class="contenedor__login-register">
            <form action="ProductosG.php" method="POST" class="form">
            <h2>Producto</h2>
              <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Categoria del producto</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" required="obligatorio" placeholder="Ingresa categoria del producto" style="background:rgb(238, 208, 157)">                
                  </div>
              <button type="submit" id="buscar" name="buscar" value="Registrar" class="btn btn-primary mt-3" style="background: rgb(0, 0, 200); border-color: rgb(0, 0, 200);">Buscar</button>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label"></label>
                  </div>
                <?php
                if (isset($_POST["categoria"])) {
                    $categoria = $_POST["categoria"];
                    include ('Conexion.php');

                    // Evitar inyección de SQL usando consultas preparadas
                    $stmt = $connect->prepare("SELECT * FROM productem WHERE categoria = ?");
                    $stmt->bind_param("s", $categoria);
                    $stmt->execute();
                    $resultado = $stmt->get_result();

                    if ($resultado->num_rows > 0) {
                        echo '<table border="2" style="margin: auto;">
                                <tr>
                                    <td>ID</td>
                                    <td>Nombre</td>
                                    <td>Categoria</td>
                                    <td>Descripcion</td>
                                    <td>Precio</td>
                                    <td>Imagen</td>
                                </tr>';

                        while ($fila = $resultado->fetch_assoc()) {
                            echo '<tr>
                                    <td>' . $fila['id'] . '</td>
                                    <td>' . $fila['nombre'] . '</td>
                                    <td>' . $fila['categoria'] . '</td>
                                    <td>' . $fila['descripcion'] . '</td>
                                    <td>' . $fila['precio'] . '</td>
                                    <td></td>
                                </tr>';
                        }
                        //<td><img src="ruta_de_imagen/' . $fila['imagen'] . '" alt="Imagen del producto" width="50" height="50"></td>
                        echo '</table>';
                    } else {
                        echo '<h2 class="bad">Producto no encontrado</h2>';
                    }

                    $stmt->close();
                    $connect->close();
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label"></label>
                  </div>
                <?php
                include ('Conexion.php');
                
                $sql="SELECT * from productem";
                $result = mysqli_query($connect, $sql);
                ?>
                    <table border="2"  style="margin: auto;">
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Categoria</td>
                            <td>Descripcion</td>
                            <td>Precio</td>
                            <td>Imagen</td>
                        </tr>
                <?php while($mostrar=mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td><?php echo $mostrar['id']?></td>
                            <td><?php echo $mostrar['nombre']?></td>
                            <td><?php echo $mostrar['categoria']?></td>
                            <td><?php echo $mostrar['descripcion']?></td>
                            <td><?php echo $mostrar['precio']?></td>
                            <td></td>
                        </tr>
                    
                    <?php
                }
                ?>
            </table>
            </form>
            </div> 
          </div> 
          <div class="col-md-4"></div>      
        </div>
      </div>



      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="assets/js/app.js"></script>
    </body>
</html>