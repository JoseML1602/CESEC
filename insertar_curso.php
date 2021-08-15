<?php
include "./conexion.php";

if(isset($_POST['nombre']) && isset($_POST['fecha']) && isset($_POST['descripcion']) && isset($_POST['precio']) ){

      $carpeta="./img/";
      $nombre=$_FILES['imagen']['name'];

      $temp=explode( '.' ,$nombre);
      $extension=end($temp);

      $nombreFinal = time().'.'.$extension;

      if($extension == 'jpg' || $extension == 'png' ){
          if(move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombreFinal)){
                $conexion->query("insert into cursos (nombre,fecha,descripcion,imagen,precio) values
                (
                  '".$_POST['nombre']."',
                  '".$_POST['fecha']."',
                  '".$_POST['descripcion']."',
                  '$nombreFinal',
                  ".$_POST['precio']."
                )

                ")or die($conexion->error);
                  header("Location: ./admin/dashboard/cursos.php?success");
          }else{
              header("Location: ./admin/dashboard/cursos.php?error=No se pudo subir la imagen");
          }
      }else{
        header("Location: ./admin/dashboard/cursos.php?error=Favor de subir una imagen válida");
      }

}else{
    header("Location: ./admin/dashboard/cursos.php?error=Favor de llenar todos los campos");
}
  ?>
