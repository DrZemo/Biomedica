<?php
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 22/11/2017
 * Time: 22:13
 */

class Conexion
{
    var $servidor,$usuario,$contraseña,$database;

    function conectarMysqlParameters($servi,$usua,$contra,$databa){
        $cad = mysqli_connect($servi,$usua,$contra,$databa);

        if ($cad){
        }else{
            echo ":(";
        }
        return $cad;
    }

    function conectarMysql(){
        $conec = mysqli_connect("localhost","root","","DB_BIOMEDICA");

        if ($conec){
        }else{
            echo ":(";
        }
        return $conec;
    }


}