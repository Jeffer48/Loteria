<?php
    include 'conexion.php';

    $sql = 'SELECT idObjeto, nombreOb, imagenOb, precioOb, descripcion FROM objetos ORDER BY idObjeto';

    $respuesta = solicitarDatos($sql);
    //$respuesta = mysqli_fetch_array(solicitarDatos($sql));
    
    $idObjeto = array();
    $nombreOb = array();
    $imagenOb = array();
    $precioOb = array();
    $descripcion = array();
    
     while($fila = mysqli_fetch_array($respuesta)){
        array_push($idObjeto,$fila[0]);
        array_push($nombreOb,$fila[1]);
        array_push($imagenOb,$fila[2]);
        array_push($precioOb,$fila[3]);
        array_push($descripcion,$fila[4]);
    }

    //$idObjeto; array objeto 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/styleallpages.css" type="text/css">
    <link rel="stylesheet" href="css/tienda.css" type="text/css">
</head>
<body>
    <?php include 'header.php' ?>
    <main>
  <h2>Tienda</h2>
  <h3>Consigue tus objetos favoritos para decir ¡loteria!</h3>
   <?php  
    for($i = 0; $i < count($nombreOb); $i++){
      echo '
      <li class="producto">
        <div>
            <img class="imgProducto" src="data:image/png;base64,' .  base64_encode($imagenOb[$i])  . '" alt="Imagen de producto">
        </div>
        <div class="datos">
            <h4 style="text-align: center">'.$nombreOb[$i].'</h4>
            <p style="text-align: justify"><br><b>Descripción:
            </br></b>'.$descripcion[$i].'</p>
            <p style="text-align: justify"><b>Precio:
            </b>'.'$'.$precioOb[$i].'.00'.'</p>
        </div>
        <div class="card-action right-align">
            <a class="brand-text" href="Home.php">Comprar</a>
        </div>
    </li>
      '; 
    }
    ?>
    
    
    </main>
    <footer>
        <h2>Contáctanos</h2>
        <ul>
            <li><a href="#"><img src="img/Logos/Facebook.png" alt="Enlace a Facebook"></a></li>
            <li><a href="#"><img src="img/Logos/Instagram.png" alt="Enlace a Instagram"></a></li>
            <li><a href="#"><img src="img/Logos/Twitter.png" alt="Enlace a Twitter"></a></li>
        </ul>
    </footer>
    

</body>
</html>