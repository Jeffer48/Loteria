<?php

    /*$dir = "localhost";
    $user = "loteria1";
    $pass = "1234";
    $nombreBD = "loteria";*/

    $dir = "localhost";
    $user = "adminCA";
    $pass = "Coms-Cc5.97";
    $nombreBD = "loteria";

    // $con = mysqli_connect('localhost', 'loteria1', '1234', 'loteria');


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