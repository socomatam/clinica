$(document).ready(function(){
			
	$('.check_all').click(function() {
		if ($(this).prop('checked')) {
			$('.check').prop('checked', true);
		} else {
			$('.check').prop('checked', false);
		}
	});

	//Borrar los registros seleccionados
	$("#borrar").click(function(){
		$('.check').each(function(e){
			if($(this).prop('checked')){
				let id = $(this).closest('tr').attr('data-id');
				let tr = $(this).closest('tr');
				$.ajax({
					url: location.href + '/destroy/' + id,
					type: 'DELETE',
					data: {
						"_token": $("meta[name='csrf-token']").attr("content")
					},
					 success: function(respuesta){
						if (respuesta=="error"){
							toastr.warning(`No se puede borrar el registro ${id} debido a la entidad referencial.`,"Error");
						}else{
							toastr.success(`El registro ${id} se borró correctamente.`, "Éxito");
							tr.fadeOut();
						}
					},
				});
			}
		});
	}); //fin borrar

});