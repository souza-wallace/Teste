<?php
	include_once('connection.php');

	$database = new Connection();
	$db = $database->open();
	
		
            $filtros = $_POST['filtros'];
            if($filtros != NULL){

                $filtro1 = $filtros[0];
                $filtro2 = $filtros[1];
                $filtro3 = $filtros[2];
                $filtro4 = $filtros[3];
                $filtro5 = $filtros[4];
                $filtro6 = $filtros[5];
                
                $stmt = $db->prepare("SELECT * FROM Carros WHERE caracteristicas IN (?,?,?,?,?,?) ");
                $stmt->execute([$filtro1,$filtro2,$filtro3,$filtro4,$filtro5,$filtro6]); 
                //var_dump($stmt);exit;
                $data = $stmt->fetchAll();
                //var_dump($data);exit;
    
                 echo json_encode($data);
            } else{
                include('fetch.php');
            }          
		$database->close();   
        exit;
?>