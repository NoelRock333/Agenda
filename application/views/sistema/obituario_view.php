<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Obituario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/estilo.css') ?>">
	<!--<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>-->

	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/jquery-1.11.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/bootstrap.min.js') ?>"></script>
	<script type="text/javascript">
	$(document).on('ready', function(){
		$('form').on('submit', function(){
			$form = $(this);
			$.ajax({
				url: $form.attr('action'),
				data: $form.serialize(),
				type: 'POST',
				dataType: 'JSON',
				success: function(data){
					$form.hide('slow');
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
	<div class="container" id="seccion-obituario">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="titulo">Obituario</h2>
			</div>
			<div class="col-sm-6 col-sm-offset-3 text-center">
				<div class="informacion">
					<div class="img-circle foto-persona">
						<img src="<?php echo base_url('uploads/'.$obituario[0]->fname)?>" alt="">
					</div>
					<span class="nombre"><?php echo $obituario[0]->nombre ?></span>
					<span class="semblanza"><?php echo $obituario[0]->semblanza ?></span>
				</div>
				<div id="aviso" class="col-sm-12">
					<div class="bg-danger">Ha sucedido un error, intentelo mas tarde.</div>
					<div class="bg-success">Gracias por compartir tu historia con nosotros.</div>
				</div>
				<form action="<?php echo site_url('sistema/compartir_historia')?>" method="post">
					<input type="hidden" name="id_obituario" value="1">
					<div class="field">
						<label for="anecdota">Comparte una anecdota:</label>
						<textarea name="anecdota" id="anecdota" cols="30" rows="5" class="form-control"></textarea>
					</div>
					<input type="submit" id="btn-compartir" class="btn" value="COMPARTIR" />
				</form>
				<br>
				<br>
				<br>
			</div>
		</div>
	</div>
</body>
</html>