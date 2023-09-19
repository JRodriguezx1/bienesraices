<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="heading-login">Iniciar Seccion</h1>

         <?php foreach($errores as $error):  //inicialmente cuando se visita la pagina el  ?>  
           <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
         <?php endforeach; ?>  <!-- areglo $errores estavacion no hace interaciones -->

        <form data-cy="formulario-login" method="POST" action="/login" class="formulario"> <!-- formulario se envia a esta misma pagina, pero los datos -->
                                                                <!-- se procesan en el controlador logincontroller -->
            <fieldset>
                <legend>email y password</legend>
                
                <label for="email">E-mail</label>
                <input name="email" id="email" type="email" placeholder="Tu Email">

                <label for="password">Password</label>
                <input name="password" id="password" type="password" placeholder="Tu password">      
            </fieldset>

            <input type="submit" value="Iniciar Seccion" class="boton boton-verde">

        </form>
</main>