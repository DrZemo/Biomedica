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
    $cantidadBodega = $_POST['CantidadBodega'];
    $idProductos = $_POST['idProductos'];
    $cantidadQuer = $_POST['cantidadesQuer'];

    $idFact = $fecha."".$idcliente."".$total;

    $inserFactura = "INSERT INTO tlbFactura(ID_FACTURA,ID_Cliente,FECHAR,CANTIDAD,TOTAL) VALUES ('".$idFact."','".$idcliente."','".$fecha."','".$cantotal."','".$total."')";
    mysqli_query($con->conectarMysql(),$inserFactura);
    for ($i = 0; $i < sizeof($idProductos); $i++){
        echo $cantidadQuer[$i]."<br>";
        $inserDetFact = "INSERT INTO tblDETALLE_FACTURA(ID_FACTURA,ID_Producto,CANTIDAD) VALUES ('".$idFact."','".$idProductos[$i]."','".$cantidadQuer[$i]."')";
        $UpdateProducto = "UPDATE tblProducto SET Cantidad = ".($cantidadBodega[$i]-$cantidadQuer[$i])." WHERE ID_Producto='".$idProductos[$i]."'";
        mysqli_query($con->conectarMysql(),$inserDetFact);
        mysqli_query($con->conectarMysql(),$UpdateProducto);
        echo ($cantidadBodega[$i]-$cantidadQuer[$i]);
    }
    header("Location: ../Vista/Mensages/CompraFinalisada.php");
}else{
    header("Location: ../Vista/Errores/SinPermiso.php");
}

?>
