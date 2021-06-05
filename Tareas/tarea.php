<?
    $manejador = fopen("file1.txt", "r");
    $t= filesize('file1.txt');

    print('<br/>'.'-----------------------------------------------'.'<br/>'.'Caracter por caracter'.'<br/>');

    for($i=0; $x < $t;$x++){
        $caracter=fgetc($manejador);
        print($caracter);
    }

    print('<br/>'.'-----------------------------------------------'.'<br/>'.'Línea por línea'.'<br/>');

    for($i=0; $x < $t;$x++){
        $linea=fgets($manejador);
        print($linea);
    }
?>