jQuery(document).ready(function(){

jQuery(".msg-basico").click(function() {
	swal("Seleccione un sorteo");
});

jQuery(".msg-basico-txt").click(function() {
	
	let selected = Array.from(sorteoloto.options)
    .filter(option => option.selected)
    .map(option => option.value);

  	//alert(selected);
    
    
    if (selected=="") {
    	swal("Suministre el sorteo");
		//alert("Suministre un numero Valido aqui");
		//return false;sorteo
		return false;
    }

	var x = document.forms["myForm"]["buscar_txt"].value;
    if (x == "") {
    	swal("Suministre un animalito");
		//alert("Suministre un numero Valido aqui");
		return false;
    }
    var x = document.forms["myForm"]["monto"].value;
    if (x == "") {
    	swal("Suministre el monto");
		//alert("Suministre un numero Valido aqui");
		return false;
    }

    
    document.forms["myForm"].submit();
	//swal("Dato Faltante", "Seleccione un sorteo");
});

jQuery(".msg-exito").click(function() {
	swal("¡Bien!", "Has hecho clic en el botón :)", "success");
});

jQuery(".msg-warning").click(function() {
	swal({   
		title: "¿Seguro que deseas continuar?",   
		text: "No podrás deshacer este paso...",   
		type: "warning",   
		showCancelButton: true,
		cancelButtonText: "Mmm... mejor no",   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "¡Adelante!",   
		closeOnConfirm: false }, 

		function(){   
			swal("¡Hecho!", 
				"Acabas de vender tu alma al diablo.", 
				"success"); 
	});

});

jQuery(".msg-cond").click(function() {
	swal({   
		title: "¿Deseas unirte al lado oscuro?",   
		text: "Este paso marcará el resto de tu vida...",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "¡Claro!",   
		cancelButtonText: "No, jamás",   
		closeOnConfirm: false,   
		closeOnCancel: false }, 

		function(isConfirm){   
			if (isConfirm) {     
				swal("¡Hecho!", 
					"Ahora eres uno de los nuestros", 
					"success");   
			} else {     
				swal("¡Gallina!", 
					"Tu te lo pierdes...", 
				"error");   
			} 
		});
});

jQuery(".msg-autoclose").click(function() {
	swal({   
		title: "Mensaje con cierre automático",   
		text: "Se cerrará en 3 segundos.",   
		timer: 3000,   
		showConfirmButton: false 
	});

});


});
