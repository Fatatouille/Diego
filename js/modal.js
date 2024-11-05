//elementos del modal
var contenedor = document.getElementById("contenedor-modal")
var equis= document.getElementById("cerrar")

//Botones que van a usar un modal
var log = document.getElementById("modal-log")

//Funciones para mostrar y ocultar el modal
//-------Mostrar según botón----------
log.onclick = function() {
    contenedor.style.display = "flex"
}
//Ocultar cuando se haga click en la parte gris
window.onclick = function(e){
    if ( e.target == contenedor){
        contenedor.style.display = "none";
    }
}
//Ocultar cuando se haga click en la cruz
equis.onclick = function() {
    contenedor.style.display = "none"
}