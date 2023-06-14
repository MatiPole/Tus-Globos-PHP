<?php 

class Banner {
   public $id ;
   public $alt;
   public $imagen;
  //metodos para hacer cosas con los objetos

    //mostrar todos los banners

    public function traer_banners():array{
        //se trae los datos, en este caso desde un JSON
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/tus-globos/resources/data/banner.json'); //va a buscar al archivo
        $jsonData = json_decode($json); //lo trasnforma
        $slider = []; // Dejamos preparada la variable para que guarde el dato

        foreach ($jsonData as $value) { // recorremos el JSON
          $banners = new self();
          $banners->id = $value->id;
          $banners->nombre = $value->nombre;
          $banners->imagen = $value->imagen;
          $slider[] = $banners;
        }

        return $slider;
    }

}

?>