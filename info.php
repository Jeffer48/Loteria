<?php
    session_start();
    include 'conexion.php';


    $sql = 'SELECT idObjeto, nombreOb, imagenOb, precioOb, descripcion, info FROM objetos ORDER BY idObjeto';

    $respuesta = solicitarDatos($sql);

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
        
        $sql = "SELECT * FROM objetos WHERE idObjeto = $id";
        
        $resultado = mysqli_query($con, $sql);
        
        $objeto = mysqli_fetch_assoc($resultado);
        
        mysqli_free_result($resultado);
        
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Info</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/styleallpages.css" type="text/css">
    <link rel="stylesheet" href="css/tienda.css" type="text/css">
</head>

<body>
    <?php include "header.php" ?>
    <h1 style="text-align: center">Información</h1>
    <?php if ($objeto): ?>
    <?php
echo '
        <li class="producto">
        <div>
            <img class="imgProducto" src="data:image/png;base64,' .   base64_encode($objeto['imagenOb'])  . '" alt="Imagen de producto">
        </div>
        <div class="datos">
      <h2 style="text-align: center">'.$objeto['nombreOb'].'</h2>
            <p style="text-align: justify"><br><b>Descripción:
            </br></b>'.$objeto['info'].'</p>
            <p style="text-align: justify"><b>Precio:
            </b>'.'$'.$objeto['precioOb'].'.00'.'</p>
        </div>      
    </li>'?>
    <?php else: ?>
    <h5>No existe ese objeto</h5>
    <?php endif?>


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