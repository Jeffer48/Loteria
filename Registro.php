<?php
    session_start();
?>

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
    <?php include 'header.php' ?>
    <main>
        <div class="Registrobox">
            <img src="img/Circulo.png" alt="User">
            <h2>Registrarse</h2>
            <p>*Campos requeridos</p>
            <form action="Registro.php" method="POST">
                <ul class="datos">
                    <li>
                        <label for="nombre">Nombre*</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" class="form-control" required minlength="3">
                    </li>
                    <li>
                        <label for="apellidoP">Apellido Paterno*</label>
                        <input type="text" name="apellidoP" id="apellidoP" placeholder="Ingresa tu apellido Paterno" class="form-control" required minlength="3">
                    </li>
                    <li>
                        <label for="apellidoM">Apellido Materno*</label>
                        <input type="text" name="apellidoM" id="apellidoM" placeholder="Ingresa tu apellido Materno" class="form-control" required minlength="3">
                    </li>
                    <li>
                        <label for="email">E-Mail*</label>
                        <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" class="form-control" required>
                    </li>
                    <li>
                        <label for="pass">Contraseña*</label>
                        <input type="password" name="pass" id="pass" placeholder="Ingresa contraseña" class="form-control" required minlength="8" >
                    </li>
                    <li>
                        <label for="img">Imagen de perfil</label>
                        <input type="file" name="img">
                    </li>
                    <li>
                        <label class="form-check-label" for="terminos">Aceptar términos y condiciones</label>
                        <input type="checkbox" class="form-check-input" name="terminos" id="terminos" required>
                    </li>
                    <br>
                    <li>
                        <button type="submit" name="submit" class="btn btn-primary" id="submit">Registrar</button>
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

<?php
    include 'conexion.php';

    if(isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $apellidoP = $_POST['apellidoP'];
        $apellidoM = $_POST['apellidoM'];
        $correo = $_POST['email'];
        $contraseña = $_POST['pass'];
        $foto = $_POST['img'];

        $sql = "SELECT email FROM usuario WHERE email = '$correo'";

        $respuesta = mysqli_fetch_array(solicitarDatos($sql));

        if($respuesta > 0){
            echo "<script>window.alert('El correo se encuentra en uso')</script>";
        }else{
            $sql = "INSERT INTO usuario(nombre, apellidoPaterno, apellidoMaterno, email, contraseña, imagenPerfil) VALUES ('$nombre', '$apellidoP', '$apellidoM', '$correo', '$contraseña', '$foto');";

            guardarDatos($sql);

            echo "<script> 
            window.location.replace('home.php'); 
            </script>";
        }
    }
?>