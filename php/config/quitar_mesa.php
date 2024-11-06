<?php
session_start();
if(isset($_SESSION['mesa']) && $_SESSION['mesa']== 255){
    require_once('conexion.php');
    $conexion=conectar();

    $mesa=$_GET['mesa'];

    //Al "quitar" una mesa, lo que hacemos realmente es actualizarla como si estuviera vacía, así no figure en la tabla
    $up=mysqli_prepare($conexion, "UPDATE mesas SET Estado='Vacía', Pedido='Nada', Cobrar='0', Solicitud='Ninguna' WHERE Numero = '$mesa'");
    $exe=mysqli_stmt_execute($up);

    if($exe){
        header("refresh:0.1; url=../admin.php");
        ?><script>alert("La mesa se vació correctamente")</script> <?php
    }else{
        header("refresh:0.1; url=../admin.php");
        ?><script>alert("No se pudo vaciar la mesa")</script> <?php
    }
    mysqli_stmt_close($up);
    desconectar($conexion);
}else{
    header("refresh:0; url=../admin.php");
}