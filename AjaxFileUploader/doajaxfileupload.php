<?php
	$error = "";
	$msg = "";
	$filename="";
	$exist="";
	$fileElementName = 'fileToUpload';
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'El archivo excede el tamaño en la directiva upload_max_filesize en php.ini';
				break;
			case '2':
				$error = 'El archivo excede el tamaño maximo especificado en el formulario';
				break;
			case '3':
				$error = 'El archivo fue parcialmente cargado';
				break;
			case '4':
				$error = 'No se cargó ningun archivo';
				break;
			case '6':
				$error = 'Falta un directorio temporal';
				break;
			case '7':
				$error = 'Falla al escribir archivo en disco';
				break;
			case '8':
				$error = 'Carga detenida por extención';
				break;
			case '999':
			default:
				$error = 'Codigo de error no disponible';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none'){
		$error = 'No file was uploaded..';
	}
	else{
		$msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
		$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
		//$filename = $_FILES['fileToUpload']['name'];
		$exp = explode(".", $_FILES["fileToUpload"]["name"]);
		$filename = round(microtime(true)) . '.' . end($exp);
		//for security reason, we force to remove all uploaded file
		@unlink($_FILES['fileToUpload']);
		
		if (!file_exists("../uploads/".$filename)){
			//$imagen = $_FILES['fileToUpload']['name'];
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../uploads/".$filename);
			$url = "../uploads/" . $filename;
			chmod($url, 0777);
		}
		else{
			$msg = "El archivo ya existe";
		}
	}		
	echo json_encode(array(
		'error'	=> $error,
		'msg'	=> $msg,
		'fname'	=> $filename
	));
?>