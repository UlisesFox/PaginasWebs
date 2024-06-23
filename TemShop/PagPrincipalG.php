<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header('location: Login.html');
    exit;
}

// Obtener el tipo de usuario desde la sesión
$Tipo = $_SESSION['Tipo'];
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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="ProductosG.php">Productos</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="AyBG.php">Actualizar y Borrar</a>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="Logout.php">Logout</a> 
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header> 

      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="assets/js/app.js"></script>
  </body>

</html>