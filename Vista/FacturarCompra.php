<?php
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 22/11/2017
 * Time: 23:38
 */
session_start();
if (@!$_SESSION['cliente']){
    header("Location: ../Vista/Errores/SinPermiso.php");
}


if (isset($_SESSION['idcliente'])) {
    $idcliente = $_SESSION['idcliente'];
}else{
    header("Location: ../Vista/Errores/SinPermiso.php");
}

include('../Modelo/Conexion.php');
$conection = new Conexion();
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font awesome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>


<body>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<div class="container">
    <form action="../Controlador/FacturarCompraC.php" method="post" enctype="multipart/form-data">
        <div class="mt-5 mb-5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Cotización</h1>
                    <i class="fa fa fa-credit-card fa-5x hidden-xs-down" aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if (!empty($_POST['producto'])){
                            $checkProducto = $_POST['producto'];
                            $total = 0; $n = 0;
                            for($i = 0; $i < sizeof($checkProducto); $i++){
                                $consulta = mysqli_query($conection->conectarMysql(),"SELECT NOM_Producto, PRE_Producto FROM tblProducto WHERE ID_Producto = '".$checkProducto[$i]."'");

                                while ($result = mysqli_fetch_array($consulta)){
                                    ?>
                                    <input name="idProductos[]" type="text" hidden value="<?php echo $checkProducto[$i]; ?>">
                                    <?php
                                    $total = $total + $result['PRE_Producto']; $n = $i+1;
                                    echo
                                        '    
                <tr>
                <th scope="row">'.($n).'</th>
                <td>'.$result['NOM_Producto'].'</td>
                <td>'.number_format($result['PRE_Producto']).'</td>
                </tr>
                ';
                                }
                            }

                            /**<tr>
                            <th scope="row">$n</th>
                            <td>'.$valor[$a].'</td>
                            <td>Otto</td>
                            </tr>   **/
                        }else{
                            header("Location: ../Vista/Errores/SinArticulos.php");
                        }
                        ?>
                        <tr>
                            <th scope="row"><?php echo ($n+1); ?></th>
                            <td>Total</td>
                            <td><?php echo number_format($total) ;?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-handshake-o mr-2" aria-hidden="true"></i>
                        Comprar
                    </button>
                </div>
            </div>
        </div>

        <input name="fecha" type="text" hidden value="<?php echo date("Y/m/d");?>">
        <input name="total" type="text" hidden value="<?php echo $total;?>">
    </form>
</div>
</body>
</html>

