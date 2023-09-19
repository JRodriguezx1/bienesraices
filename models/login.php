<?php

namespace Model;

class login extends activerecord{
    //base de datos
    protected static $tabla = "usuarios";  //solo se accede dentro de esta clase
    protected static $columndadb = ['id', 'email', 'pass'];

    public $id;
    public $email;
    public $pass;

    public function __construct($args = [])
    {
        $this->id = $args['id']?? null;
        $this->email = $args['email']?? null;
        $this->pass = $args['password']?? null;
    }


    public function validar(){
        if(!$this->email){ //si esta vacio
            self::$errores[] = "el email es obligatorio"; 
        }
        if(!$this->pass){ //si esta vacio
            self::$errores[] = "el password es obligatorio"; 
        }
        return self::$errores;
    }


    public function existe_usuario(){
        $sql = "SELECT * FROM ".self::$tabla." WHERE email = '".$this->email."' LIMIT 1";
        $resultado = self::$db->query($sql);
        if(!$resultado->num_rows){  //si registro de bd no existe
            self::$errores[]= 'El usuario no existe';
            return;
        }return $resultado; //$resultado es el registro de la bd cuando se consulta
        
    }


    public function validar_pass($resultado){
        //$resultado es el registro de la bd cuando se consulta
        $pass = $resultado->fetch_object();  //fetch:objet toma $resultado que es el registro de la consulta BD, y trae la consulta en forma de objeto
        $autenticado = password_verify($this->pass, $pass->pass);
        if(!$autenticado){
            self::$errores[] = 'La contraseña es incorrecta';
        }
        return $autenticado;
    }



    public function iniciar_seccion(){
        session_start();  //iniciar seccion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        header('location: /admin');
    }
    

}