<?php
    //Recibir las variables
    $nombre=$_REQUEST['nombre'];
    $apellidoPaterno=$_REQUEST['apellidoPaterno'];
    $apellidoMaterno=$_REQUEST['apellidoMaterno'];
    $tipoSangre=$_REQUEST['tipoSangre'];
    $fechaNac=$_REQUEST['fechaNac'];
    $firma=$_REQUEST['firma'];
    $antiguedad=$_REQUEST['antiguedad'];
    $donador=$_REQUEST['donador'];
    $observacion=$_REQUEST['observacion'];
    $foto=$_REQUEST['foto'];
    $numEmergencia=$_REQUEST['numEmergencia'];
    $restriccion=$_REQUEST['restriccion'];

    //Formar SQL
    $sql = "INSERT INTO conductor VALUES('', '$nombre', '$apellidoPaterno', 
    '$apellidoMaterno', '$tipoSangre', '$fechaNac', '$firma', '$antiguedad', 
    '$donador', '$observacion', '$foto', '$numEmergencia', '$restriccion');";

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
    $manejador = fopen("../Files/Conductores.csv", "a");
    $manejador2 = fopen("../Files/Conductores.csv", "c");
    // 2. Leer / Escribir
    $encabezado = "idConductor,Nombre,Apellido Paterno,Apellido Materno,tipoSangre,fechaNacimiento,Antiguedad,Donador,Observacion,numeroEmergencia,Restriccion\n";
    fwrite($manejador2, $encabezado);
    $Mensaje =$nombre.",".$apellidoPaterno.",".$apellidoMaterno.",".$tipoSangre.",".$fechaNac.",".$antiguedad.",".$donador.",".$observacion.",".$numEmergencia.",".$restriccion."\n";
    fwrite($manejador, $Mensaje);
    // 3. Cerrar el archivo
    fclose($manejador);
    fclose($manejador2);
?>