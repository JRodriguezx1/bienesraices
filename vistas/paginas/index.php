<main class="contenedor seccion">
        <h2 data-cy="heading-nosotros" >Mas Sobre Nosotros</h1>
        <div class="icono-nosotros" data-cy="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                   It has roots in a piece of classical Latin literature from 45 BC, 
                   making it over 2000 years old.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                   It has roots in a piece of classical Latin literature from 45 BC, 
                   making it over 2000 years old.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                   It has roots in a piece of classical Latin literature from 45 BC, 
                   making it over 2000 years old.
                </p>         
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Dptos en Ventas</h2>
        
        <?php  
        include 'listados.php';
        ?>

        <div class="alinear-derecha">
            <a data-cy="todos-anuncios" class="boton-verde" href="/anuncios">Ver Todos</a>
        </div>

    </section>

    <section data-cy="imagen-contacto" class="imagen-contacto"> <!----seccion para contactar y redirigir al formulario----->
        <h2>Encuentr la Casa de Tus Sueños</h2>
        <p>LLena el formulario de contacto y un asesor se pondrà en contacto contigo a la brevedad</p>
        <a class="boton-amarillo" href="/contacto">Contactanos</a>
    </section>

    <!--------------estructura del blog----------------->
    <div class="contenedor seccion seccion-inferior">
        <section data-cy="blog" class="blog">

            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">  <!----creacion del blog----->
                <div class="imagen">  <!----imagen del blog----->
                    <picture>
                    <!-- <source srcset="build/img/blog1.webp" type="image/webp"> -->
                    <!-- <source srcset="build/img/blog1.jpg" type="image/jpeg"> -->
                        <img loading="lazy" src="build/img/blog1.jpg" alt="texto entrada blog">
                    </picture>
                </div>
                <div class="entrada-texto">  <!----texto del blog----->
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="meta">Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los 
                           mejores materiales y ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">  <!----creacion del blog----->
                <div class="imagen">  <!----imagen del blog----->
                    <picture>
                    <!-- <source srcset="build/img/blog2.webp" type="image/webp"> -->
                    <!-- <source srcset="build/img/blog2.jpg" type="image/jpeg"> -->
                        <img loading="lazy" src="build/img/blog2.jpg" alt="texto entrada blog2">
                    </picture>
                </div>
                <div class="entrada-texto">  <!----texto del blog----->
                    <a href="/entrada">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="meta">Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar
                           muebles y colores para darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article>

        </section>
        <section data-cy="testimoniales" class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    el personal se comproto de un excelente forma, muy buena atencion y la casa que
                    me ofrecieron, cumple con todas mis expectativas.
                </blockquote>
                <p>- Julian Rodriguez</p>

            </div>
        </section>
    </div>