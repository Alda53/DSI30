<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/sTablas.css">
    <title>Datos de vehículos</title>
</head>
<body>
    <h1>TABLA DE VEHÍCULOS</h1>
    <form method="POST">
        <input class="control" type="text" placeholder="Insterte criterio a buscar" name="Criterio">
        <select name="Atributo" id="Atributo">
            <option value="0">Selecciona una opción</option>
            <option value="idVehiculo">ID Vehículo</option>
            <option value="claveVehicular">Clave</option>
            <option value="marca">Marca</option>
            <option value="modelo">Modelo</option>
            <option value="color">Color</option>
            <option value="numMotor">Número de motor</option>
            <option value="numSerie">Número de serie</option>
            <option value="transmicion">Transmición</option>
            <option value="numCilindro">Número de cilindros</option>
            <option value="origen">Origen</option>
            <option value="linea">Línea</option>
            <option value="sublinea">Sublínea</option>
            <option value="numPuerta">Número de puertas</option>
            <option value="tipo">Tipo</option>
            <option value="clase">Clase</option>
            <option value="combustible">Combustible</option>
            <option value="numPlaca">Placa</option>
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
            $sql="SELECT * FROM vehiculo WHERE $Atributo LIKE '%$Criterio%'";
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
                <th>ID Vehículo</th>
                <th>Clave</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Número de motor</th>
                <th>Número de serie</th>
                <th>Transmición</th>
                <th>Número de cilindros</th>
                <th>Origen</th>
                <th>Línea</th>
                <th>Sublínea</th>
                <th>Número de puertas</th>
                <th>Tipo</th>
                <th>Clase</th>
                <th>Combustible</th>
                <th>Placa</th>
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
        <td><?php echo $fila[13]?></td>
        <td><?php echo $fila[14]?></td>
        <td><?php echo $fila[15]?></td>
        <td><?php echo $fila[16]?></td>
        <?php if($filaXD[2]=="A"){ ?>
        <td><a href="../Deletes/DVehiculo.php?idVehiculo=<?php echo $fila[0]?>" style="color: red;">ELIMINAR</a></td>
        <td><a href="../Updates/UVehiculo.php?idVehiculo=<?php echo $fila[0]?>&claveVehicular=<?php echo $fila[1]?>&marca=<?php echo $fila[2]?>&modelo=<?php echo $fila[3]?>&color=<?php echo $fila[4]?>&numMotor=<?php echo $fila[5]?>&numSerie=<?php echo $fila[6]?>&transmicion=<?php echo $fila[7]?>&numCilindro=<?php echo $fila[8]?>&origen=<?php echo $fila[9]?>&linea=<?php echo $fila[10]?>&sublinea=<?php echo $fila[11]?>&numPuerta=<?php echo $fila[12]?>&tipo=<?php echo $fila[13]?>&clase=<?php echo $fila[14]?>&combustible=<?php echo $fila[15]?>&numPlaca=<?php echo $fila[16]?>" style="color: blue;">ACTUALIZAR</a></td>
        <?php } ?>
    </tr>
            <?php
            }}
            ?>
        </tbody>
    </table>
</body>
</html>