<?php

namespace Controllers;

use MVC\Router;
use Model\propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class paginascontroller{

    public static function index_principal(Router $router){
        $propiedades = propiedad::get(3);
        $router->render("paginas/index", ['propiedades'=>$propiedades, 'inicio'=>true]);
    }

    public static function nosotros(Router $router){

        $router->render("paginas/nosotros");
    }

    public static function todos_anuncios(Router $router){
        $propiedades = propiedad::all();
        $router->render("paginas/anuncios", ['propiedades'=>$propiedades]);
    }

    public static function detalle_anuncio(Router $router){
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id){
        header('/');
                }
        $propiedad = propiedad::find($id);
        $router->render("paginas/detalleanuncio", ['propiedad'=>$propiedad]);
        
    }

    public static function blog(Router $router){
        $router->render("paginas/blog");
    }

    public static function entrada_blog(Router $router){
        $router->render("paginas/entrada");
    }

    public static function contacto(Router $router){

        $mensaje = null;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $respuesta = $_POST['contacto'];

        //debuguear($respuesta['telefono']);

        //crear una instancia de phpmailer
        $mail = new PHPMailer();

        //configar SMTP
        $mail->isSMTP();
        $mail->Host = "smtp.mailtrap.io";
        $mail->SMTPAuth = true;
        $mail->Username = "16acf5de9a6d51";
        $mail->Password = "5920be5576bd6b";
        $mail->SMTPSecure = "tls";
        $mail->Port = 2525;

        //configurar el contenido del email
        $mail->setFrom('admin@bienesraices.com'); //quien envia el email
        $mail->addAddress('admin@bienesraices.com', 'bienesraices.com');  //a quien llega el email
        $mail->Subject = "Tiene un nuevo mensaje";

        //habilitar html
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        //contenido
        $contenido = '<html> '; 
        $contenido .= '<p> Tiene un nuevo mensaje </p>';
        $contenido .= '<p> Nombre: '.$respuesta['nombre'].'</p>';

        if($respuesta['forma_contacto'] === 'Telefono'){
            $contenido .= '<p>Eligio ser contactado por Telefono: </p>';
            $contenido .= '<p> Telefono: '.$respuesta['telefono'].'</p>';
            $contenido .= '<p> fecha de contacto: '.$respuesta['fecha'].'</p>';
            $contenido .= '<p> hora de contacto: '.$respuesta['hora'].'</p>';
        }else{
            $contenido .= '<p>Eligio ser contactado por Email: </p>';
            $contenido .= '<p> email: '.$respuesta['email'].'</p>';
        }

        $contenido .= '<p> Mensaje: '.$respuesta['mensaje'].'</p>';
        $contenido .= '<p> venta o compra: '.$respuesta['compra_venta'].'</p>';
        $contenido .= '<p> presupuesto: $'.$respuesta['presupuesto'].'</p>';
        $contenido .= '<p> medio de contacto: '.$respuesta['forma_contacto'].'</p>';
        $contenido .= ' </html>';

       // debuguear($respuesta);


        $mail->Body = $contenido;
        $mail->AltBody = "texto alternativo";  //cunado no soporta html el servicio de email

        //enviar email
        
        if($mail->send()){
            $mensaje = "enviado corretamente sin html";
        }else{
            $mensaje = "Soliitud no enviado";
        }

        }

        $router->render("paginas/contacto", ['mensaje'=>$mensaje]);
    }
}