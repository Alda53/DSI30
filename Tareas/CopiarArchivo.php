<?php
    //Abrir archivo
    $m=fopen("File1.txt","r");
    $m2=fopen("Files/File2.txt","w");

    //Leer escribir
    while($Linea=fgets($m)){
        fwrite($m2,$Linea);
    }
    print("Copia generada correctamente.");

    //Cerrar
    fclose($m);
    fclose($m2);
?>