<?php
    //Recibir las variables
    $tipoTenencia=$_POST['tipoTenencia'];
    $periodo=$_POST['periodo'];
    $monto=$_POST['monto'];
    $lugar=$_POST['lugar'];
    $idVehiculo=$_POST['idVehiculo'];

    //Formar SQL
    //PK auto-incrementable va vacío
    $sql="INSERT INTO tenencia VALUES('', '$tipoTenencia', '$periodo', '$monto', '$lugar', '$idVehiculo');";

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

    // Enviar los datos a un archivo CSV
    // 1. Abrir
    $manejador = fopen("../Files/Tenencias.csv", "a");
    $manejador2 = fopen("../Files/Tenencias.csv", "c");
    // 2. Leer / Escribir
    $encabezado = "IdTenencia,Monto,Tipo,Periodo,Lugar,folioTarjetas\n";
    fwrite($manejador2, $encabezado);
    $Mensaje =$tipoTenencia.",".$periodo.",".$monto.",".$lugar.","."\n";
    fwrite($manejador, $Mensaje);
    // 3. Cerrar el archivo
    fclose($manejador);
    fclose($manejador2);
?>