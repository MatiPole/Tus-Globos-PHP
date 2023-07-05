<?php
require_once "../../resources/controllers/Usuarios.php";

// Crear una instancia de la clase Usuarios
$usuarios = new Usuarios();



  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $direccion = $_POST['direccion'];
  // Crear una instancia de la clase Productos


  // Llamar a la función guardarUsuario() para insertar el producto en la base de datos
  if ($usuarios->agregarUsuario($nombre, $apellido, $email, $password,$direccion)) {
    // La inserción se realizó correctamente
    echo "success";
  } else {
    // Ocurrió un error durante la inserción
    echo "error";
  }
?>