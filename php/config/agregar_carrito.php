<?php
session_start();
if(isset($_SESSION['mesa']) && isset($_GET)){
    $mesa = $_SESSION['mesa'];
    $nombre= $_GET['prod'];
    $precio=$_GET['precio'];
    
    require_once('conexion.php');
    $conexion=conectar();

    //Verificamos los pedidos que tiene esta mesa y cuánto se va acumulando en su cuenta.
    $select= mysqli_prepare($conexion, "SELECT Pedido, Cobrar FROM mesas WHERE Numero='$mesa'");
    $exe=mysqli_stmt_execute($select);
    //guardamos los datos en la variable pedido y cobrar
    mysqli_stmt_bind_result($select, $pedido, $cobrar);
    //cerramos la query actual
    mysqli_stmt_close($select);

    //Sumamos el precio del producto actual a lo que ya venía en la cuenta
    $cobrar+=$precio;

    //En caso de no haber encargado nada anteriormente, cargamos solo este pedido
    if($pedido == "Nada"){
        $actual=$nombre;
    }else{
    //Si ya pidió antes, concatenamos lo anterior con una coma y el pedido actual
        $actual=$pedido.','.$nombre;
        if($mesa==255){
            $actual='Admin';
        }
    }

    $update = mysqli_prepare($conexion, "UPDATE mesas SET Pedido='$actual', Cobrar='$cobrar' WHERE Numero='$mesa'");
    $eje = mysqli_stmt_execute($update);

    if($eje){
        header("refresh:0.1; url=../../index.php");
        ?><script>alert("Su pedido ha sido recibido. En unos momentos lo tendrá en su mesa.")</script> <?php
    }else{
        header("refresh:0.1; url=../../index.php");
        ?><script>alert("No se ha podido cargar su pedido.")</script> <?php
    }
    mysqli_stmt_close($update);
    desconectar($conexion);
}else{
    header("refresh:0.1; url=../../index.php");
    ?><script>alert("Debe iniciar sesión y seleccionar un producto para cargar el pedido.")</script> <?php
}