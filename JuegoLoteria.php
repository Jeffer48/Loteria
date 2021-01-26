<?php
    session_start();
    include 'conexion.php';
    $nombre; $monedas; $imagen; $hostp;
    $arraynombres=array(); $arrayimagenes=array();

    if(isset($_POST['host'])){
        $hostp = $_POST['host'];
      } 

    if(isset($_SESSION['usuario'][1])){
        $nombre = $_SESSION['usuario'][1];
        $consulta = 'SELECT monedas, imagenPerfil FROM usuario WHERE nombre ="'.$nombre.'" ;';
        $resultado = mysqli_fetch_assoc(solicitarDatos($consulta));
        $imagen = $resultado['imagenPerfil'];
        $monedas = $resultado['monedas'];
        $consulta = 'SELECT u.nombre, imagenPerfil FROM partidas AS p JOIN usuario AS u ON p.idusuario = u.idUsuario WHERE host=1;';
        $resultado1 = solicitarDatos($consulta);
        while($fila = mysqli_fetch_array($resultado1)){
            array_push($arraynombres,$fila[0]);
            array_push($arrayimagenes,$fila[1]);
        }

        if(isset($_POST['pGanar'])){
            $comparacion = '<script>document.write(sessionStorage.getItem("gano"));</script>';
            $dato = $comparacion;
            $hostp = $_POST['hostp'];
            echo 'host = '.$hostp.'  nombre = '.$nombre.' ';
            if(isset($dato)){
            $sql = 'UPDATE partidas SET 
            ganador=(SELECT idUsuario FROM `usuario` WHERE nombre="'.$nombre.'") 
            WHERE host = '.$hostp.' AND 
            idusuario=(SELECT idUsuario FROM `usuario` WHERE nombre="'.$nombre.'");';
            $resultado = guardarDatos($sql);

            $sql1 = 'UPDATE usuario SET monedas=500+
            (SELECT monedas FROM usuario WHERE nombre="'.$nombre.'")
            WHERE  nombre="'.$nombre.'" ;';
            $resultado1 = guardarDatos($sql1);
            header("Location: ganador.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/SJuegoLoteria.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleallpages.css">
    <script src="js/JuegoLoteria.js" defer></script>
    <title>Loteria</title>
</head>

<body>
   <div class="wrapper">
   <?php include 'header.php' ?>
    
    <section class="Jugadores">
        <div class="usuario">
            <img id="imgUsuario" src="data:image/png;base64,<?php  echo base64_encode($imagen)?>" alt="Imagen del usuario">
            <p><?php echo $nombre ?></p>
            <p>Monedas:<?php echo $monedas ?></p>
        </div>
        <div class="competidores">
            <?php for ($i=0; $i < count($arraynombres) ; $i++) { ?>
                <?php if ($nombre != $arraynombres[$i]) { ?>
                    <div class="card">
                        <img src="data:image/png;base64,<?php echo base64_encode($arrayimagenes[$i]);?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?php  echo $arraynombres[$i]; ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            
        </div>
    </section>
    <section class="mazo-cartas">
        <div class="cartas-juego" id="salida">
            <img src="img/Cartas/Loteria-01.png" id="fondo-img">
        </div>
        <form action="JuegoLoteria.php" method="post" class="BotonLoteria">
            <button id="LoteriaBoton" name="pGanar" type="summit" class="btn btn-primary">Loteria</button>
            <input type="hidden" name="hostp" value="<?php echo $hostp; ?>">
        </form>
    </section>


    <section class="tabla" style="position: relative">
        <div class="loteria-card" id="posicion1" data-carta="posicion1" style="position: relative"></div>
        <div class="loteria-card" id="posicion2" data-carta="posicion2" style="position: relative"></div>
        <div class="loteria-card" id="posicion3" data-carta="posicion3" style="position: relative"></div>
        <div class="loteria-card" id="posicion4" data-carta="posicion4" style="position: relative"></div>
        <div class="loteria-card" id="posicion5" data-carta="posicion5" style="position: relative"></div>
        <div class="loteria-card" id="posicion6" data-carta="posicion6" style="position: relative"></div>
        <div class="loteria-card" id="posicion7" data-carta="posicion7" style="position: relative"></div>
        <div class="loteria-card" id="posicion8" data-carta="posicion8" style="position: relative"></div>
        <div class="loteria-card" id="posicion9" data-carta="posicion9" style="position: relative"></div>
        <div class="loteria-card" id="posicion10" data-carta="posicion10" style="position: relative"></div>
        <div class="loteria-card" id="posicion11" data-carta="posicion11" style="position: relative"></div>
        <div class="loteria-card" id="posicion12" data-carta="posicion12" style="position: relative"></div>
        <div class="loteria-card" id="posicion13" data-carta="posicion13" style="position: relative"></div>
        <div class="loteria-card" id="posicion14" data-carta="posicion14" style="position: relative"></div>
        <div class="loteria-card" id="posicion15" data-carta="posicion15" style="position: relative"></div>
        <div class="loteria-card" id="posicion16" data-carta="posicion16" style="position: relative"></div>
    </section>
    
    <section class="mensajes">
        <p id="carta-incorrecta" style="visibility: collapse">!Carta Incorrecta¡</p>
    </section>
    </div>
</body>

</html>