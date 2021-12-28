<?php
	include_once('connection.php');
 
	$output = array('error' => false);
 
	$database = new Connection();
	$db = $database->open();
	try{
		$id = $_POST['id'];
		$chassi = $_POST['chassi']; 
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $placa = $_POST['placa'];
        $ano = $_POST['ano'];
        $caracteristicas = $_POST['caracteristicas'];
 
		$sql = "UPDATE Carros SET chassi = '$chassi', modelo = '$modelo', marca = '$marca', ano = '$ano', caracteristicas = '$caracteristicas' WHERE id = '$id'";
		//var_dump($sql);exit;
        //if-else statement in executing our query
		if($db->exec($sql)){
			$output['message'] = 'Carro atualizado com sucesso!';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Ocorreu um erro, não foi possível alterar o carro.';
		}
 
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}
 
	$database->close();
 
	echo json_encode($output);
 
?>