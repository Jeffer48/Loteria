<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="Home.php"><img src="img/Logos/LOGO-2.png" alt="" width="75" height="75">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="Sobre%20Nosotros.php">Sobre nosotros</a>
                    <a class="nav-link" href="tienda.php">Tienda</a>
                    <a class="nav-link" href="JuegoLoteria.php">Juego</a>
                    <?php
                        if(!isset($_SESSION['usuario'])){
                            echo '<a class="nav-link" href="Login.php">Login</a>
                            <a class="nav-link" href="Registro.php">Registrarse</a>';
                        }else{
                            echo '<a class="nav-link" href="carrito.php">Carrito</a>
                            <a class="nav-link" href="perfil.php">Perfil</a>
                            <a class="nav-link" href="logout.php">Cerrar Sesión</a>';
                        }
                    ?>
                </div>
            </div>
        </nav>
</header>