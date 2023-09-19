

<main class="contenedor seccion">
        <h1>Administrador de Bienes raicies</h1>

        <?php if($mensaje==1){ ?> <!--mensaje viene de la pagina crear.php y viene como string-->
            <p class="alerta exito"> Anuncio Creado Correctamente</p>
        <?php }elseif($mensaje==2){ ?>
            <p class="alerta exito"> Anuncio Actualizado Correctamente</p>
        <?php }elseif($mensaje==3){ ?>
            <p class="alerta exito"> Anuncio Eliminado Correctamente</p> 
        <?php }  ?>

        <a class="boton-verde" href="propiedades/crear">Nueva Propiedad</a>
            <h2>PROPIEDADES</h2>

        <table class="tpropiedades">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Titlo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($propiedades as $row): ?> <!--$propiedades es un arreglo que contiene objetos-->
                <tr> <!--tr = fila en la tabla-->
                    <td> <?php echo $row->id ?> </td> <!--td = columna en la tabla-->
                    <td> <?php echo $row->titulo; ?> </td>
                    <td> <img class="imagen-tabla" src="<?php echo "../imagenes/$row->imagen";  ?>" alt="imagen tabla"> </td>
                    <td> <?php echo $row->precio; ?> </td>
                    <td>
                        <form method="POST" action="/propiedades/eliminar">
                            <input name="id" type="hidden" value="<?php echo $row->id;  ?> ">
                            <input class="boton-rojo-block" type="submit" value="Eliminar" >
                        </form>
                        <a href="propiedades/actualizar?id=<?php echo $row->id; ?>" class="boton-amarillo-block">Actualizar</a>
                                     <!--al dar click en actualiazar lleva el id a la pagina actualizar.php-->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <H2>VENDEDORES</H2>
        

    </main>
