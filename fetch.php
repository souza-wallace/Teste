<?php
	include_once('connection.php');

	$database = new Connection();
	$db = $database->open();
 
	try{	
	    $sql = 'SELECT * FROM Carros ORDER BY ID DESC';
		$data = $db->query($sql)->fetchAll();
		echo json_encode($data);

	}
	catch(PDOException $e){
		echo " problema na conexão: " . $e->getMessage();
	}
 
	$database->close();
	exit;
    
 
?>