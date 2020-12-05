//  1. Obtener el campo del e-mail
const email = document.getElementById("email");

// 2. Agregar un event listener
email.addEventListener("input", (event) => {
    //3. Validar que el campo es correcto
    if (email.validity.typeMismatch) {
        //4. Personalizar mensaje
        email.setCustomValidity("Escribe un e-mail correcto");
    } else {
        email.setCustomValidity("");
    }
});
// 5. Obtener check box y botón enviar
const terminos = document.getElementById("terminos");
const boton = document.getElementById("boton");
// 6. Agregar event listener
boton.addEventListener("click", () => {
    if (terminos.validity.valueMissing || !terminos.checked) {
        //7. Validar checkbox
        terminos.setCustomValidity("Acepta los términos para continuar");
    } else {
        terminos.setCustomValidity("");
    }
});

const edad = document.getElementById("edad");
edad.addEventListener("input", (event) => {
    //3. Validar que el campo es correcto
    if (edad.validity.rangeUnderflow) {
        //4. Personalizar mensaje
        edad.setCustomValidity("Tienes que tener 8 o más años para jugar");
    } else {
        edad.setCustomValidity("");
    }
});

const nombre = document.getElementById("nombre");
nombre.addEventListener("input", (event) => {
    //3. Validar que el campo es correcto
    if (nombre.validity.tooShort) {
        //4. Personalizar mensaje
        nombre.setCustomValidity("Por favor escribe tu nombre completo");
    } else {
        nombre.setCustomValidity("");
    }
});

const pass = document.getElementById("pass");
pass.addEventListener("input", (event) => {
    //3. Validar que el campo es correcto
    
    if (pass.validity.tooShort) {
        //4. Personalizar mensaje
        pass.setCustomValidity("Escriba contraseña de minimo 8 caracteres");
    } else {
        pass.setCustomValidity("");
    }
});


