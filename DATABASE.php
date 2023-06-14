<?php


require_once "resources/controllers/Productos.php";

// define('DB_SERVER', 'localhost');
8
const DB_SERVER = 'localhost';
// const DB_SERVER = '127.0.0.1';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'tus_globos';

// PDO clase nativa de php

// Nuestra conexion DSN

const DB_DSN = 'mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8mb4';

try {
    $conexion = new PDO(DB_DSN, DB_USER, DB_PASS);
} catch (Exception $e) {
    echo 'No se puede conectar a la base de datos. Estamos trabajando para solucionarlo';
    die;
}

$query = 'SELECT * FROM productos';
// $query = 'SELECT * FROM destinos WHERE nombre_destino = "París"';

// $query = 'INSERT INTO destinos (`nombre_destino`) VALUES ("Chile")';

$PDOStatement = $conexion->prepare($query);
// $PDOStatement ->setFetchMode(PDO::FETCH_ASSOC);
$PDOStatement ->setFetchMode(PDO::FETCH_CLASS, 'Productos');

$PDOStatement->execute();

$datos = $PDOStatement->fetchAll();

echo '<pre>';
    print_r($datos);
echo '</pre>';




echo 'Nos conectamos';



?>



