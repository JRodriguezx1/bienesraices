
<?php

if(!isset($_SESSION)){  //si no esta definido la super global de iniciar seccion entra a el if
 session_start();
}
$autentication = $_SESSION['login']??false;


if(!isset($inicio)){  //la variable inicio no esta definida ingresa al if
    $inicio=false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="build/css/app.css">-->
    <link rel="stylesheet" href="../build/css/app.css" >
    <title>Bienes raices</title>
</head>
<body>  <!--se evalua si la variable $inicio si existe, si existe pone el string inicio de lo contrario nada--->
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>"> <!--no esta la class inicio que es la que contiene la imagen, la class inicio esta en el index----->
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/">  <!-- <a href="index.php"> -->
                    <img src="/build/img/logo.svg" alt="logotipo de bienes raices">
                </a> 

                <div class="movil-menu"> <!----boton menu 3 lineas horizontales----->
                    <img src="build/img/barras.svg" alt="imgen barra">
                </div>
                
                <nav data-cy="navheader" class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/anuncios">Anuncios</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                    <?php if($autentication): ?>
                    <a href="/cerrarsesion">Cerrar sesion</a>
                    <?php endif; ?>
                </nav>  
            </div> <!----cierre de la barra----->
        <h1></h1>
            <?php if($inicio) echo "<h1 data-cy='heading-sitio' >Vena de Casas y Depatamentos Exclusivos y de Lujo</h1>"; ?>
        </div>
    </header>

    <?php
    echo $contenido;
    ?>

    <footer class="foter seccion">
        <div class="contenedor contenedor-footer">
            <nav data-cy="navfooter" class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/anuncios">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>  
        </div>


        <p data-cy="copyrigh" class="copyrigh">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src= "/build/js/bundle.min.js" ></script>
</body>
</html>