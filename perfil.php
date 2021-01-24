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
    $amigosIP = array();
    $amigoName = array();
    $partidasJugadas = 0;
    $partidasGanadas = 0;
    $partidasPerdidas = 0;

    $sql = "SELECT monedas, imagenPerfil FROM usuario WHERE idUsuario = '$id'";
    $respuesta = mysqli_fetch_array(solicitarDatos($sql));
    $monedas = $respuesta[0];
    $imagenPerfil = $respuesta[1];

    $sql = "SELECT amigo FROM amigos WHERE idUsuario = '$id' AND estado = 1";
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
    $fotoP = '';

    if(count($amigos) > 0){
        for($i = 0; $i < count($amigos); $i++){
            $indice = $amigos[$i];
            $sql = "SELECT imagenPerfil, nombre FROM usuario WHERE idUsuario = $indice";
            $respuesta = solicitarDatos($sql);

            $temp = mysqli_fetch_array($respuesta);
            array_push($amigosIP, $temp[0]);
            array_push($amigoName, $temp[1]);
        }
    }

    $pendientes = array();
    $sql = "SELECT idUsuario FROM amigos WHERE amigo = $id AND estado = 0";
    $respuesta = solicitarDatos($sql);

    while($fila = mysqli_fetch_array($respuesta)){
        array_push($pendientes, $fila[0]);
    }
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
                <?php echo '<img class="imgPerfil" src="data:image/png;base64,' .  base64_encode($imagenPerfil)  . '" alt="Imagen de perfil">'; ?>
                <h4><?php echo $nombre ?></h4>
                <h4><?php echo "Identificador: ".$id ?></h4>
            </div>
            <div class="colum amigosEsta">
                <div class="row">
                <form action="perfil.php" method="POST">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon1">Agregar</button>
                    <input type="text" name="amigoID" class="form-control" placeholder="Escriba el identificador" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div></form>
                    <form action="perfil.php" method="POST">
                        <ul class="amigos">
                            <li><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pendientes">Pendientes</button></li>
                            <li><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Amigos</button></li>
                            <?php if(count($amigos) > 0){
                                $c = 0;
                                if(count($amigos) > 3) $c = 3;
                                else $c = count($amigos);
                                for($i = 0; $i < $c; $i++){
                                    $img = $amigosIP[$i];
                                    echo '<li><img class="listAmi" src="data:image/png;base64,' .  base64_encode($img)  . '" alt="Imagen de perfil">
                                        <button type="submit" for="nombre" name="verPerfil" class="verPerfiles">'.$amigoName[$i].'</label>
                                        <input type="text" value="'.$amigoName[$i].'" name="nombreamigo" style="visibility: collapse;">
                                        <input type="text" value="'.$amigos[$i].'" name="idamigo" style="visibility: collapse;"></li>';
                                }
                            } 
                            ?>
                        </ul>
                    </form>
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inventario">Inventario</button>
            </div>
            <div>
                <h2>Objetos comprados</h2>
                <ul class="objetos">
                    <?php 
                        $imgObj = array();
                        if(count($objetos) > 0){
                            for($i = 0; $i < count($objetos); $i++){
                                $indice = $objetos[$i];
                                $sql = "SELECT imagenOb FROM objetos WHERE idObjeto = $indice";
                                $respuesta = solicitarDatos($sql);

                                $temp = mysqli_fetch_array($respuesta);
                                array_push($imgObj, $temp);
                            }

                            $c = 0;
                            if(count($objetos) > 4) $c = 4;
                            else $c = count($objetos);
                            for($i = 0; $i < $c; $i++){
                                $imgTemp = $imgObj[$i];
                                echo '<li><img class="imgObj" src="data:image/png;base64,' .  base64_encode($imgTemp)  . '" alt="Imagen de objeto"></li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
<!-- --------------------------------------------------------------------------------------------------------------------------------------------- -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Amigos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="perfil.php" method="POST">
                    <ul class="amigos">
                        <?php if(count($amigos) > 0){
                            for($i = 0; $i < count($amigos); $i++){
                                $img = $amigosIP[$i];
                                echo '<li><img class="modalAmi" src="data:image/png;base64,' .  base64_encode($img)  . '" alt="Imagen de perfil">
                                        <button type="submit" for="nombre" name="verPerfil" class="verPerfiles">'.$amigoName[$i].'</label>
                                        <input type="text" value="'.$amigoName[$i].'" name="nombreamigo" style="visibility: collapse;">
                                        <input type="text" value="'.$amigos[$i].'" name="idamigo" style="visibility: collapse;"></li>';
                            }
                        } 
                        ?>
                    </ul>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="inventario" tabindex="-1" aria-labelledby="inventarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inventarioLabel">Inventario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <ul class="objetos">
                        <?php if(count($amigos) > 0){
                            for($i = 0; $i < count($objetos); $i++){
                                $imgTemp = $imgObj[$i];
                                echo '<li><img class="imgObj" src="data:image/png;base64,' .  base64_encode($imgTemp)  . '" alt="Imagen de objeto"></li>';
                            }
                        } 
                        ?>
                    </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="pendientes" tabindex="-1" aria-labelledby="pendientesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pendientesLabel">Solicitudes pendientes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="solicitudes">
                    <?php
                        if(count($pendientes) > 0){
                            for($i = 0; $i < count($pendientes); $i++){
                                $idAmigo = $pendientes[$i];
                                $sql = "SELECT nombre, imagenPerfil FROM usuario WHERE idUsuario = $idAmigo";
                                $respuesta = mysqli_fetch_array(solicitarDatos($sql));
                                $imagen = $respuesta[1];
                                $nombre = $respuesta[0];

                                echo '<li>
                                    <form action="perfil.php" method="POST">
                                        <ul class="solicitud">
                                            <li>
                                                <img class="amiSol" src="data:image/png;base64,' .  base64_encode($imagen)  . '" alt="Imagen de perfil">
                                                <label for="nombre" name="nombre">'.$nombre.'</label>
                                                <input type="text" value="'.$idAmigo.'" name="solicitud" style="visibility: collapse;">
                                            </li>
                                            <li><button type="submit" name="aceptar">Aceptar</button></li>
                                            <li><button type="submit" name="rechazar">Rechazar</button></li>
                                            <li><button type="submit" name="bann">Bannear</button></li>
                                        </ul>
                                    </form>
                                </li>';
                            }
                        }else echo "<p>No hay solicitudes pendientes</p>";
                    ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <script> var myModal = new bootstrap.Modal(document.getElementById('exampleModal')); </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </main>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $amigoID = $_POST['amigoID'];
        $sql = "SELECT idUsuario FROM usuario WHERE idUsuario = $amigoID";
        $respuesta = mysqli_fetch_array(solicitarDatos($sql));

        if($respuesta){
            if($amigoID == $id) echo "<script>window.alert('No puede poner su mismo identificador')</script>";
            else{
                $sql = "SELECT estado FROM amigos WHERE idUsuario = $id AND amigo = $amigoID";
                $request = mysqli_fetch_array(solicitarDatos($sql));

                if($request[0] == 1) echo "<script>window.alert('Ya ha agregado a el jugador')</script>";
                elseif($request[0] == 0) echo "<script>window.alert('Ya ha mandado solicitud')</script>";
                elseif($request[0] == 2) echo "<script>window.alert('No puede mandar solicitud a este usuario')</script>";
                else{
                    $sql = "SELECT estado FROM amigos WHERE idUsuario = $amigoID AND amigo = $id";
                    $respuesta = mysqli_fetch_array(solicitarDatos($sql));
                    
                    if($respuesta[0] == 0) echo "<script>window.alert('El usuario ya le mando solicitud')</script>";
                    else{
                        $sql = "INSERT INTO amigos(idUsuario, amigo, estado) VALUES ($id, $amigoID, 0)";
                        guardarDatos($sql);

                        "<script>window.alert('Solicitud enviada')</script>";
                    }
                }
            }
        }else{
            echo "<script>window.alert('El identificador no existe')</script>";
        }
    }

    if(isset($_POST['aceptar'])){
        $idSol = $_POST['solicitud'];
        
        $sql = "UPDATE amigos SET estado = 1 WHERE idUsuario = $idSol AND amigo = $id";
        guardarDatos($sql);

        $sql = "INSERT INTO amigos(idUsuario, amigo, estado) VALUES ($id, $idSol, 1)";
        guardarDatos($sql);

        echo "<script>window.alert('Solicitud aceptada')</script>";
    }

    if(isset($_POST['rechazar'])){
        $idSol = $_POST['solicitud'];

        $sql = "DELETE FROM amigos WHERE idUsuario = $idSol AND amigo = $id";
        guardarDatos($sql);

        echo "<script>window.alert('Solicitud rechazada')</script>";
    }

    if(isset($_POST['bann'])){
        $idSol = $_POST['solicitud'];

        $sql = "UPDATE amigos SET estado = 2 WHERE idUsuario = $idSol AND amigo = $id";
        guardarDatos($sql);

        echo "<script>window.alert('El usuario ya no podrá mandarte solicitud')</script>";
    }

    if(isset($_POST['verPerfil'])){
        $_SESSION['amigo'][0] = $_POST['idamigo'];
        $_SESSION['amigo'][1] = $_POST['nombreamigo'];

        echo "<script> 
        window.location.replace('perfilAmigo.php'); 
        </script>";
    }
?>
