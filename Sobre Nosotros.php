<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sobre Nosotros</title>


    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/styleallpages.css" type="text/css">

</head>

<body>
    <?php include 'header.php'; ?>

    <main role="main">
        <section>
            <div>
                <ul class="SobreNosotros">
                    <li><img src="img/Logos/LOGO-2.png" alt="Logo de la página" width="350" height="350"></li>
                    <li style="align-self: center">
                        <h2>¡Lotería!</h2>
                        Los juegos son una parte de la historia de la humanidad. Mediante su preservación, estamos resguardando tradiciones y cultura, además de que nos dan una idea de cómo era la vida de las personas que participaban en ellos. <br /><br />
                        <h3>¿Quiénes somos?</h3>
                        Somos un grupo de jóvenes ingenieros apasionados por la creatividad. Nuestro objetivo es conservar los juegos tradicionales, pero de forma tecnológica, un poco más moderna e igual de divertida. Es por esto que creamos una nueva versión de la lotería en la que podrás conocer nuevas personas o jugar con tus amigos y familia.
                    </li>
                </ul>
            </div>
        </section>

        <div class="line"></div>

        <section>
            <ul class="Devs">
                <li class="Dev"><img class="DevImg" src="img/Cris.png" alt="Foto del lídel documentación">
                    <div>
                        <h3>Cristian Marin</h3>
                    </div>Es el líder de documentación, cuenta con conocimientos técnicos, capaz de entender los requerimientos y, a partir de ellos, generar la documentación necesaria, se encarga de organizar el contenido a escribir y marcar la línea a seguir en cuanto a documentación. 
                </li>
                <li class="Dev"><img class="DevImg" src="img/Denisse.png" alt="Foto del líder de arquitectura del sistema">
                    <div>
                        <h3>Denisse Ortiz</h3>
                    </div> Líder de la arquitectura del sistema. Atiende las reglas  que determinan la posición de los elementos, los esquemas de colores, tipografías, etc. Es responsable de pensar el sistema antes de construirlo. Se encarga de ver si se mantiene en consonancia el diseño acordado.
                </li>
                <li class="Dev"><img class="DevImg" src="img/Jeff.png" alt="Foto del programador líder">
                    <div>
                        <h3>Jefferson Corona</h3>
                    </div> Es el programador líder, es senior, con capacidad organizativa. Se encarga de redactar y mantener actualizada la página web y el juego, así como de escribir las especificaciones técnicas. Marca la línea a seguir por el resto de los programadores del equipo. 
                </li>
                <li class="Dev"><img class="DevImg" src="img/Jennifer.png" alt="Foto del líder analista">
                    <div>
                        <h3>Alejandra Ponce</h3>
                    </div>Líder analista, es la encargada de realizar el análisis de los requerimientos para la página y juego. De hacer el seguimiento diario de las tareas y de resolver problemas del equipo. Además encargada de los diseños que se realizan y como se van a comportar en la aplicación.
                </li>
                <li class="Dev"><img class="DevImg" src="img/Mike.png" alt="Foto del líder de calidad">
                    <div>
                        <h3>Miguel Landa</h3>
                    </div>Es el líder de calidad, tiene conocimientos de programación, es capaz de desarrollar una suite de tests que verifiquen que el software cumple con los requerimientos. Es el último responsable de que las características funcionan tal y como se han especificado.
                </li>
            </ul>
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
