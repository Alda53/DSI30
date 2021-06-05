<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/sTablas.css">
    <title>Datos de conductores</title>
</head>
<body>
    <h1>TABLA DE CONDUCTORES</h1>
    <form method="POST">
        <input class="control" type="text" placeholder="Insterte criterio a buscar" name="Criterio">
        <select name="Atributo" id="Atributo">
            <option value="0">Selecciona una opción</option>
            <option value="idConductor">ID</option>
            <option value="nombre">Nombre(s)</option>
            <option value="apellidoPaterno">Apellido Paterno</option>
            <option value="apellidoMaterno">Apellido Materno</option>
            <option value="tipoSangre">Tipo de Sangre</option>
            <option value="fechaNac">Fecha de nacimiento</option>
            <option value="firma">Firma</option>
            <option value="antiguedad">Antiguedad</option>
            <option value="donador">Donador</option>
            <option value="observacion">Observación</option>
            <option value="foto">Foto</option>
            <option value="numEmergencia">Número de emergencia</option>
            <option value="restriccion">Restricción</option>
        </select><br>
        <input class="boton" type="submit">
    </form>
    <br><br>
    <?php
        if(isset($_POST['Criterio']) and isset($_POST['Atributo'])){
            $Criterio=$_POST['Criterio'];
            $Atributo=$_POST['Atributo'];
        
            include("../Instructions/IFunConnect.php");
            $con=conectar();
            $sql="SELECT * FROM conductor WHERE $Atributo LIKE '%$Criterio%'";
            $r=ejecutar($con, $sql);
            cerrar($con); 
            $n = mysqli_num_rows($r);

            session_start(); 
            $FUsuario=$_SESSION["Usuario"];
            $conUser=conectar();
            $sql2="SELECT * FROM usuario WHERE userName='$FUsuario'";
            $r2=ejecutar($conUser,$sql2);
            cerrar($conUser);
            $filaXD=mysqli_fetch_row($r2);
    ?>
    <table class="content-table">
        <thead>
            <tr>
                <th>ID Conductor</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Tipo de sangre</th>
                <th>Fecha de nacimiento</th>
                <th>Firma</th>
                <th>Antiguedad</th>
                <th>Donador</th>
                <th>Observación</th>
                <th>Foto</th>
                <th>Número de emergencia</th>
                <th>Restricción</th>
                <?php if($filaXD[2]=="A"){ ?>
                <th>Eliminar</th>
                <th>Actualizar</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
    <?php        
    for($f=0;$f<$n;$f++){
        $fila = mysqli_fetch_row($r);
    ?>
    <tr>
        <td><?php echo $fila[0]?></td>
        <td><?php echo $fila[1]?></td>
        <td><?php echo $fila[2]?></td>
        <td><?php echo $fila[3]?></td>
        <td><?php echo $fila[4]?></td>
        <td><?php echo $fila[5]?></td>
        <td><?php echo $fila[6]?></td>
        <td><?php echo $fila[7]?></td>
        <td><?php echo $fila[8]?></td>
        <td><?php echo $fila[9]?></td>
        <td><?php echo $fila[10]?></td>
        <td><?php echo $fila[11]?></td>
        <td><?php echo $fila[12]?></td>
        <?php if($filaXD[2]=="A"){ ?>
        <td><a href="../Deletes/DConductor.php?idConductor=<?php echo $fila[0]?>" style="color: red;">ELIMINAR</a></td>
        <td><a href="../Updates/UConductor.php?idConductor=<?php echo $fila[0]?>&nombre=<?php echo $fila[1]?>&apellidoPaterno=<?php echo $fila[2]?>&apellidoMaterno=<?php echo $fila[3]?>&tipoSangre=<?php echo $fila[4]?>&fechaNac=<?php echo $fila[5]?>&firma=<?php echo $fila[6]?>&antiguedad=<?php echo $fila[7]?>&donador=<?php echo $fila[8]?>&observacion=<?php echo $fila[9]?>&foto=<?php echo $fila[10]?>&numEmergencia=<?php echo $fila[11]?>&restriccion=<?php echo $fila[12]?>" style="color: blue;">ACTUALIZAR</a></td>
        <?php } ?>
    </tr>
            <?php
            }}
            ?>
        </tbody>
    </table>
</body>
</html>