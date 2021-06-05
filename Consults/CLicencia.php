<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/sTablas.css">
    <title>Datos de licencias</title>
</head>
<body>
    <h1>TABLA DE LICENCIAS</h1>
    <form method="POST">
        <input class="control" type="text" placeholder="Insterte criterio a buscar" name="Criterio">
        <select name="Atributo" id="Atributo">
            <option value="0">Selecciona una opción</option>
            <option value="idLicencia">ID</option>
            <option value="numero">Número</option>
            <option value="fechaExp">Fecha</option>
            <option value="tipo">Tipo</option>
            <option value="fechaVenc">Fecha de vencimiento</option>
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
            $sql="SELECT * FROM licencia WHERE $Atributo LIKE '%$Criterio%'";
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
                <th>ID Licencia</th>
                <th>Número</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Fecha de vencimiento</th>
                <th>ID Conductor</th>
                <?php if($filaXD[2]=="A"){ ?>
                <th>Eliminar</th>
                <th>Actualizar</th>
                <th>PDF</th>
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
        <?php if($filaXD[2]=="A"){ ?>
        <td><a href="../Deletes/DLicencia.php?idLicencia=<?php echo $fila[0]?>" style="color: red;">ELIMINAR</a></td>
        <td><a href="../Updates/ULicencia.php?idLicencia=<?php echo $fila[0]?>&numero=<?php echo $fila[1]?>&fechaExp=<?php echo $fila[2]?>&tipo=<?php echo $fila[3]?>&fechaVenc=<?php echo $fila[4]?>" style="color: blue;">ACTUALIZAR</a></td>
        <td><a href="../PDF/LicenciaPDF.php?idLicencia=<?php echo $fila[0]?>" style="color: green;">PDF</a></td>
        <?php } ?>
    </tr>
            <?php
            }}
            ?>
        </tbody>
    </table>
</body>
</html>