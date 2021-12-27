$(document).ready(function(){
	fetch();
	//add
	$('#addnew').click(function(){
		$('#add').modal('show');
	});
	$('#addForm').submit(function(e){
		e.preventDefault();
		var addform = $(this).serialize();
		console.log(addform);
		$.ajax({
			method: 'POST',
			url: 'insert.php',
			data: addform,
			dataType: 'json',
			success: function(response){
				$('#add').modal('hide');
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}
			}
		});
	});
	//
 
	//edit
	$(document).on('click', '.edit', function(){
		var id = $(this).data('id');
		getDetails(id);        
        $("#id_").attr("value", id );
		$('#edit').modal('show');
        
	});
	$('#editForm').submit(function(e){
		e.preventDefault();
		var editform = $(this).serialize();
        console.log(editform)
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
 
	//delete
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
				}
 
				$('#delete').modal('hide');
			}
		});
	});
 
	//hide message
	$(document).on('click', '.close', function(){
		$('#alert').hide();
	});
 
});
 
function fetch(){
	$.ajax({
		method: 'POST',
		url: 'fetch.php',
		success: function(response){
			$('#tbody').html(response);
		}
	});
}
 
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
