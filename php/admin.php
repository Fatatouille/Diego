<?php
    session_start();
    if(isset($_SESSION['mesa']) && $_SESSION['mesa'] == 255){
        //Solo podrá acceder si al indicar mesa puso la del administrador
        $mesa = 'Admin';
        $ruta = '../';
        require('header.php');
        require_once('config/conexion.php');
        $conexion=conectar();
        
        $consulta=mysqli_prepare($conexion, "SELECT * FROM mesas WHERE Estado = 'Ocupada'");
        $exe=mysqli_stmt_execute($consulta);
        mysqli_stmt_bind_result($consulta, $numero, $estado, $pedido, $cobrar, $solicitud);
    ?>
        <section class="admin">
            <h1>Panel de control de administrador</h1>
            <div class="pedidos">
                <?php //Vamos a traer todos los pedidos de mesas ocupadas
                while(mysqli_stmt_fetch($consulta)){ ?>
                    <div class="mesa">
                        <h3>Mesa Nro: <?= $numero; ?></h3>
                        <div class="comida">
                            <?php
                            //De la base de datos obtengo un string con todo lo pedido, separado por comas
                            //Exploto ese string a partir de la coma y crea un array con todo el contenido
                            $comida = explode(',', $pedido);
                            for ($i=0; $i<sizeof($comida); $i++){
                                //Ciclo que escribirá todo según cuántas cosas pidieron
                                echo '<p>-'.$comida[$i].'</p><br>';
                            }
                            ?>
                        </div>
                        <div class="mozo <?php echo ($solicitud != "Ninguna") ? "solicitado" : "" ?>">
                            <?= 'Solicitud de mozo: '.$solicitud; ?>
                        </div>
                        <div class="cobrar">
                            <?= '$'.$cobrar ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php 
        require('footer.php');
    }else{
        header("refresh:0; url=../index.php");
    }