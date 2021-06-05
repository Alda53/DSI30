<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/sTablas.css">
    <title>Datos de verificación</title>
</head>
<body>
    <form class="formulario" method="POST" action="">
        <h1>TABLA DE VERIFICACIÓN</h1>
        <input class="control" type="text" placeholder="Insterte criterio a buscar" name="Criterio">
        <select name="Atributo" id="Atributo">
            <option value="0">Selecciona una opción</option>
            <option value="folio">Folio</option>
            <option value="emision">Emisión</option>
            <option value="fechaHora">Fecha y hora</option>
            <option value="CentroVerif">Centreo de verificación</option>
            <option value="tecnico">Técnico</option>
            <option value="dictamen">Dictámen</option>
            <option value="periodo">Periodo</option>
            <option value="tipo">Tipo</option>
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
            $sql="SELECT * FROM verificacion WHERE $Atributo LIKE '%$Criterio%'";
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
                <th>Folio</th>
                <th>Emisión</th>
                <th>Fecha y hora</th>
                <th>Centro de Verificación</th>
                <th>Técnico</th>
                <th>Dictámen</th>
                <th>Periodo</th>
                <th>Tipo</th>
                <th>Folio de tarjeta</th>
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
        <?php if($filaXD[2]=="A"){ ?>
        <td><a href="../Deletes/DVerificacion.php?folio=<?php echo $fila[0]?>" style="color: red;">ELIMINAR</a></td>
        <td><a href="../Updates/UVerificacion.php?folio=<?php echo $fila[0]?>&emision=<?php echo $fila[1]?>&fechaHora=<?php echo $fila[2]?>&centroVerif=<?php echo $fila[3]?>&tecnico=<?php echo $fila[4]?>&dictamen=<?php echo $fila[5]?>&periodo=<?php echo $fila[6]?>&tipo=<?php echo $fila[7]?>" style="color: blue;">ACTUALIZAR</a></td>
        <?php } ?>
    </tr>
            <?php
            }}
            ?>
        </tbody>
    </table>
</body>
</html>