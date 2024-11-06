<?php
//En otros archivos de código verán por qué se hace una función para conectar y otra para desconectar.
function conectar(){
    
    //Mensaje base a la hora de obtener un error
    set_error_handler(function(){ throw new Exception("Error"); });

    //try, como es su traducción, intenta lo que hay entre llaves
    try
    {
        /*Al intentar crear una conexión, se necesita enviar como parámetros:
        el servidor en que se encuentra, el nombre de usuario, la contraseña y la base de datos a usar.
        De base, estos son los parámetros que viene.
        Si lo configuraron de otra forma, cambien los datos del usuario y la contraseña.*/

        $conexion = mysqli_connect('localhost', 'root', '', 'restaurante');

    } //En caso de tener un error cualquiera, entra a la parte de catch
    catch(Exception $e){
        $conexion=false;
        echo "<h1>Ha ocurrido un error al intentar conectar con la base de datos</h1>";
    }

    return $conexion;
}

function desconectar($conexion){
    if($conexion)
    {
        mysqli_close($conexion);
    }else{
        echo '<h1>No existe ninguna conexión abierta</h1>';
    }
}