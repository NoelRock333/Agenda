<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cotizaciones solicitadas</title>
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
			    <h3>Cotizaciones solicitadas</h3>
			    <table class="table" id="tabla-fechas">
			    	<thead>
				        <tr>
				            <th>Nombre</th>
				            <th>Correo</th>
				            <th>Telefono</th>
				            <th></th>
				        </tr>
			    	</thead>
			    	<tbody>
				        <?php foreach ($cotizaciones as $row): ?>
				            <tr class="js_tr_cotizacion row_cotizacion" data-id="<?php echo $row->id; ?>">
				                <td><?php echo $row->nombre ?></td>
				                <td><?php echo $row->correo ?></td>
				                <td><?php echo $row->telefono ?></td>
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