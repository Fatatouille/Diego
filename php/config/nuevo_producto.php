<?php
session_start();
if(isset($_POST) && isset($_SESSION['mesa']) && $_SESSION['mesa']== 'Admin'){
    require_once('conexion.php');
    $conexion=conectar();

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $clasificacion = $_POST['clasificacion'];
    $stock = $_POST['stock'];

    $ins = mysqli_prepare($conexion, "INSERT INTO carta (Nombre, Precio, Clasificacion, Stock) VALUES ('$nombre', '$precio', '$clasificacion', '$stock')");

    if(mysqli_stmt_execute($ins)){
        //Si se logra insertar los datos, mostramos un mensaje y volvemos a la página del admin
        header("refresh:0.1; url=../admin.php");
        ?><script>alert("Producto cargado correctamente")</script> <?php
    }else{
        if(mysqli_errno($conexion) == 1062){
            //Esta pregunta funciona, si buscan este código de error en SQL.
            //Agilizo la consulta creando un index en los nombres para que
            //no se repitan y no tener que controlarlo con PHP ahorrando código y tiempo de ejecución
            header("refresh:0.1; url=../admin.php");
            ?><script>alert("Este producto ya existe.")</script> <?php
        }else{
            //Otra forma de que no se cree es que falle algo en la base de datos, tendrán que controlar qué
            header("refresh:0.1; url=../admin.php");
            ?><script>alert("Error en la base de datos.")</script> <?php
        }
    }
}