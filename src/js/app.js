document.addEventListener('DOMContentLoaded', function(){

    barra_menu();
    navegacion();
    forma_contacto();

});


// funcion que le asigna evento click al div que contiene la img menu
function barra_menu(){
  const movilmenu = document.querySelector('.movil-menu'); //seleccionamos el div que contiene la img menu
  movilmenu.addEventListener('click', function(){ 
      console.log('hola diste un click');
      const nav = document.querySelector('.navegacion'); //seleccion el <nav>...</nav>
      nav.classList.toggle('mostrar');
      /*
      if(nav.classList.contains('mostrar')){
          nav.classList.remove('mostrar');
      }else{
          nav.classList.add('mostrar');
      } */
  });
}


function navegacion(){
    const navegacion = document.querySelector('.navegacion');
    navegacion.addEventListener('click', function(){
        console.log('hola nav');
    });
}


/***************************************************************** */

function forma_contacto(){
    const metodocontacto = document.querySelectorAll('input[name="contacto[forma_contacto]"]'); //selecciona 2 inputs type radio que tienen en comun el name="contacto[forma_contacto]" de la pagina contacto en fomra de nodelist
                           //selecciona todos los inputs que tengan como atributo name contacto[contacto]
      
    metodocontacto.forEach(inputx => inputx.addEventListener('click', function(e){  //se asigna evento a cada input seleccionado arriba
        console.log(e);
        const contactodiv = document.querySelector('#contacto');  //selecciona el div con el id='contacto' de la pagina contacto
       
        if(e.target.value === 'Telefono'){
            contactodiv.innerHTML = `
                <label for="telefono">Numero Telefono</label>
                <input data-cy="telefono" id="telefono" type="tel" placeholder="Tu Telefono" name="contacto[telefono]">
                <p>eliga la fecha y la hora</p>
                <label for="fecha">Fecha</label>
                <input data-cy="fecha" id="fecha" type="date" name="contacto[fecha]">
                <label for="hora">Hora</label>
                <input data-cy="hora" class="hh" id="hora" type="time" min="09:00" max="18:00" name="contacto[hora]">
            `;
        }else{
            contactodiv.innerHTML = `
                <label for="email">E-mail</label>
                <input data-cy="email" id="email" type="email" placeholder="Tu Email" name="contacto[email]" required>
            `;   
        }

                                                                                }));
                   }