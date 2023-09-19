<main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a class="boton-verde" href="../admin" >Volver</a>

        <!-- codigo que muestra errore si no se llenaron los campos-->
        <?php foreach($errores as $error): //: es = { ?> <!-- si el arreglo esta vacio no muestra nada-->
            <div class="alerta error">
            <?php echo $error; ?>
            </div>
        <?php endforeach; // = } ?>

        <form class="formulario" method="POST" enctype="multipart/form-data"> <!--la info se procesa en este mismo archivo crear.php-->
        <?php include "formularios.php";  ?>
        <input name="Actualizar Propiedad" class="boton-verde" type="submit" value="Actualizar">
        </form>

    </main>