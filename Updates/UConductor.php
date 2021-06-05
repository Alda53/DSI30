<?php
    $idConductor=$_GET['idConductor'];
    $nombre=$_GET['nombre'];
    $apellidoPaterno=$_GET['apellidoPaterno'];
    $apellidoMaterno=$_GET['apellidoMaterno'];
    $tipoSangre=$_GET['tipoSangre'];
    $fechaNac=$_GET['fechaNac'];
    $firma=$_GET['firma'];
    $antiguedad=$_GET['antiguedad'];
    $donador=$_GET['donador'];
    $observacion=$_GET['observacion'];
    $foto=$_GET['foto'];
    $numEmergencia=$_GET['numEmergencia'];
    $restriccion=$_GET['restriccion'];

    if(isset($_POST['idConductor'])){
        $n=$_POST['nombre'];
        $ap=$_POST['apellidoPaterno'];
        $am=$_POST['apellidoMaterno'];
        $tp=$_POST['tipoSangre'];
        $fn=$_POST['fechaNac'];
        $fir=$_POST['firma'];
        $anti=$_POST['antiguedad'];
        $dona=$_POST['donador'];
        $obser=$_POST['observacion'];
        $fot=$_POST['foto'];
        $numE=$_POST['numEmergencia'];
        $rest=$_POST['restriccion'];
        include("../Instructions/IFunConnect.php");
        $con=conectar();
        $sql="UPDATE conductor SET nombre='$n', apellidoPaterno='$ap', apellidoMaterno='$am', tipoSangre='$tp', 
        fechaNac='$fn', firma='$fir', antiguedad='$anti', donador='$dona', observacion='$obser', foto='$fot', 
        numEmergencia='$numE', restriccion='$rest'
        WHERE idConductor=$idConductor";
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
    <title>Conductores</title>
</head>
<body>
    <form class="formulario" method="POST">
        <h4>CONDUCTORES</h4>
        <label>ID</label>
        <input class="controls" type="number" name="idConductor" id="idConductor" value="<?php print($idConductor); ?>">
        <br>
        <label>Nombre</label>
        <input class="controls" type="text" name="nombre" id="nombre" value="<?php print($nombre); ?>">
        <br>
        <label>Apellido paterno</label>
        <input class="controls" type="text" name="apellidoPaterno" id="apellidoPaterno" value="<?php print($apellidoPaterno); ?>">
        <br>
        <label>Apellido materno</label>
        <input class="controls" type="text" name="apellidoMaterno" id="apellidoMaterno" value="<?php print($nombre); ?>">
        <br>
        <label>Tipo de sangre</label>
        <input class="controls" type="text" name="tipoSangre" id="tipoSangre" value="<?php print($tipoSangre); ?>">
        <br>
        <label>Fecha de Nacimiento</label>
        <input class="controls" type="date" name="fechaNac" id="fechaNac" value="<?php print($fechaNac); ?>">
        <br>
        <label>Firma</label>
        <input class="controls" type="text" name="firma" id="firma" value="<?php print($firma); ?>">
        <br>
        <label>Antiguedad</label>
        <input class="controls" type="number" name="antiguedad" id="antiguedad" value="<?php print($antiguedad); ?>">
        <br>
        <label>Donador</label>
        <input class="controls" type="text" name="donador" id="donador" value="<?php print($donador); ?>">
        <br>
        <label>Observación</label>
        <input class="controls" type="text" name="observacion" id="observacion" value="<?php print($observacion); ?>">
        <br>
        <label>Foto</label>
        <input class="controls" type="text" name="foto" id="foto" value="<?php print($foto); ?>">
        <br>
        <label>Numero de emergencia</label>
        <input class="controls" type="text" name="numEmergencia" id="numEmergencia" value="<?php print($numEmergencia); ?>">
        <br>
        <label>Restriccion</label>
        <input class="controls" type="text" name="restriccion" id="restriccion" value="<?php print($restriccion); ?>">
        <br>
    
        <input class="boton" type="submit">
    </form>
</body>
</html>