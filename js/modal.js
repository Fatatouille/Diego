//elementos del modal
var contenedor = document.getElementById("modal-cuenta")
var nosotros = document.getElementById("modal-nosotros")
var equis= document.getElementById("cerrar")
var equidos = document.getElementById("cerrardos")

//Botones que van a usar un modal
var log = document.getElementById("modal-log")
var nboton = document.getElementById("nosotros")


//Funciones para mostrar y ocultar el modal
//-------Mostrar según botón----------
log.onclick = function() {
    contenedor.style.display = "flex"
}
nboton.onclick = function() {
    nosotros.style.display = "flex"
}
//Ocultar cuando se haga click en la parte gris
window.onclick = function(e){
    if ( e.target == contenedor){
        contenedor.style.display = "none"
    }
    if (e.target == nosotros){
        nosotros.style.display = "none"
    }
}
//Ocultar cuando se haga click en la cruz
equis.onclick = function() {
    contenedor.style.display = "none"
}
equidos.onclick = function(){
    nosotros.style.display = "none"
}