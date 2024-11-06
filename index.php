<?php
    session_start();
    //Pregunto se ya indicaron en qué mesa están, para crear esta variable
    if(isset($_SESSION['mesa'])){
        $mesa = $_SESSION['mesa'];
    }
    //La variable ruta varía entre ser un string vacío o '../' para que el css y el js sepa dónde se encuentra dinámicamente.
    $ruta = '';
    require('php/header.php');
?>
    <div class="contenedor-modal" id="contenedor-modal">
        <div class="modal">
            <i class="fa-regular fa-circle-xmark" id="cerrar"></i>
            <h3>¿En qué mesa está sentado?</h3>
            <form action="php/config/login.php" method="post">
                <input type="number" name="mesa" id="mesa" placeholder="El número está pegado en la mesa">
                <input type="submit" value="Empezar a pedir" name="enviar">
            </form>
            <em>Recuerde que solo puede pedir si se encuentra en el local</em>
        </div>
    </div>
    <header>
        <div class="titulo">
            <img src="img/logo.png" alt="Logo de amor casero" title="Logo de amor casero">
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
    <main>
        <h1><em>La mejor comida que podrás encontrar en el planeta tierra...</em></h1>
        <div class="contenedor-cartas">
            <div class="carta mila">
                <h3>Milanesas</h3>
            </div>
            <div class="carta burga">
                <h3>Hamburguesas</h3>
            </div>
            <div class="carta pizza">
                <h3>Pizzas</h3>
            </div>
            <div class="carta plato">
                <h3>Al plato</h3>
            </div>
            <div class="carta postre">
                <h3>Postres</h3>
            </div>
            <div class="carta bebidas">
                <h3>Bebidas</h3>
            </div>
        </div>
    </main>
<?php   require ('php/footer.php'); ?>