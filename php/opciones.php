<?php
session_start();
if(isset($_SESSION['mesa'])){
    $mesa = $_SESSION['mesa'];
}
$ruta = '../';

require_once('config/conexion.php');
require('header.php');

$conexion = conectar();

$clasi = $_GET['clas'];

$query= mysqli_prepare($conexion, "SELECT * FROM carta WHERE clasificacion='$clasi'");
$exe = mysqli_stmt_execute($query);
mysqli_stmt_bind_result($query, $nombre, $precio, $clasificacion, $stock);
?>
<section class="admin precios">
    <h1><?= $clasi; ?></h1>
    <div class="productos">
    <?php
    while(mysqli_stmt_fetch($query)){
    ?>
        <div class="mostrar <?php echo ($stock == 0) ? "nostock" : "" ?>">
            <div class="datos">
                <h3><?= $nombre; ?></h3>
                <p>$<?= $precio; ?></p>
            </div>
            <a href="<?php echo ($stock > 0) ? 'config/agregar_carrito.php?prod='.$nombre.'&precio='.$precio.'' : "#"; ?>" ><div class="add">
                <i class="fa-solid fa-cart-plus"></i>
            </div></a>
        </div>
    <?php } ?>
    </div>
</section>


<?php
require('footer.php');