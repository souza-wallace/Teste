$(document).ready(function(){
	fetch();
	function fetch(){
		$.ajax({
			method: 'POST',
			url: 'fetch.php',
			dataType: 'json',
			success: function(response){
				response.forEach(carro => {
					$('#tbody').append(`
					<tr id="${carro.ID}">
						<td>${carro.ID}</td>
						<td>${carro.chassi}</td>
						<td>${carro.marca}</td>
						<td>${carro.modelo}</td>
						<td>${carro.placa}</td>
						<td>${carro.ano}</td>
						<td>${carro.caracteristicas}</td>
						<td>
							<button type="button" class="btn btn-warning btn-sm mb-2 edit" data-id="${carro.ID}" data-toggle="modal" data-target="#editar"> <i class="fas fa-edit"></i> Editar</button>
							<button type="button" class="btn btn-danger  btn-sm delete"  data-id="${carro.ID}" data-toggle="modal" data-target="#deletar">  <i class="fas fa-trash"></i> Deletar</button>
						</td>
					</tr>
					`);
				});
			}
		});
	}
	
	$('#addForm').submit(function(e){
		e.preventDefault();
		var addform = $(this).serialize();
		$.ajax({
			method: 'POST',
			url: 'insert.php',
			data: addform,
			dataType: 'json',
			success: function(response){
				
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#addModal').modal('hide');
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
					setTimeout(function () {
						window.location.reload(1);
					}, 1500);					
				}
			}
		});
	});
	//
 
	
	$(document).on('click', '.edit', function(){
		var id = $(this).data('id');
		getDetails(id);        
        $("#id_").attr("value", id );
		$('#edit').modal('show');
        
	});
	$('#editForm').submit(function(e){
		e.preventDefault();
		var editform = $(this).serialize();
        var id = $('id_').val()
		$.ajax({
			method: 'POST',
			url: 'edit.php',
			data: editform,
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();				
				}
 
				$('#edit').modal('hide');
			}
		});
	});
	//
 
	
	$(document).on('click', '.delete', function(){
		var id = $(this).data('id');        
		getDetails(id);
		$.ajax({
			method: 'POST', 
			url: 'delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);					
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
					setTimeout(function () {
						window.location.reload(1);
					}, 1000);
				}
 
				$('#delete').modal('hide');
			}
		});
	});
 
	
	$(document).on('click', '.close', function(){
		$('#alert').hide();
	});
 
});
 
 
function getDetails(id){
	$.ajax({
		method: 'POST',
		url: 'fetch_row.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
		}
	});
}

	$('#filtro').submit(function(e){

		e.preventDefault();
		var array = [];
		var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
		for (var i = 0; i < checkboxes.length; i++){
			array.push(checkboxes[i].value)
			var filtros = array.sort();	
		}
		$.ajax({
			type: "POST",
			url: "filtro.php",
			data: {filtros, action:'filtro'},
			dataType: "json",
			success: function (response) {
				$('#tbody').html('')
				response.forEach(carro => {
					$('#tbody').append(`
					<tr id="${carro.ID}">
						<td>${carro.ID}</td>
						<td>${carro.chassi}</td>
						<td>${carro.marca}</td>
						<td>${carro.modelo}</td>
						<td>${carro.placa}</td>
						<td>${carro.ano}</td>
						<td>${carro.caracteristicas}</td>
						<td>
							<button type="button" class="btn btn-warning btn-sm mb-2 edit" data-id="${carro.ID}" data-toggle="modal" data-target="#editar"> <i class="fas fa-edit"></i> Editar</button>
							<button type="button" class="btn btn-danger  btn-sm delete"  data-id="${carro.ID}" data-toggle="modal" data-target="#deletar">  <i class="fas fa-trash"></i> Deletar</button>
						</td>
					</tr>
					`);
				});
				
			}
		});
	});
	$('.clean').click(function (e) { 
		e.preventDefault();
		window.location.reload();
	});

