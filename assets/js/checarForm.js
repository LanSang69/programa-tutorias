//Inputs
var nameElement = document.getElementById('name');
var lastNameElement = document.getElementById('lastName');
var sLastNameElement = document.getElementById('sLastName');
var emailElement = document.getElementById('email');
var boletaElement = document.getElementById('boleta');
var telefonoElement = document.getElementById('telefono');
var passwordElement = document.getElementById('password');
var submitButton = document.getElementById('registrarse');

//divs de error
const nInvalidElement = document.querySelector('.n-invalid');
const lnInvalidElement = document.querySelector('.ln-invalid');
const slnInvalidElement = document.querySelector('.sln-invalid');
const emailInvalidElement = document.querySelector('.email-invalid');
const boletaInvalidElement = document.querySelector('.boleta-invalid');
const telInvalidElement = document.querySelector('.tel-invalid');
const passwordInvalidElement = document.querySelector('.password-invalid');

function isEmpty(value){
    return value.trim() == '';
}

function validarFormulario() {
    const nameValid = validarNombre(nameElement.value);
    const lastNameValid = validarNombre(lastNameElement.value);
    const sLastNameValid = validarNombre(sLastNameElement.value);
    const emailValid = validarCorreo(emailElement.value);
    const telefonoValid = validarTelefono(telefonoElement.value);
    const boletaValid = validarBoleta(boletaElement.value);
    const passwordValid = validarContra(passwordElement.value);

    const allFieldsValid = nameValid && lastNameValid && sLastNameValid && emailValid && telefonoValid && boletaValid && passwordValid;

    submitButton.disabled = !allFieldsValid;
}

function toggleInvalidClass(element, isValid, value) {
    if (isValid || isEmpty(value)) {
        element.classList.remove('show');
        element.classList.add('hide');
    } else {
        element.classList.add('show');
        element.classList.remove('hide');
    }
}

nameElement.addEventListener('input', function() {
    var value = nameElement.value;
    toggleInvalidClass(nInvalidElement, validarNombre(value), value);
    validarFormulario();
});

lastNameElement.addEventListener('input', function() {
    var value = lastNameElement.value;
    toggleInvalidClass(lnInvalidElement, validarNombre(value), value);
    validarFormulario();
});

sLastNameElement.addEventListener('input', function() {
    var value = sLastNameElement.value;
    toggleInvalidClass(slnInvalidElement, validarNombre(value), value);
    validarFormulario();
});

emailElement.addEventListener('input', function() {
    var value = emailElement.value;
    toggleInvalidClass(emailInvalidElement, validarCorreo(value), value);
    validarFormulario();
});

telefonoElement.addEventListener('input', function(){
    var value = telefonoElement.value;
    toggleInvalidClass(telInvalidElement, validarTelefono(value), value);
    validarFormulario();
});

boletaElement.addEventListener('input', function(){
    var value = boletaElement.value;
    toggleInvalidClass(boletaInvalidElement, validarBoleta(value), value);
    validarFormulario();
});

passwordElement.addEventListener('input', function(){
    var value = passwordElement.value;
    toggleInvalidClass(passwordInvalidElement, validarContra(value), value);
    validarFormulario();
});