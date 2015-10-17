<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Panel de administración</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/bootstrap.min.css') ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/jquery-1.11.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/bootstrap.min.js') ?>"></script>
</head>
<body>
	<ul>
		<li>
			<a href="<?php echo site_url('admin/lista_fechas')?>">Fechas agendadas</a>
		</li>
		<li>
			<a href="<?php echo site_url('admin/lista_cotizaciones')?>">Cotizaciones solicitadas</a>
		</li>
		<li>
			<a href="<?php echo site_url('admin/nuevo_obituario')?>">Obituario</a>
		</li>
	</ul>
</body>
</html>