<?php 
require_once 'Conexion.php';
class Carrito {
   public $id ;
   public $nombre;
   public $tipo;
   public $imagen;
   public $descripcion;
   public $precio;
   public $unidadesporbolsa;
   public $categoria;
   public $stock;
  //metodos para hacer cosas con los objetos


    //mostrar todos los productos del catalogo

public function traer_Carrito($userId): array {
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    $query = "SELECT c.id, c.producto_id, p.nombre, p.tipo, p.imagen, p.descripcion, p.precio, p.unidadesporbolsa, p.categoria, c.cantidad
              FROM carrito c  
              JOIN productos p ON c.producto_id = p.id
              WHERE c.usuario_id = :usuario_id";

    $stmt = $db->prepare($query);
        $stmt->bindParam(':usuario_id', $userId);
    $stmt->execute();
    $carrito = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $producto = new self();
        $producto->id = $row['id'];
        $producto->producto_id = $row['producto_id'];
        $producto->nombre = $row['nombre'];
        $producto->tipo = $row['tipo'];
        $producto->imagen = $row['imagen'];
        $producto->descripcion = $row['descripcion'];
        $producto->precio = $row['precio'];
        $producto->unidadesporbolsa = $row['unidadesporbolsa'];
        $producto->categoria = $row['categoria'];
        $producto->cantidad = $row['cantidad'];
        $carrito[] = $producto;
    }

    return $carrito;
}

 //AGREGAR AL CARRITO
public function agregarAlCarrito($productoId, $userId) {
    $conexion = new Conexion();
    $db = $conexion->getConexion();
    // Verificar si el producto ya está en el carrito
    $query = "SELECT id, cantidad FROM carrito WHERE producto_id = :producto_id AND usuario_id	= :usuario_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':producto_id', $productoId);
    $stmt->bindParam(':usuario_id', $userId);
    $stmt->execute();
    
    $productoEnCarrito = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($productoEnCarrito) {
        // El producto ya está en el carrito, incrementar la cantidad
        $carritoId = $productoEnCarrito['id'];
        $cantidadActual = $productoEnCarrito['cantidad'];
        
        $query = "UPDATE carrito SET cantidad = cantidad + 1 WHERE id = :carrito_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':carrito_id', $carritoId);
        $stmt->execute();
    } else {
        // El producto no está en el carrito, agregarlo con cantidad 1
        $query = "INSERT INTO carrito (producto_id, cantidad, usuario_id) VALUES (:producto_id, 1, :usuario_id)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':producto_id', $productoId);
        $stmt->bindParam(':usuario_id', $userId);
        $stmt->execute();
    }
    
    // Restar 1 al stock del producto
    $query = "UPDATE productos SET stock = stock - 1 WHERE id = :id AND stock > 0";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $productoId);
    $stmt->execute();
    
    return true; // Indicar que el producto se agregó o actualizó en el carrito correctamente
}

 //RESTAR DEL CARRITO
public function restarDelCarrito($productoId, $userId) {
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    // Verificar si el producto ya está en el carrito
    $query = "SELECT id, cantidad FROM carrito WHERE producto_id = :producto_id  AND usuario_id	= :usuario_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':producto_id', $productoId);
    $stmt->bindParam(':usuario_id', $userId);
    $stmt->execute();

    $productoEnCarrito = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($productoEnCarrito) {
        // El producto ya está en el carrito, restar la cantidad
        $carritoId = $productoEnCarrito['id'];
        $cantidadActual = $productoEnCarrito['cantidad'];

        $query = "UPDATE carrito SET cantidad = cantidad - 1 WHERE id = :carrito_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':carrito_id', $carritoId);
        $stmt->execute();

        // Verificar si la cantidad en el carrito llega a 1
        if ($cantidadActual == 1) {
            // Eliminar el producto del carrito
            $query = "DELETE FROM carrito WHERE id = :carrito_id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':carrito_id', $carritoId);
            $stmt->execute();
        }
    }

    // Sumar 1 al stock del producto
    $query = "UPDATE productos SET stock = stock + 1 WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $productoId);
    $stmt->execute();

    return true; // Indicar que el producto se restó del carrito correctamente
}

//TOTAL CARRITO
public function calcularTotalCarrito($userId) {
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    $query = "SELECT SUM(productos.precio * carrito.cantidad) AS total 
              FROM carrito 
              INNER JOIN productos ON carrito.producto_id = productos.id 
              WHERE carrito.usuario_id = :usuario_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':usuario_id', $userId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $result['total'];

    return $total;
}

//CANTIDAD CARRITO
public function calcularCantidadCarrito($userId) {
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    $query = "SELECT SUM(carrito.cantidad) AS total 
              FROM carrito 
              INNER JOIN productos ON carrito.producto_id = productos.id 
              WHERE carrito.usuario_id = :usuario_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':usuario_id', $userId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $result['total'];

    return $total;
}
//VACIAR CARRITO

public function vaciarCarrito($userId) {
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    $query = "DELETE FROM carrito WHERE usuario_id = :usuario_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':usuario_id', $userId);
    $stmt->execute();

    return true;
}
public function actualizarStockProductos($userId) {
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    $query = "SELECT producto_id, cantidad FROM carrito WHERE usuario_id = :usuario_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':usuario_id', $userId);
    $stmt->execute();

    $carritoItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($carritoItems as $item) {
        $updateQuery = "UPDATE productos SET stock = stock + :cantidad WHERE id = :producto_id";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bindParam(':cantidad', $item['cantidad']);
        $updateStmt->bindParam(':producto_id', $item['producto_id']);
        $updateStmt->execute();
    }

    return true;
}


}


?>