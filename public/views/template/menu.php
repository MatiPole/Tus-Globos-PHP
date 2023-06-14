
<?php
$baseUrl = 'http://localhost/tus-globos/';
?>
  <header>
        <nav class="navbar navbar-expand-lg bg-light p-0">
            <div class="container-fluid">
                <a class="navbar-brand p-0" href="<?php echo $baseUrl.'index.php'; ?>">
                    <img src="<?php echo $baseUrl.'public/views/assets/img/logo-tus-globos.svg'?>" alt="alt-logo" class="d-inline-block align-text-center logo-nav"">             
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?> " aria-current="page" href="<?php echo $baseUrl . 'index.php'; ?>">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'catalogo.php') ? 'active' : ''; ?>" href="<?php echo $baseUrl . 'public/views/template/catalogo.php'; ?>">Productos</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'ofertas.php') ? 'active' : ''; ?>" href="<?php echo $baseUrl . 'public/views/template/ofertas.php'; ?>">Ofertas</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'contacto.php') ? 'active' : ''; ?>" href="<?php echo $baseUrl . 'public/views/template/contacto.php'; ?>">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == '#') ? 'active' : ''; ?>" href="#">Carrito</a></li>
                </ul>
                </div>
            </div>
        </nav>
    </header>

