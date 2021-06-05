<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/sTablas.css">
    <title>Datos de propietarios</title>
</head>
<body>
    <h1>TABLA DE PROPIETARIOS</h1>
    <form method="POST">
        <input class="control" type="text" placeholder="Insterte criterio a buscar" name="Criterio">
        <select name="Atributo" id="Atributo">
            <option value="0">Selecciona una opción</option>
            <option value="idPropietario">ID</option>
            <option value="nombre">Nombre(s)</option>
            <option value="apellidoPaterno">Apellido Paterno</option>
            <option value="apellidoMaterno">Apellido Materno</option>
            <option value="localidad">Localidad</option>
            <option value="municipio">Municipio</option>
            <option value="RFC">RFC</option>
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
            $sql="SELECT * FROM propietario WHERE $Atributo LIKE '%$Criterio%'";
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
                <th>ID Propietario</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Localidad</th>
                <th>Municipio</th>
                <th>RFC</th>
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
        <?php if($filaXD[2]=="A"){ ?>
        <td><a href="../Deletes/DPropietario.php?idPropietario=<?php echo $fila[0]?>" style="color: red;">ELIMINAR</a></td>
        <td><a href="../Updates/UPropietario.php?idPropietario=<?php echo $fila[0]?>&nombrePropietario=<?php echo $fila[1]?>&apellidoPaterno=<?php echo $fila[2]?>&apellidoMaterno=<?php echo $fila[3]?>&localidad=<?php echo $fila[4]?>&municipio=<?php echo $fila[5]?>&RFC=<?php echo $fila[6]?>" style="color: blue;">ACTUALIZAR</a></td>
        <?php } ?>
    </tr>
            <?php
            }}
            ?>
        </tbody>
    </table>
</body>
</html>