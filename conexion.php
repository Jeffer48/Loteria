<?php

    $dir = "localhost";
<<<<<<< HEAD
    $user = "loteria1";
    $pass = "1234";
    $nombreBD = "loteria";

    $con = mysqli_connect('localhost', 'loteria1', '1234', 'loteria');
=======
    $user = "jeffer";
    $pass = "123";
    $nombreBD = "loteria";
>>>>>>> f794639783d0461c409a25222b54a62e7612535c

    function solicitarDatos($consulta){
        global $dir, $user, $pass, $nombreBD;

        $conn = mysqli_connect($dir,$user,$pass);
        if(!$conn) echo 'Error al conectar';
        else{
            $base = mysqli_select_db($conn,$nombreBD); //Especificar la conexión con la base Consultarq
            $datos = mysqli_query($conn,$consulta); //Recibir la consulta

            mysqli_close($conn);
            return $datos;
        }
    }

    function guardarDatos($consulta){
        global $dir, $user, $pass, $nombreBD;

        $conn = mysqli_connect($dir,$user,$pass);
        $base = mysqli_select_db($conn,$nombreBD);
        
        mysqli_query($conn,$consulta);
        mysqli_close($conn);
    }

?>