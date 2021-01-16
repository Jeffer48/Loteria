<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Regístrate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleallpages.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/Registro.css" type="text/css">
    <script src="js/my-script.js" defer></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><img src="img/Logos/LOGO-2.png" alt="" width="75" height="75">Regístrate</a>
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
                    <a class="nav-link" href="Login.html">Login</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="Registrobox">
            <img src="img/Circulo.png" alt="User">
            <h2>Registrarse</h2>
            <p>*Campos requeridos</p>
            <form action="Home.html" method="get">
                <ul class="datos">
                    <li>
                        <label for="nombre">Nombre*</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" class="form-control" required minlength="3">>
                    </li>
                    <li>
                        <label for="email">E-Mail*</label>
                        <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" class="form-control" required>
                    </li>
                    <li>
                        <label for="edad">Edad*</label>
                        <input type="number" name="edad" min="8" max="100" id="edad" placeholder="Ingresa tu edad" class="form-control" required>
                    </li>
                    <li>
                        <label for="pass">Contraseña*</label>
                        <input type="password" name="pass" id="pass" placeholder="Ingresa contraseña" class="form-control" required minlength="8" >
                    </li>
                    <li>
                        <label class="form-check-label" for="terminos">Aceptar términos y condiciones</label>
                        <input type="checkbox" class="form-check-input" name="terminos" id="terminos" required>
                    </li>
                    <br>
                    <li>
                        <button type="submit" class="btn btn-primary" id="boton">Registrar</button>
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
