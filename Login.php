<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleallpages.css" type="text/css">
    <link rel="stylesheet" href="css/Login.css" type="text/css">
    <script src="js/my-script.js" defer></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><img src="img/Logos/LOGO-2.png" alt="" width="75" height="75">Iniciar Sesión</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="Home.html">Home</a>
                    <a class="nav-link" href="#">Perfil</a>
                    <a class="nav-link" href="Sobre%20Nosotros.html">Sobre nosotros</a>
                    <a class="nav-link" href="#">Tienda</a>
                    <a class="nav-link" href="JuegoLoteria.html">Juego</a>
                    <a class="nav-link" href="Registro.html">Registrarse</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="LoginBox">
            <img src="img/Circulo.png" alt="User">
            <h2>Ingresar</h2>
            <form action="Home.html" method="get">
                <ul class="datos">
                    <li>
                        <label for="email">Correo</label>
                        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
                    </li>
                    <li>
                        <label for="pass">Contraseña</label>
                        <input type="password" id="pass" name="pass" placeholder="Contraseña" required minlength="8">
                    </li>
                    <li>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </li>
                </ul>
            </form>
        </div>
    </main>
    <footer>
        <h2>Contáctanos</h2>
        <ul>
            <li><a href="#"><img src="img/Logos/Facebook.png" alt="Enlace a Facebook"></a></li>
            <li><a href="#"><img src="img/Logos/Instagram.png" alt="Enlace a Instagram"></a></li>
            <li><a href="#"><img src="img/Logos/Twitter.png" alt="Enlace a Twitter"></a></li>
        </ul>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
