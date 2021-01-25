<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Comentario -->

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleallpages.css" type="text/css">
    <link rel="stylesheet" href="css/home.css" type="text/css">

</head>

<body>
    <?php include 'header.php' ?>
    <main role="main">
        <section>

            <ul class="Home">
                <li style="align-self: center">
                    <h2>Lotería</h2>
                    <br />
                    Los juegos son una parte de la historia de la humanidad. Mediante su preservación, estamos resguardando tradiciones y cultura, además de que nos dan una idea de cómo era la vida de las personas que participaban en ellos. <br />La lotería o loto1 es un juego que puede ser público mediante billetes y sorteos o un juego de mesa que consiste en cartones y barajas. Nosotros hemos decidido darle vida a este juego de manera virtual, debido a que estamos pasando por una situcación en la que no muchos tenemos la oportunidad de jugar este maravilloso juego en compañia de nuestros amigos o famila. Esperamos que les guste este juego que aunque nos salimos un poco de lo tradicional sigue siendo igual de divertido. <br />
                </li>
                <li><img class="loteriaimg" src="img/Logos/LOGO-3.png" alt="Imagen del juego"></li>
            </ul>
            <form action="Registro.php">
                <button type="submit" name="submit" class="btn btn-primary">Registrarse</button>
            </form>
            
            <section>
                <ul class="Devs">
                    <li class="Dev">
                       <a title="Novedades" href="tienda.php"><img class="DevImg" src="img/novedades.png" alt="Foto de las novedades de la tienda"></a>
                        <div>
                            <h3>Novedades</h3>
                        </div>Tenemos nuevas fichas en la tienda, ¡ingresa a verlas!.
                    </li>
                    <li class="Dev">
                       <a title="¿Cómo jugar?" href="JuegoLoteria.php"><img class="DevImg" src="img/comienzo.png" alt="¿Cómo jugar?"></a>
                        <div>
                            <h3>¿Cómo jugar?</h3>
                        </div> Consiste en un grupo de barajas con figuras determinadas y con varios tableros que contienen un número determinado de éstas figuras ordenado al azar. A cada jugador se le asigna un tablero , previo a haber revuelto perfectamente el mazo, va sacando una a una las barajas y dando su nombre, si el jugador ve esta figura en su tablero coloca una ficha. Gana el primero que llene el tablero.
                    </li>
                    <li class="Dev">
                       <a title="¿Cómo comenzar?" href="Registro.php"><img class="DevImg" src="img/problems.png" alt="¿Cómo comenzar?"></a>
                        <div>
                            <h3>¿Cómo comenzar?</h3>
                        </div> Puedes comenzar a jugar sin necesidad de registrarte, si quieres juntar tus monedas o comprar algun objeto para el juego registráte e inicia sesión. Es super fácil.
                    </li>

                </ul>
            </section>
        </section>
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
