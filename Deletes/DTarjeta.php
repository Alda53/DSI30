<?php
    include("../Instructions/IFunConnect.php");
    $valor=$_GET['folioTarjeta'];
    $con=conectar();
    $sql="DELETE FROM tarjeta WHERE folioTarjeta='$valor'";
    $r=ejecutar($con, $sql);
    //Validamos si alguna columna fue alterada
    $resgistrosAfec=mysqli_affected_rows($con);
    if($resgistrosAfec){
        print("1 Registro Eliminado");
    }else{
        print("0 Registros Eliminados");
    }
    cerrar($con);
?>