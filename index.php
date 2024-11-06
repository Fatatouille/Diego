<?php
    require('php/header.php');
?>
    <div class="contenedor-modal" id="contenedor-modal">
        <div class="modal">
            <i class="fa-regular fa-circle-xmark" id="cerrar"></i>
            <h3>¿En qué mesa está sentado?</h3>
            <form action="" method="post">
                <input type="number" name="mesa" id="mesa" placeholder="El número está pegado en la mesa">
                <input type="submit" value="Empezar a pedir">
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
                <li>Contactanos</li>
                <li id="modal-log">Haz tu pedido</li>
            </ul>
        </nav>
    </header>
    <main>
        <h1><em>La mejor comida que podrás encontrar en el planeta tierra...</em></h1>
        <div class="contenedor-cartas">
            <div class="carta">
                <h3>Milanesas</h3>
            </div>
            <div class="carta">
                <h3>Milanesas</h3>
            </div>
            <div class="carta">
                <h3>Milanesas</h3>
            </div>
            <div class="carta">
                <h3>Milanesas</h3>
            </div>
            <div class="carta">
                <h3>Milanesas</h3>
            </div>
            <div class="carta">
                <h3>Milanesas</h3>
            </div>
        </div>
    </main>
<?php   require ('php/footer.php'); ?>