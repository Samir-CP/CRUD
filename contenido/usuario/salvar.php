<?php
//obteniendo valores del formulario 
$nombre = $_POST["nombre"];
echo "Nombre: " . $nombre . "<br>";
$telefono = $_POST["telefono"];
echo "Telefono: " . $telefono . "<br>";
$usuario = $_POST["usuario"];
echo "Usuario: " . $usuario . "<br>";   
$clave = $_POST["clave"];
echo "Clave: " . $clave . "<br>";
    $idioma = $_POST["idioma"];
    $idiomas = "";
    if(!empty($_POST['idioma'])){
        // Ciclo para mostrar las casillas checked checkbox.
        for ($i=0; $i<count($idioma); $i++) { 
            $idiomas .= $idioma[$i]."|";     // Imprime resultados
        } // for
        $idiomas = substr($idiomas, 0, -1); echo "Idiomas: ".$idiomas."<br>";
    } // if
$sexo = $_POST["sexo"];
echo "Sexo: " . $sexo . "<br>";
$departamento = $_POST["departamento"];
echo "Departamento: " . $departamento . "<br>";

//conexion a base de datos 
include("./arvhivos/config.php");


//insertar registro a la bd
$consulta = "INSERT INTO `usuario`(
     `nombre`, `telefono`, `usuario`, `clave`, `idioma`, `sexo`, `departamento`) 
    VALUES ('$nombre','$telefono','$usuario','$clave','$idiomas','$sexo','$departamento')";
$resultado = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
if($resultado){
    echo "Se guardo satisfactoriamente";
    echo '<script>location.href="index.php?op=usuario_listar";</script>';
}else{
    echo "No se pudo crear el registro";
}
//cerrar al conexion
mysqli_close($conexion);