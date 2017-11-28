<!DOCTYPE html>
<?php
session_start();
include ('../Modelo/Conexion.php');
$conection = new Conexion();
$consulta = "SELECT ID_Producto,NOM_Producto,PRE_Producto,DCN_Producto,IMG_Producto,Cantidad FROM tblProducto";
?>
<!---
/**
 * Created by PhpStorm.
 * User: camilo mejia monsalve 
 * Date: 22/12/2017
 * Time: 22:03
 */--->
<html lang="en">

<head>
    <title>INBIOSER</title>
    <!---<link rel="shortcut icon" href="../Vista/img/logo.png">-->
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

<!-- Carousel. -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="height: 60vh;">
            <img class="d-block img-fluid" src="img/carousel/1.jpg" alt="First slide">
        </div>
        <div class="carousel-item" style="height: 60vh;">
            <img class="d-block img-fluid" src="img/carousel/2.jpg" alt="Second slide">
        </div>
        <!--<div class="carousel-item" style="height: 60vh;">
            <img class="d-block img-fluid" src="img/carousel/3.jpg" alt="Third slide">
        </div>-->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Navbar. -->
<nav class="navbar navbar-toggleable-md navbar-light bg-faded sticky-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        INBIOSER
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            <li class="nav-item " >
                <a class="nav-link" href="index.php" >
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Inicio
                </a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    Registrar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item text-center" href="RegistrarEmpleados.php"><i class="fa fa-user" aria-hidden="true"></i>
                        Empleados</a>
                    <a class="dropdown-item text-center" href="RegistrarClientes.php"><i class="fa fa-reddit-alien" aria-hidden="true"></i>
                        Clientes</a>
                    <a class="dropdown-item text-center" href="RegistrarProducto.php"><i class="fa fa-gift" aria-hidden="true"></i>
                        Productos</a>

                </div>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                    Consultas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item text-center" href="ConsultarFacturas.php"><i class="fa fa-hospital-o" aria-hidden="true"></i>
                        Facturas</a>
                    <a class="dropdown-item text-center " href="ConsultaGeneralSistema.php"><i class="fa fa-globe" aria-hidden="true"></i>
                        consulta general</a>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-compress" aria-hidden="true"></i>
                    Contactenos
                </a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
            <button class="btn btn-outline-info mx-2 my-2 my-sm-0" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
                Consulta</button>
            <?php if(isset($_SESSION['empleado'])||isset($_SESSION['cliente'])){
                ?>

                <div class="dropdown ml-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <i><?php if (isset($_SESSION['empleado'])){echo $_SESSION['empleado'];} if (isset($_SESSION['cliente'])){ echo $_SESSION['cliente'];}?></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="../Controlador/CerrarSesion.php">cerrar session</a>
                    </div>
                </div>

                <?php
            }else{
                ?>
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Iniciar Sesíon
                </button>
                <?php
            }
            ?>
        </form>
    </div>
</nav>

<!-- Modal. -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="../Controlador/InicioSesion.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Iniciar sesíon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </div>
                        <input name="usuario" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Documento">
                    </div>
                    <br>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <input name="contraseña" type="password" class="form-control" id="inlineFormInputGroup" placeholder="Contraseña">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        Salir</button>
                    <button type="submit" name="login" class="btn btn-info">
                        <i class="fa fa-share-square-o" aria-hidden="true"></i>
                        Entrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Productos. -->
<div class="container">
    <div class="mt-5 mb-5" style="width: " role="document">
        <div class="modal-content">
            <form action="FacturarCompra.php" method="post">
                <div class="modal-header">
                    <h1>Productos</h1>
                </div>
                <div class="modal-body row">
                    <?php
                    $resultado = mysqli_query($conection->conectarMysql(),$consulta);
                    if ($conection->conectarMysql() == false){
                        header("Location: ../Vista/Errores/FalloConexionDB.php");
                    }else{
                        while($row = mysqli_fetch_array($resultado)){
                            $ruta_img = $row['IMG_Producto'];
                            echo
                                '
                            <div class="col-sm-4 col-xs-2">
                                <div class="card m-2" style="width: 20rem;height: 90vh;">
                                    <img class="card-img-top" style="height: 40vh;" src="../Controlador/fotos/'.$ruta_img.'" alt="Card image cap">
                                    <div class="card-block">
                                        <hr class="my-0">
                                        <p>
                                        <h4 class="card-title">'.$row['NOM_Producto'].'</h4>
                                        <br>
                                        <p><strong>Modelo:</strong> '.$row['DCN_Producto'].'</p>
                                        <br>
                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <div class="input-group-addon">
                                                <i class="fa fa-money fa-2x" aria-hidden="true"></i>
                                            </div>
                                            <input type="text" value="'.number_format($row['PRE_Producto']).'" class="form-control" id="inlineFormInputGroup" readonly>
                                            <input name="cantidadQuerida[]" type="number" value="'.$row['Cantidad'].'" min="0" max="10" class="form-control" id="inlineFormInputGroup" >
                                        </div>
                                        </p>    
                                        <hr class="my-4">
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="producto[]" value="'.$row['ID_Producto'].'">
                                            <i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i>
                                            Añadir al carrito
                                          </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">

                    <button type="submit" name="login" class="btn btn-info">
                        <i class="fa fa-credit-card-alt mr-2" aria-hidden="true"></i>
                        Facturar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>