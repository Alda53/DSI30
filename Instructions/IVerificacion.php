<?php
    //Recibir las variables
    $emision=$_REQUEST['emision'];
    $fechaHora=$_REQUEST['fechaHora'];
    $centroVerif=$_REQUEST['centroVerif'];
    $tecnico=$_REQUEST['tecnico'];
    $dictamen=$_REQUEST['dictamen'];
    $periodo=$_REQUEST['periodo'];
    $tipo=$_REQUEST['tipo'];
    $folioTarjeta=$_REQUEST['folioTarjeta'];

    //Formar SQL explícito
    $sql="INSERT INTO verificacion(emision, fechaHora, centroVerif, tecnico, dictamen, periodo, tipo, folioTarjeta) 
    VALUES('$emision', '$fechaHora', '$centroVerif', '$tecnico', '$dictamen', '$periodo', '$tipo', '$folioTarjeta');";

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
    $manejador = fopen("../Files/Verificaciones.csv", "a");
    $manejador2 = fopen("../Files/Verificaciones.csv", "c");
    // 2. Leer / Escribir
    $encabezado = "Folio,Emisión,Fecha y hora,Centro de verificación,Técnico,Dictámen,Periodo,Tipo,Folio de tarjeta\n";
    fwrite($manejador2, $encabezado);
    $Mensaje =$emision.",".$fechaHora.",".$centroVerif.",".$tecnico.",".$dictamen.",".$periodo.",".$tipo.",".$folioTarjeta."\n";
    fwrite($manejador, $Mensaje);
    // 3. Cerrar el archivo
    fclose($manejador);
    fclose($manejador2);
?>