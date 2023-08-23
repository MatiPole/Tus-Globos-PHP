<div class="container-listado-carrito" id="resultado">
    <?php
    require_once "../../../resources/controllers/Carrito.php";
    $miCarrito = new Carrito;
    $carrito = $miCarrito->traer_carrito($_SESSION['user']['id']); // Obtener el catálogo de productos
    $totalCarrito = $miCarrito->calcularTotalCarrito($_SESSION['user']['id']);


    foreach ($carrito as $carritoValue) {
        ?>
        <div class="card-listado-carrito">
            <img src="../assets/img/<?php echo $carritoValue->imagen ?>.png" alt="Globo color <?php echo $carritoValue->nombre ?>">
            <div class="card-body-carrito">
                <h3><?php echo $carritoValue->nombre ?> <?php echo $carritoValue->tipo ?></h3>
                <p >Bolsa por <?php echo $carritoValue->unidadesporbolsa ?> unidades</p>
                                
            </div>
            <div class="div-btn-card div-btn-carrito">
                 <p >$ <?php echo $carritoValue->precio ?></p>
                <p class="card-text">Cantidad: <?php echo $carritoValue->cantidad ?></p>
                <a  class="btn" onclick="agregarACarrito(<?php echo $carritoValue->producto_id ?>, <?php echo $_SESSION['user']['id']?>)">+</a>
                <a  class="btn" onclick="restarACarrito(<?php echo $carritoValue->producto_id ?>, <?php echo $_SESSION['user']['id']?>)">-</a>
            </div>
        </div>
        <?php
    }
    ?>
    <?php if ($totalCarrito > 0) { ?>
            <div class="total-carrito">
        <h5>El total es de: $<?php echo $totalCarrito ?></h5>
    </div>
        <div class="container-btn-comprar">
        <a class="btn btn-finalizar" href="finalizarCompra.php">Comprar</a>
         <button class="btn btn-finalizar" id="vaciarCarro" onclick="vaciarCarro(<?php echo $_SESSION['user']['id']?>)">Vaciar Carrito</button></div>
    <?php } else { ?>
                    <div class="total-carrito">
        <h5>EL CARRITO ESTÁ VACÍO</h5>
    </div>
        <button class="btn btn-finalizar" id="btnCarritoVacio">Comprar</button>
    <?php } ?>
</div>

<script>
    $(document).ready(function() {
        $('#btnCarritoVacio').click(function() {
           swal("El carrito esta vacío", "Debe agregar algún producto para realizar la compra", "error")
        });
    });



</script>