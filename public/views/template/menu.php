
<?php
$baseUrl = 'http://localhost/tus-globos/';
    $miCarrito = new Carrito;
    $cantidadCarrito = $miCarrito->calcularCantidadCarrito($_SESSION['user']['id']);

?>
  <header>
        <nav class="navbar navbar-expand-lg bg-light p-0">
            <div class="container-fluid">
                <a class="navbar-brand p-0" href="<?php echo $baseUrl.'home.php'; ?>">
                    <img src="<?php echo $baseUrl.'public/views/assets/img/logo-tus-globos.svg'?>" alt="alt-logo" class="d-inline-block align-text-center logo-nav"">             
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                                    <h3 class="nav-item">¡Hola <?php echo($_SESSION['user']['nombre'])?>!</h3>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?> " aria-current="page" href="<?php echo $baseUrl . 'index.php'; ?>">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'catalogo.php') ? 'active' : ''; ?>" href="<?php echo $baseUrl . 'public/views/template/catalogo.php'; ?>">Productos</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'ofertas.php') ? 'active' : ''; ?>" href="<?php echo $baseUrl . 'public/views/template/ofertas.php'; ?>">Ofertas</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'contacto.php') ? 'active' : ''; ?>" href="<?php echo $baseUrl . 'public/views/template/contacto.php'; ?>">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $baseUrl . 'includes-login/logout.php'; ?>">Logout</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'carrito.php') ? 'active' : ''; ?>" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><img class="logo-carrito" src="<?php echo $baseUrl.'public/views/assets/img/logo-carrito.png'?>" alt="alt-logo" class="d-inline-block align-text-center logo-nav""> <?php echo  $cantidadCarrito ?></a></li>

                </ul>
                </div>
            </div>
        </nav>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Carrito</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
<div class="container-listado-carrito" >
    <?php
/*     require_once "../../../resources/controllers/Carrito.php"; */
    $miCarrito = new Carrito;
    $carrito = $miCarrito->traer_carrito($_SESSION['user']['id']); // Obtener el catálogo de productos
    $totalCarrito = $miCarrito->calcularTotalCarrito($_SESSION['user']['id']);


    foreach ($carrito as $carritoValue) {
        ?>
        <div class="card-listado-carrito">
            <img src="<?php echo $baseUrl.'public/views/assets/img/'.$carritoValue->imagen ?>.png" alt="Globo color <?php echo $carritoValue->nombre ?>">
            <div class="card-body-carrito">
                <h3><?php echo $carritoValue->nombre ?> <?php echo $carritoValue->tipo ?></h3>         
            </div>
            <div class="div-btn-card div-btn-carrito">
                 <p >$ <?php echo $carritoValue->precio ?></p>
                <p class="card-text">Cantidad: <?php echo $carritoValue->cantidad ?></p>
            </div>
        </div>
        <?php
    }
    ?>
 <?php if ($totalCarrito > 0) { ?>
            <div class="total-carrito">
        <h5>El total es de: $<?php echo $totalCarrito ?></h5>
    </div>
    </div>
          <a class="btn btn-primary"  role="button"  href="<?php echo $baseUrl.'public/views/template/carrito.php'; ?>">
 Ver Carrito Completo
</a>
 <?php } else { ?>
     <div class="total-carrito">
        <h5>EL CARRITO ESTÁ VACÍO</h5>
    </div>
    <?php } ?>

  </div>
</div>
    </header>


<script>$(document).ready(function() {
    
    $(".nav-link").click(function() {
        sessionStorage.clear()
    });
});
</script>

 