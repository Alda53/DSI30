<?php
    include("../Instructions/IFunConnect.php");
    $valor=$_GET['idLicencia'];
    $con=conectar();
    $sql="DELETE FROM licencia WHERE idLicencia='$valor'";
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