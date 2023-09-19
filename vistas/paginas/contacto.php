

<main class="contenedor seccion">

    <?php
        if($mensaje){
        echo "<p data-cy='alerta-envio-formulario' class='alerta exito'>${mensaje}</p>";
                    }
    ?>
    

        <h1 data-cy="heading-contacto" >Contacto</h1>
        <picture>
        <!-- <source srcset="build/img/destacada3.webp" type="image/webp"> -->
        <!-- <source srcset="build/img/destacada3.jpg" type="image/jpeg"> -->
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
        </picture>
        <h2 data-cy="heading-formulario">LLene el formulario de contacto</h2>

        <form data-cy="formulario" class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Informacion Personal</legend>
                <label for="nombre">Nombre</label>
                <input data-cy="input-nombre" id="nombre" type="text" placeholder="Tu Nombre" name="contacto[nombre]" required>
                
                <label for="mensaje">Mensaje</label>
                <textarea data-cy="mensaje" id="mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <label for="opciones">Vende o compra</label>
                <select data-cy="opiones" id="opciones" name="contacto[compra_venta]" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>
                <label for="presupuesto">Precio o presupuesto</label>
                <input data-cy="input-presupuesto" id="presupuesto" type="number" placeholder="Tu Precio o Presupuesto" name="contacto[presupuesto]" required>
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-tel">Telefono</label>
                    <input data-cy="forma-contacto" id="contactar-tel" type="radio" value="Telefono" name="contacto[forma_contacto]" required>
                    <label for="contactar-email">E-mail</label>
                    <input data-cy="forma-contacto" id="contactar-email" type="radio" value="email" name="contacto[forma_contacto]" required>
                </div>

                <div id="contacto"></div>

            </fieldset>
            <input class="boton-verde" type="submit" value="Enviar">
        </form>
    </main>