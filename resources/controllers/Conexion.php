<?php

class Conexion
{
    // private const DB_SERVER = "localhost";
    private const DB_SERVER = "localhost:3306";
    // const DB_SERVER = "127.0.0.1";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_NAME = "tus_globos_poletto";

    public const DB_DSN = "mysql:host=".self::DB_SERVER.";dbname=".self::DB_NAME.";charset=utf8mb4";

    protected PDO $db;
    //tenemos que crear una funcion, que está atada a un evento, que es la creación de una instancia.

    public function __construct()
    {
        try {
        $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS); 
             
        } catch (Exception $e) {

        echo "No se puede conectar a la base de datos";
        die; //frena todo php, corta toda la ejecucion tambien le podemos agregar sus ultimas palavbras die("nohay mas php");
        }
    }

 
    //esta funcion al llamarla devuelve la información de la conexion - la instancia anterior no me devuelve nada.
    public function getConexion() : PDO {
        return $this->db;
    }
}



?>



