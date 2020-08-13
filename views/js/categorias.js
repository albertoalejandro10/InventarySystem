/* Revisar si la categoria ya esta registrada */
$("#nuevaCategoria").change(function(){

	$(".alert").remove();

    var categoria = $(this).val();

	var datos = new FormData();
	datos.append("validarCategoria", categoria);

	 $.ajax({
	    url:"ajax/categorias.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){

	    	if(respuesta){

	    		$("#nuevaCategoria").parent().after('<div class="alert alert-warning">Este categoria ya existe en la base de datos</div>');

	    		$("#nuevaCategoria").val("");

	    	}

	    }

	})
})
