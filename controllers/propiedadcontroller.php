<?php

namespace Controllers;

use MVC\Router;   //utilizar la clase Router
use Model\propiedad;
use Model\vendedor;
use Intervention\Image\ImageManagerStatic as Image;



class propiedadcontroller{
       // metodo que se llama cuando se visita /admin
    public static function index(Router $router){   //con public static function no se requiere instanciar la clase
        $propiedades = propiedad::all();  //propiedad::all() devuele un arreglo de objetos
        $mensaje = $_GET['mensaje'] ?? null;  //obtiene valor de la url si no hay nada le asigna null

        //metodo definido en la clase router el cual se le pasa 'propiedades/admin' y el metodo lo recibe con $vista
        $router->render('propiedades/admin', [  //se pasa array[] aosiciativo que contiene 2 indices, dode cada indice tiene su llave y su valor
            'propiedades'=>$propiedades,  //key = 'propiedades' y el valor es $propiedades que es un arreglo de objetos
            'mensaje' => $mensaje
         ]); 
    }


    public static function crear(Router $router){  //cunado se visita la pagina propiedades/crear
        
        $propiedad = new propiedad; //se crea instancia para el prellenado no se le pasa datos al constructor
        $vendedores = vendedor::all();
        $errores = propiedad::get_errores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //crea nueva instancia
            $propiedad = new propiedad($_POST['propiedad']);  //se instancia clase propiedad hija se le pasa datos
    

            //***subida de archivos***//
  
            //genera nombre unico para guardar la imagen con el formato
            $nombre_unico_imagen = md5(uniqid(rand(), true)).".jpg";

            if($_FILES['propiedad']['tmp_name']['imagen']){  //validacion si existe la imagen
            //realiza resize con intervention                      anchoXalto
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->set_imagen($nombre_unico_imagen); //al metodo set_imagen se le pasa nombre de la imagen
                                                          }

            $errores = $propiedad->validar();

  

            if(empty($errores)){  //revisar que el arreglo $errores esta vacio, si esta vacio es pq no hubo campos vacios

             //crear carpeta
            //$carpeta_imagenes = "../../imagenes/";
            //$_SERVER['DOCUMENT_ROOT'] = bienesraices_mvc/public
            if(!is_dir(CARPETA_IMAGENES)){ //is_dir valida si una carpeta "imagenes" existe o no existe, como esta negado con ! ejecuta el if si no existe
            mkdir(CARPETA_IMAGENES);  //mkdir crea la carpeta imagenes
                               }
   
            //asignar FILES a una variable
            //$imagen = $_FILES['imagen'];  //captura la imagen del formularion co el name='imagen'

            //guardar la imagen en el servidor
            $image->save(CARPETA_IMAGENES.$nombre_unico_imagen);
            $r = $propiedad->guardar_crear(); //guardar en BD
  
  
            if($r){
            //redireccionar al usuario
             header('Location: /admin?mensaje=1');  //esta funcion se debe poner antes de que se imprima codigo html
                  }                     //query string = ?mensaje=1 se envia valor a la otra pagina admin/index.php
                             }    
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,  //arreglo asociativo donde la llave 'propiedad' contiene el objeto vacio para el prellenado
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }




    public static function actualizar(Router $router){
        
        $id = $_GET['id']; //obtiene el id que viene de la pagina admin/index.php al dar click en boton actualizar de una de las propiedades
        $id = filter_var($id, FILTER_VALIDATE_INT);  //valida la variable id que sea un numero 

        if(!$id) //el id no es numero se redirecciona al index de admin
        {
             header('Location: /admin');
        }

        $propiedad = propiedad::find($id);
        $errores = propiedad::get_errores();
        $vendedores = vendedor::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){   //cundo se de click en boton actualizar se visita propiedades/actualizar por medio del post
                                                     //y el router->post registra la pagina y le metodo el se llama nuevamente este metodo
            $args = $_POST['propiedad'];
            //$args['titulo'] = $_POST['titulo']?? null;
            $propiedad->compara_objetobd_post($args);  //esta funcion copia los campos del POST al objeto
   
             //***subida de archivos***//
   
             //genera nombre unico para guardar la imagen con el formato
            $nombre_unico_imagen = md5(uniqid(rand(), true)).".jpg";
            $img=0;
            if($_FILES['propiedad']['tmp_name']['imagen']){  //validacion si existe la imagen cuando se da click para seleccionar archivo
            //realiza resize con intervention                      anchoXalto
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->set_imagen($nombre_unico_imagen); //al metodo set_imagen se le pasa nombre de la imagen
            $img = 1;
                                                 }


             //valida que los campos del objeto creado no este vacio
            $errores = $propiedad->validar();  //$propiedad es un objeto dinamico el cual contiene los atributos del constructor    
            //$errores es un arreglo que contiene los errores

            if(empty($errores)){  //revisar que el arreglo $errores esta vacio, si esta vacio es pq no hubo campos vacios
            //almacenar la imagen
   
            if($img == 1)
            $image->save(CARPETA_IMAGENES.$nombre_unico_imagen);

            $r = $propiedad->guardar_actualizar();
   
            if($r){
            //redireccionar al usuario
            header('Location: /admin?mensaje=2');  //esta funcion se debe poner antes de que se imprima codigo html
                  }                //query string = ?mensaje=1 se envia valor a la otra pagina admin/index.php
                               }
        }

        $router->render('/propiedades/actualizar', ['propiedad' => $propiedad, 'errores'=>$errores, 'vendedores' => $vendedores]);

    }


    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];  //este viene del input del admin.php cuando se da click en eliminar
            $id = filter_var($id, FILTER_VALIDATE_INT);
  
        if($id){
            $propiedad = propiedad::find($id);
           // debuguear($propiedad);  //muestra el objeto
            $deleteregistro = $propiedad->eliminar_registro();
           // debuguear($deleteregistro);

        if($deleteregistro){
            header('Location: /admin?mensaje=3');
                           }   
              }
                                                    }
    }


}

