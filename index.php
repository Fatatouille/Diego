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