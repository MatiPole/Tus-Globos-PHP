
<?php
require_once "../../../resources/controllers/Productos.php";

$miObjeto = new Productos;
$ofertas = $miObjeto->traer_ofertas();
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "../parts/head.php";
?>
<body>
<?php
    include "./menu.php";
    ?>
    <section>
        <div class="imagen-banner">
            <img src="../assets/img/banner2.png" alt="Banner principal">
        </div>

    </section>
    
        <div class="container-cards">

<?php foreach ($ofertas as $ofertasValue){?>

<div class="card" style="width: 20rem;">
    <img class="card-img-top" src="../assets/<?php echo $ofertasValue->imagen ?>" alt="Globo color <?php echo $ofertasValue->color ?>">
    <div class="card-body">
        <h3 class="card-title"><?php echo $ofertasValue->color ?></h3>
            <h5><?php echo $ofertasValue->tipo ?></h5>
        <p class="card-text">Bolsa por <?php echo $ofertasValue->unidadesPorBolsa ?> unidades</p>
            <p class="card-text precio-card">$ <?php echo $ofertasValue->precio ?></p>  </div> 
        <div class="div-btn-card">
    <a href="#" class="btn ">Agregar al carrito</a><a data-id="<?php echo $ofertasValue->id ?>" href="detalleproducto.php?id=<?= $ofertasValue->id ?>" class="btn ">Ver Más</a>
    </div>
</div> 

<?php } ?>     
            </div>


    
    <?php
    include "../parts/footer.php";
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>


