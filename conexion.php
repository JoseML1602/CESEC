<?php
  $servidor="localhost";
  $nombreBd="cesec";
  $usuario="root";
  $pass="12345678";
  $conexion = new mysqli($servidor,$usuario,$pass,$nombreBd);
  if($conexion -> connect_error){
    die("No es posible conectar");
  }
?>
