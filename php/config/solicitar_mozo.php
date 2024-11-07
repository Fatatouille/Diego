<?php
session_start();
if(isset($_GET) && isset($_SESSION['mesa'])){
    require_once('conexion.php');
    $con=conectar();
    
    $mesa=$_GET['mesa'];
    $solicitud=$_GET['mozo'];

    $query=mysqli_prepare($con, "UPDATE mesas SET Solicitud='$solicitud' WHERE Numero='$mesa'");
    $exe=mysqli_stmt_execute($query);

    if($exe){
        header("Refresh:0; url=../../index.php");
        ?> <script>alert('Un mozo llegará pronto a su mesa')</script> <?php
    }else{
        header("Refresh:0; url=../../index.php");
        ?> <script>alert('Hubo un error al llamar al mozo.')</script> <?php
    }
}
header("Refresh:0; url=../../index.php");