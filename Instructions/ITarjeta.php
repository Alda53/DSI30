<?php
    //Recibir las variables
    $uso=$_GET['uso'];
    $fechaExp=$_GET['fechaExp'];
    $oficinaExp=$_GET['oficinaExp'];
    $tipoServicio=$_GET['tipoServicio'];
    $movimiento=$_GET['movimiento'];
    $idVehiculo=$_GET['idVehiculo'];
    $idPropietario=$_GET['idPropietario'];

    //Formar SQL explícito
    $sql= "INSERT INTO tarjeta(uso, fechaExp, oficinaExp, tipoServicio, movimiento, idVehiculo, idPropietario) 
    VALUES('$uso', '$fechaExp', '$oficinaExp', '$tipoServicio', '$movimiento', '$idVehiculo', '$idPropietario');";

    //Enviar los datos al SMBD
    include ("IFunConnect.php");
    $con = conectar();
    $query= ejecutar($con, $sql);
    cerrar($con);

    if($query){
        print("Registo correcto");
    }else{
        print("XD");
    }
?>