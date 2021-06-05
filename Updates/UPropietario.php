<?php
    $idPropietario=$_GET['idPropietario'];
    $nombrePropietario=$_GET['nombrePropietario'];
    $apellidoPaterno=$_GET['apellidoPaterno'];
    $apellidoMaterno=$_GET['apellidoMaterno'];
    $localidad=$_GET['localidad'];
    $municipio=$_GET['municipio'];
    $RFC=$_GET['RFC'];

    if(isset($_POST['idPropietario'])){
        $n=$_POST['nombrePropietario'];
        $ap=$_POST['apellidoPaterno'];
        $am=$_POST['apellidoMaterno'];
        $l=$_POST['localidad'];
        $mun=$_POST['municipio'];
        $nr=$_POST['RFC'];
        include("../Instructions/IFunConnect.php");
        $con=conectar();
        $sql="UPDATE propietario SET nombrePropietario='$n', apellidoPaterno='$ap', apellidoMaterno='$am', localidad='$l', 
        municipio='$mun', RFC='$nr' 
        WHERE idPropietario='$idPropietario'";
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
    <title>Propietarios</title>
</head>
<body>
    <form class="formulario" method="POST">
        <h4>PROPIETARIOS</h4>
        <label>ID</label>
        <input class="controls" type="number" name="idPropietario" id="idPropietario" value="<?php print($idPropietario); ?>">
        <br>
        <label>Nombre</label>
        <input class="controls" type="text" name="nombrePropietario" id="nombrePropietario" value="<?php print($nombrePropietario); ?>">
        <br>
        <label>Apellido paterno</label>
        <input class="controls" type="text" name="apellidoPaterno" id="apellidoPaterno" value="<?php print($apellidoPaterno); ?>">
        <br>
        <label>Apellido materno</label>
        <input class="controls" type="text" name="apellidoMaterno" id="apellidoMaterno" value="<?php print($apellidoMaterno); ?>">
        <br>
        <label>Localidad</label>
        <input class="controls" type="text" name="localidad" id="localidad" value="<?php print($localidad); ?>">
        <br>
        <label>Municipio</label>
        <input class="controls" type="text" name="municipio" id="municipio" value="<?php print($municipio); ?>">
        <br>
        <label>RFC</label>
        <input class="controls" type="text" name="RFC" id="RFC" value="<?php print($RFC); ?>">
        <br>
    
        <input class="boton" type="submit">
    </form>
</body>
</html>