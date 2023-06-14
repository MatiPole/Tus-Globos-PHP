
<div class="container-cards"id="resultado" >

<?php
      function compararPorColor($a, $b){
        return strcmp($a->color, $b->color);
         }
    // Ordenar el arreglo $catalogo por color
    usort($catalogo, 'compararPorColor');

                foreach ($catalogo as $catalogoValue){?>

<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="../assets/<?php echo $catalogoValue->imagen ?>" alt="Globo color <?php echo $catalogoValue->color ?>">
  <div class="card-body">
    <h3 class="card-title"><?php echo $catalogoValue->color ?></h3>
        <h5><?php echo $catalogoValue->tipo ?></h5>
    <p class="card-text">Bolsa por <?php echo $catalogoValue->unidadesPorBolsa ?> unidades</p>
        <p class="card-text precio-card">$ <?php echo $catalogoValue->precio ?></p>  </div> 
        <div class="div-btn-card">
    <a href="#" class="btn ">Agregar al carrito</a><a data-id="<?php echo $catalogoValue->id ?>" href="detalleproducto.php?id=<?= $catalogoValue->id ?>" class="btn ">Ver Más</a>
    </div>
</div> 

<?php } ?>  
</div>
