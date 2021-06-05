<?php
    //Recibir las variables
    $numero=$_GET['numero'];
    $fechaExp=$_GET['fechaExp'];
    $tipo=$_GET['tipo'];
    $fechaVenc=$_GET['fechaVenc'];
    $idConductor=$_GET['idConductor'];

    //Formar SQL
    $sql = "INSERT INTO licencia VALUES('', '$numero', '$fechaExp', '$tipo', '$fechaVenc', '$idConductor');";

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
    $manejador = fopen("../Files/Licencias.csv", "a");
    $manejador2 = fopen("../Files/Licencias.csv", "c");
    // 2. Leer / Escribir
    $encabezado = "IDLicencia,Número,FechaExpedida,Tipo,FechaVencimiento,IDConductor\n";
    fwrite($manejador2, $encabezado);
    $Mensaje =$numero.",".$fechaExp.",".$tipo.",".$fechaVenc.",".$idConductor."\n";
    fwrite($manejador, $Mensaje);
    // 3. Cerrar el archivo
    fclose($manejador);
    fclose($manejador2);
?>