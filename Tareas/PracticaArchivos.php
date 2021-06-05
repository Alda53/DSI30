<?php
    //Abrir
    $manejador=fopen("File1.txt", "w");
    print_r($manejador);

    //Escribir
    //fwrite();
    //fputs();

    //Leer
    $caracter=fgetc($manejador);
    print($caracter);
    $caracter=fgetc($manejador);
    print($caracter);
    $caracter=fgetc($manejador);
    print($caracter);

    //Cerrar
    fclose($manejador);
?>