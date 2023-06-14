<?php
require_once "../../resources/controllers/Productos.php";
$productos = new Productos();

if (isset($_POST['tipo'])) {
    $resultado = $productos->traer_tipo($_POST['tipo']);

    if (empty($resultado)) {
        echo 'No se encontraron resultados.';
      } else {
        foreach ($resultado as $r) {
            echo '<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="../../views/assets/'.$r->imagen.'" alt="Globo color '.$r->color.'">
  <div class="card-body">
    <h3 class="card-title">'.$r->color.'</h3>
        <h5>'.$r->tipo.'</h5>
    <p class="card-text">Bolsa por '.$r->unidadesPorBolsa.' unidades</p>
        <p class="card-text precio-card">$ '.$r->precio.'</p>    </div>
        <div class="div-btn-card">
    <a href="#" class="btn ">Agregar al carrito</a><a data-id="'.$r->id.'" href="detalleproducto.php?id='.$r->id.'" class="btn ">Ver Más</a>
    </div>
        </div>';
  
        }
      }

  } else {
    echo 'No se recibió ninguna información del destino.';
  }

?>
