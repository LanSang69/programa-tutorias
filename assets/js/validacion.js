let regexCorreo = /^[a-zA-Z0-9._%+-]+@alumno\.ipn\.mx$/;
let regexAdmin = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
let regexNumero = /\d{10}/;
let regexNombres = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(\s[a-zA-ZáéíóúÁÉÍÓÚñÑ]+)*$/;
let regexBoleta = /^20\d{8}/;
let regexContraseña = /^(?=.*[a-zA-ZáéíóúÁÉÍÓÚñÑ])(?=.*\d)(?=.*[.,@#$%&*_\-+=!])[a-zA-ZáéíóúÁÉÍÓÚñÑ\d.,@#$%&*_\-+=!]+$/;

function validarNombre(nombre) {
    return regexNombres.test(nombre);
}
function validarCorreo(correo) {
    return regexCorreo.test(correo);
}
function validarBoleta(boleta) {
    return regexBoleta.test(boleta);
}
function validarContra(contra){
    return regexContraseña.test(contra);
}
function validarTelefono(telefono) {
    return regexNumero.test(telefono);
}
function validarAdmin(correo) {
    return regexAdmin.test(correo);
}