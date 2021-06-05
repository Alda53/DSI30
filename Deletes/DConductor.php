<?php
    include("../Instructions/IFunConnect.php");
    $valor=$_GET['idConductor'];
    $con=conectar();
    $sql="DELETE FROM conductor WHERE idConductor='$valor'";
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