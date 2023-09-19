<?php

namespace Model;

class activerecord{

    protected static $db;
    protected static  $columnas_DB = [];
    //errores
    protected static $errores=[];
    protected static $tabla = '';



    public static function set_DB($database){
        self::$db = $database;   //self hace referencia a la clase padre
    }



    public function eliminar_registro(){
        $sqldelete = "DELETE FROM ".static::$tabla." WHERE id = ".self::$db->escape_string($this->id)." LIMIT 1";
        //debuguear($this);  $this tiene el objeto actual que seria $propiedad del index del admin
        $resultado = self::$db->query($sqldelete);
        $this->borrar_imagen();

        return $resultado;
    }  


    public function borrar_imagen(){

        $existe_archivo = file_exists(CARPETA_IMAGENES.$this->imagen);
        if($existe_archivo){ 
            unlink(CARPETA_IMAGENES.$this->imagen);
        } 
    }

    public function guardar(){
        if(isset($this->id)){
            $this->guardar_actualizar();
        }
        else {
            $this->guardar_crear();
        }
    }


    public function guardar_actualizar(){
        $atributos = $this->sanitizar_datos(); 
        $valores = [];
        foreach($atributos as $key => $value ){
            if($key === "fechacreacion")$value = date('y-m-d'); //
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE propiedades SET ";
        $query .= join(", ", $valores);
        $query .= " WHERE id = '".self::$db->escape_string($this->id)."'";
        $query .= " LIMIT 1;";
        

        
        $resultado = self::$db->query($query);

        return $resultado;
    }


    public function guardar_crear(){

        //sanitizar entrada de datos
        $atributos = $this->sanitizar_datos();
        
       // $string = join(', ', array_keys($atributos));  //array_keys apartir de arreglo asociativo crea otro arreglo de solo llaves
       // debuguear($string);                            //join convierte el arreglo en string cadena
       //$string = join("', '", array_values($atributos));

       // $sql2 = "INSERT INTO propiedades(titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, fechacreacion, idvendedor) VALUES('$this->titulo', '$this->precio', '$this->imagen', '$this->descripcion', '$this->habitaciones', '$this->wc', '$this->estacionamiento', '$this->fechacreacion', '$this->idvendedor');";
       $sql2 = "INSERT INTO ".static::$tabla."(";
       $sql2 .= join(', ', array_keys($atributos));
       $sql2 .= ") VALUES('";
       $sql2 .= join("', '", array_values($atributos));
       $sql2 .= "');";
       

       $resultado = self::$db->query($sql2);
       return $resultado;  
    }


    public function sanitizar_datos(){
      $atributos = $this->atributos();  // hace una copia del objeto con sus atributos, id, titulo, precio etc.. a un arreglo asociativo
      $sanitizado = [];
      foreach($atributos as $key => $value ){
          $sanitizado[$key] = self::$db->escape_string($value);
      }
      return $sanitizado;
    }


    public function atributos(){  //esta funcion toma los atributos de la clase y los copia en un arreglo
        $atributos = [];
        foreach(static::$columnas_DB as $columna){   //$columna_DB es un arreglo inicialiado con string ='id', 'titulo, 'precio'...(tabla propiedades) y tambien es inicializado con id, nombre, apellido (tabla vendedores), y con static se llama desde las clases hijas.
            if($columna === 'id')continue;  //cunado $columna es igual a 'id' hace continue, y salta todas las instrucciones y continua con la siguiente repeticion del bucle
            $atributos[$columna] = $this->$columna;  //$columna ira tomando = 'id', 'titulo', 'precio'
        //$atributos['titulo'] = $this->titulo => hace referencia a las propiedades de la clase
        }                                        //y las propiedad van a tener los datos del form
        
        return $atributos;
    }


    public static function get_errores(){  //esta funcion se crea paraevita el undefine
        return self::$errores;
    }


    public function validar(){
        //valida cada campo del formulario
    static::$errores = [];
    return static::$errores;
    }



    public function set_imagen($imagen){ //asignar al atributo imagen de la class el nombre de la imagen
        //eliminar imagen anterior
        if(isset($this->id)){ //si existe un id es pq estamos en actualizar.php
            if($this->imagen == NULL) $a = " ";
            else {
                $a = $this->imagen;
            }
         $existe_archivo = file_exists(CARPETA_IMAGENES.$a);
         if($existe_archivo){ 
             unlink(CARPETA_IMAGENES.$this->imagen);
         }
        }
        
        if($imagen){
            $this->imagen = $imagen; //$imagen contiene el nombre unico
        }
    }


    public static function all(){ //listar todas las propiedades o registros de la tabla de la bd
        $sql = "SELECT *FROM ".static::$tabla;  //accede al atributo protegido, static es un modificador de acceso, static busca el atributo tabla en la clase el cual se hereda
        //debuguear($sql);
        $resultado = self::consultar_Sql($sql); //se llama al metodo estatico consultar_sql() y se le pasa el query
       // debuguear($resultado);
        return $resultado;  //$resultado es un arreglo de objetos
    }


    //obtiene determinado numero de registros
    public static function get($cantidad){ //listar todas las propiedades o registros de la tabla de la bd
        $sql = "SELECT *FROM ".static::$tabla." LIMIT ".$cantidad;
        $resultado = self::consultar_Sql($sql); 
        return $resultado;  
    }


    public static function consultar_Sql($sql){
        $resultado = self::$db->query($sql); //consultar la base de datos se trae toda la tabla indicada

        $array = [];

        while($row = $resultado->fetch_assoc()){  //se va iterando en cada registro de la tabla de la bd
           $array[] = self::crear_objeto($row);   //arreglo de objetos
                  //static::crear_objeto($row) 
                                               }
        //debuguear($array);
        $resultado->free();  //liberar memoria 
        return $array;
    }



    public static function crear_objeto($row){  //esta funcion se llama n veces segun la cantidad de registros de la bs con fetch_assoc
        //$objeto = new self; //se crea nueva instancia dentro de la clase, con las propiedades establecidas en el constructor de la clase
        $objeto = new static;  //se instancia se crea un objeto segundo de donde se llame, ya se de la clase propiedad o clase vendedor clases herencia 
        //debuguear($objeto);
        foreach($row as $key => $value){
            if (property_exists($objeto, $key)) {  //property_exists verifica o compara si la propiedad del objeto existe, key va ir tomando cada propiedad
                   $objeto->$key = $value;  //se crea objeto dinamico en memoria con los datos de la bd
                                                }
                                       }
       return $objeto;
    }


    //busca un solo registro por su id
    public static function find($id){
        $sqlpropiedad = "SELECT *FROM ".static::$tabla." WHERE id = ${id}";
       // debuguear(static::$tabla);
        $resultado = self::consultar_Sql($sqlpropiedad);
        return array_shift($resultado); //array_shift retorna el primer elemento del arreglo
    }


    //metodo que se llama en actualizar.php, que compara el objeto creado con los valores del $_POST
    public function compara_objetobd_post($args){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){   //property_exist revisa de un objeto que un atributo exista
               $this->$key = $value;                  //$this hace referencia al objeto actual,  objeto creado en actualizar
            }
        }  // esta funcion lo que hace es copilar los campos del formulario que se obtiene del $_POST al objeto actuial
    }


} //cierre de la clase
