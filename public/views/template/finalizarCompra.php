
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "../parts/head.php";
require_once "../../../resources/controllers/FinalizarCompra.php";
require_once "../../../resources/controllers/Carrito.php";
include "./menu.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el formulario
    $nameRegistro = $_POST['nameRegistro'];
    $apellidoRegistro = $_POST['apellidoRegistro'];
    $direccionRegistro = $_POST['direccionRegistro'];
    $totalCompra = $_POST['totalCompra'];
    $metodoPago = $_POST['metodoPago'];

    if (empty($apellidoRegistro) || empty($direccionRegistro) || empty($metodoPago)) {
        echo "Por favor, complete todos los campos del formulario";
    } else {
        // Crear una instancia de la clase FinalizarCompra
        $finalizarCompra = new FinalizarCompra();

        // Llamar a la función finalizacionCompra() para insertar los datos en la base de datos
        if ($finalizarCompra->finalizacionCompra($apellidoRegistro, $direccionRegistro, $metodoPago, $totalCompra)) {
            // La inserción se realizó correctamente
            echo "Compra finalizada correctamente";
            header('Location: http://localhost/tus-globos/index.php');
            exit;
        } else {
            // Ocurrió un error durante la inserción
            echo "Error al finalizar la compra";
        }
    }
}

$totalCarrito = $miCarrito->calcularTotalCarrito($_SESSION['user']['id']);
?>

<body>
    <form class="form-login" method="POST">
        <h2>Complete los datos para su compra</h2>
        <label for="">Nombre</label>
        <input type="text" name="nameRegistro" readonly value="<?php echo ($_SESSION['user']['nombre']) ?>">
        <label for="">Apellido</label>
        <input type="text" name="apellidoRegistro">
        <label for="">Direccion</label>
        <input type="text" name="direccionRegistro">
        <label for="">Total</label>
        <input type="num" name="totalCompra" readonly value="<?php echo $totalCarrito ?>">
        <label for="">Método de pago</label>
        <select name="metodoPago">
            <option value="efectivo">Efectivo</option>
            <option value="mercado_pago">Mercado Pago</option>
        </select>
        <button class="btn-registrarse" type="submit">Finalizar Compra</button>
        <a class="btn-volver" href="carrito.php">Volver</a>
    </form>

    <?php
    include "../parts/footer.php";
    ?>
</body>
</html>