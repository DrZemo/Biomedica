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
    $idProductos = $_POST['idProductos'];
    $idFact = $fecha."".$idcliente."".$total;

    $inserFactura = "INSERT INTO tlbFactura(ID_FACTURA,ID_Cliente,FECHAR,TOTAL) VALUES ('".$idFact."','".$idcliente."','".$fecha."','".$total."')";
    mysqli_query($con->conectarMysql(),$inserFactura);

    foreach ($idProductos as $id){

        $inserDetFact = "INSERT INTO tblDETALLE_FACTURA(ID_FACTURA,ID_Producto) VALUES ('".$idFact."','".$id."')";

        mysqli_query($con->conectarMysql(),$inserDetFact);
    }
    header("Location: ../Vista/Mensages/CompraFinalisada.php");
}else{
    header("Location: ../Vista/Errores/SinPermiso.php");
}

?>
