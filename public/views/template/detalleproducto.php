<?php
        session_start();
    include "../parts/head.php";
    require_once "../../../resources/controllers/Carrito.php";
     $miCarrito = new Carrito;
    $totalCarrito = $miCarrito->calcularTotalCarrito($_SESSION['user']['id']);

        require_once "../../../resources/controllers/Productos.php";
$productos = new Productos();
if (!isset($_SESSION['user'])) {
    // Redirigir al usuario de vuelta al index.php
    header("Location: ../../../index.php");
    exit; // Asegurarse de que el código después de la redirección no se ejecute
}
?>

</body>
<?php
    include "./menu.php";
    ?>

<?php

if (isset($_GET['id'])) {
    $resultado = $productos->traer_id_detalle($_GET['id']);

    if (empty($resultado)) {
        echo 'No se encontraron resultados.';
      } else {
        foreach ($resultado as $r) {
            echo '<div class="container-detalle"id="resultado" >
            <div class="card-detalle"">
  <img class="card-img-top" src="../assets/img/'.$r->imagen.'.png" alt="Globo color '.$r->nombre.'">
  <div class="card-body">
    <h3 class="card-title-detalle">'.$r->nombre.'</h3>
        <h5>'.$r->tipo.'</h5>
    <p class="card-text">Bolsa por '.$r->unidadesporbolsa.' unidades</p>
        <p class="card-text">'.$r->descripcion.'</p>
        <p class="card-text precio-card-detalle">$ '.$r->precio.'</p>    
        <div class="div-btn-card">
<a class="btn" onclick="agregarACarrito('.$r->id.', '.$_SESSION['user']['id'].')">Agregar al carrito</a>
    </div>
        </div>
        </div>
        </div>';
  
        }
      }

  } else {
    echo 'No se recibió ninguna información del destino.';
  }
 ?>

    <?php
    include "../parts/footer.php";
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="../assets/js/main.js"></script>

</html>


