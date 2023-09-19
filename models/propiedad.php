<?php

namespace Model;

class propiedad extends activerecord{


    protected static  $columnas_DB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'fechacreacion', 'idvendedor'];
    protected static $tabla = 'propiedades';  //hereda el atributo protegido de la clase padre

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $fechacreacion;
    public $idvendedor;


    public function __construct($args =[])
    {
        $this->id = $args['id']??' ';
        $this->titulo = $args['titulo']??'';
        $this->precio = $args['precio']??' ';
        $this->imagen = $args['imagen']??'';
        $this->descripcion = $args['descripcion']??'';
        $this->habitaciones = $args['habitaciones']??'';
        $this->wc = $args['wc']??'';
        $this->estacionamiento = $args['estacionamiento']??'';
        $this->fechacreacion = date('y-m-d');
        $this->idvendedor = $args['idvendedor']??'';
    }


    public function validar(){
        //valida cada campo del formulario
       
    if(!$this->titulo){
    self::$errores[] = "debes añadir titulo";
                      }            
    if(!$this->precio){
    self::$errores[]="el precio es obligatorio";
                      }
    if(strlen($this->descripcion)<50){
    self::$errores[]="la descripcion es obligatoria, y debe tener al menos 50 caracteres";
                                     }
    if(!$this->habitaciones){
    self::$errores[]="el numero de habitaciones es obligatorio";
                            }
    if(!$this->wc){
    self::$errores[]="el numero de baños es obligatorio";
                  }
    if(!$this->estacionamiento){
    self::$errores[]="el numero de estacionamieno es obligatorio";
                               }
    if(!$this->idvendedor){
    self::$errores[]="elige vendedor";
                          }
                          
    if(!$this->imagen){ //si no aparece el nombre de la imagen es pq no se cargo la imagen
    self::$errores[]="la imagen es obligatoria";          //php muestra error cuando la imgaen es > 2MB, es pordefecto
                                                        }
/*
    if($this->imagen['size'] > 500000 ){ //valida tamaño de imagen en Bytes que no sea mayor 500kB o meida mega
    self::$errores[]="la imagen es muy pesada";
                                       }*/
    return self::$errores;
    }

} //cierre de la class



?>