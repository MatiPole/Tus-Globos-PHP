<?php
require_once 'Conexion.php';


class FinalizarCompra{
    public $apellidoRegistro;
    public $direccionRegistro;
    public $metodoPago;
    public $totalCompra;

//FUNCION PARA COMPLETAR DATOS DE FINALIZACION DE COMPRA
public function finalizacionCompra($apellidoRegistro, $direccionRegistro, $metodoPago, $totalCompra) {
    // Obtener la conexión a la base de datos
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    // Obtener el ID del usuario actual
    $userId = $_SESSION['user']['id'];

    // Preparar la consulta INSERT para la tabla "usuarios"
    $queryUsuarios = "UPDATE usuarios SET apellido = :apellido, direccion = :direccion WHERE id = :id";

    // Preparar la sentencia para la tabla "usuarios"
    $stmtUsuarios = $db->prepare($queryUsuarios);
    $stmtUsuarios->bindParam(':apellido', $apellidoRegistro);
    $stmtUsuarios->bindParam(':direccion', $direccionRegistro);
    $stmtUsuarios->bindParam(':id', $userId);

    // Preparar la consulta INSERT para la tabla "facturacion"
    $queryFacturacion = "INSERT INTO facturacion (metodo_pago, total, usuario_id) VALUES (:metodo_pago, :total, :usuario_id)";

    // Preparar la sentencia para la tabla "facturacion"
    $stmtFacturacion = $db->prepare($queryFacturacion);
    $stmtFacturacion->bindParam(':metodo_pago', $metodoPago);
    $stmtFacturacion->bindParam(':total', $totalCompra);
    $stmtFacturacion->bindParam(':usuario_id', $userId);

    // Preparar la consulta DELETE para eliminar los productos del carrito
    $queryEliminarCarrito = "DELETE FROM carrito WHERE usuario_id = :usuario_id";

    // Preparar la sentencia para eliminar los productos del carrito
    $stmtEliminarCarrito = $db->prepare($queryEliminarCarrito);
    $stmtEliminarCarrito->bindParam(':usuario_id', $userId);

    // Iniciar una transacción
    $db->beginTransaction();

    try {
        // Ejecutar las consultas
        $resultUsuarios = $stmtUsuarios->execute();
        $resultFacturacion = $stmtFacturacion->execute();
        $resultEliminarCarrito = $stmtEliminarCarrito->execute();

        // Verificar si las consultas se ejecutaron correctamente
        if ($resultUsuarios && $resultFacturacion && $resultEliminarCarrito) {
            // Confirmar la transacción
            $db->commit();
            return true;
        } else {
            // Revertir la transacción
            $db->rollBack();
            return false;
        }
    } catch (PDOException $e) {
        // Revertir la transacción en caso de error
        $db->rollBack();
        return false;
    }
}
}