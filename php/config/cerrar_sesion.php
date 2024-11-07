<?php
session_start();
if(isset($_SESSION['mesa'])){
    require_once('conexion.php');
    $con=conectar();

    $mesa = $_SESSION['mesa'];

    if($mesa != 255){
        $up=mysqli_prepare($con, "UPDATE mesas SET Estado='Vacía', Pedido='Nada', Cobrar='0', Solicitud='Ninguna' WHERE Numero = '$mesa'");

        $exe=mysqli_stmt_execute($up);

        if($exe){
            ?><script>alert('Mesa libre!')</script> <?php
        }else{
            ?><script>alert('No se pudo liberar la mesa.')</script> <?php
        }
        mysqli_stmt_close($up);
        desconectar($con);
    }
    session_destroy();
    header('refresh:0.1; url=../../index.php');
}else{
    ?><script>alert('No existe ninguna sesión activa.')</script> <?php
    header('refresh:0.1; url=../../index.php');
}