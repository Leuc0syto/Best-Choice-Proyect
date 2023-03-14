import './bootstrap';
let showHide = document.getElementById('show-hide');
let passwordInput = document.getElementById('password');

showHide.addEventListener('click', function() {
    showHide.classList.toggle('show');

    if(showHide.classList.contains('show')){
        showHide.classList.remove('fa-eye-slash');
        showHide.classList.add('fa-eye');
        passwordInput.classList.setAttribute('type', 'text')
    }
    else{
        showHide.classList.classList('fa-eye-slash');
        showHide.classList.remove('fa-eye');
        passwordInput.setAttribute('type', 'password');
    }
});


//category carrusel

const grande = document.querySelector('.grande')
const punto = document.querySelectorAll('.punto')

//Cuando click en punto
    // Saber aposicion de ese punto
    // Aplicar un transform translateX al grande
    //Quitar la clase activo de Todos puntos
    // Añadir la clase activo al punto que hemos hecho Click

    punto.forEach(( cadapunto, i ) => {
        punto[i].addEventListener('click', ()=>{
            let position = i
            // Cuando la posicion es 0 el transform es 0
            // Cuando la posicion es 1 el transform es -50%
            let operacion = operacion *-50

            grande.style.transform = `translateX(${operacion}%)`

        })
    });
