<?php 
require_once 'Conexion.php';

class Usuarios {
   public $id ;
   public $nombre;
   public $apellido;
   public $email;
   public $password;
   public $direccion;

   public function traer_usuarios(): array {
      $conexion = new Conexion(); // Crear una instancia de la clase Conexion
      $db = $conexion->getConexion(); // Obtener el objeto PDO desde la instancia de Conexion

      $query = "SELECT * FROM usuarios"; // Modifica la consulta según la estructura de tu tabla
      // $stmt = $db->query($query); // Ejecutar la consulta
      $stmt = $db->prepare($query); // Utilizar una consulta preparada
      $stmt->execute(); // Ejecutar la consulta

      $usuarios = [];

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $usuario = new self();
         $usuario->id = $row['id'];
         $usuario->nombre = $row['nombre'];
         $usuario->apellido = $row['apellido'];
         $usuario->email = $row['email'];
         $usuario->password = $row['password'];
         $usuario->direccion = $row['direccion'];
         $usuarios[] = $usuario;
      }

      return $usuarios;
   }
   

public function guardarUsuario($id, $nombre, $apellido, $email, $password, $direccion) {
 $passwordEncriptada = md5($password);
   $conexion = new Conexion();
   $db = $conexion->getConexion();

   // Preparar la consulta UPDATE
   $sql = "UPDATE usuarios SET nombre = :nombre, apellido = :apellido, email = :email, password = :password, direccion = :direccion WHERE id = :id";


   $stmt = $db->prepare($sql);

   // Asociar los valores de los parámetros
   $stmt->bindValue(':id', $id);
   $stmt->bindValue(':nombre', $nombre);
   $stmt->bindValue(':apellido', $apellido);
   $stmt->bindValue(':email', $email);
   $stmt->bindValue(':password', $passwordEncriptada);
   $stmt->bindValue(':direccion', $direccion);

   // Ejecutar la consulta
   if ($stmt->execute()) {
      // La actualización se realizó correctamente
      return true;
   } else {
      // Ocurrió un error durante la actualización
      return false;
   }
}




//eliminar
public function eliminarUsuario($id) {
   
   $conexion = new Conexion();
   $db = $conexion->getConexion();

   // Preparar la consulta DELETE
   $sql = "DELETE FROM usuarios WHERE id = :id";
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':id', $id);

   // Ejecutar la consulta
   if ($stmt->execute()) {
     // La eliminación se realizó correctamente
     return true;
   } else {
     // Ocurrió un error durante la eliminación
     return false;
   }
 }

 public function agregarUsuario($nombre, $apellido, $email, $password, $direccion) {
   // Crear una instancia de la clase Conexion
   $conexion = new Conexion();
$passwordEncriptada = md5($password);
   // Obtener la conexión a la base de datos
   $db = $conexion->getConexion();

   // Preparar la consulta INSERT
   $sql = "INSERT INTO usuarios (nombre, apellido, email, password, direccion) VALUES (:nombre, :apellido, :email, :password, :direccion)";

   // Preparar la sentencia
   $stmt = $db->prepare($sql);

   // Asociar los valores de los parámetros
   $stmt->bindValue(':nombre', $nombre);
   $stmt->bindValue(':apellido', $apellido);
   $stmt->bindValue(':email', $email);
   $stmt->bindValue(':password', $passwordEncriptada);
   $stmt->bindValue(':direccion', $direccion);
 
   // Ejecutar la consulta
   if ($stmt->execute()) {
     // La inserción se realizó correctamente
     return true;
   } else {
     // Ocurrió un error durante la inserción
     return false;
   }
 }
 
}


?>
