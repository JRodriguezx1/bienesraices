
<?php foreach($errores as $error): //: es = { ?>
        <div class="alerta error">
        <?php echo $error; ?>
        </div>
<?php endforeach; ?>

<main class="contenedor seccion">
        <h1>Crear</h1>

        <a class="boton-verde" href="/admin" >Volver</a>

                                      <!-- con action hacia la misma pagina se reiniciar los valores-->
        <form class="formulario" method="POST" action="/propiedades/crear" enctype="multipart/form-data"> <!--la info se procesa en este mismo archivo crear.php-->
         <?php /* include "formularios.php"; */ ?> 
        <?php include __DIR__."/formularios.php"; ?>
        <input name="Crear Propiedad" class="boton-verde" type="submit" value="Crear Propiedad">
        </form>

    </main>
