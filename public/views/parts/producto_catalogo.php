<div class="container-cards" id="resultado">
    <?php
    require_once "../../../resources/controllers/Productos.php";
        require_once "../../../resources/controllers/Conexion.php";
    $miObjeto = new Productos;
    $catalogo = $miObjeto->traer_catalogo(); // Obtener el catálogo de productos

    function compararPorColor($a, $b) {
        return strcmp($a->nombre, $b->nombre);
    }

    usort($catalogo, 'compararPorColor');
    foreach ($catalogo as $catalogoValue) {
        ?>
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="../assets/img/<?php echo $catalogoValue->imagen ?>.png" alt="Globo color <?php echo $catalogoValue->nombre ?>">
            <div class="card-body">
                <h3 class="card-title"><?php echo $catalogoValue->nombre ?></h3>
                <h5><?php echo $catalogoValue->tipo ?></h5>
                <p class="card-text">Bolsa por <?php echo $catalogoValue->unidadesporbolsa ?> unidades</p>
                <p class="card-text precio-card">$ <?php echo $catalogoValue->precio ?></p>
            </div>
            <div class="div-btn-card">
                <a  class="btn" onclick="agregarACarrito(<?php echo $catalogoValue->id ?>, <?php echo $_SESSION['user']['id']?>)">Agregar al carrito</a>
                <a data-id="<?php echo $catalogoValue->id ?>" href="detalleproducto.php?id=<?= $catalogoValue->id ?>" class="btn">Ver Más</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>

