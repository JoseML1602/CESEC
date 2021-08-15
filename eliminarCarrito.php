<?php
session_start();
$arreglo =  $_SESSION['cesec'];
for($i=0;$i<count($arreglo);$i++){
      if($arreglo[$i]['Id'] != $_POST['id']){
          $arregloNuevo[]= array(
              'Id'=>$arreglo[$i]['Id'],
              'Nombre'=>$arreglo[$i]['Nombre'],
              'Precio'=>$arreglo[$i]['Precio'],
              'Imagen'=>$arreglo[$i]['Imagen'],
              'Cantidad'=>$arreglo[$i]['Cantidad']
          );
      }
   }
  if(isset($arregloNuevo)){
      $_SESSION['cesec']=$arregloNuevo;
  }else{
    unset($_SESSION['cesec']);
  }
  echo "listo";
 ?>
