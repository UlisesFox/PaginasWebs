<?php
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
                    <a class="nav-link active" aria-current="page" href="PagPrincipalA.php">Home</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="ProductosA.php">Productos</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Actualizar y Borrar</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="RegistroP.php">Añadir</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="Logout.php">Logout</a>                
                  </li>
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
            <form>
            <h2>Actualizar y Eliminar</h2>
              <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Productos</label>
                  </div>
                  <table border="1" style="margin: auto;">
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Categoria</td>
                        <td>Descripcion</td>
                        <td>Precio</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>

                    <?php
                    include ('Conexion.php');

                    $sql="SELECT * from productem";
                    $result=mysqli_query($connect, $sql);

                    while($mostrar=mysqli_fetch_array($result)){
                    ?>

                    <tr>
                        <td><?php echo $mostrar['id']?></td>
                        <td><?php echo $mostrar['nombre']?></td>
                        <td><?php echo $mostrar['categoria']?></td>
                        <td><?php echo $mostrar['descripcion']?></td>
                        <td><?php echo $mostrar['precio']?></td>
                        <td><a href="AyBAA.php?
                        id=<?php echo $mostrar['0']?> &
                        nombre=<?php echo $mostrar['1']?> &
                        categoria=<?php echo $mostrar['2']?> &
                        descripcion=<?php echo $mostrar['3']?> &
                        precio=<?php echo $mostrar['4']?> &
                        imagen=<?php echo $mostrar['5']?>" 
                        style="color: rgb(0, 0, 200);">Editar</a></td>
                        <td><a href="sa_eliminar.php? id=<?php echo $mostrar['0'] ?>" style="color: rgb(0, 0, 200);">Eliminar</a></td>
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