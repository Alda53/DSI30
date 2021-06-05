<?php
    //Recibir las variables
    $agenteTransito=$_POST['agenteTransito'];
    $garantia=$_POST['garantia'];
    $horaFecha=$_POST['horaFecha'];
    $lugar=$_POST['lugar'];
    $motivo=$_POST['motivo'];
    $fechaPago=$_POST['fechaPago'];
    $fundamento=$_POST['fundamento'];
    $idLicencia=$_POST['idLicencia'];
    $folio=$_POST['folio'];

    //Formar SQL
    $sql = "INSERT INTO multa VALUES('', '$agenteTransito', 
    '$garantia', '$horaFecha', '$lugar', 
    '$motivo', '$fechaPago', '$fundamento', '$idLicencia', '$folio');";

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
    $manejador = fopen("../Files/Multas.csv", "a");
    $manejador2 = fopen("../Files/Multas.csv", "c");
    // 2. Leer / Escribir
    $encabezado = "IDMulta,AgenteTránsito,Garantía,Hora y Fecha,Lugar,Motivo,Fecha de pago,Fundamento,IDLicencia,Folio\n";
    fwrite($manejador2, $encabezado);
    $Mensaje =",".$agenteTransito.",".$garantia.",".$horaFecha.",".$lugar.",".$motivo.",".$fechaPago.",".$fundamento.",".$idLicencia.",".$folio."\n";
    fwrite($manejador, $Mensaje);
    // 3. Cerrar el archivo
    fclose($manejador);
    fclose($manejador2);
?>