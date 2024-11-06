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
    <script src="https://kit.fontawesome.com/17cb6f1d17.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor-modal" id="contenedor-modal">
        <div class="modal <?php echo ($mesa == 'Admin') ? "modmin" : ""; ?>">
            <i class="fa-regular fa-circle-xmark" id="cerrar"></i>
            <?php if (!isset($mesa)){ //Se mostrará cuando no haya elegido mesa ?>
            <h3>¿En qué mesa está sentado?</h3>
            <form action="php/config/login.php" method="post">
                <input type="number" name="mesa" id="mesa" placeholder="El número está pegado en la mesa">
                <input type="submit" value="Empezar a pedir" name="enviar">
            </form>
            <em>Recuerde que solo puede pedir si se encuentra en el local</em>
            <?php } else { //verifica si es administrador o no
                if ($mesa=='Admin') {?>
                    <h2>Administrador</h2>
                    <form action="config/nuevo_producto.php" method="post">
                        <h3>Cargar nuevo producto</h3>

                        <label for="nombre">Nombre del producto</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Comida rica">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" id="precio" placeholder="$0.00">
                        <label for="clasificacion">Clasificacion</label>
                        <select name="clasificacion" id="clasificacion">
                            <option value="Milanesa">Milanesa</option>
                            <option value="Hamburguesa">Hamburguesa</option>
                            <option value="Pizza">Pizza</option>
                            <option value="Plato">Al plato</option>
                            <option value="Postre">Postre</option>
                            <option value="Bebida">Bebida</option>
                        </select>
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" placeholder="100">
                        <input type="submit" value="Cargar">
                    </form>
                    <div class="stock">
                        <h3>Actualizar stock</h3>
                        <form action="config/actualizar.php" method="post">
                            <label for="prod">Producto a actualizar</label>
                            <input type="text" name="nombre" id="prod">
                            <label for="st">Stock</label>
                            <input type="number" name="stock" id="prod">
                            <input type="submit" value="Actualizar">
                        </form>
                    </div>
            <?php }else{

                }
            } ?>
        </div>
    </div>
    <header>
        <div class="titulo">
            <img src="<?= $ruta; ?>img/logo.png" alt="Logo de amor casero" title="Logo de amor casero">
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