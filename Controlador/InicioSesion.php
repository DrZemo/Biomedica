<?php
/**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 22/11/2017
 * Time: 22:39
 */

    session_start();

    include('../Modelo/Conexion.php');
    $con = new Conexion();

    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    if (empty($usuario)&&empty($contraseña)){
        header("Location: ../Vista/Errores/SinDatos.php");
    }else {
        $resultado = mysqli_query($con->conectarMysqlParameters("localhost","root","","DB_VENTAHERRAMIENTAS"), " SELECT * FROM tblEmpleado WHERE ID_Empleado = '" . $usuario . "' ");
        $row = mysqli_fetch_array($resultado);

        if ($row['ID_Empleado'] == $usuario) {
            if ($row["PAS_Empleado"] == $contraseña) {
                $_SESSION['id_empleado']=$row['ID_Empleado'];
                $_SESSION['empleado'] = $row["USUARIO_Empleado"];
                header("Location: /Biomedica/Vista/index.php");
            } else {
                header("Location: ../Vista/Errores/ContraseñaHerronea.php");
            }
        } else {
            $resultado = mysqli_query($con->conectarMysql(), " SELECT * FROM tblCliente WHERE ID_Cliente = '" . $usuario . "' ");
            $row = mysqli_fetch_array($resultado);
            if ($row[ID_Cliente] == $usuario){
                if ($row["PASS_Cliente"] == $contraseña) {
                    $_SESSION['idcliente'] = $row['ID_Cliente'];
                    $_SESSION['cliente'] = $row[NOMAPE_Cliente];
                    header("Location: ../Vista/index.php");
                } else {
                    header("Location: ../Vista/Errores/ContraseñaHerronea.php");
                }
            }else{
                header("Location: ../Vista/Errores/UsuarioHerroneo.php");
            }
        }
    }

?>
