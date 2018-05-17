/*
              -------Creado por-------
             \(�u� )/ Anarchy \( �u�)/
              ------------------------
 */

//    Bastar� decir que soy Juan Pablo Castel, el pintor que mat� a Mar�a Iribarne...  \\
/** Valida los campos requeridos en un formulario
 * Returns flag Devuelve true si el form cuenta con los datos m�nimos requeridos
 */
function validarForm(idForm){
	var form=$('#'+idForm)[0];
	for (var i = 0; i < form.length; i++) {
		var input = form[i];
		if(input.required && input.value==""){
			return false;
		}
	}
	return true;
}

////////// FONDO \\\\\\\\\\
function preFondoInsert(idForm){
     //Haga aqu� las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/outerController/fondo/FondoInsert.php',postFondoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postFondoInsert(result,state){
     //Maneje aqu� la respuesta del servidor.
     //Consideramos buena pr�ctica no manejar c�digo HTML antes de este punto.
 		if(state=="success"){
 			alert("Fondo registrado con �xito");
 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preFondoList(container){
     //Solicite informaci�n del servidor
     cargaContenido(container,'FondoList.html'); 
 	enviar("",'../back/outerController/fondo/FondoList.php',postFondoList); 
}

 function postFondoList(result,state){
     //Maneje aqu� la respuesta del servidor.
     if(state=="success"){
        document.getElementById("FondoList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// MONEDA \\\\\\\\\\
function preMonedaInsert(idForm){
     //Haga aqu� las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/outerController/moneda/MonedaInsert.php',postMonedaInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postMonedaInsert(result,state){
     //Maneje aqu� la respuesta del servidor.
     //Consideramos buena pr�ctica no manejar c�digo HTML antes de este punto.
 		if(state=="success"){
 			alert("Moneda registrado con �xito");
 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preMonedaList(container){
     //Solicite informaci�n del servidor
     cargaContenido(container,'MonedaList.html'); 
 	enviar("",'../back/outerController/moneda/MonedaList.php',postMonedaList); 
}

 function postMonedaList(result,state){
     //Maneje aqu� la respuesta del servidor.
     if(state=="success"){
        document.getElementById("MonedaList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// MOVIMIENTO \\\\\\\\\\
function preMovimientoInsert(idForm){
     //Haga aqu� las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/outerController/movimiento/MovimientoInsert.php',postMovimientoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postMovimientoInsert(result,state){
     //Maneje aqu� la respuesta del servidor.
     //Consideramos buena pr�ctica no manejar c�digo HTML antes de este punto.
 		if(state=="success"){
 			alert("Movimiento registrado con �xito");
 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preMovimientoList(container){
     //Solicite informaci�n del servidor
     cargaContenido(container,'MovimientoList.html'); 
 	enviar("",'../back/outerController/movimiento/MovimientoList.php',postMovimientoList); 
}

 function postMovimientoList(result,state){
     //Maneje aqu� la respuesta del servidor.
     if(state=="success"){
        document.getElementById("MovimientoList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// USUARIOS \\\\\\\\\\
function preUsuariosInsert(idForm){
     //Haga aqu� las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/outerController/usuarios/UsuariosInsert.php',postUsuariosInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postUsuariosInsert(result,state){
     //Maneje aqu� la respuesta del servidor.
     //Consideramos buena pr�ctica no manejar c�digo HTML antes de este punto.
 		if(state=="success"){
 			alert("Usuarios registrado con �xito");
 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preUsuariosList(container){
     //Solicite informaci�n del servidor
     cargaContenido(container,'UsuariosList.html'); 
 	enviar("",'../back/outerController/usuarios/UsuariosList.php',postUsuariosList); 
}

 function postUsuariosList(result,state){
     //Maneje aqu� la respuesta del servidor.
     if(state=="success"){
        document.getElementById("UsuariosList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

//That�s all folks!