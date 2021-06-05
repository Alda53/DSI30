<?php
    include("../Instructions/IFunConnect.php");
    $valor=$_GET['idTenencia'];
    $con=conectar();
    $sql="DELETE FROM tenencia WHERE idTenencia='$valor'";
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