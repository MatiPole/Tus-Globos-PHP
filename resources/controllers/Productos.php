<?php 
require_once 'Conexion.php';

class Productos {
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

    public function traer_catalogo():array{
      $conexion = new Conexion(); // Crear una instancia de la clase Conexion
      $db = $conexion->getConexion(); // Obtener el objeto PDO desde la instancia de Conexion

      $query = "SELECT * FROM productos"; // Modifica la consulta según la estructura de tu tabla
      $stmt = $db->prepare($query); // Utilizar una consulta preparada
      $stmt->execute(); // Ejecutar la consulta

      $catalogo = [];
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
          $productos = new self();
          $productos->id = $row['id'];
          $productos->nombre = $row['nombre'];
          $productos->tipo = $row['tipo'];
          $productos->precio = $row['precio'];
          $productos->descripcion = $row['descripcion'];
          $productos->unidadesporbolsa = $row['unidadesporbolsa'];
          $productos->imagen = $row['imagen'];
          $productos->categoria = $row['categoria'];
          $productos->stock = $row['stock'];
                    $catalogo[] = $productos;
        }

        return $catalogo;
    }

    //filtrar productos por precio mas baratos
    
     public function traer_ofertas(){
      $conexion = new Conexion();
      $db = $conexion->getConexion();

      $query = "SELECT * FROM productos WHERE precio < 600"; // Modifica la consulta si es necesario
      $stmt = $db->prepare($query); // Utilizar una consulta preparada
      $stmt->execute(); // Ejecutar la consulta

      $ofertas = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
          $oferta = new self();
          $oferta->id = $row['id'];
          $oferta->nombre = $row['nombre'];
          $oferta->tipo = $row['tipo'];
          $oferta->precio = $row['precio'];
          $oferta->descripcion = $row['descripcion'];
          $oferta->unidadesporbolsa = $row['unidadesporbolsa'];
          $oferta->imagen = $row['imagen'];
          $oferta->categoria = $row['categoria'];
          $oferta->stock = $row['stock'];
                    $ofertas[] = $oferta;     
                                      
        }
         return $ofertas;
    
     }



//traer tipo
     public function traer_tipo($tipo){
        $resultadofiltro = [];
        $catalogo = $this->traer_catalogo();
        foreach ($catalogo as $d) {
           if($d->tipo == $tipo){
                $resultadofiltro[] = $d;
           }
        }       
        return $resultadofiltro;
    
     }


//traer nombre tipo
public function traer_nombre_tipo(){
   $resultado = [];
   $catalogo = $this->traer_catalogo();
   foreach ($catalogo as $d) {
      if($d->tipo){
         $tipoName = $d->tipo;
         $resultado[] = $tipoName;
    }
   }        
   $resultado = array_unique($resultado, SORT_REGULAR); 
   return $resultado;

}

//traer id
     public function traer_id_detalle($id){
        $resultado = [];
        $catalogo = $this->traer_catalogo();
        foreach ($catalogo as $d) {
           if($d->id == $id){
                $resultado[] = $d;
           }
        }       
        return $resultado;
    
     }


}


?>