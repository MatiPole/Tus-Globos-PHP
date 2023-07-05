
<?php
require_once "../../../resources/controllers/Carrito.php";
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
            <img src="../assets/img/banner1.png" alt="Banner principal">
        </div>

    </section>
    <section class="section-listado-carrito">
<?php
    include "../parts/listado_carrito.php";
    ?>
    </section>


    
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
      location.reload();
    },
    error: function (xhr, status, error) {
      console.log("error");
      console.error(error);
    },
  });
}
</script>
<script>
    function restarACarrito(producto_id, user_id) {
        $.ajax({
            type: "POST",
            url: "../../funciones/restar_de_carrito.php",
            data: {
                productoId: producto_id,
                userId: user_id,
            },
            success: function(result) {
                       location.reload();
                console.error('restado');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>
</html>


