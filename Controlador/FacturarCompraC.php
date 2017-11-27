<?php
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 23/11/2017
 * Time: 00:10
 */
session_start();

include('../Modelo/Conexion.php');
$con = new Conexion();

if (@!$_SESSION['cliente']){
    header("Location: ../Vista/Errores/SinPermiso.php");
}

if (isset($_SESSION['idcliente'])) {
    $idcliente = $_SESSION['idcliente'];
    $fecha = $_POST['fecha'];
    $total = $_POST['total'];
    $cantotal = $_POST['canttotal'];
    $idProductos = $_POST['idProductos'];
    $cantidad = $_POST['cantidades'];
    $idFact = $fecha."".$idcliente."".$total;

    $inserFactura = "INSERT INTO tlbFactura(ID_FACTURA,ID_Cliente,FECHAR,CANTIDAD,TOTAL) VALUES ('".$idFact."','".$idcliente."','".$fecha."','".$cantotal."','".$total."')";
    mysqli_query($con->conectarMysql(),$inserFactura);

    for ($i = 0; $i < sizeof($idProductos); $i++){
        echo $cantidad[$i]."<br>";
        $inserDetFact = "INSERT INTO tblDETALLE_FACTURA(ID_FACTURA,ID_Producto,CANTIDAD) VALUES ('".$idFact."','".$idProductos[$i]."','".$cantidad[$i]."')";

        mysqli_query($con->conectarMysql(),$inserDetFact);
    }
    header("Location: ../Vista/Mensages/CompraFinalisada.php");
}else{
    header("Location: ../Vista/Errores/SinPermiso.php");
}

?>
