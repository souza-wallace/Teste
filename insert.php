<?php
	include_once('connection.php');
 
	$output = array('error' => false);
 
	$database = new Connection();
	$db = $database->open();
	try{
		//make use of prepared statement to prevent sql injection
		$stmt = $db->prepare("INSERT INTO Carros (chassi, marca, modelo, placa, ano, caracteristicas) VALUES (:chassi, :marca, :modelo, :placa, :ano, :caracteristicas)");
		//if-else statement in executing our prepared statement
		if ($stmt->execute(array(':chassi' => $_POST['chassi'] , ':marca' => $_POST['marca'] , ':modelo' => $_POST['modelo'], ':placa' => $_POST['placa'], ':ano' => $_POST['ano'], ':caracteristicas' => $_POST['caracteristicas'])) ){
			$output['message'] = 'Carro adicionado com sucesso!';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Não foi possivel apagar adicionar o carro.';
		} 
 
	}
	catch(PDOException $e){
		$output['error'] = true;
 		$output['message'] = $e->getMessage();
	}
 
	$database->close();
 
	echo json_encode($output);
 
?>