<?php
    $folioTarjeta=$_GET['folioTarjeta'];
    $uso=$_GET['uso'];
    $fechaExp=$_GET['fechaExp'];
    $oficinaExp=$_GET['oficinaExp'];
    $tipoServicio=$_GET['tipoServicio'];
    $movimiento=$_GET['movimiento'];

    if(isset($_POST['folioTarjeta'])){
        $nuso=$_POST['uso'];
        $nfechaExp=$_POST['fechaExp'];
        $noficinaExp=$_POST['oficinaExp'];
        $ntipoServicio=$_POST['tipoServicio'];
        $nmovimiento=$_POST['movimiento'];
        include("../Instructions/IFunConnect.php");
        $con=conectar();
        $sql="UPDATE tarjeta SET uso='$nuso', fechaExp='$nfechaExp', oficinaExp='$noficinaExp', tipoServicio='$ntipoServicio', 
        movimiento='$nmovimiento' 
        WHERE folioTarjeta='$folioTarjeta'";
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
    <title>Tarjetas</title>
</head>
<body>
    <form class="formulario" method="POST">
        <h4>TARJETAS</h4>
        <label>Folio</label>
        <input class="controls" type="number" name="folioTarjeta" id="folioTarjeta" value="<?php print($folioTarjeta); ?>">
        <br>
        <label>Uso</label>
        <input class="controls" type="text" name="uso" id="uso" value="<?php print($uso); ?>">
        <br>
        <label>Fecha de expiración</label>
        <input class="controls" type="date" name="fechaExp" id="fechaExp" value="<?php print($fechaExp); ?>">
        <br>
        <label>Oficina</label>
        <input class="controls" type="text" name="oficinaExp" id="oficinaExp" value="<?php print($oficinaExp); ?>">
        <br>
        <label>Tipo de servicio</label>
        <input class="controls" type="text" name="tipoServicio" id="tipoServivio" value="<?php print($tipoServicio); ?>">
        <br>
        <label>Movimiento</label>
        <input class="controls" type="text" name="movimiento" id="movimiento" value="<?php print($movimiento); ?>">
        <br>
    
        <input class="boton" type="submit">
    </form>
</body>
</html>