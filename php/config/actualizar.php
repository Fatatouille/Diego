<?php
session_start();
if(isset($_POST) && isset($_SESSION['mesa']) && $_SESSION['mesa']== 255){
    require_once('conexion.php');
    $conexion=conectar();

    $nombre= $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = mysqli_prepare($conexion, "UPDATE carta SET Precio = '$precio', Stock='$stock' WHERE Nombre = '$nombre'");
    $exe= mysqli_stmt_execute($sql);
    if($exe){
        header("refresh:0.1; url=../admin.php");
        ?><script>alert("Producto actualizado correctamente")</script> <?php
    }else{
        header("refresh:0.1; url=../admin.php");
        ?><script>alert("No se pudo actualizar el producto")</script> <?php
    }
    mysqli_stmt_close($sql);
    desconectar($conexion);
}