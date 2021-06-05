<?php
    $idMulta=$_GET['idMulta'];
    $agenteTransito=$_GET['agenteTransito'];
    $garantia=$_GET['garantia'];
    $horaFecha=$_GET['horaFecha'];
    $lugar=$_GET['lugar'];
    $motivo=$_GET['motivo'];
    $fechaPago=$_GET['fechaPago'];
    $fundamento=$_GET['fundamento'];

    if(isset($_POST['idMulta'])){
        $nagente=$_POST['agenteTransito'];
        $ngarantia=$_POST['garantia'];
        $nhoraFecha=$_POST['horaFecha'];
        $nlugar=$_POST['lugar'];
        $nmotivo=$_POST['motivo'];
        $nfechaPago=$_POST['fechaPago'];
        $nfundamento=$_POST['fundamento'];
        include("../Instructions/IFunConnect.php");
        $con=conectar();
        $sql="UPDATE multa SET agenteTransito='$nagente', garantia='$ngarantia', 
        horaFecha='$nhoraFecha', lugar='$nlugar', motivo='$nmotivo', fechaPago='$nfechaPago', 
        fundamento='$nfundamento' 
        WHERE idMulta='$idMulta'";
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
    <title>Multas</title>
</head>
<body>
    <form class="formulario" method="POST">
        <h4>MULTAS</h4>
        <label>ID</label>
        <input class="controls" type="number" name="idMulta" id="idMulta" value="<?php print($idMulta); ?>">
        <br>
        <label>Agente de tránsito</label>
        <input class="controls" type="text" name="agenteTransito" id="agenteTransito" value="<?php print($agenteTransito); ?>">
        <br>
        <label>Garantía</label>
        <input class="controls" type="text" name="garantia" id="garantia" value="<?php print($garantia); ?>">
        <br>
        <label>Fecha</label>
        <input class="controls" type="date" name="horaFecha" id="horaFecha" value="<?php print($horaFecha); ?>">
        <br>
        <label>Lugar</label>
        <input class="controls" type="text" name="lugar" id="lugar" value="<?php print($lugar); ?>">
        <br>
        <label>Motivo</label>
        <input class="controls" type="text" name="motivo" id="motivo" value="<?php print($motivo); ?>">
        <br>
        <label>Fecha de pago</label>
        <input class="controls" type="date" name="fechaPago" id="fechaPago" value="<?php print($fechaPago); ?>">
        <br>
        <label>Fundamento</label>
        <input class="controls" type="text" name="fundamento" id="fundamento" value="<?php print($fundamento); ?>">
        <br>
    
        <input class="boton" type="submit">
    </form>
</body>
</html>