<h2>Crear Usuario</h2>
<form method="post"action="index.php?op=usuario_salvar">
    <!-- Nombre-->
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" id="nombre"name="nombre" aria-describedby="emailHelp" placeholder="Ingrese nombre"required>
  </div>
    <!-- TELEFONO-->
  <div class="form-group">
    <label for="exampleInputEmail1">Telefono</label>
    <input type="text" class="form-control" id="telefono"name="telefono" aria-describedby="emailHelp" placeholder="Ingrese Telefono"required>
  </div>
    <!-- USUARIO-->
    <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" id="usuario"name="usuario" aria-describedby="emailHelp" placeholder="Ingrese Usuario"required>
  </div>
 <!-- CONTRASEÑA-->

  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="text" class="form-control" id="clave"name="clave" placeholder="Password"required>
  </div>
     <!-- IDIOMAS -->
     <?php 
     // Conexión a la BD
     include("./arvhivos/config.php");
     //Consulta
     $consulta = "SELECT `id`, `nombre` FROM `idioma` ";
     // Ejecutar la consulta
     $resultado = mysqli_query($conexion, $consulta) or die(mysql_error());
     ?>
     <div class="form-group">
          <label for="exampleInputPassword1">Idiomas</label><br>

          <?php 
          while ($idioma = mysqli_fetch_array($resultado)){
          ?>
          <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="idioma" name="idioma[]" value="<?=$idioma["id"]?>">
               <label class="form-check-label" for="idioma"><?=$idioma["nombre"]?></label>
          </div>
          <?php 
          } // while
          ?>
     </div> 

  <!-- Sexo   radio-->
  <div class="form-group">
    <label for="exampleInputPassword1">Sexo</label><br>

    <?php 
        $sexo= ["M","F"];
    for ($i=0; $i <count($sexo) ; $i++) { ?>
   

   <label class="form-check-label">
   <input type="radio" class="form-check-input" name="sexo" id="sexo" value=<?=$sexo[$i]?>>
   <?=$sexo[$i]?>

 </label>
<?php } ?>
  </div>

    <!-- Departamento   Select-->
 <?php  
//conexion a la BD
include("./arvhivos/config.php");
//CONSULTA
$consultad="SELECT `id`, `nombre` FROM `departamento`";

//EJECUTAR LA CONSULTA
$resultadod = mysqli_query($conexion, $consultad) or die(mysql_error());
?>
<div class="form-group">
    <label for="exampleInputPassword1">Departamento</label>
    <select class="form-select" aria-label="Default select example"name="departamento"id="departamento">
            <option selected>Seleccione</option>

          <?php  while($departamento=mysqli_fetch_array($resultadod)){?>
                <option value="<?=$departamento["id"]?>"> <?=$departamento["nombre"]?></option>
              <?php }?>

          </select>
  </div>

      <!-- Subir imagen -->
      <div class="mb-3">
          <label for="formFile" class="form-label">Subir Imagen</label>
          <input class="form-control" type="file" id="formFile">
     </div>

     <!-- Biografía -->
     <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Biografía</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
     </div>
 <!-- Guardar-->
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>