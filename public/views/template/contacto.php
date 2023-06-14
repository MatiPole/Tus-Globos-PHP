
<!DOCTYPE html>
<html lang="en">

<?php
    include "../parts/head.php";
?>

<body>
<?php
    include "./menu.php";
    ?>
    <div >
        <img class="imagen-banner-contacto" src="../assets/img/bannercontacto.png" alt="Banner Contacto" />
        <div class="titulo-contacto"><h1>¡Contactanos!</h1></div>
    </div>
    <main class="container mt-5 pb-5">
        <div class="row">
            <div class="col">
                <form action="log.php" method="GET">
                    <div class="input-group mb-3">
                        <label for="nombre" class="input-group-text">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="apellido" class="input-group-text">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="email" class="input-group-text">Correo electrónico:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="direccion" class="input-group-text">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" required>
                    </div>
                    <div class="mb-3">
                    <label for="mensaje" class="input-group-text label-textarea">Deja tu mensaje:</label>
                    <textarea class="form-control" name="mensaje" id="mensaje-contacto" rows="3"></textarea>
                    </div>
                    <input type="submit" value="Enviar" class="btn-enviar">
                </form>
            </div>
        </div>
    </main>

    <?php
    include "../parts/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>