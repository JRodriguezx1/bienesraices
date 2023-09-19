

<div class="contenedor-anuncios">

        <?php foreach($propiedades as $propiedad): ?>

            <div data-cy="anuncio" class="anuncio">

                <picture>  <!----imagen de la casa----->
                    <img loading src=<?php echo "/imagenes/".$propiedad->imagen;  ?> alt="anuncio">
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
                    <a data-cy="enlace-propiedad" class="boton-amarillo-block" href="/detalleanuncio?id=<?php echo $propiedad->id; ?>">Ver Propiedad</a>
                </div>
            </div> <!----fin de un solo anuncio----->
         
        <?php endforeach;   ?>    

</div> <!----cierre de los anuncios----->