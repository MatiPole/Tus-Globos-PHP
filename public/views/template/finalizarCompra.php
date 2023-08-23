
<!DOCTYPE html>
<html lang="en">
<?php
session_start();

require_once "../../../resources/controllers/FinalizarCompra.php";
require_once "../../../resources/controllers/Carrito.php";
include "../parts/head.php";

$miCarrito = new Carrito;
$totalCarrito = $miCarrito->calcularTotalCarrito($_SESSION['user']['id']);
// Verificar si el usuario no está logueado
if (!isset($_SESSION['user'])) {
    // Redirigir al usuario de vuelta al index.php
    header("Location: ../../../index.php");
    exit; // Asegurarse de que el código después de la redirección no se ejecute
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el formulario
    $nameRegistro = $_POST['nameRegistro'];
    $apellidoRegistro = $_POST['apellidoRegistro'];
    $direccionRegistro = $_POST['direccionRegistro'];
  /*   $totalCompra = $_POST['totalCompra']; */
    $metodoPago = $_POST['metodoPago'];

    if (empty($apellidoRegistro) || empty($direccionRegistro) || empty($metodoPago)) {
        echo "Por favor, complete todos los campos del formulario";
    } else {
        // Crear una instancia de la clase FinalizarCompra
        $finalizarCompra = new FinalizarCompra();

        // Llamar a la función finalizacionCompra() para insertar los datos en la base de datos
        if ($finalizarCompra->finalizacionCompra($apellidoRegistro, $direccionRegistro, $metodoPago, $totalCarrito)) { 
            // La inserción se realizó correctamente
 
            header('Location: http://localhost/tus-globos/index.php');
            exit;
        } else {
            // Ocurrió un error durante la inserción
            echo "Error al finalizar la compra";
        }
    }
}
?>

<body>
<?php
    include "./menu.php";
    ?>
    <main class="container mt-5 pb-5">
        <div class="row">
            <div class="col">
                <form id="formFinalizar" method="POST">
                        <h2>Complete los datos para su compra</h2>
                    <div class="input-group mb-3">
                        <label for="nombre" class="input-group-text">Nombre:</label>
                        <input type="text" id="nombre"  name="nameRegistro" class="form-control" required readonly value="<?php echo ($_SESSION['user']['nombre']) ?>">
                    </div>
                    <div class="input-group mb-3">
                        <label for="apellido" class="input-group-text">Apellido:</label>
                        <input type="text" id="apellido"name="apellidoRegistro" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="direccion" class="input-group-text">Dirección:</label>
                        <input type="text" id="direccion"name="direccionRegistro" class="form-control" required>
                    </div>
                    <div class="mb-3">
                             
                            <p>Total de la compra:  $<?php echo $totalCarrito ?></p>

                    </div>
        <label for="">Método de pago</label>
        <div class="metodopago-botones">
        <select  class="mb-3" name="metodoPago">
            <option value="efectivo">Efectivo</option>
            <option value="mercado_pago">Mercado Pago</option>
        </select>
 <div class="div-btn-finalizar">
    <button class="btn-registrarse" type="button" onclick="enviarFormulario();">Finalizar Compra</button>
    <a class="btn-volver" href="carrito.php">Volver</a>
</div>
        </div>
                </form>
            </div>
        </div>
    </main>

    <?php
    include "../parts/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script> 


    function enviarFormulario() {

   let apellido = document.getElementById('apellido').value;
    let  direccion = document.getElementById('direccion').value;
    if (direccion.trim() === '' || apellido.trim() === '') {

        swal({
            title: "Error",
            text: "Por favor, complete los campos de apellido y direccion",
            icon: "error",
            button: "Aceptar",
        });
    } else {
        swal({
            title: "Compra realizada!",
            text: "Gracias por su compra!",
            icon: "success",
            button: null,
        });

        // Esperar 2 segundos antes de enviar el formulario
        setTimeout(function() {
            document.querySelector('#formFinalizar').submit(); // Enviar el formulario
        }, 2000); // 2000 milisegundos = 2 segundos
    }
}
</script>
</body>
</html>

