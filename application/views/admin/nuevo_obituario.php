<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Obituario</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/stylesheets/estilo.css') ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/javascripts/jquery-1.11.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('AjaxFileUploader/ajaxfileupload.js') ?>"></script>
	<script type="text/javascript">
	$(document).on("ready", function(){
		$('.foto-persona-adm').on('click', function() {
			$("#fileToUpload").trigger("click");
		});
		$("body").on("change","#fileToUpload", function(){
			ajaxFileUpload();
		});
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
	});

	function ajaxFileUpload()
	{
		var base_url = $("#base_url").val();
		
		$.ajaxFileUpload({
				url:'<?php echo base_url('AjaxFileUploader/doajaxfileupload.php') ?>',
				secureuri:false,
				fileElementId:'fileToUpload', //Este nombre va tal cual en el archivo .php
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status){
					if(typeof(data.error) != 'undefined'){
						if(data.error != ''){
							alert(data.error);
						}
						else{
							$("#fotografia").attr("src", base_url+"uploads/"+data.fname);
							$("#fname").val(data.fname);
						}
					}
					//console.log(data);
				},
				error: function (data, status, e){
					alert(e);
				}
		})
		return false;
	}
	</script>
</head>
<body>
	<input type="hidden" id="base_url" value="<?php echo base_url()?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3" id="seccion-obituario" >
				<div class="informacion">
					<div class="field">
						<br>
						<br>
						<div class="img-circle foto-persona-adm">
							<img src="<?php echo base_url('assets/images/subirfoto.png')?>" alt="" id="fotografia">
						</div>
						<div class="text-center">
							<div class="fileUpload btn btn-success">
								<span>seleccionar foto</span>
								<input type="file" class="upload" name="fileToUpload" id="fileToUpload"/>
							</div>
						</div>
					</div>
					<form action="<?php echo site_url('admin/nuevo_obituario_JSON') ?>" id="obituarioForm">
						<input type="hidden" name="fname" id="fname" value="">
						<div class="field">
							<label>Nombre del difunto</label>
							<input type="text" name="nombre" class="form-control">
						</div>
						<div class="field">
							<label>Breve semblanza</label>
							<textarea name="semblanza" cols="30" rows="10" class="form-control"></textarea>
						</div>
						<input type="submit" class="btn-siguiente" value="Guardar">
					</form>
					<div id="aviso">
						<div class="bg-danger">Ha sucedido un error, intentelo mas tarde.</div>
						<div class="bg-success">Gracias uno de nuestros ejecutivos te contactara.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>