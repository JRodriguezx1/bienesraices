<?php



namespace MVC;


class Router{

    public $rutas_get = [];
    public $rutas_post = [];


    public function post($url, $fn){  //$fn =  [propiedadcontroller::class, 'index']
        $this->rutas_post[$url] = $fn;
    }


    public function get($url, $fn){  //$fn =  [propiedadcontroller::class, 'index']
        $this->rutas_get[$url] = $fn;
    }


    public function comprobar_rutas(){

        session_start();
        $auth = $_SESSION['login']??null;
        //debuguear($auth);
        

        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar'];
        
        $urlactual = $_SERVER['PATH_INFO'] ?? '/';  //debuguear($_SERVER['PATH_INFO']);
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === "GET"){  // cunado se visita una pagina es metodo get, y cuando se oprime boton enviarde formulario es POST
            $fn = $this->rutas_get[$urlactual]?? null;    
        }else{
           // debuguear($this);
            $fn = $this->rutas_post[$urlactual]?? null;
        }

        //proteger las rutas
        if(in_array($urlactual, $rutas_protegidas) && !$auth){
            header('Location: /');
        }

        
        if($fn){   
            
            //la uRL existe, con call_user_func se llama al controlador que es quien contiene los metodos de las urls registradas.
            call_user_func($fn, $this);   //llama una funciona cuando no sabemos como se llama la func,  $fn recibe el nombre de la clase con namespace y el metodo y $this son los parametros de la clase o la instancia de la clase router
        }else{                            //a la funcion call_user_func se le pasa el nombre de la func o nombre de la clase y su metodo con $fn, y los metodos estan en controllers/propiedadcontroller.php
            echo "Pagina no encontrada o no existe";
        }     
    }


    public function render($vista, $datos = []){ //este metodo render es llamado de la clase propiedadcontroller desde el metodo public static funcion index 

        foreach($datos as $key => $value){
            $$key = $value; //$key = variable variale, cada llave del arreglo asociativo es variable
            //$$key genera variables con los nombres de los keys del arreglo asociativo
            //debuguear($propiedades);
        }

     //include __DIR__."/vistas/$vista".".php";
       ob_start();  //inicia almacenamiento en memoria el include de abajo
       include __DIR__."/vistas/$vista.php";     //$vista = propiedades/admin
       $contenido = ob_get_clean();  // limpia la memoria y en variable $contenido se almacena el include de arriba, y la variable $contenido se muestra en el include de abajo
       include __DIR__."/vistas/layout.php";  
    }
    

}