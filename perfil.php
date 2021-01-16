<?php
    session_start();
    include 'conexion.php';

    if(!isset($_SESSION['usuario'])){
        echo "<script>window.alert('Primero inicie sesión')</script>";

        echo "<script> 
            window.location.replace('Login.php'); 
            </script>";
    }

    $nombre = $_SESSION['usuario'][1];
    $id = $_SESSION['usuario'][0];

    $amigos = array();
    $objetos = array();
    $partidasJugadas = 0;
    $partidasGanadas = 0;
    $partidasPerdidas = 0;

    $sql = "SELECT monedas, imagenPerfil FROM usuario WHERE idUsuario = '$id'";
    $respuesta = mysqli_fetch_array(solicitarDatos($sql));
    $monedas = $respuesta[0];
    $imagenPerfil = $respuesta[1];

    $sql = "SELECT amigo FROM amigos WHERE idUsuario = '$id'";
    $respuesta = solicitarDatos($sql);

    while($fila = mysqli_fetch_array($respuesta)){
        array_push($amigos,$fila[0]);
    }

    $sql = "SELECT idObjeto FROM compras WHERE idUsuario = '$id'";
    $respuesta = solicitarDatos($sql);

    while($fila = mysqli_fetch_array($respuesta)){
        array_push($objetos,$fila[0]);
    }

    $sql = "SELECT ganador FROM partidas WHERE host = '$id'";
    $respuesta = solicitarDatos($sql);

    while($fila = mysqli_fetch_array($respuesta)){
        if($fila[0] == $id) $partidasGanadas += 1;
        else $partidasPerdidas += 1;
    }

    $partidasJugadas = $partidasGanadas + $partidasPerdidas;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleallpages.css" type="text/css">
    <link rel="stylesheet" href="css/perfil.css" type="text/css">
</head>
<body>
    <?php include 'header.php' ?>

    <main>
        <div class="row primera">
            <div class="column perfil">
                <img src="img/Circulo.png" alt="Imagen de perfil" class="imgPerfil">
                <h4><?php echo $nombre ?></h4>
            </div>
            <div class="colum amigosEsta">
                <div class="row">
                    <ul>
                        <li><button type="button" class="btn btn-warning">Amigos</button></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="estadisticas">
                        <li>
                            <h3>Partidas Jugadas</h3>
                            <h1><?php echo $partidasJugadas ?></h1>
                        </li>
                        <li>
                            <h3>Partidas Ganadas</h3>
                            <h1><?php echo $partidasGanadas ?></h1>
                        </li>
                        <li>
                            <h3>Partidas Perdidas</h3>
                            <h1><?php echo $partidasPerdidas ?></h1>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row segunda">
            <div class="monedas">
                <img src="img/ficha.png" alt="Imagen de moneda" style="width: 200px; height: 200px;">
                <h4>Monedas: <?php echo $monedas ?></h4>
                <button type="button" class="btn btn-warning">Inventario</button>
            </div>
            <div>
                <h2>Objetos comprados</h2>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </main>
</body>
</html>