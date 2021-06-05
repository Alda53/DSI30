<?php
    //Recibir las variables
    $nombrePropietario=$_REQUEST['nombrePropietario'];
    $apellidoPaterno=$_REQUEST['apellidoPaterno'];
    $apellidoMaterno=$_REQUEST['apellidoMaterno'];
    $localidad=$_REQUEST['localidad'];
    $municipio=$_REQUEST['municipio'];
    $RFC=$_REQUEST['RFC'];

    //Formar SQL explícito
    $sql= "INSERT INTO propietario(idPropietario, nombrePropietario, apellidoPaterno, apellidoMaterno, localidad, municipio, RFC) 
    VALUES ('', '$nombrePropietario', '$apellidoPaterno', '$apellidoMaterno', '$localidad', '$municipio', '$RFC');";

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