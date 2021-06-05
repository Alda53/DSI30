<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/sTablas.css">
    <title>Datos de multas</title>
</head>
<body>
    <h1>TABLA DE MULTAS</h1>
    <form method="POST">
        <input class="control" type="text" placeholder="Insterte criterio a buscar" name="Criterio">
        <select name="Atributo" id="Atributo">
            <option value="0">Selecciona una opción</option>
            <option value="idMulta">ID</option>
            <option value="agenteTransito">Agente de tránsito</option>
            <option value="garantia">Garantía</option>
            <option value="horaFecha">Hora y Fecha</option>
            <option value="lugar">Lugar</option>
            <option value="motivo">Motivo</option>
            <option value="fechaPago">Fecha de pago</option>
            <option value="fundamento">Fundamento</option>
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
            $sql="SELECT * FROM multa WHERE $Atributo LIKE '%$Criterio%'";
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
                <th>ID Multa</th>
                <th>Agente de tránsito</th>
                <th>Garantía</th>
                <th>Hora y fecha</th>
                <th>Lugar</th>
                <th>Motivo</th>
                <th>Fecha de pago</th>
                <th>Fundamento</th>
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
        <?php if($filaXD[2]=="A"){ ?>
        <td><a href="../Deletes/DMulta.php?idMulta=<?php echo $fila[0]?>" style="color: red;">ELIMINAR</a></td>
        <td><a href="../Updates/UMulta.php?idMulta=<?php echo $fila[0]?>&agenteTransito=<?php echo $fila[1]?>&garantia=<?php echo $fila[2]?>&horaFecha=<?php echo $fila[3]?>&lugar=<?php echo $fila[4]?>&motivo=<?php echo $fila[5]?>&fechaPago=<?php echo $fila[6]?>&fundamento=<?php echo $fila[7]?>" style="color: blue;">ACTUALIZAR</a></td>
        <?php } ?>
    </tr>
            <?php
            }}
            ?>
        </tbody>
    </table>
</body>
</html>