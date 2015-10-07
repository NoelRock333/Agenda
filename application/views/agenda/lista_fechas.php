<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs/jqc-1.11.3,dt-1.10.9/datatables.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/bootstrap.min.css') ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/jquery-1.11.1.min.js') ?>"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/r/bs/jqc-1.11.3,dt-1.10.9/datatables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	    	$('#tabla-fechas').DataTable();
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			    <h3>Fechas y horas propuestas</h3>
			    <table class="table" id="tabla-fechas">
			    	<thead>
				        <tr>
				            <th>Correo</th>
				            <th>Fecha</th>
				            <th>Hora</th>
				            <th></th>
				        </tr>
			    	</thead>
			    	<tbody>
				        <?php foreach ($fechas as $row): ?>
				            <tr class="js_tr_fecha row_fecha" data-id="<?php echo $row->id; ?>">
				                <td><?php echo $row->correo ?></td>
				                <td><?php echo date("d/m/Y", strtotime($row->fecha)) ?></td>
				                <td><?php echo $row->hora ?></td>
				                <td class="accion text-right">
				                </td>
				            </tr>
				        <?php endforeach; ?>
			    	</tbody>
			    </table>
			</div>
		</div>
	    <br>
	</div>
</body>
</html>