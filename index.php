<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Página Inicial</title>
</head>

<body>
<div class="container">
    <div class="bg-dark p-3">
	<h1 class="page-header text-center text-light">Carros</h1>
    </div>
    
	<div class="row">
		<div class="col-sm-8 mt-3">
            <button id="addnew" type="button" class="btn btn-success btn-sm mb-2 edit" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Adicionar</button>
            
			<div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
            	<button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message"></span>
            </div>  
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
				<th scope="col">Id</th>
				<th scope="col">Chassi</th>
				<th scope="col">Modelo</th>
				<th scope="col">Marca</th>
				<th scope="col">Placa</th>
				<th scope="col">Ano</th>
				<th scope="col">Caracteristicas</th>
				<th scope="col">Ação</th>
				</thead>
				<tbody id="tbody"></tbody>
			</table>
		</div> 

        <?php include('form_filter.php');?>
       
	</div>    
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="js.js"></script>
    
<!-- Modals -->
<?php include('modal.html'); ?>
</body>

</html>
