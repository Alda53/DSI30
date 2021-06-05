<?php
    $idLicencia=$_GET['idLicencia'];
    $numero=$_GET['numero'];
    $fechaExp=$_GET['fechaExp'];
    $tipo=$_GET['tipo'];
    $fechaVenc=$_GET['fechaVenc'];

    if(isset($_POST['idLicencia'])){
        $nnumero=$_POST['numero'];
        $nfechaExp=$_POST['fechaExp'];
        $ntipo=$_POST['tipo'];
        $nfechaVenc=$_POST['fechaVenc'];
        include("../Instructions/IFunConnect.php");
        $con=conectar();
        $sql="UPDATE licencia SET numero='$nnumero', fechaExp='$nfechaExp', tipo='$ntipo', 
        fechaVenc='$nfechaVenc' 
        WHERE idLicencia='$idLicencia'";
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
    <title>Licencias</title>
</head>
<body>
    <form class="formulario" method="POST">
        <h4>LICENCIAS</h4>
        <label>ID</label>
        <input class="controls" type="number" name="idLicencia" id="idLicencia" value="<?php print($idLicencia); ?>">
        <br>
        <label>Número</label>
        <input class="controls" type="number" name="numero" id="numero" value="<?php print($numero); ?>">
        <br>
        <label>Fecha de expiración</label>
        <input class="controls" type="date" name="fechaExp" id="fechaExp" value="<?php print($fechaExp); ?>">
        <br>
        <label>Tipo</label>
        <input class="controls" type="text" name="tipo" id="tipo" value="<?php print($tipo); ?>">
        <br>
        <label>Fecha de vencimiento</label>
        <input class="controls" type="date" name="fechaVenc" id="fechaVenc" value="<?php print($fechaVenc); ?>">
        <br>
    
        <input class="boton" type="submit">
    </form>
</body>
</html>