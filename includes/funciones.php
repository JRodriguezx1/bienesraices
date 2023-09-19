<?php

define('TEMPLATES_URL', __DIR__.'/templates');  //con __DIR__ nos trae la ruta completa hasta la carpeta templates
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT']."/imagenes/");  //$_SERVER['DOCUMENT_ROOT'] = bienesraices_mvc/public

//        llave                    valor

//                                      $css = rutal del css y js, $img_header = ruta de las img svg
function incluirtemplate(string $nombre, bool $inicio, string $css, string $img_header){
    include TEMPLATES_URL."/${nombre}.php";
}

function estado_autenticado():bool
{
    session_start();
    $autenticacion = $_SESSION['login'];
    if($autenticacion)
        return true;
        return false;
        
}


//escapa / sanitizar html
function sanitizar_html($html):string {
   $s = htmlspecialchars($html);
   return $s;
}


function debuguear($variable){
    echo "<pre>";
      var_dump($variable);
    echo "</pre>";
    exit;
}