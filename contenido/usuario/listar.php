<h2>Listado de usuarios</h2>
<?php
//conexion a la BD
include("./arvhivos/config.php");
//CONSULTA
//$consulta="SELECT `id`, `nombre`, `telefono`, `usuario`, `clave`,`idioma`, `sexo`, `departamento` FROM `usuario`";
$consulta = "SELECT 
u.id AS idU,
u.nombre AS nombreU,
u.usuario AS usuarioU,
u.clave AS claveU,
u.idioma AS idiomaU,
u.sexo AS sexoU,
u.departamento AS depU,
d.id AS idD,
d.nombre AS nombreD
 FROM 
usuario AS u
INNER JOIN departamento AS d ON (d.id=u.departamento)";
//EJECUTAR LA CONSULTA
$resultado = mysqli_query($conexion, $consulta) or die(mysql_error());

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Idioma</th>
      <th scope="col">Sexo</th>
      <th scope="col">Departamento</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
   <?php
   while ($usuarios = mysqli_fetch_array($resultado)) {

   ?>
    <tr>
      <th scope="row"><?= $usuarios["idU"]?> </th>
      <td><?= $usuarios["nombreU"]?></td>
      <td><?= $usuarios["usuarioU"]?></td>
      <td><?= $usuarios["claveU"]?></td>

      <td>
       
        <?php
         //IDIOMA
     $idiomas = explode("|", $usuarios["idiomaU"]);
     for($i=0;$i<count($idiomas);$i++){
       $consultaI = "SELECT `id`, `nombre` FROM `idioma` WHERE id='".$idiomas[$i]."' ";
       $resultadoI = mysqli_query($conexion, $consultaI) or die(mysql_error());
       $idiomaUsuario = mysqli_fetch_array($resultadoI);
       echo $idiomaUsuario["nombre"] . ",";
     }
        ?>
      </td>
      <td><?= $usuarios["sexoU"]?></td>
      <td>
        <?php
        echo $usuarios["nombreD"]
        
        ?>
      </td>
      <td>
               <!-- Botón editar -->
               <button type="button" class="btn btn-outline-success btn-sm" title="<?=$usuarios['idU']?>" onclick="location.href='index.php?op=usuario_editar&id=<?=$usuarios['idU']?>'">Editar</button>
                    <!-- Botón eliminar -->
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmation(<?=$usuarios['idU']?>)">Eliminar</button>
    </td>
    </tr>
    <?php
   }//while
   ?>
  </tbody>
</table>
<script>
  function confirmation(id1){
      var result=confirm("¿Esta seguro de eliminar?");
      if(result){
        location.href="index.php?op=usuario_eliminar&id="+id1;
      }
  }

</script>