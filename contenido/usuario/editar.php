<?php
//Obteniendo parametros por el metodo GET
$id = $_GET['id'];
echo "Id: " . $id . "<br>";

//conexion a la BD
include("./arvhivos/config.php");
//CONSULTA
$consulta="SELECT `id`, `nombre`, `telefono`, `usuario`, `clave`, `idioma`, `sexo`, `departamento` FROM `usuario` WHERE id='$id'";

//EJECUTAR LA CONSULTA
$resultado = mysqli_query($conexion, $consulta) or die(mysql_error());
$usuario = mysqli_fetch_array($resultado);
?>

<h2>Editar Usuario</h2>
<form method="post"action="index.php?op=usuario_guardar">

    <!-- id-->
    <input type="hidden" name="id"value="<?=$usuario['id']?>">

    <!-- Nombre-->
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" id="nombre"name="nombre" value="<?=$usuario['nombre']?>"aria-describedby="emailHelp" placeholder="Ingrese nombre"required>
  </div>
    <!-- TELEFONO-->
  <div class="form-group">
    <label for="exampleInputEmail1">Telefono</label>
    <input type="text" class="form-control" id="telefono"name="telefono"value="<?=$usuario['telefono']?>" aria-describedby="emailHelp" placeholder="Ingrese Telefono"required>
  </div>
    <!-- USUARIO-->
    <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" id="usuario"name="usuario"value="<?=$usuario['usuario']?>" aria-describedby="emailHelp" placeholder="Ingrese Usuario"required>
  </div>
 <!-- CONTRASEÑA-->

  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="text" class="form-control" id="clave"name="clave" value="<?=$usuario['clave']?>"placeholder="Password"required>
  </div>
     <!-- IDIOMAS -->
     <?php 
     //Consulta
     $consultaI = "SELECT `id`, `nombre` FROM `idioma` ";
     // Ejecutar la consulta
     $resultadoI = mysqli_query($conexion, $consultaI) or die(mysql_error());
     ?>
     <div class="form-group">
          <label for="exampleInputPassword1">Idiomas</label><br>
          <?php 
          $idiomaS = explode("|", $usuario["idioma"]); 
          while ($idioma = mysqli_fetch_array($resultadoI)){
               $aux = in_array($idioma["id"], $idiomaS);
               $seleccionado = "";
               if ($aux){
                    $seleccionado = "checked";
               }
          ?>
               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="idioma" name="idioma[]" value="<?=$idioma["id"]?>" <?=$seleccionado?>>
                    <label class="form-check-label" for="idioma"><?=$idioma["nombre"]?></label>
               </div>
          <?php 
          } // while
          ?>
     </div>   

   <!-- Sexo-->

   <div class="form-group">
    <label for="exampleInputPassword1">Sexo</label><br>

    <?php 
        $sexo= ["M","F"];
 
    for ($i=0; $i <count($sexo) ; $i++) {
      
      $seleccionado = "";
      if($sexo[$i]==$usuario["sexo"]){
        $seleccionado = "checked";
      }
      ?>
   <label class="form-check-label">
    <?=$sexo[$i]?>
 
   <input type="radio" class="form-check-input" name="sexo" id="sexo" value="<?=$sexo[$i]?>" <?=$seleccionado?>>

   </label>
<?php } ?>
  </div>
   <!-- Deparatmento-->
   <?php  

//CONSULTA
$consultad="SELECT `id`, `nombre` FROM `departamento`";

//EJECUTAR LA CONSULTA
$resultadod = mysqli_query($conexion, $consultad) or die(mysql_error());
?>
   <div class="form-group">
    <label for="exampleInputPassword1">Departamento</label>
    <select class="form-select" aria-label="Default select example"name="departamento"id="departamento">
            <option value="0" selected>Seleccione</option>

          <?php  while($departamento=mysqli_fetch_array($resultadod)){
            $seleccionado = "";
            if($usuario["departamento"]==$departamento["id"]){
              $seleccionado = "selected";
            }
            ?>
                <option value="<?=$departamento["id"]?>"<?=$seleccionado?>><?=$departamento["nombre"]?></option>
              <?php }?>

          </select>
  </div>

 <!-- Guardar-->
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>