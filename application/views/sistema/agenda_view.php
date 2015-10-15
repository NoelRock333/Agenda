<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Agenda</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/bootstrap-datetimepicker.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/estilo.css') ?>">
	<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/jquery-1.11.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/moment.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/moment-with-locales.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/bootstrap-datetimepicker.min.js') ?>"></script>
	<script type="text/javascript">
		$(function () {
			$('#datetimepicker12').datetimepicker({
				inline: true,
				locale: 'es'
			});

			$("#datetimepicker12").on("dp.change", function(){
				var fecha = $('#datetimepicker12').data('date');
				$(".fecha-hora").text(fecha);
			});

			$(".picker-switch.accordion-toggle a").on("click", function(){
				$titulo = $("#panel-seleccion .titulo");

				if($(".timepicker").is(":visible")){
					$titulo.text("Escoge la fecha");
					$("#btn-fecha").show();
					$("#btn-verificar").hide();
				}
				else{
					$titulo.text("Escoge el horario");
					$("#btn-fecha").hide();
					$("#btn-verificar").show();
				}
			});

			$("#btn-fecha").on("click", function(){
				$(".picker-switch.accordion-toggle a").trigger("click");
			});

			$(".btn-siguiente").on("click", function(){
				var siguiente = $(this).data("siguiente");
				$(".panel-collapse.collapse").removeClass("in");
				$(siguiente).addClass("in");
			});

			$("#btn-modificar").on("click", function(){
				if($(".timepicker").is(":visible")){
					$(".picker-switch.accordion-toggle a").trigger("click");
				}
				$(".panel-collapse.collapse").removeClass("in");
				$("#panel-registro").addClass("in");
			})

			$("#btn-verificar").on("click", function(){
				var fecha 	= $('#datetimepicker12').data('date');
				var nombre 	= $("#nombre").val();
				var telefono = $("#telefono").val();
				var correo 	= $("#correo").val();
				var tipo 	= $("#tipo").val();

				$("#span-fechahora").text(fecha);
				$("#span-nombre").text(nombre);
				$("#span-telefono").text(telefono);
				$("#span-correo").text(correo);
				$("#span-tipo").text(tipo);
				$(".modal").modal();
			});

			$("#btn-agendar").on("click", function(){
				var datos = {
					fecha: 	$('#datetimepicker12').data('date'),
					nombre: $("#nombre").val(),
					telefono: $("#telefono").val(),
					correo: $("#correo").val(),
					tipo: 	$("#tipo").val()
				}
				$.ajax({
					url: "<?php echo site_url('sistema/agregar_fecha') ?>",
					type: "POST",
					dataType: "JSON",
					data: datos,
					success: function(data){
						console.log(data);
						window.location = "/";
					}
				});
			});

		});
	</script>
</head>
<body>
	<div class="container">
		<div class="panel-group" id="accordion">

			<div id="panel-registro" class="row panel-collapse collapse in">
				<div class="col-sm-12 text-center">
					<h2 class="titulo">Formulario de registro</h2>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<div class="edit-field">
						<label for="">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre">
					</div>
					<div class="edit-field">
						<label for="">Teléfono</label>
						<input type="text" class="form-control" name="telefono" id="telefono">
					</div>
					<div class="edit-field">
						<label for="">Correo</label>
						<input type="text" class="form-control" name="correo" id="correo">
					</div>
					<div class="btn btn-siguiente" data-siguiente="#panel-tipos">Siguiente</div>
				</div>
			</div>

			<div id="panel-tipos" class="row panel-collapse collapse">
				<div class="col-sm-12 text-center">
					<h2 class="titulo">Tipo de cita</h2>
				</div>
				<div class="col-md-4 col-md-offset-4 text-center">
					<div class="edit-field">
						<select name="tipo" id="tipo">
							<option value="Grupal">Grupal</option>
							<option value="Individual">Individual</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<div class="btn btn-success btn-siguiente" data-siguiente="#panel-seleccion">Siguiente</div>
				</div>
			</div>

			<div id="panel-seleccion" class="row panel-collapse collapse">
				<div class="col-sm-12 text-center">
					<h2 class="titulo">Escoge la fecha</h2>
				</div>
				<div class="col-md-4 col-md-offset-4 text-right" >
					<div id="datetimepicker12"></div>
					<span class="fecha-hora"></span>
					<br>
					<br>
					<div class="btn" id="btn-fecha">Siguiente</div>
					<div class="btn" id="btn-verificar">Verificar</div>
				</div>
			</div>

		</div>
	</div>

	<div class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Verificación de información</h4>
				</div>
				<div class="modal-body">
					<div class="field">
						<label>Nombre:</label>
						<span id="span-nombre"></span>
					</div>
					<div class="field">
						<label>Teléfono:</label>
						<span id="span-telefono"></span>
					</div>
					<div class="field">
						<label>Correo:</label>
						<span id="span-correo"></span>
					</div>
					<div class="field">
						<label>Tipo:</label>
						<span id="span-tipo"></span>
					</div>
					<div class="field">
						<label>Fecha y hora:</label>
						<span id="span-fechahora"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="btn-modificar">Modificar</button>
					<button type="button" class="btn btn-success" id="btn-agendar">Agendar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

</body>
</html>