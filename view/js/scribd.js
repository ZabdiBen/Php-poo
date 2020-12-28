//funcion auto invocada (function(){}());
(function (){
const fcontact = document.querySelector("#formulario"),
      ok = document.querySelector(".ok"),
      actualizar = document.querySelector(".actualizar"),
      eliminar = document.querySelector(".eliminar"),
      error = document.querySelector(".error");

// Notifación en pantalla
function mostrarNotificacion(mensaje, clase) {
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;

    // formulario
    fcontact.insertBefore(notificacion, document.querySelector('form legend'));

    // Ocultar y Mostrar la notificacion
    setTimeout(() => {
        notificacion.classList.add('visible');
        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 500)
        }, 3000);
    }, 100);
    console.log("me estas invocando");
}

if(ok){
    mostrarNotificacion("Contact saved", "correcto");
}else if(error){
    mostrarNotificacion("It was a error", "error")
}
if(actualizar){
    mostrarNotificacion("Contact updated", "correcto");
}else if(error){
    mostrarNotificacion("It was a error", "error")
}
if(eliminar){
    mostrarNotificacion("Contact deleted", "correcto");
}else if(error){
    mostrarNotificacion("It was a error", "error")
}


})();