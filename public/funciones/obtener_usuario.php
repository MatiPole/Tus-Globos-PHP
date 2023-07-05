<?php
require_once "../../resources/controllers/Usuarios.php";

// Crear una instancia de la clase Productos
$productos = new Usuarios();

// Obtener los datos enviados desde el formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$direccion = $_POST['direccion'];

// Llamar a la función guardarProducto() para insertar el producto en la base de datos

if ($productos->guardarUsuario($id, $nombre, $apellido, $email, $password, $direccion)) {

   // La inserción se realizó correctamente
   echo "Producto guardado correctamente";
} else {
   // Ocurrió un error durante la inserción
   echo "Error al guardar el producto";
}

?>
