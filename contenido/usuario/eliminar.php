<?php
echo "<h2>Eliminando Usuario</h2>";
//obtener id del usuario
$id = $_GET['id'];
echo "Id:" . $id . "<br>";

//conexion a bd
include("./arvhivos/config.php");

//crear consulta 
$consulta = "DELETE FROM `usuario` WHERE id='$id'";

$resultado = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
if($resultado){
    echo "Se elimino satisfactoriamente";
    echo '<script>location.href="index.php?op=usuario_listar";</script>';
}else{
    echo "No se pudo eliminar el registro";
}
//cerrar al conexion
mysqli_close($conexion);