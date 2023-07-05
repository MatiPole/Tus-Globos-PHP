<?php
require_once "../../resources/controllers/Usuarios.php";

// Crear una instancia de la clase Usuarios
$usuarios = new Usuarios();


if (isset($_POST['id'])) {
    // Obtener el ID del usuario a eliminar
    $id = $_POST['id'];  
    if ($usuarios->eliminarUsuario($id)) {
      // Eliminación exitosa
      echo "success";
    } else {
      // Ocurrió un error durante la eliminación
      echo "error";
    }
  }

?>