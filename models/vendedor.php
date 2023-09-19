<?php

namespace Model;

class vendedor extends activerecord{

    protected static  $columnas_DB = ['id', 'nombre', 'apellido', 'telefono'];
    protected static $tabla = 'vendedores'; //hereda el atributo protegido de la clase padre

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args =[])
    {
        $this->id = $args['id']??' ';
        $this->nombre = $args['nombre']??' ';
        $this->apellido = $args['apellido']??' ';
        $this->telefono = $args['telefono']??'';
    }

} //cierre de la clase