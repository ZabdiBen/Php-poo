//funcion auto invocada (function(){}());
//Use ready() to make a function available after the document is loaded:
$(document).ready(function(){

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


// ──────────  CONDICIONALES PARA NOTIFICACION  ───────────────────

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
// ────FIN CONDICIONALES PARA NOTIFICACION───────────

// ──────────  PREVISUALISACION DE FOTO Y VALIDACION DE FOTO  ───────────────────
$("#fotoFormulario").change(function(){

    var imagen = this.files[0];
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

        $("#fotoFormulario").val("");
        mostrarNotificacion("the imagen should be jpeg or png only", "error")
        return;

    }else if(imagen["size"] > 4000000){ //->2mb

    	$("#fotoOpinion").val("");
    	mostrarNotificacion("the imagen should be less to 4mb", "error")
        return;

    }else {
        var datosImagen = new FileReader;

    	 datosImagen.readAsDataURL(imagen);
        //imagen codificada en base 64
    	 $(datosImagen).on("load", function(event){
    	 	var rutaImagen = event.target.result;
    	 	$(".prevfotoFormulario").attr("src", rutaImagen);
    	 })
    }
})


});