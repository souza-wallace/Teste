<?php
	include_once('connection.php');
 
	$output = array('error' => false);
 
	$database = new Connection();
	$db = $database->open();
	try{
		$sql = "DELETE FROM Carros WHERE id = '".$_POST['id']."'";
		//if-else statement in executing our query
		if($db->exec($sql)){
			$output['message'] = ' Carro deletado com sucesso';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Não foi possivel apagar deletar carro.';
		} 
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();;
	}
 
	//close connection
	$database->close();
 
	echo json_encode($output);
 
?>