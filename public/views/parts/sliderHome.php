<?php
require_once "resources/controllers/Banner.php";
$miObjetoBanner = new Banner;
$banners = $miObjetoBanner->traer_banners();
?>     
    

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php $active = true;
    foreach ($banners as $bannersValue) { ?>
    <div class="carousel-item <?php echo $active ? 'active' : ''; ?>" >
      <img src="public/views/assets/<?php echo $bannersValue->imagen ?>" class="d-block w-100" alt="<?php echo $bannersValue->nombre ?>">
    </div>
    
        <?php
      $active = false; // Desactiva la clase "active" después del primer elemento
    } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>