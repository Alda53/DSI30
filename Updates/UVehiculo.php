<?php
    $idVehiculo=$_GET['idVehiculo'];
    $claveVehicular=$_GET['claveVehicular'];
    $marca=$_GET['marca'];
    $modelo=$_GET['modelo'];
    $color=$_GET['color'];
    $numMotor=$_GET['numMotor'];
    $numSerie=$_GET['numSerie'];
    $transmicion=$_GET['transmicion'];
    $numCilindro=$_GET['numCilindro'];
    $origen=$_GET['origen'];
    $linea=$_GET['linea'];
    $sublinea=$_GET['sublinea'];
    $numPuerta=$_GET['numPuerta'];
    $tipo=$_GET['tipo'];
    $clase=$_GET['clase'];
    $combustible=$_GET['combustible'];
    $numPlaca=$_GET['numPlaca'];

    if(isset($_POST['idVehiculo'])){
        $nclave=$_POST['claveVehicular'];
        $nmarca=$_POST['marca'];
        $nmodelo=$_POST['modelo'];
        $ncolor=$_POST['color'];
        $nnumMotor=$_POST['numMotor'];
        $nnumSerie=$_POST['numSerie'];
        $ntransmicion=$_POST['transmicion'];
        $nnumCilindro=$_POST['numCilindro'];
        $norigen=$_POST['origen'];
        $nlinea=$_POST['linea'];
        $nsublinea=$_POST['sublinea'];
        $nnumPuerta=$_POST['numPuerta'];
        $ntipo=$_POST['tipo'];
        $nclase=$_POST['clase'];
        $ncombustible=$_POST['combustible'];
        $nnumPlaca=$_POST['numPlaca'];
        include("../Instructions/IFunConnect.php");
        $con=conectar();
        $sql="UPDATE vehiculo SET claveVehicular='$nclave', marca='$nmarca', modelo='$nmodelo', 
        color='$ncolor', numMotor='$nnumMotor',  numSerie='$nnumSerie', transmision='$ntransmicion', 
        numCilindro='$nnumCilindro', origen='$norigen', linea='$nlinea', sublinea='$nsublinea', numPuerta='$nnumPuerta', 
        tipo='$ntipo', clase='$nclase', combustible='$ncombustible', numPlaca='$nnumPlaca'
        WHERE idVehiculo='$idVehiculo'";
        print('ACTUALIZADO');
        $r=ejecutar($con,$sql);
        cerrar($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styleF.css">
    <title>Vehículos</title>
</head>
<body>
    <form class="formulario" method="POST">
        <h4>VEHÍCULOS</h4>
            <label>ID</label>
            <input class="controls" type="number" name="idVehiculo" id="idVehiculo" value="<?php print($idVehiculo); ?>">
            <br>
            <label>Clave Vehicular</label>
            <input class="controls" type="text" name="claveVehicular" id="claveVehicular" value="<?php print($claveVehicular); ?>">
            <br>
            <label>Marca</label>
            <input class="controls" type="text" name="marca" id="marca" value="<?php print($marca); ?>">
            <br>
            <label>Modelo</label>
            <input class="controls" type="text" name="modelo" id="modelo" value="<?php print($modelo); ?>">
            <br>
            <label>Color</label>
            <input class="controls" type="text" name="color" id="color" value="<?php print($color); ?>">
            <br>
            <label>Número de Motor</label>
            <input class="controls" type="number" name="numMotor" id="numMotor" value="<?php print($numMotor); ?>">
            <br>
            <label>Número de serie</label>
            <input class="controls" type="text" name="numSerie" id="numSerie" value="<?php print($numSerie); ?>">
            <br>
            <label>Transmición</label>
            <input class="controls" type="text" name="transmicion" id="transmicion" value="<?php print($transmicion); ?>">
            <br>
            <label>Número de cilindros</label>
            <input class="controls" type="number" name="numCilindro" id="numCilindro" value="<?php print($numCilindro); ?>">
            <br>
            <label>Origen</label>
            <input class="controls" type="text" name="origen" id="origen" value="<?php print($origen); ?>">
            <br>
            <label>Línea</label>
            <input class="controls" type="text" name="linea" id="linea" value="<?php print($linea); ?>">
            <br>
            <label>Sublínea</label>
            <input class="controls" type="text" name="sublinea" id="sublinea" value="<?php print($sublinea); ?>">
            <br>
            <label>Número de puertas</label>
            <input class="controls" type="text" name="numPuerta" id="numPuerta" value="<?php print($numPuerta); ?>">
            <br>
            <label>Tipo</label>
            <input class="controls" type="text" name="tipo" id="tipo" value="<?php print($tipo); ?>">
            <br>
            <label>Clase</label>
            <input class="controls" type="text" name="clase" id="clase" value="<?php print($clase); ?>">
            <br>
            <label>Combustible</label>
            <input class="controls" type="text" name="combustible" id="combustible" value="<?php print($combustible); ?>">
            <br>
            <label>Número de placa</label>
            <input class="controls" type="text" name="numPlaca" id="numPlaca" value="<?php print($numPlaca); ?>">
            <br>
    
            <input class="boton" type="submit">
    </form>
</body>
</html>