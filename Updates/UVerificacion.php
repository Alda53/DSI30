<?php
    $folio=$_GET['folio'];
    $emision=$_REQUEST['emision'];
    $fechaHora=$_REQUEST['fechaHora'];
    $centroVerif=$_REQUEST['centroVerif'];
    $tecnico=$_REQUEST['tecnico'];
    $dictamen=$_REQUEST['dictamen'];
    $periodo=$_REQUEST['periodo'];
    $tipo=$_REQUEST['tipo'];

    if(isset($_POST['folio'])){
        $nemision=$_POST['emision'];
        $nfechaHora=$_POST['fechaHora'];
        $ncentroVerif=$_POST['centroVerif'];
        $ntecnico=$_POST['tecnico'];
        $ndictamen=$_POST['dictamen'];
        $nperiodo=$_POST['periodo'];
        $ntipo=$_POST['tipo'];
        include("../Instructions/IFunConnect.php");
        $con=conectar();
        $sql="UPDATE verificacion SET emision='$nemision', fechaHora='$nfechaHora', centroVerif='$ncentroVerif', 
        tecnico='$ntecnico', dictamen='$ndictamen', periodo='$nperiodo', tipo='$ntipo' 
        WHERE folio='$folio'";
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
    <title>Verificacion</title>
</head>
<body>
    <form class="formulario" method="POST">
        <h4>VERIFICACIONES</h4>
        <label>Folio</label>
        <input class="controls" type="number" name="folio" id="folio" value="<?php print($folio); ?>">
        <br>
        <label>Emisión</label>
        <input class="controls" type="text" name="emision" id="emision" value="<?php print($emision); ?>">
        <br>
        <label>Fecha</label>
        <input class="controls" type="date" name="fechaHora" id="fechaHora" value="<?php print($fechaHora); ?>">
        <br>
        <label>Centro de verificación</label>
        <input class="controls" type="text" name="centroVerif" id="centroVerif" value="<?php print($centroVerif); ?>">
        <br>
        <label>Técnico</label>
        <input class="controls" type="text" name="tecnico" id="tecnico" value="<?php print($tecnico); ?>">
        <br>
        <label>Dictámen</label>
        <input class="controls" type="text" name="dictamen" id="dictamen" value="<?php print($dictamen); ?>">
        <br>
        <label>Periodo</label>
        <input class="controls" type="date" name="periodo" id="periodo" value="<?php print($periodo); ?>">
        <br>
        <label>Tipo</label>
        <input class="controls" type="text" name="tipo" id="tipo" value="<?php print($tipo); ?>">
        <br>
    
        <input class="boton" type="submit">
    </form>
</body>
</html>