<?php 

class Productos {
   public $id ;
   public $color;
   public $tipo;
   public $imagen;
   public $descripcion;
   public $precio;
   public $unidadesPorBolsa;
  //metodos para hacer cosas con los objetos

  //Esta funcion va a traer la informacion de mis viajes para utilizarlo en mi HTML
    public function traer_info_de_viaje (){
        echo 'Este es el viaje a '.$this->color.' que estabas esperando. Tiene una descripción de '.$this->descripcion.' y es muy '.$this->etiquetas.'. El valor es de: '.$this->precio;
    }

    //mostrar todos los productos del catalogo

    public function traer_catalogo():array{
        //se trae los datos, en este caso desde un JSON
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/tus-globos/resources/data/productos.json'); //va a buscar al archivo
        $jsonData = json_decode($json); //lo trasnforma
        $catalogo = []; // Dejamos preparada la variable para que guarde el dato

        foreach ($jsonData as $value) { // recorremos el JSON
          $productos = new self();
          $productos->id = $value->id;
          $productos->color = $value->color;
          $productos->tipo = $value->tipo;
          $productos->precio = $value->precio;
          $productos->descripcion = $value->descripcion;
          $productos->unidadesPorBolsa = $value->unidadesPorBolsa;
          $productos->imagen = $value->imagen;
          $catalogo[] = $productos;
        }

        return $catalogo;
    }

    //filtrar productos por precio mas baratos
    
     public function traer_ofertas(){
       $json = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/tus-globos/resources/data/productos.json');
        $jsonData = json_decode($json);             

        foreach ($jsonData as $value){     
                   if($value->precio <= 700){
                     $oferta = new self();
                     $oferta->id = $value->id;
                     $oferta->color = $value->color;
                     $oferta->tipo = $value->tipo;
                     $oferta->precio = $value->precio;
                     $oferta->descripcion = $value->descripcion;
                     $oferta->unidadesPorBolsa = $value->unidadesPorBolsa;
                     $oferta->imagen = $value->imagen;
                    $ofertas[] = $oferta;     
                   }                   
        }
         return $ofertas;
    
     }



//traer tipo
     public function traer_tipo($tipo){
        $resultado = [];
        $catalogo = $this->traer_catalogo();
        foreach ($catalogo as $d) {
           if($d->tipo == $tipo){
                $resultado[] = $d;
           }
        }       
        return $resultado;
    
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