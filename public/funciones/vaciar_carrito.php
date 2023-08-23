<?php
require_once "../../resources/controllers/Carrito.php";
$miCarrito = new Carrito();

        $userId = $_POST['userId'];
if (isset($_POST['userId'])) {
            $miCarrito->actualizarStockProductos($userId);
    $miCarrito->vaciarCarrito($userId);

}
else {
   // Ocurrió un error durante la inserción
   echo "Error al vaciar carrito";
}
?>