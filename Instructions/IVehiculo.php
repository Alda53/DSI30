<?php
    //Recibir las variables
    $claveVehicular=$_REQUEST['claveVehicular'];
    $marca=$_REQUEST['marca'];
    $modelo=$_REQUEST['modelo'];
    $color=$_REQUEST['color'];
    $numMotor=$_REQUEST['numMotor'];
    $numSerie=$_REQUEST['numSerie'];
    $transmision=$_REQUEST['transmision'];
    $numCilindro=$_REQUEST['numCilindro'];
    $origen=$_REQUEST['origen'];
    $linea=$_REQUEST['linea'];
    $sublinea=$_REQUEST['sublinea'];
    $numPuerta=$_REQUEST['numPuerta'];
    $tipo=$_REQUEST['tipo'];
    $clase=$_REQUEST['clase'];
    $combustible=$_REQUEST['combustible'];
    $numPlaca=$_REQUEST['numPlaca'];

    //Formar SQL explícito
    $sql = "INSERT INTO vehiculo(claveVehicular, 
    marca, modelo, color, numMotor, numSerie, transmision, numCilindro, origen, linea, sublinea, 
    numPuerta, tipo, clase, combustible, numPlaca) 
    VALUES('$claveVehicular', '$marca', 
    '$modelo', '$color', '$numMotor', '$numSerie', '$transmision', '$numCilindro', '$origen', 
    '$linea', '$sublinea', '$numPuerta', '$tipo', '$clase', '$combustible', '$numPlaca');";

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
    $manejador = fopen("../Files/Vehiculos.csv", "a");
    $manejador2 = fopen("../Files/Vehiculos.csv", "c");
    // 2. Leer / Escribir
    $encabezado = "IDVehiculo,Clave Vehicular,Marca,Modelo,Color,Número Motores,Número de serie,
    Transmicion,Número de cilindro,Origen,Línea,Sublínea,Número de puertas,Tipo,Clase,Combustible,Número de placa\n";
    fwrite($manejador2, $encabezado);
    $Mensaje =$claveVehicular.",".$marca.",".$modelo.",".$color.",".$numMotor.",".$numSerie.","
    .$transmision.",".$numCilindro.",".$origen.",".$linea.",".$sublinea.",".$numPuerta.",".$tipo.",".$clase.","
    .$combustible.",".$numPlaca."\n";
    fwrite($manejador, $Mensaje);
    // 3. Cerrar el archivo
    fclose($manejador);
    fclose($manejador2);
?>