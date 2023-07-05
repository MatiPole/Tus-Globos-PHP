<?php
require_once "../../resources/controllers/Carrito.php";
$miCarrito = new Carrito();
    $productoId = $_POST['productoId'];
        $userId = $_POST['userId'];
if (isset($_POST['productoId']) && isset($_POST['userId'])) {
    $miCarrito->restarDelCarrito($productoId, $userId);
       // La inserción se realizó correctamente
   echo "Producto guardado correctamente";
}
else {
   // Ocurrió un error durante la inserción
   echo "Error al guardar el producto";
}
?>