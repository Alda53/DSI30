<?php
    $idTenencia=$_GET['idTenencia'];
    $tipoTenencia=$_GET['tipoTenencia'];
    $periodo=$_GET['periodo'];
    $monto=$_GET['monto'];
    $lugar=$_GET['lugar'];

    if(isset($_POST['idTenencia'])){
        $ntipoTenencia=$_POST['tipoTenencia'];
        $nperiodo=$_POST['periodo'];
        $nmonto=$_POST['monto'];
        $nlugar=$_POST['lugar'];
        include("../Instructions/IFunConnect.php");
        $con=conectar();
        $sql="UPDATE tenencia SET tipoTenencia='$ntipoTenencia', periodo='$nperiodo', monto='$nmonto', 
        lugar='$nlugar' 
        WHERE idTenencia='$idTenencia'";
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
    <title>Tenencias</title>
</head>
<body>
    <form class="formulario" method="POST">
        <h4>TENENCIAS</h4>
        <label>ID</label>
        <input class="controls" type="number" name="idTenencia" id="idTenencia" value="<?php print($idTenencia); ?>">
        <br>
        <label>Tipo</label>
        <input class="controls" type="text" name="tipoTenencia" id="tipoTenencia" value="<?php print($tipoTenencia); ?>">
        <br>
        <label>Periodo</label>
        <input class="controls" type="date" name="periodo" id="periodo" value="<?php print($periodo); ?>">
        <br>
        <label>Monto</label>
        <input class="controls" type="text" name="monto" id="monto" value="<?php print($monto); ?>">
        <br>
        <label>Lugar</label>
        <input class="controls" type="text" name="lugar" id="lugar" value="<?php print($lugar); ?>">
        <br>
    
        <input class="boton" type="submit" id="submit">
    </form>
</body>
</html>