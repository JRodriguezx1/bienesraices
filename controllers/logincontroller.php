<?php
namespace Controllers;
use MVC\Router;
use Model\login;   //clase login namespace model


class logincontroller{

    public static function login(Router $router){
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //debuguear($_POST);
            $auth = new login($_POST); //se instancea el objeto de la clase login (namespace model) de la carpeta models,  y se le pasa $_POST que es un arreglo que contiene ['email'], ['pass']
            $errores = $auth->validar();  //se llama al metodo validar y este metodo accede al email y al pass

            if(empty($errores)){
                $resultado = $auth->existe_usuario();
                if(!$resultado){
                    $errores = login::get_errores();  //si el suuario correo electronico no existe
                }else{ //si existe correo
                    $autenticado = $auth->validar_pass($resultado);  //se valida password 
                    if($autenticado){
                       // iniciar seccion
                       $auth->iniciar_seccion(); //llama metodo
                    }else{
                        $errores = login::get_errores(); //pass incorrecto
                    }
                }
            }
        }
        $router->render('login/login', ['errores'=>$errores]);
    }



    public static function logout(){
       // echo "desde logout";
        session_start();
        $_SESSION = [];
        header('location: /');
    }

}