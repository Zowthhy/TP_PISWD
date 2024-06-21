
//Se asignan las variables de los botones que despliegan los menus
const btnMateria = document.querySelector("#btnMateria");
const btnUsuario = document.querySelector("#btnUsuario");
const btnVincular = document.querySelector("#btnVincular");

// Se asignan las variables de los menus despegables
const materiaOpciones = document.querySelector("#materiaOpciones");
const usuarioOpciones = document.querySelector("#usuarioOpciones");
const vincularOpciones = document.querySelector("#vincularOpciones");

const opciones = [materiaOpciones, usuarioOpciones, vincularOpciones]; //Se asignan todos los menus en un array

function displayMenu(menu){  //  Funcion que despliega o esconde el menu seleccionado
    opciones.forEach(opcion => {   // Se recorren todos los menus 
        if (opcion === menu) {  // Se verifica si el menu es igual al menu seleccionado
            opcion.style.display = opcion.style.display === "flex" ? "none" : "flex"; // Si el menu no tiene display se le asigna "flex"
        } else {
            opcion.style.display = "none";  // En caso contrario se esconde el menu
        }
    });
}

//Se llaman a las funciones con el evento onclick
btnMateria.onclick = function(){ 
    displayMenu(materiaOpciones);
};
btnUsuario.onclick = function(){
    displayMenu(usuarioOpciones);
};
btnVincular.onclick = function(){
    displayMenu(vincularOpciones);
}; 