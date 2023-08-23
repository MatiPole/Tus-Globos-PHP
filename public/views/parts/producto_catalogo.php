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

        ?>

        <?php
if (isset($_GET['tipo'])) {

     $catalogofiltro = $miObjeto->traer_tipo($_GET['tipo']);
       foreach ($catalogofiltro as $catalogoValue) {
        echo
     '<div class="card" style="width: 20rem;">
            <img class="card-img-top" src="../assets/img/'. $catalogoValue->imagen.'.png" alt="Globo color'. $catalogoValue->nombre .'">
            <div class="card-body">
                <h3 class="card-title">'.$catalogoValue->nombre .'</h3>
                <h5>'. $catalogoValue->tipo.'</h5>
                <p class="card-text">Bolsa por '. $catalogoValue->unidadesporbolsa.' unidades</p>
                <p class="card-text precio-card">$ '. $catalogoValue->precio.'</p>
            </div>
            <div class="div-btn-card">
                <a  class="btn" onclick="agregarACarrito('. $catalogoValue->id.', '.$_SESSION['user']['id'].')">Agregar al carrito</a>
                <a data-id="'. $catalogoValue->id.'" href="detalleproducto.php?id='.$catalogoValue->id.'" class="btn">Ver Más</a>
            </div>
        </div>';
      }
    }
   else if (!isset($_GET['tipo'])) {       
    foreach ($catalogo as $catalogoValue) {
        echo
     '<div class="card" style="width: 20rem;">
            <img class="card-img-top" src="../assets/img/'. $catalogoValue->imagen.'.png" alt="Globo color'. $catalogoValue->nombre .'">
            <div class="card-body">
                <h3 class="card-title">'.$catalogoValue->nombre .'</h3>
                <h5>'. $catalogoValue->tipo.'</h5>
                <p class="card-text">Bolsa por '. $catalogoValue->unidadesporbolsa.' unidades</p>
                <p class="card-text precio-card">$ '. $catalogoValue->precio.'</p>
            </div>
            <div class="div-btn-card">
                <a  class="btn" onclick="agregarACarrito('. $catalogoValue->id.', '.$_SESSION['user']['id'].')">Agregar al carrito</a>
                <a data-id="'. $catalogoValue->id.'" href="detalleproducto.php?id='.$catalogoValue->id.'" class="btn">Ver Más</a>
            </div>
        </div>';
      }
   
  } else{
echo 'No se recibió ninguna información del destino.';
  }

?>
        
</div>

