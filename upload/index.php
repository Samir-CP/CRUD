<!DOCTYPE html>
<html>



<style>
/* Estilo para ver la imagen previsualizada, con un ancho de 200px */
#preview {
  border:1px solid #ddd;
  padding:5px;
  border-radius:2px;
  background:#fff;
  max-width:200px;
}
#preview img {width:100%;display:block;}
</style>

<body>

<form action="subir.php" method="post" enctype="multipart/form-data">
	Titulo:
	<p><input type="text" name="titulo" id="titulo"></p>
	Seleccione un archivo:
	<p><input type="file" name="file[]" id="file" multiple></p>
	<hr>
	<div id="preview"></div>
	
	<p><input type="submit" value="Upload Image" name="submit"></p>
</form>

<script>
// Este script previsualiza la imagen a cargar
	document.getElementById("file").onchange = function(e) {
	let reader = new FileReader();
  
	reader.onload = function(){
    let preview = document.getElementById('preview'),
    		image = document.createElement('img');

    image.src = reader.result;
    
    preview.innerHTML = '';
    preview.append(image);
  };
 
  reader.readAsDataURL(e.target.files[0]);
}
</script>

</body>
</html>