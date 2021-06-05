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
                <h2>MENÚ DE ADMINISTRADOR</h2>
                <h4>BIENVENIDO <?php echo $user ?></h4> 
            </div>
            <div class="contenedor">
                <h4>CONDUCTORES</h4>
                <a href="../Forms/FConductor.html">AGREGAR</a>
                <a href="../Consults/CConductor.php">VER MÁS</a>
            </div>
            <div class="contenedor">
                <h4>LICENCIAS</h4>
                <a href="../Forms/FLicencia.html">AGREGAR</a>
                <a href="../Consults/CLicencia.php">VER MÁS</a>
            </div>
            <div class="contenedor">
                <h4>MULTAS</h4>
                <a href="../Forms/FMulta.html">AGREGAR</a>
                <a href="../Consults/CMulta.php">VER MÁS</a>
            </div>
            <div class="contenedor">
                <h4>PROPIETARIOS</h4>
                <a href="../Forms/FPropietario.html">AGREGAR</a>
                <a href="../Consults/CPropietario.php">VER MÁS</a>
            </div>
            <div class="contenedor">
                <h4>TARJETAS</h4>
                <a href="../Forms/FTarjeta.html">AGREGAR</a>
                <a href="../Consults/CTarjeta.php">VER MÁS</a>
            </div>
            <div class="contenedor">
                <h4>TENENCIAS</h4>
                <a href="../Forms/FTenencia.html">AGREGAR</a>
                <a href="../Consults/CTenencia.php">VER MÁS</a>
            </div>
            <div class="contenedor">
                <h4>VEHÍCULOS</h4>
                <a href="../Forms/FVehiculo.html">AGREGAR</a>
                <a href="../Consults/CVehiculo.php">VER MÁS</a>
            </div>
            <div class="contenedor">
                <h4>VERIFICACIONES</h4>
                <a href="../Forms/FVerificacion.html">AGREGAR</a>
                <a href="../Consults/CVerificacion.php">VER MÁS</a>
            </div>

            </body>
            </html>
<?php
        }
?>