<!---
/**
 /**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 22/11/2017
 * Time: 23:21
 */
 */--->
<?php
session_start();

include('../Modelo/Conexion.php');

$conection = new Conexion();
if (isset($_SESSION['id_empleado'])) {
    $idempleado = $_SESSION['id_empleado'];
}else{
    header("Location: ../Vista/Errores/SinSession.php");
}
echo $_SESSION['id_empleado'];
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descrip = $_POST['descripcion'];
$imagen = $_FILES['imagen']['name'];
$ruta = $_FILES['imagen']['tmp_name'];



$destino = "fotos/".$imagen;
copy($ruta,$destino);

$consulta = "INSERT INTO tblProducto(ID_Producto,NOM_Producto,PRE_Producto,DCN_Producto,IMG_Producto,ID_Empleado) VALUES('".$id."','".strtoupper($nombre)."','".$precio."','".strtolower($descrip)."','".$imagen."','".$idempleado."')";
$resultado = mysqli_query($conection->conectarMysql(),$consulta);

if ($resultado){
    header("Location: ../Vista/index.php");
}else{
    echo ":(";
}
?>