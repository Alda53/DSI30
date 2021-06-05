<?php
    include("../Instructions/IFunConnect.php");
    $valor=$_GET['idMulta'];
    $con=conectar();
    $sql="DELETE FROM multa WHERE idMulta='$valor'";
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