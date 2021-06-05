<?php
    session_start();
        if(isset($_SESSION['Usuario'])){
            $user= $_SESSION['Usuario'];
?>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../Styles/sMenus.css">
            <title>MENÚ</title>
            </head>
            <body>
            <div class="container">
                <h2>MENÚ DE USUARIO</h2>
                <h4>BIENVENIDO <?php echo $user ?></h4> 
            </div>
            <div class="contenedor">
                <h4>CONDUCTORES</h4>
                <a href="../Consults/CConductor.php">CONSULTAR</a>
            </div>
            <div class="contenedor">
                <h4>LICENCIAS</h4>
                <a href="../Consults/CLicencia.php">CONSULTAR</a>
            </div>
            <div class="contenedor">
                <h4>MULTAS</h4>
                <a href="../Consults/CMulta.php">CONSULTAR</a>
            </div>
            <div class="contenedor">
                <h4>PROPIETARIOS</h4>
                <a href="../Consults/CPropietario.php">CONSULTAR</a>
            </div>
            <div class="contenedor">
                <h4>TARJETAS</h4>
                <a href="../Consults/CTarjeta.php">CONSULTAR</a>
            </div>
            <div class="contenedor">
                <h4>TENENCIAS</h4>
                <a href="../Consults/CTenencia.php">CONSULTAR</a>
            </div>
            <div class="contenedor">
                <h4>VEHÍCULOS</h4>
                <a href="../Consults/CVehiculo.php">CONSULTAR</a>
            </div>
            <div class="contenedor">
                <h4>VERIFICACIONES</h4>
                <a href="../Consults/CVerificacion.php">CONSULTAR</a>
            </div>

            </body>
            </html>
<?php
        }
?>