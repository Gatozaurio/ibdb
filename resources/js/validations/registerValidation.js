document.addEventListener('DOMContentLoaded',function(){

	let name = document.getElementById("name");
	name.addEventListener('change', function(){
			  validateName();
	});

	let email = document.getElementById("email");
	email.addEventListener('change', function(){
			  validateEmail();
	});

});

function validateName(){
	axios.post('/register/validate', {
		name: $("#name").val()
	}).then(function (response) {
		gestionarErrores($("#name"), response.data.name);
	}).catch(function (error) {
		console.log(error);
	});
}

function validateEmail(){
	axios.post('/register/validate', {
		email: $("#email").val()
	}).then(function (response) {
		gestionarErrores($("#email"), response.data.email);
	}).catch(function (error) {
		console.log(error);
	});
}

function validarFormularioAxios(){
	let datosFormulario = $("#formulario").serialize();
	axios.post('/register/validar', {
		datosFormulario
	}).then(function(response){
		let formularioCorrecto = true;

		for(let campo in response.data){
			gestionarErrores($(`#${campo}`),
				response.data[$campo])
			){
				formularioCorrecto = false;
			}
		}
		if(formularioCorrecto){
			let formulario = document.getElementById("formulario");
			formulario.submit();
		}
	})
	.catch(function (error) {
		console.log(error);
	})
}

function gestionarErrores(input, errores){
	let hayErrores = false;
	let divErrores = input.next();
	divErrores.html("");
	input.removeClass("bg-success bg-danger");
	for (let error of errores){
		divErrores.append(`<div>${error}</div>`)
	}
	// Para quitar el spinner
	// input.parent().next().remove();
	return hayErrores;
}
