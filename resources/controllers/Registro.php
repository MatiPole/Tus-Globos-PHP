<?php
require_once 'Conexion.php';


class Registro{
    public $nameRegistro;
    public $emailRegistro;
    public $passwordRegistro;

//AGREGAR USUARIO CUANDO SE REGISTRA
public function agregarUsuario($nameRegistro, $emailRegistro, $passwordRegistro) {
        $passwordEncriptada = md5($passwordRegistro);

        // Obtener la conexión a la base de datos
      $conexion = new Conexion(); 
      $db = $conexion->getConexion();

        // Preparar la consulta INSERT
        $query = "INSERT INTO usuarios (nombre, email, password, nivel) VALUES (:nombre, :email, :password, 1)";

        // Preparar la sentencia
        $stmt = $db->prepare($query);

        // Asociar los valores de los parámetros
        $stmt->bindParam(':nombre', $nameRegistro);
        $stmt->bindParam(':email', $emailRegistro);
        $stmt->bindParam(':password', $passwordEncriptada);

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