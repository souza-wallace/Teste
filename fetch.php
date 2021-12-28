<?php
	include_once('connection.php');

	$database = new Connection();
	$db = $database->open();
 
	try{	
	    $sql = 'SELECT * FROM Carros ORDER BY ID DESC';
	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr id="<?php echo $row['ID']; ?>">
	    		<td><?php echo $row['ID']; ?></td>
	    		<td><?php echo $row['chassi']; ?></td>
	    		<td><?php echo $row['marca']; ?></td>
	    		<td><?php echo $row['modelo']; ?></td>
                <td><?php echo $row['placa']; ?></td>
	    		<td><?php echo $row['ano']; ?></td>
                <td><?php echo $row['caracteristicas'];?></td>

	    		<td>
	    			<button type="button" class="btn btn-warning btn-sm mb-2 edit" data-id="<?php echo $row['ID']; ?>" data-toggle="modal" data-target="#editar"> <i class="fas fa-edit"></i> Editar</button>
                    <button type="button" class="btn btn-danger  btn-sm delete"  data-id="<?php echo $row['ID']; ?>" data-toggle="modal" data-target="#deletar">  <i class="fas fa-trash"></i> Deletar</button>
                </td>
	    	</tr>
	    	<?php 
	    }
	}
	catch(PDOException $e){
		echo " problema na conexão: " . $e->getMessage();
	}
 
	//close connection
	$database->close();
    
 
?>