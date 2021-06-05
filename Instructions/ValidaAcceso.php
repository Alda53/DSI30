<?php
include('IFunConnect.php');
//Recibir variables 
$FUsuario=$_POST['Usuario'];
$FPassword=$_POST['password'];
session_start();
//Verificamos los datos en la tabla
$con=conectar();
$sql="SELECT * FROM usuario WHERE userName='$FUsuario'";
$r=ejecutar($con,$sql);
$existe= mysqli_num_rows($r);


if($existe==1){
    $fila=mysqli_fetch_row($r);
    if($FPassword==$fila[1]){
        //
        if($fila[5]==1){
            //VERIFICAMOS BLOQUEO
            if($fila[3]==0){
                //BANDERA
                $_SESSION["Usuario"]=$FUsuario;
                $sql2 = "UPDATE usuario SET intentos = 0 WHERE userName = '$FUsuario';";
                ejecutar($con, $sql2);
                if($fila[2]=="A"){
                    //print('<a href="MenuAdmin.php"> ADMINISTRADOR </a>');
                    header('Location: ../Menus/MenuAdmin.php');
                }else{
                    //print('<a href="MenuUser.php"> USUARIO </a>');
                    header('Location: ../Menus/MenuUser.php');
                }
            }else{
                print("Usuario bloqueado");
            }
        }else{
            print("Estado inactivo");
        }
    }else{
        if($fila[4]== 2){
            $sql2 = "UPDATE usuario SET bloqueado = 1 WHERE userName = '$FUsuario';";
            ejecutar($con, $sql2);
            print("Usuario bloqueado, contacte algún administrador");
        } else{
            $sql2 = "UPDATE usuario SET intentos = intentos +1 WHERE userName = '$FUsuario';";
            ejecutar($con, $sql2);
            print("Usuario y/o contraseña incorrecta");
        }
    }
}else{
    print("El usuario no existe");
}
cerrar($con);
?>