<?php
    //para evitar entradas a partir del link nada más
    if(!empty($_POST['mesa']) && isset($_POST['enviar']))
    {
        require_once 'conexion.php';
        //Creo la conexion a la base de datos
        $conexion=conectar();
        //Si se pudo, entra al if
        if($conexion){
            //Gurado en una variable el número de mesa enviado por el usuario
            $mesa=$_POST['mesa'];

            //Genero una consulta enviando la base de datos que conecté
            //Y le pido solo numero a las mesas que no están ocupadas
            $query=mysqli_prepare($conexion, "SELECT Numero FROM mesas WHERE Estado <> 'Ocupada'");
            //Ejecuto la consulta
            $exe = mysqli_stmt_execute($query);
            //guardo el numero obtenido de cada mesa en una variable
            mysqli_stmt_bind_result($query, $numero);
            //Le digo que revise cada mesa que obtuve
            while(mysqli_stmt_fetch($query))
            {
                if($numero == $mesa)
                {
                    if($numero == 255){
                        session_start();
                        $_SESSION['mesa'] = $numero;
                        header("refresh:0; url=../admin.php");
                        exit();
                    }
                    //Creo la sesión con la mesa en la que está sentado el usuario
                    session_start();
                    $_SESSION['mesa'] = $numero;

                    //Cierro la consulta de SELECT para darle paso al UPDATE
                    mysqli_stmt_close($query);
                    //Actualizo la base de datos poniendo como ocupada la mesa actual.
                    $actu= mysqli_prepare($conexion, "UPDATE mesas SET Estado='Ocupada' WHERE Numero=?");
                    mysqli_stmt_bind_param($actu, "i", $numero);
                    $eje=mysqli_stmt_execute($actu);

                    mysqli_stmt_close($actu);
                    //redirecciono al index
                    header("refresh:0; url=../../index.php");
                    //Si se encuentra mesa, fin del codigo
                    exit();
                }
            }
            //Si no se encuentra mesa, sucede esto.
            header("refresh:0.1; url=../../index.php");
            ?><script>alert("Lo sentimos, la mesa indicada se encuentra ocupada. Si se trata de un error, comuniquelo a un empleado.")</script> <?php
        }
        desconectar($conexion);
    }