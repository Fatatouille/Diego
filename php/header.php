<!DOCTYPE html>
<html lang="es-la">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amor casero</title>
    <link rel="icon" href="<?= $ruta; ?>img/logo.ico">
    <link rel="stylesheet" href="<?= $ruta; ?>css/main.css">
    <link rel="stylesheet" href="<?= $ruta; ?>css/cartas.css">
    <link rel="stylesheet" href="<?= $ruta; ?>css/modal.css">
    <link rel="stylesheet" href="<?= $ruta; ?>css/admin.css">
    <link rel="stylesheet" href="<?= $ruta; ?>css/precios.css">
    <script src="https://kit.fontawesome.com/17cb6f1d17.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor-modal" id="contenedor-modal">
        <div class="modal <?php if(isset($_SESSION['mesa'])) { 
            if($mesa==255){
                echo "modmin";
            }else{
                echo "usuario";
            }
         }else{
            echo "";
         } ?>">
            <i class="fa-regular fa-circle-xmark" id="cerrar"></i>
            <?php
            if(isset($_SESSION['mesa'])){
                ?> <a href="<?= $ruta; ?>php/config/cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket" alt="Cerrar sesion" title="Cerrar Sesion"></i></a>
            <?php } 
            if (!isset($mesa)){ //Se mostrará cuando no haya elegido mesa ?>
            <h3>¿En qué mesa está sentado?</h3>
            <form action="<?= $ruta; ?>php/config/login.php" method="post">
                <input type="number" name="mesa" id="mesa" placeholder="El número está pegado en la mesa">
                <input type="submit" value="Empezar a pedir" name="enviar">
            </form>
            <em>Recuerde que solo puede pedir si se encuentra en el local</em>
            <?php } else { //verifica si es administrador o no
                if ($mesa==255) {?>
                    <a href="<?= $ruta; ?>php/admin.php"><h2>Administrador</h2></a>
                    <form action="<?= $ruta; ?>php/config/nuevo_producto.php" method="post">
                        <h3>Cargar nuevo producto</h3>

                        <label for="nombre">Nombre del producto</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Comida rica" required>
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" id="precio" placeholder="$0.00" required>
                        <label for="clasificacion">Clasificacion</label>
                        <select name="clasificacion" id="clasificacion" required>
                            <option value="Milanesa">Milanesa</option>
                            <option value="Hamburguesa">Hamburguesa</option>
                            <option value="Pizza">Pizza</option>
                            <option value="Plato">Al plato</option>
                            <option value="Postre">Postre</option>
                            <option value="Bebida">Bebida</option>
                        </select>
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" placeholder="100" required>
                        <input type="submit" value="Cargar">
                    </form>
                    <div class="stock">
                        <h3>Actualizar stock</h3>
                        <form action="config/actualizar.php" method="post">
                            <label for="prod">Producto a actualizar</label>
                            <input type="text" name="nombre" id="prod" required>
                            <label for="pre">Precio</label>
                            <input type="number" name="precio" id="pre" required>
                            <label for="st">Stock</label>
                            <input type="number" name="stock" id="st" required>
                            <input type="submit" value="Actualizar">
                        </form>
                    </div>
            <?php }else{
                    require_once($ruta.'php/config/conexion.php');
                    $conexion=conectar();

                    $consulta=mysqli_prepare($conexion, "SELECT * FROM mesas WHERE Numero = '$mesa'");
                    $exe=mysqli_stmt_execute($consulta);
                    mysqli_stmt_bind_result($consulta, $numero, $estado, $pedido, $cobrar, $solicitud);
                    while (mysqli_stmt_fetch($consulta)){

                    
                ?> 
                        <h3>Mesa Nro: <?= $mesa; ?></h3>
                        <div class="comida usuario">
                            <?php
                            //Funciona de la misma forma que funcionan los pedidos en admin, fijarse comentarios ahí
                            if($pedido!="Nada"){

                                $comida = explode(',', $pedido);
                                for ($i=0; $i<sizeof($comida); $i++){
                                    if($comida[$i]!=''){
                                        echo '<p>-'.$comida[$i].'</p><br>';
                                    }
                                }
                            }else{
                                echo '<p>Aún no ha pedido nada.</p>';
                            }
                            ?>
                        </div>
                            <div class="mozo <?php echo ($solicitud != "Ninguna") ? "solicitado" : "" ?>">
                            <?= 'Solicitud de mozo: '.$solicitud; ?>
                            </div>
                            <div class="cobrar">
                                <?= '$'.$cobrar ?>
                            </div>
                            <form action="$ruta.'php/config/solicitar_mozo.php" method="get">
                                <select name="mozo" id="mozo">
                                    <option value="Cobrar">Cobrar</option>
                                    <option value="Solicitado">Llamar a mesa</option>
                                </select>
                                <input type="submit" value="Llamar Mozo">
                            </form> 
                <?php 
                    }
                }
            } ?>
        </div>
    </div>
    <header>
        <div class="titulo">
            <a href="<?= $ruta; ?>index.php"><img src="<?= $ruta; ?>img/logo.png" alt="Logo de amor casero" title="Logo de amor casero"></a>
            <div>
                <h1>RESTOBAR</h1>
                <h3>"Amor Casero"</h3>
            </div>
        </div>
        <nav>
            <ul>
                <li>Sobre nosotros</li>
                <!--Uso un operador ternario para saber qué mensaje mostrar en el header -->
                <li id="modal-log"><?php echo (isset($mesa)) ? "Cuenta (Mesa $mesa)" : "Empieza a pedir"; ?></li>
            </ul>
        </nav>
    </header>