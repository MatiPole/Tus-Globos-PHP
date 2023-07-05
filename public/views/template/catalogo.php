
<?php
require_once "../../../resources/controllers/Productos.php";
require_once "../../../resources/controllers/Carrito.php";
    session_start();
$miObjeto = new Productos;
$tipo = $miObjeto->traer_nombre_tipo();
$catalogo = $miObjeto->traer_catalogo();

// Verificar si el usuario no está logueado
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
    <section class="container mt-4">
        <div class="row ">
            <div class="col d-flex justify-content-center div-btn-filtros"> 
                    <a class="btn btn-filtros" href="./catalogo.php" role="button">Todos</a>
                    <?php foreach ($tipo as $tipos) { ?>
                    <button class="btn-filtros"  onclick="event.preventDefault(); filtrarTipo(this.id)" id="<?= $tipos ?>" value=<?= $tipos ?>><?= $tipos ?></button>
                    <?php }?>
            </div>
        </div>
    </section>

<?php
    include "../parts/producto_catalogo.php";
    ?>
            </div>
         </div>
    
    <?php
    include "../parts/footer.php";
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="../assets/js/main.js"></script>

</html>


