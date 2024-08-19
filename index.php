<?php
//controlando paraemtros get que ingresan a traves de la URL
//ej.localhost/cursojs/index.php?op=leccion1_prueba
if(empty($_GET["op"])){
    $ruta="contenido principal";
}else{
    $op=$_GET["op"];
    //separando nombre carpeta de archivo
    $parametros=explode("_",$op);
    $carpeta=$parametros[0];//este es el nombre de la carpeta leccion1
    $archivo=$parametros[1];//es el nombre dela archivo prueba.php

    if($carpeta!=""){//si la carpeta no esta vacio
        $ruta=$carpeta."/".$archivo; //leccion1/prueba.php
    }else{
        //enviar un archivo de error 404
    }
}//if empty
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso de JavaScript</title>
  <!-- Css Bootstrap-->  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <!-- Css jAVA sRIPT-->  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!-- bootstrap icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
        
    <div class="container">
         <!-- eNCABEZADO-->  
        <div class="row bg-warning border-bottom">
            <div class="col -12 p-2  text-center">

        <?php include("arvhivos/encabezado.php");?>
            </div>
    </div>
    
     <!-- CONTENIDO-->  
    <div class="row ">
            <div class="col bg-warning col-lg-3 p-2">
            <?php include("arvhivos/menuvertical.php");?>
           
            </div>
            <div class="col  col-lg-9 p-2 border" style="height:900px">
            <?php include("./contenido/".$ruta.".php")?>
            </div>
           
    </div>
     <!-- PIE DE PAGINA-->  
    <div class="row bg-dark">
            <div class="col -12 p-2  text-center text-white">
                
            <?php include("arvhivos/pie.php");?>
            </div>
           
    </div>
</div>


</body>
</html>