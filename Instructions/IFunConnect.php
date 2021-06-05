<?php
    //Funciones
    function conectar(){
        //Conectamos a la BD
        $servidor="127.0.0.1";
        $usuario="root";
        $password="";
        $bd="controlvehicular30";
        $con= mysqli_connect($servidor, $usuario, $password, $bd);
        return $con;
    }

    function ejecutar($con, $sql){
        $query = mysqli_query($con, $sql) or die (mysqli_error($con));
        return $query;
    }

    function cerrar($con){
        mysqli_close($con);
    }
?>