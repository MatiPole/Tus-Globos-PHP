
<?php
require_once "../../../resources/controllers/Productos.php";
require_once "../../../resources/controllers/Carrito.php";
$miObjeto = new Productos;
$ofertas = $miObjeto->traer_ofertas();
$miCarrito = new Carrito;
    session_start();
    if (!isset($_SESSION['user'])) {
    // Redirigir al usuario de vuelta al index.php
    header("Location: ../../../index.php");
    exit; // Asegurarse de que el código después de la redirección no se ejecute
}
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
    <img class="card-img-top" src="../assets/img/<?php echo $ofertasValue->imagen ?>.png" alt="Globo color <?php echo $ofertasValue->nombre ?>">
    <div class="card-body">
        <h3 class="card-title"><?php echo $ofertasValue->nombre ?></h3>
            <h5><?php echo $ofertasValue->tipo ?></h5>
        <p class="card-text">Bolsa por <?php echo $ofertasValue->unidadesporbolsa ?> unidades</p>
            <p class="card-text precio-card">$ <?php echo $ofertasValue->precio ?></p>  </div> 
        <div class="div-btn-card">
     <a  class="btn" onclick="agregarACarrito(<?php echo $ofertasValue->id ?>, <?php echo $_SESSION['user']['id']?>)">Agregar al carrito</a><a data-id="<?php echo $ofertasValue->id ?>" href="detalleproducto.php?id=<?= $ofertasValue->id ?>" class="btn ">Ver Más</a>
    </div>
</div> 

<?php } ?>     
            </div>


    
    <?php
    include "../parts/footer.php";
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script>

function agregarACarrito(producto_id, user_id) {
  $.ajax({
    type: "POST",
    url: "../../funciones/agregar_a_carrito.php",
    data: {
      productoId: producto_id,
      userId: user_id,
    },
    success: function (result) {
      // Actualizar el catálogo después de agregar al carrito
      console.log("success");
      console.log(result);

      swal({
        title: "Agregado al carrito!",
        text: null,
        icon: "success",
        button: null,
      });

      // Cerrar el SweetAlert después de 1 segundo
      setTimeout(function () {
        swal.close();
        location.reload();
      }, 1000);
    },
    error: function (xhr, status, error) {
      console.log("error");
      console.error(error);
    },
  });
}


</script>

</html>


