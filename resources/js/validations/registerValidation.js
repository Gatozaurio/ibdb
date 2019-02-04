document.addEventListener('DOMContentLoaded',function(){

	let name = document.getElementById("name");
	name.addEventListener('change', function(){
			  validateName();
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
