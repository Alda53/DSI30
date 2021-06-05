<?php
    $manejador = fopen("file1.txt", "r");
    
    //To Write, puts works like fwrite
    // $resultado = fwrite($manejador, "Hola1");
    // echo($resultado);

    // $resultado = fputs($manejador, "Hola2");
    // echo($resultado);

    //Read
    // $caracter = fgetc($manejador);
    // echo($caracter);

    // $linea = fgets($manejador);
    // echo($linea);

    //Practica
    // $tam = filesize('file1.txt');
    // // echo $tam;

    // echo('<br/>'.'----------------------------------------------------------------------------'.'<br/>'.'Caracter por Caracter'.'<br/>');

    // for($x = 0; $x < $tam; $x++){
    //     $caracter = fgetc($manejador);
    //     echo($caracter);
    // }

    // echo('<br/>'.'----------------------------------------------------------------------------'.'<br/>'.'Línea por línea'.'<br/>');

    // for($x = 0; $x < $tam; $x++){
    //     $linea = fgets($manejador);
    //     echo($linea);
    // }


    // while($Linea=fgets($manejador)){
    //     echo($Linea);
    // }

    while(!feof($manejador)){
        $Linea=fgets($manejador);
        echo($Linea);
    }

    // Close
    fclose($manejador);
?>