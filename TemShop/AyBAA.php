<?php
session_start();
include 'Conexion.php';
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
                    <a class="nav-link" aria-current="page" href="AyBA.php">Actualizar y Borrar</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="RegistroP.php">Añadir</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="Logout.php">Logout</a> 
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header> 

        <?php
          $id = $_GET['id'];
          $nombre = $_GET['nombre'];
          $categoria = $_GET['categoria'];
          $descripcion = $_GET['descripcion'];
          $precio = $_GET['precio'];
          $imagen = $_GET['imagen'];
        ?>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 mt-5">
            <div class="contenedor__login-register">
            <form action="sa_editar.php" method="POST">
            <h2>Editar</h2>
              <div class="form-group">
              <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Ingresar datos:</label>
                    <input type="text" class="form-control" id="id" name="id" style="visibility:hidden" value="<?=$id?>">                
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required="obligatorio" placeholder="Ingresa Nombre" style="background:rgb(238, 208, 157)" value="<?=$nombre?>">                
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Categoria:</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" required="obligatorio" placeholder="Ingresa Categoria" style="background:rgb(238, 208, 157)" value="<?=$categoria?>">                
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required="obligatorio" placeholder="Ingresa Descripcion" style="background:rgb(238, 208, 157)" value="<?=$descripcion?>">                
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Precio:</label>
                    <input type="text" class="form-control" id="precio" name="precio" required="obligatorio" placeholder="Ingresa Precio" style="background:rgb(238, 208, 157)" value="<?=$precio?>">                
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Imagen:</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Ingresa Imagen" style="background:rgb(238, 208, 157)" value="<?=$imagen?>">                
                  </div>
              <button type="submit" name="submit" value="Registrar" class="btn btn-primary mt-3" style="background: rgb(0, 0, 200); border-color: rgb(0, 0, 200);">Aceptar</button>
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