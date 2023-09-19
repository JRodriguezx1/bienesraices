        
        <?php
       // require 'includes/config/database.php';
       /*
         $db = conectarDB();
         $sql = "SELECT * FROM propiedades LIMIT ${limite}";
         $sqlpropiedades = mysqli_query($db, $sql);*/

         use App\propiedad;


         //debuguear($_SERVER);
         if($_SERVER['SCRIPT_NAME'] === "/bienesraices_inicio/anuncios.php"){
            $propiedades = propiedad::all();  //si estamos en la pagina ptincipal de anuncios.php se lista todas las propiedades
         }else{
            $propiedades = propiedad::get(4);  //si estamos en el index se lista solo 4
         }

        ?>
        
        <div class="contenedor-anuncios">

        <?php foreach($propiedades as $propiedad): ?>

            <div class="anuncio">

                <picture>  <!----imagen de la casa----->
                    <img loading src="build/img/anuncio3.jpg" alt="anuncio">
                </picture> <!---  echo "imagenes/".$row['imagen']; ?> --->
                
                <div class="contenido-anuncio">
                    <h3> <?php echo $propiedad->titulo; ?> </h3>  
                    <p> <?php echo $propiedad->descripcion; ?> </p> 
                    <p class="precio"> <?php echo $propiedad->precio; ?> </p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p> <?php echo $propiedad->wc; ?> </p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p> <?php echo $propiedad->estacionamiento; ?> </p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p> <?php echo $propiedad->habitaciones; ?> </p>
                        </li>
                    </ul>
                    <a class="boton-amarillo-block" href="detalleanuncio.php?id=<?php echo $propiedad->id; ?>">Ver Propiedad</a>
                </div>
            </div> <!----fin de un solo anuncio----->
         
        <?php endforeach;   ?>    

        </div> <!----cierre de los anuncios----->

        