<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cotizaciones</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/estilo.css') ?>">
	<!--<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>-->

	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/jquery-1.11.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/bootstrap.min.js') ?>"></script>
	<script type="text/javascript">
	$(document).on('ready', function(){
		$('form').on('submit', function(){
			$.ajax({
				url: $(this).attr('action'),
				data: $(this).serialize(),
				type: 'POST',
				dataType: 'JSON',
				success: function(data){
					$('#aviso .bg-success').slideDown();
				},
				error: function(){
					$('#aviso .bg-error').slideDown();
				}
			})
			return false;
		})
	})
	</script>
</head>
<body>
	<div class="container" id="seccion-cotizacion">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2 class="titulo">Ingresa tus datos para que un ejecutivo te contacte</h2>
			</div>
			<div id="aviso" class="col-sm-12">
				<div class="bg-danger">Ha sucedido un error, intentelo mas tarde.</div>
				<div class="bg-success">Gracias uno de nuestros ejecutivos te contactara.</div>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<form action="<?php echo site_url('sistema/solicitar_cotizacion')?>" method="post">
					<div class="field">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control">
					</div>
					<div class="field">
						<label>Teléfono</label>
						<input type="text" name="telefono" class="form-control">
					</div>
					<div class="field">
						<label>Correo eléctronico</label>
						<input type="text" name="correo" class="form-control">
					</div>
					<input type="submit" id="btn-contactar" class="btn" value="Contactar">
				</form>
			</div>
		</div>
	</div>
</body>
</html>