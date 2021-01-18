<?php
   session_start();
   include 'conexion.php';
    $consulta = "SELECT idObjeto, imagenOb, nombreOb FROM objetos ORDER BY RAND() LIMIT 3;" ;
    $cartaRandom =  solicitarDatos($consulta);

   if(isset($_GET['accion'])){
        switch ($_GET['accion']) {
            case "agregar":
                if (isset($_GET['id'])) {
                    //escapar caracteres sql
                    $id=$_GET['id'];
                    $sql = "SELECT idObjeto, nombreOb, imagenOb, precioOb, descripcion FROM objetos WHERE idObjeto=$id";
                    $resultado =  solicitarDatos($sql);
                    $carta = mysqli_fetch_assoc($resultado);
                    mysqli_free_result($resultado);

                    if(!isset($_SESSION['cartas_carrito'])){
                         $_SESSION['cartas_carrito'] = array();
                         array_push($_SESSION['cartas_carrito'],$carta);
                    }else{
                        $temporal = true;
                        foreach ($_SESSION['cartas_carrito'] as $indice => $elemento) {
                            if($id == $elemento['idObjeto']){
                                echo "<script>window.alert('Solo se puede agregar una');</script>";
                                $temporal = false;
                            }
                        }
                        if($temporal){
                            array_push($_SESSION['cartas_carrito'],$carta);
                        }
                    }
                }
            break;
            case "remover":
                if (isset($_SESSION['cartas_carrito'])) {
                    foreach ($_SESSION['cartas_carrito'] as $indice => $elemento) {
                        if($_GET['id'] == $elemento['idObjeto']){
                            unset($_SESSION['cartas_carrito'][$indice]);
                        }
                    }
                    if (empty($_SESSION['cartas_carrito'])){ 
                        unset($_SESSION['cartas_carrito']);
                    }
                }
            break;
        }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="css/styleallpages.css">
    <title>Carrito de Compras</title>
</head>
<body>
    <?php include "header.php" ?>
    <h1>Carrito de Compras</h1>
    <main>
       <article>
       <?php
        $precio_total = 0;
        if(isset($_SESSION['cartas_carrito'])){
            ?>
               <table>
               <tbody>
                    <tr class="titulos">
                        <th>Articulo</th>
                        <th>Descripcion</th>
                        <th>Costo</th>
                        <th>Remover</th>
                    </tr>
                    <?php
                    foreach ($_SESSION['cartas_carrito'] as $item) {
                    ?>
                    <tr class = "articulos">
                        <td> <img class="imgProducto" src="data:image/png;base64,<?php  echo base64_encode($item['imagenOb'])?>" alt="Imagen de producto"></td>
                        <td> <p><?php  echo $item['descripcion']; ?></p> </td>
                        <td><label>$<?php  echo $item['precioOb']; ?></label></td>
                        <td>
                            <a href="carrito.php?accion=remover&id=<?php echo $item['idObjeto'];?>">
                                <button type="submit">X</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                      $precio_total += $item['precioOb'];
                    } 
                    ?>
                </tbody>
               </table>
               <?php }else{ ?>
                  <div></div>
                  <p>Tu carrito esta vacio</p>
                  <div></div>
               <?php } ?>
               <form>
                   <label>Total: <?php echo "$".$precio_total; ?></label>
                   <input type="submit" name="comprar" value="Comprar">
              </form>
      </article>
       <aside>
            <h3>¡¡¡Adquiere mas!!!</h3>
            <?php foreach ($cartaRandom as $item) { ?>
                <a href="carrito.php?accion=agregar&id=<?php echo htmlspecialchars($item['idObjeto']); ?>">
                    <img class="imgProducto" src="data:image/png;base64,<?php  echo base64_encode($item['imagenOb'])?>" alt="Imagen de producto">
                    <p><?php echo $item['nombreOb']; ?></p>
                </a>
            <?php } ?>
       </aside>
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