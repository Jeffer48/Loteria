<?php
    session_start();
    include 'conexion.php';

    if(isset($_POST['submit'])){
        $correo = $_POST['email'];
        $contraseña = $_POST['pass'];

        $sql = "SELECT idUsuario, nombre FROM usuario WHERE email = '$correo' AND contraseña = '$contraseña'";

        $respuesta = mysqli_fetch_array(solicitarDatos($sql));

        if($respuesta > 0){
            $nombre = $respuesta[1];
            echo "<script>window.alert('Bienvenido $nombre')</script>";

            $_SESSION['usuario'][0] = $respuesta[0];
            $_SESSION['usuario'][1] = $nombre;

            echo "<script> 
            window.location.replace('home.php'); 
            </script>";
        }else{
            echo "<script>window.alert('Datos incorrectos')</script>";
        }
    }
?>

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
    <?php include 'header.php' ?>

    <main>
        <div class="LoginBox">
            <img src="img/Circulo.png" alt="User">
            <h2>Ingresar</h2>
            <form action="Login.php" method="POST">
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
                        <button type="submit" name="submit" class="btn btn-primary">Ingresar</button>
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