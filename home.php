
<?php
require_once "resources/controllers/Productos.php";
require_once "resources/controllers/Banner.php";
require_once "resources/controllers/Carrito.php";
if(!$_SESSION['user']){
header('Location: http://localhost/tus-globos/index.php');
}
$miObjeto = new Productos;
$tipo = $miObjeto->traer_nombre_tipo();
$catalogo = $miObjeto->traer_catalogo();
shuffle($catalogo); 
$primeros5 = array_slice($catalogo, 0, 5);
$miCarrito = new Carrito;
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "public/views/parts/head.php";
?>

<body>
<?php
    include "public/views/template/menu.php";
    ?>
<?php
    include "public/views/parts/sliderHome.php";
?>

<section class="d-flex flex-column align-items-center pt-4 pb-4">
  <h2>Son los mejores globos para tus fiestas <br> son <span>Tus Globos</span></h2>
<div id="carouselExampleFade" class="carousel slide carousel-fade">
  <div id="carouselProductoHome" class="carousel-inner">
    <?php $active = true;
    foreach ($primeros5 as  $catalogoValue) { ?>

      <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">

        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="public/views/assets/img/<?php echo $catalogoValue->imagen ?>.png" alt="Globo color <?php echo $catalogoValue->color ?>">
            <div class="card-body">
                <h3 class="card-title"><?php echo $catalogoValue->nombre ?></h3>
                <h5><?php echo $catalogoValue->tipo ?></h5>
                <p class="card-text">Bolsa por <?php echo $catalogoValue->unidadesporbolsa ?> unidades</p>
                <p class="card-text precio-card">$ <?php echo $catalogoValue->precio ?></p>  
            </div> 
              <div class="div-btn-card">
                     <a data-id="<?php echo $catalogoValue->id ?>" href="public/views/template/detalleproducto.php?id=<?= $catalogoValue->id ?>" class="btn ">Ver Más</a>
             </div>
      </div> 

    </div>

    <?php
      $active = false; 
    } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</section>

    <?php
    include "public/views/parts/footer.php";
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('#carouselExampleFade').on('slide.bs.carousel', function() {
      $('.carousel-item').removeClass('carousel-item-start');
    });
  });
</script>


</html>


