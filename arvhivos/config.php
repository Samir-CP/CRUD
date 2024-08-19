<?php
//DATOS DE CONEXION
$servername = "localhost";
$database = "pruebapi";
$username = "root";
$contra = "";

//CREAR LA CONEXION
$conexion = mysqli_connect($servername,$username ,$contra, $database);

//VERIFICAR LA CONEXION
//if(!$conexion){
  //  die("Conexion fallada ".mysqli_connect_error());
//}
//echo "Conexion Correcta";