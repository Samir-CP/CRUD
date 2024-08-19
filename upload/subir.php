<?php
if(isset($_POST['submit'])){
	/* CAPTURANDO PARAMETROS */
	$titulo 		= $_POST["titulo"];  			echo "Titulo: ".$titulo."<br>";

	$target_dir = "images/";
	$uploadOk = 1;
	$tamano = 500000000;

	// Número de archivos
	$countfiles = count($_FILES['file']['name']);

	// Looping all files
	for($i=0;$i<$countfiles;$i++){
		
		$uploadOk = 1;
		
		$filename = $_FILES['file']['name'][$i];
		$target_file = $target_dir . basename($filename);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		// Controlando si existe archivo
		if (file_exists($target_file)) {
			echo "Lo siento, el archivo <B>".basename($filename)."</B> ya existe<br>";
			$uploadOk = 0;
		}
		
		// Verificando si el archivo es muy grande
		if ($_FILES["file"]["size"][$i] > $tamano) {
			echo "Lo siento el archvio <B>".basename($filename)."</B> es muy grande (debe ser menor a <B>".$tamano."</B> Kb)<br>";
			$uploadOk = 0;
		}
		
		// Verificando si el archivo es el formato permitido (KML)
		if($imageFileType != "jpg" && $imageFileType != "kmz") {
			echo "Lo siento, el archivo <B>".basename($filename)."</B> no es un archivo permitido<br>";
			$uploadOk = 0;
		}
		
		if ($uploadOk == 1) {
			// Cargando archivo a la carpeta images
			move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_file);
			echo "¡El archivo <B>".basename($filename)."</B> se subió satisfactoriamente!<br>";
		} else {
			echo "¡El archivo <B>".basename($filename)."</B> no se subió!<br>";
		}
	} 
} 
?>