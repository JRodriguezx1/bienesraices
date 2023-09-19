
<fieldset>                               <!--enctype="multipart/form-data" se utiliza para subir archivos-->
                <legend>Informacion General</legend>
                <label for="titulo">Titulo</label>
                <input name="propiedad[titulo]"  id="titulo" type="text" placeholder="Titulo Propiedad" value="<?php echo $propiedad->titulo; ?>">
                                                     <!--asignando la variable $titulo a value hace que no tenga que volverse a inscribir en el campo-->
                <label for="Precio">Precio</label>
                <input name="propiedad[precio]" id="Precio" type="number" placeholder="Precio Propiedad" value="<?php echo $propiedad->precio; ?>" >

                <label for="imagen">Imagen</label>
                <input name="propiedad[imagen]" id="imagen" type="file" accept="image/jpeg, image/png" >

                <label for="descripcion">Descripcion</label>
                <textarea name="propiedad[descripcion]" id="descripcion"> <?php echo $propiedad->descripcion; ?> </textarea>
            </fieldset>

            <fieldset>
            <legend>Informacion de la Propiedad</legend>
                <label for="habitaciones">Habitaciones:</label>
                <input name="propiedad[habitaciones]" id="habitaciones" type="number" placeholder="Ej: 3" min="1" max="20" value="<?php echo $propiedad->habitaciones; ?>" >

                <label for="wc">Baños:</label>
                <input name="propiedad[wc]" id="wc" type="number" placeholder="Ej: 3" min="1" max="10" value="<?php echo $propiedad->wc; ?>" >

                <label for="estacionamiento">Estacionamiento:</label>
                <input name="propiedad[estacionamiento]" id="estacionamiento" type="number" placeholder="Ej: 3" min="1" max="10" value="<?php echo $propiedad->estacionamiento; ?>" >
            </fieldset>

            <fieldset>
            <legend>Vendedor</legend>
                <select name="propiedad[idvendedor]">
                <option value="" disabled selected>-- Seleccione --</option>
                <?php foreach($vendedores as $vendedor): //$vendedores es arreglo de objetos ?>
                    <option <?php echo $propiedad->idvendedor === $vendedor->id ? 'selected' : '';  ?>  value="<?php echo $vendedor->id; ?>" > <?php echo $vendedor->nombre." ".$vendedor->apellido ?> </option>
                <!-- con $row se va obteniendo cada fila o registro de la tabla y se va imprimiendo el id, nombre y apellido   -->
                <!-- se imprime el id en value y el nombre y apellido entre los options, cuando hay un vendedor seleccionado se carga el id en $idvendedor   -->

                <!-- <option value="1">Salomon lozano</option> -->
                <!-- <option value="2">Karen marin</option> -->
                <?php endforeach; ?>
                </select>
            </fieldset>