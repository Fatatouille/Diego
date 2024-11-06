<?php
session_start();
//Pregunto se ya indicaron en qué mesa están, para crear esta variable
if (isset($_SESSION['mesa'])) {
    $mesa = $_SESSION['mesa'];
}
//La variable ruta varía entre ser un string vacío o '../' para que el css y el js sepa dónde se encuentra dinámicamente.
$ruta = '';
require('php/header.php');
?>
<main>
    <h1><em>La mejor comida que podrás encontrar en el planeta tierra...</em></h1>
    <div class="contenedor-cartas">
        <a href="php/opciones.php?clas=Milanesa" class="carta mila">
            <div >
                <h3>Milanesas</h3>
            </div>
        </a>
        <a href="php/opciones.php?clas=Hamburguesa" class="carta burga">
            <div>
                <h3>Hamburguesas</h3>
            </div>
        </a>
        <a href="php/opciones.php?clas=Pizza" class="carta pizza">
            <div>
                <h3>Pizzas</h3>
            </div>
        </a>
        <a href="php/opciones.php?clas=Plato" class="carta plato">
            <div>
                <h3>Al plato</h3>
            </div>
        </a>
        <a href="php/opciones.php?clas=Postre" class="carta postre">
            <div>
                <h3>Postres</h3>
            </div>
        </a>
        <a href="php/opciones.php?clas=Bebida" class="carta bebidas">
            <div>
                <h3>Bebidas</h3>
            </div>
        </a>
    </div>
</main>
<?php require('php/footer.php'); ?>