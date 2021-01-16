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
        <!--<div class="home-Sala">
            <a id="home" href="#" class="btn btn-primary btn-lg active" tabindex="-1" role="button" aria-disabled="true">Home</a>
            <label class="Sala">Sala:</label>
        </div>-->
        <div class="usuario">
            <img id="imgUsuario" src="img/Cris.png" alt="Imagen del usuario">
            <p>Nombre del usuario</p>
            <p>Monedas:000</p>
        </div>
        <div class="competidores">
            <div class="card">
                <img src="img/Jeff.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Jugador1</p>
                </div>
            </div>
            <div class="card">
                <img src="img/Jennifer.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Jugador2</p>
                </div>
            </div>
            <div class="card">
                <img src="img/Denisse.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Jugador3</p>
                </div>
            </div>
            <div class="card">
                <img src="img/Mike.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Jugador4</p>
                </div>
            </div>
            <!--<div class="participante">Jugador1</div>
            <div class="participantes">Jugador2</div>
            <div class="participantes">Jugador3</div>
            <div class="participantes">Jugador4</div>-->
        </div>
    </section>
    <section class="mazo-cartas">
        <div class="cartas-juego" id="salida">
            <img src="img/Cartas/Loteria-01.png" id="fondo-img">
        </div>
        <!--<button class="boton-inicio">Iniciar</button>
        <div class="fichas">
            fichas
        </div>-->
        <div class="BotonLoteria">
            <button id="LoteriaBoton" type="button" class="btn btn-primary">Loteria</button>
        </div>
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