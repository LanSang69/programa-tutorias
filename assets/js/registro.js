//Ejecutando funciones
document.getElementById("btn__continuarCuenta").addEventListener("click", datosPersonales);
document.getElementById("btn__continuarDatos").addEventListener("click", cuenta);
window.addEventListener("resize", anchoPage);

//Declarando variables
var contenedor_registro = document.querySelector(".contenedor__registro");
var formulario_Cuenta = document.querySelector(".formulario__Cuenta");
var formulario_Datos = document.querySelector(".formulario__Datos");
var todo = document.querySelector(".caja__trasera");
var caja_trasera_Cuenta = document.querySelector(".caja__trasera-Cuenta");
var caja_trasera_Datos = document.querySelector(".caja__trasera-Datos");

    //FUNCIONES

function anchoPage(){

    if (window.innerWidth > 920){
        caja_trasera_Datos.style.display = "block";
        caja_trasera_Cuenta.style.display = "block";
    }else{
        caja_trasera_Datos.style.display = "block";
        caja_trasera_Datos.style.opacity = "1";
        caja_trasera_Cuenta.style.display = "none";
        formulario_Cuenta.style.display = "block";
        contenedor_registro.style.left = "0px";
        formulario_Datos.style.display = "none";   
    }
}

anchoPage();


    function datosPersonales(){
        if (window.innerWidth > 920){
            formulario_Cuenta.style.display = "block";
            contenedor_registro.style.left = "10px";
            formulario_Datos.style.display = "none";
            caja_trasera_Datos.style.opacity = "1";
            caja_trasera_Cuenta.style.opacity = "0";
        }else{
            formulario_Cuenta.style.display = "block";
            contenedor_registro.style.left = "0px";
            formulario_Datos.style.display = "none";
            caja_trasera_Datos.style.display = "block";
            caja_trasera_Cuenta.style.display = "none";
        }
    }

    function cuenta(){
        if (window.innerWidth > 920){
            formulario_Datos.style.display = "block";
            contenedor_registro.style.left = "460px";
            formulario_Cuenta.style.display = "none";
            caja_trasera_Datos.style.opacity = "0";
            caja_trasera_Cuenta.style.opacity = "1";
        }else{
            formulario_Datos.style.display = "block";
            contenedor_registro.style.left = "0px";
            formulario_Cuenta.style.display = "none";
            caja_trasera_Datos.style.display = "none";
            caja_trasera_Cuenta.style.display = "block";
            caja_trasera_Cuenta.style.opacity = "1";
        }
}