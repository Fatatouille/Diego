<?php
session_start();
if(isset($_SESSION['mesa'])){
    session_destroy();
    header('refresh:0.1; url=../../index.php');
}else{
    ?><script>alert('No existe ninguna sesión activa.')</script> <?php
    header('refresh:0.1; url=../../index.php');
}