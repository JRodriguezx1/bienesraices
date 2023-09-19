<?php

if(!isset($_SESSION))
session_start();

$autentication = $_SESSION['login']??false;  //si esta autnticado se le asigna true, si no, false a la variable $autentication

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="build/css/app.css">-->
    <link rel="stylesheet" href= <?php echo $css; ?> >
    <title>Bienes raices</title>
</head>
<body>  <!--se evalua si la variable $inicio si existe, si existe pone el string inicio de lo contrario nada--->
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>"> <!--no esta la class inicio que es la que contiene la imagen, la class inicio esta en el index----->
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="index.php">
                    <img src=<?php echo $img_header."logo.svg" ?> alt="logotipo de bienes raices">
                </a> 

                <div class="movil-menu"> <!----boton menu 3 lineas horizontales----->
                    <img src=<?php echo $img_header."barras.svg" ?> alt="imgen barra">
                </div>
                
                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if($autentication): ?>
                    <a href="cerrarsesion.php">Cerrar sesion</a>
                    <?php endif; ?>
                </nav>  
            </div> <!----cierre de la barra----->
        <h1></h1>
            <?php if($inicio) echo "<h1>Vena de Casas y Depatamentos Exclusivos y de Lujo</h1>"; ?>
        </div>
    </header>